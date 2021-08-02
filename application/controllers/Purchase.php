<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_po');
        $this->load->model('m_quotation');
        if ($this->m_user->isNotLogin()) redirect(site_url('auth/login'));
        $this->load->helper(array('form', 'url'));
        // $this->load->library('form_validation');
    }

    public function data()
    {
        $data['po'] = $this->m_po->tampil_data_po_item('word')->result();
        $data['interval'] = $this->m_po->last_update_po('word')->row()->last_update;
        $this->session->set_userdata('menu', 'Purchase Order Word Based');
        $this->load->view('templates/header', [
            'load' => ['data_po_word.js']
        ]);
        $this->load->view('templates/sidebar');
        $this->load->view('purchase/data', $data);
        $this->load->view('templates/footer');
    }

    function get_data_po($table)
    {
        $list = $this->m_po->get_datatables($table);
        $data = array();
        foreach ($list as $field) {
            if($field->currency_po=='IDR'){
                $grand_total = 'Rp. '.$field->grand_Total_po;
            } else if($field->currency_po=='USD'){
                $grand_total = '$ '.$field->grand_Total_po;
            } else if($field->currency_po=='EUR'){
                $grand_total = '€ '.$field->grand_Total_po;
            }
            $row = array();
            $row[] = $field->no_Po;
            $row[] = $field->client_Name;
            $row[] = $field->project_Name_po;
            $row[] = $field->resource_Status;
            $row[] = $grand_total;
            if($table=='purchase_order_word'){
                $row[] = '<a href="'.base_url('purchase/editwordbase/' . $field->no_Po).'"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                <a onclick="return confirm(\'Yakin ingin hapus?\')" href="'.base_url('purchase/delete_pw/' . $field->no_Po).'"><button type="button" class="btn" style="color:red"><i class="fas fa-trash" aria-hidden="true"></i></button></a>
                <a href="'.base_url('assets/files/' . $field->no_Po . '.pdf').'" target="_blank"><button type="button" class="btn" style="color:black"><i class="fas fa-print" aria-hidden="true"></i></button></a>';
            } else if($table=='purchase_order_item') {
                $row[] = '<a href="'.base_url('purchase/edititembase/' . $field->no_Po).'"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                <a onclick="return confirm(\'Yakin ingin hapus?\')" href="'.base_url('purchase/delete_pi/' . $field->no_Po).'"><button type="button" class="btn" style="color:red"><i class="fas fa-trash" aria-hidden="true"></i></button></a>
                <a href="'.base_url('assets/files/' . $field->no_Po . '.pdf').'" target="_blank"><button type="button" class="btn" style="color:black"><i class="fas fa-print" aria-hidden="true"></i></button></a>';
            }
            
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_po->count_all($table),
            "recordsFiltered" => $this->m_po->count_filtered($table),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function dataitem()
    {
        $data['po'] = $this->m_po->tampil_data_po_item('item')->result();
        $data['interval'] = $this->m_po->last_update_po('item')->row()->last_update;
        $this->session->set_userdata('menu', 'Purchase Order Item Based');
        $this->load->view('templates/header', [
            'load' => ['data_po_item.js']
        ]);
        $this->load->view('templates/sidebar');
        $this->load->view('purchase/dataitem', $data);
        $this->load->view('templates/footer');
    }
    public function addword()
    {
        $data['res'] = $this->m_po->get_resource()->result();
        $data['kode_po'] = $this->m_po->CreateCode();
        $data['q'] = $this->m_po->ambil_data_q(1, 0)->result();
        $data['position'] = $this->m_user->ambil_data_status()->result();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('purchase/wordbase', $data);
        $this->load->view('templates/footer', [
            'load' => ['addword.js']
        ]);
    }
    public function additem()
    {
        $data['res'] = $this->m_po->get_resource()->result();
        $data['kode_po'] = $this->m_po->CreateCode();
        $data['q'] = $this->m_po->ambil_data_quotitem(1, 0)->result();
        $data['position'] = $this->m_user->ambil_data_status()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('purchase/itembase', $data);
        $this->load->view('templates/footer', [
            'load' => ['addq.js', 'editq.js']
        ]);
    }
    function add_po_item($tujuan=NULL)
    {
        $no_po = $this->input->post('nopo');
        $resource_name = $this->input->post('rn');
        $mobile_phone = $this->input->post('pm');
        $project_name = $this->input->post('pn');
        $pm_name = $this->input->post('pmn');
        $res_email = $this->input->post('ps');
        $date = $this->input->post('tgl');
        $no_quitation = $this->input->post('status');
        $pm_email = $this->input->post('pme');
        $res_status = $this->input->post('rs');
        $public_notes = $this->input->post('public_notes');
        $regards = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $address_resource = $this->input->post('address_resource');
        $grand_total = $this->input->post('grand');
        $tipe = $this->input->post('tipe');
        $curr = $this->input->post('curr');
        $jumlah = $this->input->post('jumlah');
        $nopo_awal = $this->input->post('nopo_awal');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];

        $data = array(
            'no_Po' => $no_po,
            'nama_Pm' => $pm_name,
            'email_pm' => $pm_email,
            'resource_Name' => $resource_name,
            'resource_Email' => $res_email,
            'resource_Status' => $res_status,
            'project_Name_po' => $project_name,
            'mobile_Phone' => $mobile_phone,
            'date' => $date,
            'id_quotation' => $no_quitation,
            'public_Notes' => $public_notes,
            'regards' => $regards,
            'footer' => $footer,
            'address_Resource' => $address_resource,
            'grand_Total_po' => $grand_total,
            'tipe' => $tipe,
            'currency_po' => $curr,
            'jumlah_pembayaran' => $jumlah,
            'no_po_ori' => $nopo_awal
        );
        $this->m_po->input_data($data, 'purchase_order');
        if (!empty($jobdesc)) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data = array(
                        'no_Po' => $no_po,
                        'task' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'unit' => $unit[$a],
                        'rate' => $price[$a],
                        'amount' => $cost[$a],
                    );
                    $this->m_po->input_data($data, 'po_item_itembase');
                }
            }
        }
        $po = $this->m_po->ambil_po_ke($nopo_awal)->result_array();
        print_r($nopo_awal);
        print_r($po);
        foreach($po as $p){
            if($p['jumlah_pembayaran']==count($po)){
                $dat2 = array(
                            'is_Q' => 1,
                        );
                        $where = array(
                            'no_Quotation' => $no_quitation,
                        );
                        $this->m_quotation->update_data($where, $dat2, 'quotation');
                        echo 'berhasil update';
            } else {
                echo 'gagal update';
            }
        }
        $this->laporan_pdf_item($no_po);
        if($tujuan=='email'){
            $this->kirimemail($this->input->post('nopo'), 'create');
        }
        $this->session->set_flashdata('success','Purchase Order '.$no_po.' Berhasil Dibuat');
        redirect('purchase/dataitem');
    }
    
    function add_po_word($tujuan=NULL){
        // $this->form_validation->set_rules('rn', 'Resource Name', 'required', array('required' => 'Resource Name tidak boleh kosong'));
        // $this->form_validation->set_rules('pm', 'Mobile Phone', 'required', array('required' => 'Mobile Phone tidak boleh kosong'));
        // $this->form_validation->set_rules('pn', 'Project Name', 'required', array('required' => 'Project Name tidak boleh kosong'));
        // $this->form_validation->set_rules('pmn', 'PM Name', 'required', array('required' => 'PM Name tidak boleh kosong'));
        // $this->form_validation->set_rules('rate', 'Rate', 'required', array('required' => 'Rate tidak boleh kosong'));
        // $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', array('required' => 'Jumlah tidak boleh kosong'));
        // $this->form_validation->set_rules('wc1', 'Word Count 1', 'required', array('required' => 'Word Count 1 tidak boleh kosong'));
        // $this->form_validation->set_rules('wc2', 'Word Count 2', 'required', array('required' => 'Word Count 2 tidak boleh kosong'));
        // $this->form_validation->set_rules('wc3', 'Word Count 3', 'required', array('required' => 'Word Count 3 tidak boleh kosong'));
        // $this->form_validation->set_rules('wc4', 'Word Count 4', 'required', array('required' => 'Word Count 4 tidak boleh kosong'));
        // $this->form_validation->set_rules('wc5', 'Word Count 5', 'required', array('required' => 'Word Count 5 tidak boleh kosong'));
        // $this->form_validation->set_rules('wc6', 'Word Count 6', 'required', array('required' => 'Word Count 6 tidak boleh kosong'));
        // $this->form_validation->set_rules('wc7', 'Word Count 7', 'required', array('required' => 'Word Count 7 tidak boleh kosong'));
        // $this->form_validation->set_rules('wc8', 'Word Count 8', 'required', array('required' => 'Word Count 8 tidak boleh kosong'));
        // $this->form_validation->set_rules('ps', 'Resource Email', 'required|valid_email', array('required' => 'Resource Email tidak boleh kosong', 'valid_email' => 'Format Email tidak benar'));
        // $this->form_validation->set_rules('ps', 'PM Email', 'required|valid_email', array('required' => 'PM Email tidak boleh kosong', 'valid_email' => 'Format Email tidak benar'));
        // $this->form_validation->set_error_delimiters('<div style="color:red; font-size:12px;">', '</div>');
        // if($this->form_validation->run() === FALSE)
        // {
        //     $this->add_po_word();
        // }
        // else
        // {
        $no_po = $this->input->post('nopo');
        $resource_name = $this->input->post('rn');
        $mobile_phone = $this->input->post('pm');
        $project_name = $this->input->post('pn');
        $pm_name = $this->input->post('pmn');
        $res_email = $this->input->post('ps');
        $date = $this->input->post('date');
        $tipe_po = $this->input->post('tipe_Po');
        $no_quitation = $this->input->post('status');
        $pm_email = $this->input->post('pme');
        $res_status = $this->input->post('rs');
        $rate = $this->input->post('rate');
        $public_notes = $this->input->post('public_notes');
        $regards = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $address_resource = $this->input->post('address_resource');
        $grand_total = $this->input->post('grand');
        $tipe = $this->input->post('tipe');
        $curr = $this->input->post('curr');
        $jumlah = $this->input->post('jumlah');
        $nopo_awal = $this->input->post('nopo_awal');
        $locked = $_POST['wc1'];
        $repetitions = $_POST['wc2'];
        $fuzzy100 = $_POST['wc3'];
        $fuzzy95 = $_POST['wc4'];
        $fuzzy85 = $_POST['wc5'];
        $fuzzy75 = $_POST['wc6'];
        $fuzzy50 = $_POST['wc7'];
        $new = $_POST['wc8'];
        $wwc1 = $_POST['wwc1'];
        $wwc2 = $_POST['wwc2'];
        $wwc3 = $_POST['wwc3'];
        $wwc4 = $_POST['wwc4'];
        $wwc5 = $_POST['wwc5'];
        $wwc6 = $_POST['wwc6'];
        $wwc7 = $_POST['wwc7'];
        $wwc8 = $_POST['wwc8'];

        $data = array(
            'no_Po' => $no_po,
            'nama_Pm' => $pm_name,
            'email_pm' => $pm_email,
            'resource_Name' => $resource_name,
            'resource_Email' => $res_email,
            'resource_Status' => $res_status,
            'project_Name_po' => $project_name,
            'mobile_Phone' => $mobile_phone,
            'date' => $date,
            'id_quotation' => $no_quitation,
            'public_Notes' => $public_notes,
            'regards' => $regards,
            'footer' => $footer,
            'address_Resource' => $address_resource,
            'grand_Total_po' => $grand_total,
            'tipe' => $tipe,
            'tipe_Po' => $tipe_po,
            'rate' => $rate,
            'currency_po' => $curr,
            'jumlah_pembayaran' => $jumlah,
            'no_po_ori' => $nopo_awal
        );
        $this->m_po->input_data($data, 'purchase_order');
        $data2 = array(
            'no_Po' => $no_po,
            'locked' => $locked,
            'repetitions' => $repetitions,
            'fuzzy100' => $fuzzy100,
            'fuzzy95' => $fuzzy95,
            'fuzzy85' => $fuzzy85,
            'fuzzy75' => $fuzzy75,
            'fuzzy50' => $fuzzy50,
            'new' => $new,
            'wwc1' => $wwc1,
            'wwc2' => $wwc2,
            'wwc3' => $wwc3,
            'wwc4' => $wwc4,
            'wwc5' => $wwc5,
            'wwc6' => $wwc6,
            'wwc7' => $wwc7,
            'wwc8' => $wwc8,
        );
        $this->m_po->input_data($data2, 'po_item_wordbase');
        $po = $this->m_po->ambil_po_ke($nopo_awal)->result_array();
        print_r($nopo_awal);
        print_r($po);
        foreach($po as $p){
            if($p['jumlah_pembayaran']==count($po)){
                $dat2 = array(
                            'is_Q' => 1,
                        );
                        $where = array(
                            'no_Quotation' => $no_quitation,
                        );
                        $this->m_quotation->update_data($where, $dat2, 'quotation');
                        echo 'berhasil update';
            } else {
                echo 'gagal update';
            }
        }  
        $this->laporan_pdf($no_po);
        if($tujuan=='email'){
            $this->kirimemail($this->input->post('nopo'), 'create');
        }
        $this->session->set_flashdata('success','Purchase Order '.$no_po.' Berhasil Dibuat');
        redirect('purchase/data');
    // }
    }

    public function kirimemail($id=NULL, $mode=NULL){
		$data['qi'] = $this->m_po->ambil_data_email($id)->row_array();
        $userdata = $this->session->userdata('user_logged');
        $email = $userdata->email_Address;
        $name = $userdata->full_Name;
		// Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.hostinger.com',
            'smtp_user' => 'finance@kodegiri.com',  // Email gmail
            'smtp_pass'   => 'Finance1234',  // Password gmail
            'smtp_crypto' => 'tls',
            'smtp_port'   => 587,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('finance@kodegiri.com', $name);

        // Email penerima
        $this->email->to($data['qi']['resource_Email']); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach(base_url('assets/files/' . $data['qi']['no_Po'] . '.pdf'));

        // Subject email
        if($mode=='create'){
            $this->email->subject('Purchase Order Baru untuk project '. $data['qi']['project_Name_po']);
        } else if($mode=='edit'){
            $this->email->subject('Perubahan Quotation untuk project '. $data['qi']['project_Name_po']);
        }

        // Isi email
        if($mode=='create'){
            $this->email->message("berikut adalah Purchase Order Baru untuk project ".$data['qi']['project_Name_po']);
        } else if($mode=='edit'){
            $this->email->message("berikut adalah Perubahan Purchase Order untuk project ".$data['qi']['project_Name_po']);
        }

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
            echo $this->email->print_debugger();
        }
	}

    public function tampilkanData($id)
    {
        $data['kode_po'] = $this->m_po->CreateCode();
        $data['q'] = $this->m_po->ambil_data_qi($id)->result();
        echo json_encode($data);
    }
    public function tampilkanDataResource($id)
    {
        $url = urldecode($id);
        $data = $this->m_po->get_resource_data($url)->result();
        echo json_encode($data);
    }
    public function addrow()
    {
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('purchase/addrow');
        $this->load->view('templates/footer');
    }
    public function dashboard()
    {
        $po = $this->m_po->get_total_po()->result();
        $data['total_po'] = [];

        for($i=1;$i<=12;$i++){
            $check_date = date($i);
            $data['total_po'][$check_date] = 0;
        }
        foreach($po as $item){
            $data['total_po'][$item->month] = $item->total;
        }

        $data['interval'] = $this->m_po->last_update_po()->row()->last_update;
        $data['tgl'] = $this->m_po->last_update_po()->row()->tgl_sebelum;
        $data['jumlah'] = $this->m_po->count_po()->result();
        $data['selisih'] = $this->m_po->selisih_count_po()->result();
        $this->session->set_userdata('menu', 'Dashboard');
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('purchase/dashboard',$data);
        $this->load->view('templates/footer', [
            'load' => ['chartpo.js']
        ]);
    }
    public function editwordbase($id)
    {
        $data['res'] = $this->m_po->get_resource()->result();
        $data['po'] = $this->m_po->edit_data($id, 'purchase_order')->result();
        $data['pi'] = $this->m_po->ambil_data_po_word($id)->result();
        $data['position'] = $this->m_user->ambil_data_status()->result();
        $this->session->set_userdata('menu', 'Purchase Order Word Based');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('purchase/editwordbase', $data);
        $this->load->view('templates/footer', [
            'load' => ['addword.js']
        ]);
    }

    public function edititembase($id)
    {
        $data['res'] = $this->m_po->get_resource()->result();
        $data['po'] = $this->m_po->edit_data($id, 'purchase_order')->result();
        $data['pi'] = $this->m_po->ambil_data_po_item($id)->result();
        $data['position'] = $this->m_user->ambil_data_status()->result();
        $this->session->set_userdata('menu', 'Purchase Order Item Based');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('purchase/edititembase', $data);
        $this->load->view('templates/footer', [
            'load' => ['edit_po.js']
        ]);
    }

    function edit_po_item($tujuan=NULL)
    {
        $no_po = $this->input->post('nopo');
        $resource_name = $this->input->post('rn');
        $mobile_phone = $this->input->post('pm');
        $project_name = $this->input->post('pn');
        $pm_name = $this->input->post('pmn');
        $res_email = $this->input->post('ps');
        $date = $this->input->post('tgl');
        $no_quitation = $this->input->post('status');
        $pm_email = $this->input->post('pme');
        $res_status = $this->input->post('rs');
        $public_notes = $this->input->post('public_notes');
        $regards = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $address_resource = $this->input->post('address_resource');
        $grand_total = $this->input->post('grand');
        $v_form = $this->input->post('v_form');
        $tipe = $this->input->post('tipe');
        $curr = $this->input->post('curr');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];

        $data = array(
            'no_Po' => $no_po,
            'nama_Pm' => $pm_name,
            'email_pm' => $pm_email,
            'resource_Name' => $resource_name,
            'resource_Email' => $res_email,
            'resource_Status' => $res_status,
            'project_Name_po' => $project_name,
            'mobile_Phone' => $mobile_phone,
            'date' => $date,
            'id_quotation' => $no_quitation,
            'public_Notes' => $public_notes,
            'regards' => $regards,
            'footer' => $footer,
            'address_Resource' => $address_resource,
            'v_form' => $v_form,
            'grand_Total_po' => $grand_total,
            'tipe' => $tipe,
            'currency_po' => $curr
        );
        $where = array(
            'no_Po' => $no_po,
        );
        $this->m_po->update_data($where, $data, 'purchase_order');
        $this->m_po->hapus_data($where, 'po_item_itembase');
        if (!empty($jobdesc)) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data = array(
                        'no_Po' => $no_po,
                        'task' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'unit' => $unit[$a],
                        'rate' => $price[$a],
                        'amount' => $cost[$a],
                    );
                    $this->m_quotation->input_data($data, 'po_item_itembase');
                }
            }
        }
        $po = $this->m_po->ambil_po_ke($nopo_awal)->result_array();
        foreach($po as $p){
            if($p['jumlah_pembayaran']>count($po)){
                $dat2 = array(
                            'is_Q' => 0,
                        );
                        $where = array(
                            'no_Quotation' => $no_quitation,
                        );
                        $this->m_quotation->update_data($where, $dat2, 'quotation');
            } else {
                $dat2 = array(
                            'is_Q' => 1,
                        );
                        $where = array(
                            'no_Quotation' => $no_quitation,
                        );
                        $this->m_quotation->update_data($where, $dat2, 'quotation');
            }
        } 
        $this->laporan_pdf_item($no_po);
        if($tujuan=='email'){
            $this->kirimemail($this->input->post('nopo'), 'edit');
        }
        $this->session->set_flashdata('success','Purchase Order '.$no_po.' Berhasil Diubah');
        redirect('purchase/dataitem');
    }

    function edit_po_word($tujuan=NULL)
    {
        $no_po = $this->input->post('nopo');
        $resource_name = $this->input->post('rn');
        $mobile_phone = $this->input->post('pm');
        $project_name = $this->input->post('pn');
        $pm_name = $this->input->post('pmn');
        $res_email = $this->input->post('ps');
        $date = $this->input->post('date');
        $tipe_po = $this->input->post('tipe_Po');
        $no_quitation = $this->input->post('status');
        $pm_email = $this->input->post('pme');
        $res_status = $this->input->post('rs');
        $rate = $this->input->post('rate');
        $public_notes = $this->input->post('public_notes');
        $regards = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $address_resource = $this->input->post('address_resource');
        $grand_total = $this->input->post('grand');
        $tipe = $this->input->post('tipe');
        $jumlah = $this->input->post('jumlah');
        $curr = $this->input->post('curr');
        $nopo_awal = $this->input->post('nopo_awal');
        $locked = $_POST['wc1'];
        $repetitions = $_POST['wc2'];
        $fuzzy100 = $_POST['wc3'];
        $fuzzy95 = $_POST['wc4'];
        $fuzzy85 = $_POST['wc5'];
        $fuzzy75 = $_POST['wc6'];
        $fuzzy50 = $_POST['wc7'];
        $new = $_POST['wc8'];
        $wwc1 = $_POST['wwc1'];
        $wwc2 = $_POST['wwc2'];
        $wwc3 = $_POST['wwc3'];
        $wwc4 = $_POST['wwc4'];
        $wwc5 = $_POST['wwc5'];
        $wwc6 = $_POST['wwc6'];
        $wwc7 = $_POST['wwc7'];
        $wwc8 = $_POST['wwc8'];
        if ($tipe_po == 'Trados') {
            $t_po = '1';
        } else if ($tipe_po == 'Transit, XTM, etc.') {
            $t_po = '2';
        } else if ($tipe_po == 'Patent') {
            $t_po = '3';
        } else if ($tipe_po == 'Google MT') {
            $t_po = '4';
        }

        $data = array(
            'no_Po' => $no_po,
            'nama_Pm' => $pm_name,
            'email_pm' => $pm_email,
            'resource_Name' => $resource_name,
            'resource_Email' => $res_email,
            'resource_Status' => $res_status,
            'project_Name_po' => $project_name,
            'mobile_Phone' => $mobile_phone,
            'date' => $date,
            'id_quotation' => $no_quitation,
            'public_Notes' => $public_notes,
            'regards' => $regards,
            'footer' => $footer,
            'address_Resource' => $address_resource,
            'grand_Total_po' => $grand_total,
            'tipe' => $tipe,
            'tipe_Po' => $t_po,
            'rate' => $rate,
            'currency_po' => $curr
        );
        $where = array(
            'no_Po' => $no_po,
        );
        $this->m_po->update_data($where, $data, 'purchase_order');
        $data3 = array(
            'jumlah_pembayaran' => $jumlah,
        );
        $where2 = array(
            'no_po_ori' => $nopo_awal,
        );
        $this->m_po->update_data($where2, $data3, 'purchase_order');
        $this->m_po->hapus_data($where, 'po_item_wordbase');
        $data2 = array(
            'no_Po' => $no_po,
            'locked' => $locked,
            'repetitions' => $repetitions,
            'fuzzy100' => $fuzzy100,
            'fuzzy95' => $fuzzy95,
            'fuzzy85' => $fuzzy85,
            'fuzzy75' => $fuzzy75,
            'fuzzy50' => $fuzzy50,
            'new' => $new,
            'wwc1' => $wwc1,
            'wwc2' => $wwc2,
            'wwc3' => $wwc3,
            'wwc4' => $wwc4,
            'wwc5' => $wwc5,
            'wwc6' => $wwc6,
            'wwc7' => $wwc7,
            'wwc8' => $wwc8,
        );
        $this->m_po->input_data($data2, 'po_item_wordbase');
        $po = $this->m_po->ambil_po_ke($nopo_awal)->result_array();
        foreach($po as $p){
            if($p['jumlah_pembayaran']>count($po)){
                $dat2 = array(
                            'is_Q' => 0,
                        );
                        $where = array(
                            'no_Quotation' => $no_quitation,
                        );
                        $this->m_quotation->update_data($where, $dat2, 'quotation');
            } else {
                $dat2 = array(
                            'is_Q' => 1,
                        );
                        $where = array(
                            'no_Quotation' => $no_quitation,
                        );
                        $this->m_quotation->update_data($where, $dat2, 'quotation');
            }
        } 
        $this->laporan_pdf($no_po);
        if($tujuan=='email'){
            $this->kirimemail($this->input->post('nopo'), 'edit');
        }
        $this->session->set_flashdata('success','Purchase Order '.$no_po.' Berhasil Diubah');
        redirect('purchase/data');
    }

    public function laporan_pdf($no_po){

        $data['p'] = $this->m_po->edit_data($no_po, 'purchase_order')->result();
        $data['pi'] = $this->m_po->ambil_data_po_word($no_po)->result();
        $data['position'] = $this->m_user->ambil_data_status()->result();
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('purchase/masterpo', $data, $no_po);
    }

    public function laporan_pdf_item($no_po){

        $data['po'] = $this->m_po->edit_data($no_po, 'purchase_order')->result();
        $data['pi'] = $this->m_po->ambil_data_po_item($no_po)->result();
        $data['p'] = $this->m_po->ambil_dataitem_po_item($no_po)->result();
        $data['position'] = $this->m_user->ambil_data_status()->result();
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('purchase/poibm', $data, $no_po);
    }

    function delete_pi($id)
    {
        $data = $this->db->get_where('purchase_order', ['no_Po' => $id])->row_array();
        unlink(APPPATH.'../assets/files/'.$id.'.pdf');
        $where = array('no_Po' => $id);
        $dat2 = array(
            'is_Q' => 0,
        );
        $where2 = array(
            'no_Quotation' => $data['id_quotation'],
        );
        print_r($data['id_quotation']);
        $this->m_quotation->update_data($where2, $dat2, 'quotation');
        $this->m_po->hapus_data($where, 'po_item_itembase');
        $this->m_po->hapus_data($where, 'purchase_order');
        redirect('purchase/dataitem');
    }
    function delete_pw($id)
    {
        $data = $this->db->get_where('purchase_order', ['no_Po' => $id])->row_array();
        unlink(APPPATH.'../assets/files/'.$id.'.pdf');
        $where = array('no_Po' => $id);
        $dat2 = array(
            'is_Q' => 0,
        );
        $where2 = array(
            'no_Quotation' => $data['id_quotation'],
        );
        print_r($data['id_quotation']);
        $this->m_quotation->update_data($where2, $dat2, 'quotation');
        $this->m_po->hapus_data($where, 'po_item_wordbase');
        $this->m_po->hapus_data($where, 'purchase_order');
        redirect('purchase/data');
    }
    public function print($id)
    {
        $data['p'] = $this->m_po->edit_data($id, 'purchase_order')->result();
        $data['pi'] = $this->m_po->ambil_data_po_word($id)->result();
        $data['position'] = $this->m_user->ambil_data_status()->result();
        $this->load->view('purchase/masterpo', $data);
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    }
    public function printi($id)
    {
        $data['p'] = $this->m_po->edit_data($id, 'purchase_order')->result();
        $data['pi'] = $this->m_po->ambil_data_po_item($id)->result();
        // $data['p'] = $this->m_po->ambil_dataitem_po_item($id)->result();
        $data['position'] = $this->m_user->ambil_data_status()->result();
        $this->load->view('purchase/poibm', $data);
        print_r($data);
    }
    public function preview_po_word()
    {
        $data['position'] = $this->m_user->ambil_data_status()->result();
        $no_po = $this->input->post('nopo');
        $resource_name = $this->input->post('rn');
        $mobile_phone = $this->input->post('pm');
        $project_name = $this->input->post('pn');
        $pm_name = $this->input->post('pmn');
        $res_email = $this->input->post('ps');
        $date = $this->input->post('date');
        $tipe_po = $this->input->post('tipe_Po');
        $no_quitation = $this->input->post('status');
        $pm_email = $this->input->post('pme');
        $res_status = $this->input->post('rs');
        $rate = $this->input->post('rate');
        $public_notes = $this->input->post('public_notes');
        $regards = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $address_resource = $this->input->post('address_resource');
        $grand_total = $this->input->post('grand');
        $tipe = $this->input->post('tipe');
        $curr = $this->input->post('curr');
        $jumlah = $this->input->post('jumlah');
        $nopo_awal = $this->input->post('nopo_awal');
        $locked = $_POST['wc1'];
        $repetitions = $_POST['wc2'];
        $fuzzy100 = $_POST['wc3'];
        $fuzzy95 = $_POST['wc4'];
        $fuzzy85 = $_POST['wc5'];
        $fuzzy75 = $_POST['wc6'];
        $fuzzy50 = $_POST['wc7'];
        $new = $_POST['wc8'];
        $wwc1 = $_POST['wwc1'];
        $wwc2 = $_POST['wwc2'];
        $wwc3 = $_POST['wwc3'];
        $wwc4 = $_POST['wwc4'];
        $wwc5 = $_POST['wwc5'];
        $wwc6 = $_POST['wwc6'];
        $wwc7 = $_POST['wwc7'];
        $wwc8 = $_POST['wwc8'];
        if ($tipe_po == 'Trados') {
            $tipe_po = '1';
        } else if ($tipe_po == 'Transit, XTM, etc.') {
            $tipe_po = '2';
        } else if ($tipe_po == 'Patent') {
            $tipe_po = '3';
        } else if ($tipe_po == 'Google MT') {
            $tipe_po = '4';
        }

        $data['p'][0] =(object) array(
            'no_Po' => $no_po,
            'nama_Pm' => $pm_name,
            'email_pm' => $pm_email,
            'resource_Name' => $resource_name,
            'resource_Email' => $res_email,
            'resource_Status' => $res_status,
            'project_Name_po' => $project_name,
            'mobile_Phone' => $mobile_phone,
            'date' => $date,
            'id_quotation' => $no_quitation,
            'public_Notes' => $public_notes,
            'regards' => $regards,
            'footer' => $footer,
            'address_Resource' => $address_resource,
            'grand_Total_po' => $grand_total,
            'tipe' => $tipe,
            'tipe_Po' => $tipe_po,
            'rate' => $rate,
            'currency_po' => $curr,
            'jumlah_pembayaran' => $jumlah,
            'no_po_ori' => $nopo_awal
        );

        $data['pi'][0] =(object) array(
            'no_Po' => $no_po,
            'nama_Pm' => $pm_name,
            'grand_Total_po' => $grand_total,
            'locked' => $locked,
            'rate' => $rate,
            'repetitions' => $repetitions,
            'fuzzy100' => $fuzzy100,
            'fuzzy95' => $fuzzy95,
            'fuzzy85' => $fuzzy85,
            'fuzzy75' => $fuzzy75,
            'fuzzy50' => $fuzzy50,
            'new' => $new,
            'wwc1' => $wwc1,
            'wwc2' => $wwc2,
            'wwc3' => $wwc3,
            'wwc4' => $wwc4,
            'wwc5' => $wwc5,
            'wwc6' => $wwc6,
            'wwc7' => $wwc7,
            'wwc8' => $wwc8,
            'tipe_Po' => $tipe_po,
        );

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $this->load->library('pdf_2');
    
        $this->pdf_2->setPaper('A4', 'potrait');
        $this->pdf_2->load_view('purchase/masterpo', $data, $no_po);
    }

    public function preview_po_item()
    {
        $data['position'] = $this->m_user->ambil_data_status()->result();
        $no_po = $this->input->post('nopo');
        $resource_name = $this->input->post('rn');
        $mobile_phone = $this->input->post('pm');
        $project_name = $this->input->post('pn');
        $pm_name = $this->input->post('pmn');
        $res_email = $this->input->post('ps');
        $date = $this->input->post('tgl');
        $no_quitation = $this->input->post('status');
        $pm_email = $this->input->post('pme');
        $res_status = $this->input->post('rs');
        $public_notes = $this->input->post('public_notes');
        $regards = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $address_resource = $this->input->post('address_resource');
        $grand_total = $this->input->post('grand');
        $tipe = $this->input->post('tipe');
        $curr = $this->input->post('curr');
        $jumlah = $this->input->post('jumlah');
        $nopo_awal = $this->input->post('nopo_awal');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];

        $data['p'][0] = (object) array(
            'no_Po' => $no_po,
            'nama_Pm' => $pm_name,
            'email_pm' => $pm_email,
            'resource_Name' => $resource_name,
            'resource_Email' => $res_email,
            'resource_Status' => $res_status,
            'project_Name_po' => $project_name,
            'mobile_Phone' => $mobile_phone,
            'date' => $date,
            'id_quotation' => $no_quitation,
            'public_Notes' => $public_notes,
            'regards' => $regards,
            'footer' => $footer,
            'address_Resource' => $address_resource,
            'grand_Total_po' => $grand_total,
            'tipe' => $tipe,
            'currency_po' => $curr,
            'jumlah_pembayaran' => $jumlah,
            'no_po_ori' => $nopo_awal
        );
        if (!empty($jobdesc[0])) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data['pi'][$a] = (object) array(
                        'no_Po' => $no_po,
                        'task' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'unit' => $unit[$a],
                        'rate' => $price[$a],
                        'amount' => $cost[$a],
                        'grand_Total_po' => $grand_total,
                    );
                }
            }
        } else {
            $data['pi'][0] = (object) array(
                'no_Po' => $no_po,
                        'task' => $jobdesc[0],
                        'qty' => $volume[0],
                        'unit' => $unit[0],
                        'rate' => $price[0],
                        'amount' => $cost[0],
                        'grand_Total_po' => $grand_total,
            );
        }

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $this->load->library('pdf_2');
    
        $this->pdf_2->setPaper('A4', 'potrait');
        $this->pdf_2->load_view('purchase/poibm', $data, $no_po);
    }
}
