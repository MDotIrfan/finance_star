<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_po');
        $this->load->model('m_quotation');
        $this->load->model('m_inv_in');
        if ($this->m_user->isNotLogin()) redirect(site_url('auth/login'));
        $this->load->helper(array('form', 'url'));
    }

    public function datainvoiceout()
    {
        $data['inv'] = $this->m_inv_in->tampil_data_inv_out()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/datainvoiceout', $data);
        $this->load->view('templates/footer');
    }
    
    public function tampilkanDataPoWord()
    {
        $data = $this->m_inv_in->po_word()->result();
        echo json_encode($data);
    }

    public function tampilkanDataInv($id)
    {
        $data = $this->m_inv_in->ambil_data_all($id)->result();
        echo json_encode($data);
    }

    public function tampilkanDataPoItem()
    {
        $data = $this->m_inv_in->po_item()->result();
        echo json_encode($data);
    }

    public function bast()
    {
        $data['bast'] = $this->m_inv_in->tampil_data_bast()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/bast',$data);
        $this->load->view('templates/footer');
    }
    public function addbast()
    {
        $data['kode_bast'] = $this->m_inv_in->CreateCodeBast();
        $data['inv'] = $this->m_inv_in->tampil_data_inv_out()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/addbast', $data);
        $this->load->view('templates/footer', [
            'load' => ['add_bast.js']
        ]);
    }
    public function editbast($id)
    {
        $data['bast'] = $this->m_inv_in->edit_data_bast($id)->result();
        $data['bi'] = $this->m_inv_in->ambil_data_bast_item($id)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/editbast', $data);
        $this->load->view('templates/footer', [
            'load' => ['edit_bast.js']
        ]);
    }

    function edit_bast_data()
    {
        $no_bast = $this->input->post('nobast');
        $no_inv = $this->input->post('noinv');
        $typeofwork = $this->input->post('swift');
        $due_date = $this->input->post('duedate');
        $project_name = $this->input->post('pn');
        $pic_client= $this->input->post('cn');
        $perihal = $this->input->post('perihal');
        $company= $this->input->post('company');
        $email= $this->input->post('email');
        $first_party= $this->input->post('first_party');
        $second_party= $this->input->post('second_party');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $status = $_POST['status'];

        $data = array(
            'id_bast' => $no_bast,
           'type_of_work' => $typeofwork,
           'due_date' => $due_date,
           'no_invoice' => $no_inv,
           'project_name' => $project_name,
           'pic_client' => $pic_client,
           'perihal' => $perihal,
           'company_name' => $company,
           'email'=> $email,
           'first_party' => $first_party,
           'second_party' => $second_party
        );
        $where = array(
            'id_bast' => $no_bast,
        );
        $this->m_po->update_data($where, $data, 'bast');
        $this->m_po->hapus_data($where, 'bast_item');
        if (!empty($jobdesc)) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data = array(
                        'id_bast' => $no_bast,
                        'item' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'Unit' => $unit[$a],
                        'status' => $status[$a]
                    );
                    $this->m_po->input_data($data, 'bast_item');
                }
            }
        }
        redirect('finance/bast');
    }

    public function send()
    {

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/send');
        $this->load->view('templates/footer');
    }
    public function editinvoiceout($id)
    {
        $inv = $this->db->get_where('invoice_out', ['no_invoice' => $id])->row_array();
        $data['inv'] = $this->m_inv_in->edit_data_out($id, 'invoice_out')->result();
        if($inv['tipe']=='1'){
            $data['pi'] = $this->m_inv_in->ambil_data_qi_luar($id)->result();
        } else if($inv['tipe']=='2'){
            $data['pi'] = $this->m_inv_in->ambil_data_qi_local($id)->result();
        } else if($inv['tipe']=='3'){
            $data['pi'] = $this->m_inv_in->ambil_data_qi_spq($id)->result();
        } else if($inv['tipe']=='4'){
            $data['pi'] = $this->m_inv_in->ambil_data_qi_luar2($id)->result();
        } else if($inv['tipe']=='5'){
            $data['pi'] = $this->m_inv_in->ambil_data_qi_spq2($id)->result();
        }
        $data['tax'] = $this->m_inv_in->ambil_data_tax($id)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/editinvoiceout', $data);
        $this->load->view('templates/footer', [
            'load' => ['edit_inv_out.js', 'add_inv_in.js']
        ]);
    }
    public function datainvoicein()
    {
        $data['inv'] = $this->m_inv_in->tampil_data_inv_all()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/datainvoicein', $data);
        $this->load->view('templates/footer');
    }

    function edit_inv_out()
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('nopo');
        $client_name = $this->input->post('cn');
        $account = $this->input->post('acc');
        $swift_code = $this->input->post('swift');
        $address = $this->input->post('address');
        $inv_date = $this->input->post('invoicedate');
        $tipe= $this->input->post('tipe');
        $due_date = $this->input->post('duedate');
        $email = $this->input->post('email');
        $no_rek = $this->input->post('no_rek');
        $public_notes = $this->input->post('public_notes');
        $terms = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $signature = $this->input->post('address_resource');
        $total_cost = $this->input->post('total');
        $grand_total = $this->input->post('grand');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];
        $tax = $_POST['tax'];

        $data = array(
            'no_invoice' => $no_inv,
            'no_Po' => $no_po,
            'client_name' => $client_name,
            'account' => $account,
            'swift_code' => $swift_code,
            'address' => $address,
            'invoice_date' => $inv_date,
            'due_date' => $due_date,
            'email' => $email,
            'no_rek' => $no_rek,
            'public_notes' => $public_notes,
            'terms' => $terms,
            'footer' => $footer,
            'signature' => $signature,
            'total_cost' => $total_cost,
            'grand_Total' => $grand_total,
            'tipe' => $tipe,
        );
        $where = array(
            'no_invoice' => $no_inv,
        );
        $this->m_po->update_data($where, $data, 'invoice_out');
        if($tipe=='1'){$this->m_po->hapus_data($where, 'invoice_item_luar');}
        else if($tipe=='2'){$this->m_po->hapus_data($where, 'invoice_item_local');}
        else if($tipe=='3'){$this->m_po->hapus_data($where, 'invoice_item_spq');}
        else if($tipe=='4'){$this->m_po->hapus_data($where, 'invoice_item_luar_2');}
        else if($tipe=='5'){$this->m_po->hapus_data($where, 'invoice_item_spq_2');}
        if($tipe=='1'){
            $proman = $_POST['proman'];
             $starnum = $_POST['starnum'];
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data = array(
                            'no_invoice' => $no_inv,
                            'jobdesc' => $jobdesc[$a],
                            'project_manager' => $proman[$a],
                            'star_number' => $starnum[$a],
                            'number_word' => $volume[$a],
                            'unit_price' => $price[$a],
                            'amount' => $cost[$a],
                        );
                        $this->m_po->input_data($data, 'invoice_item_luar');
                    }
                }
            }
        } else if($tipe=='2'){
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data = array(
                            'no_invoice' => $no_inv,
                            'domain' => $jobdesc[$a],
                            'volume' => $volume[$a],
                            'unit' => $unit[$a],
                            'price' => $price[$a],
                            'amount' => $cost[$a],
                        );
                        $this->m_po->input_data($data, 'invoice_item_local');
                    }
                }
            }
        } else if($tipe=='3'){
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data = array(
                            'no_invoice' => $no_inv,
                            'jobdesc' => $jobdesc[$a],
                            'qtt_word' => $volume[$a],
                            'price' => $price[$a],
                            'amount' => $cost[$a],
                        );
                        $this->m_po->input_data($data, 'invoice_item_spq');
                    }
                }
            }
        } else if($tipe=='4'){
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data = array(
                            'no_invoice' => $no_inv,
                            'jobdesc' => $jobdesc[$a],
                            'star_number' => $volume[$a],
                            'number_line' => $unit[$a],
                            'amount' => $price[$a],
                        );
                        $this->m_po->input_data($data, 'invoice_item_luar_2');
                    }
                }
            }
        } else if($tipe=='5'){
            $deliv = $_POST['deliv'];
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data = array(
                            'no_invoice' => $no_inv,
                            'pre_invoice' => $jobdesc[$a],
                            'date_deliv' => $deliv[$a],
                            'amount' => $price[$a],
                        );
                        $this->m_po->input_data($data, 'invoice_item_spq_2');
                    }
                }
            }
        }
        $this->m_po->hapus_data($where, 'tax_invoice');
        if (!empty($tax)) {
            for ($a = 0; $a < count($tax); $a++) {
                if (!empty($tax[$a])) {
                    $data = array(
                        'no_invoice' => $no_inv,
                        'jenis_tax' => $tax[$a]
                    );
                    $this->m_po->input_data($data, 'tax_invoice');
                }
            }
        }
        redirect('finance/datainvoiceout');
    }

    public function addrow()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/addrow');
        $this->load->view('templates/footer');
    }
    public function editaddrow()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/editaddrow');
        $this->load->view('templates/footer');
    }

    public function invoiceout()
    {
        $data['kode_inv'] = $this->m_inv_in->CreateCode_Out();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/invoiceout', $data);
        $this->load->view('templates/footer', [
            'load' => ['add_inv_out.js', 'add_inv_in.js']
        ]);
    }

    public function tampilkanData($id)
    {
        $data['po'] = $this->m_inv_in->ambil_data_po_word($id)->result();
        echo json_encode($data);
    }
    public function tampilkanDataitem($id)
    {
        $data['po'] = $this->m_inv_in->ambil_data_po_item($id)->result();
        echo json_encode($data);
    }

    function add_inv_out()
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('nopo');
        $client_name = $this->input->post('cn');
        $account = $this->input->post('acc');
        $swift_code = $this->input->post('swift');
        $address = $this->input->post('address');
        $inv_date = $this->input->post('invoicedate');
        $tipe= $this->input->post('tipe');
        $due_date = $this->input->post('duedate');
        $email = $this->input->post('email');
        $no_rek = $this->input->post('no_rek');
        $public_notes = $this->input->post('public_notes');
        $terms = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $signature = $this->input->post('address_resource');
        $total_cost = $this->input->post('total');
        $grand_total = $this->input->post('grand');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];
        $tax = $_POST['tax'];

        $data = array(
            'no_invoice' => $no_inv,
            'no_Po' => $no_po,
            'client_name' => $client_name,
            'account' => $account,
            'swift_code' => $swift_code,
            'address' => $address,
            'invoice_date' => $inv_date,
            'due_date' => $due_date,
            'email' => $email,
            'no_rek' => $no_rek,
            'public_notes' => $public_notes,
            'terms' => $terms,
            'footer' => $footer,
            'signature' => $signature,
            'total_cost' => $total_cost,
            'grand_Total' => $grand_total,
            'tipe' => $tipe,
        );
        $this->m_po->input_data($data, 'invoice_out');
        if($tipe=='1'){
            $proman = $_POST['proman'];
             $starnum = $_POST['starnum'];
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data = array(
                            'no_invoice' => $no_inv,
                            'jobdesc' => $jobdesc[$a],
                            'project_manager' => $proman[$a],
                            'star_number' => $starnum[$a],
                            'number_word' => $volume[$a],
                            'unit_price' => $price[$a],
                            'amount' => $cost[$a],
                        );
                        $this->m_po->input_data($data, 'invoice_item_luar');
                    }
                }
            }
        } else if($tipe=='2'){
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data = array(
                            'no_invoice' => $no_inv,
                            'domain' => $jobdesc[$a],
                            'volume' => $volume[$a],
                            'unit' => $unit[$a],
                            'price' => $price[$a],
                            'amount' => $cost[$a],
                        );
                        $this->m_po->input_data($data, 'invoice_item_local');
                    }
                }
            }
        } else if($tipe=='3'){
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data = array(
                            'no_invoice' => $no_inv,
                            'jobdesc' => $jobdesc[$a],
                            'qtt_word' => $volume[$a],
                            'price' => $price[$a],
                            'amount' => $cost[$a],
                        );
                        $this->m_po->input_data($data, 'invoice_item_spq');
                    }
                }
            }
        } else if($tipe=='4'){
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data = array(
                            'no_invoice' => $no_inv,
                            'jobdesc' => $jobdesc[$a],
                            'star_number' => $volume[$a],
                            'number_line' => $unit[$a],
                            'amount' => $price[$a],
                        );
                        $this->m_po->input_data($data, 'invoice_item_luar_2');
                    }
                }
            }
        } else if($tipe=='5'){
            $deliv = $_POST['deliv'];
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data = array(
                            'no_invoice' => $no_inv,
                            'pre_invoice' => $jobdesc[$a],
                            'date_deliv' => $deliv[$a],
                            'amount' => $price[$a],
                        );
                        $this->m_po->input_data($data, 'invoice_item_spq_2');
                    }
                }
            }
        }
        if (!empty($tax)) {
            for ($a = 0; $a < count($tax); $a++) {
                if (!empty($tax[$a])) {
                    $data = array(
                        'no_invoice' => $no_inv,
                        'jenis_tax' => $tax[$a]
                    );
                    $this->m_po->input_data($data, 'tax_invoice');
                }
            }
        }
        redirect('finance/datainvoiceout');
    }
    function delete($id)
    {
        $data = $this->db->get_where('invoice_out', ['no_invoice' => $id])->row_array();
        // unlink(APPPATH.'../assets/img/'.$data['profile_Photo']);
        $where = array('no_invoice' => $id);
        $this->m_po->hapus_data($where, 'tax_invoice');
        if($data['tipe']=='1'){
            $this->m_po->hapus_data($where, 'invoice_item_luar');
        } else if($data['tipe']=='2'){
            $this->m_po->hapus_data($where, 'invoice_item_local');
        } else if($data['tipe']=='3'){
            $this->m_po->hapus_data($where, 'invoice_item_spq');
        } else if($data['tipe']=='4'){
            $this->m_po->hapus_data($where, 'invoice_item_luar_2');
        } else if($data['tipe']=='5'){
            $this->m_po->hapus_data($where, 'invoice_item_spq_2');
        }
        $this->m_po->hapus_data($where, 'invoice_out');
        redirect('finance/datainvoiceout');
    }

    function add_bast_data()
    {
        $no_bast = $this->input->post('nobast');
        $no_inv = $this->input->post('noinv');
        $typeofwork = $this->input->post('swift');
        $due_date = $this->input->post('duedate');
        $project_name = $this->input->post('pn');
        $pic_client= $this->input->post('cn');
        $perihal = $this->input->post('perihal');
        $company= $this->input->post('company');
        $email= $this->input->post('email');
        $first_party= $this->input->post('first_party');
        $second_party= $this->input->post('second_party');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $status = $_POST['status'];

        $data = array(
           'id_bast' => $no_bast,
           'type_of_work' => $typeofwork,
           'due_date' => $due_date,
           'no_invoice' => $no_inv,
           'project_name' => $project_name,
           'pic_client' => $pic_client,
           'perihal' => $perihal,
           'company_name' => $company,
           'email'=> $email,
           'first_party' => $first_party,
           'second_party' => $second_party
        );
        $this->m_po->input_data($data, 'bast');
        if (!empty($jobdesc)) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data = array(
                        'id_bast' => $no_bast,
                        'item' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'Unit' => $unit[$a],
                        'status' => $status[$a]
                    );
                    $this->m_po->input_data($data, 'bast_item');
                }
            }
        }
        redirect('finance/bast');
    }

    public function print()
    {


        // $data['qi'] = $this->m_quotation->ambil_data_q($id)->result();
        // $data['quotation'] = $this->m_quotation->getAll($id)->result();
        $this->load->view('finance/invluar');
    }
    function acc($id){
		$data = array(
			'is_Acc' => 1,
			);
            $where = array(
                'no_invoice' => $id,
            );
        $this->m_quotation->update_data($where,$data,'invoice_in');
        redirect('finance/datainvoicein');
	}

    function unacc($id){
		$data = array(
			'is_Acc' => 0,
			);
            $where = array(
                'no_invoice' => $id,
            );
        $this->m_quotation->update_data($where,$data,'invoice_in');
        redirect('finance/datainvoicein');
	}
    function delete_bast($id)
    {
        $data = $this->db->get_where('invoice_in', ['no_invoice' => $id])->row_array();
        // unlink(APPPATH.'../assets/img/'.$data['profile_Photo']);
        $where = array('id_bast' => $id);
        $this->m_po->hapus_data($where, 'bast_item');
        $this->m_po->hapus_data($where, 'bast');
        redirect('finance/bast');
    }
    public function kirimemail(){
        $userdata = $this->session->userdata('user_logged');
        $email_ini = $userdata->email_Address;
        $name = $userdata->full_Name;
        $to = $this->input->post('to');
        $cc = $this->input->post('cc');
        $subject = $this->input->post('subject');
        $desc = $this->input->post('desc');
        if (!empty($_FILES['gambar']['name'])) {
            $file = $this->_uploadImage($subject);
            print_r($file);
        } else {
            $file = '';
        }
		
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'muhammadirfan.9f@gmail.com',  // Email gmail
            'smtp_pass'   => 'weseisa123',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->from($email_ini, $name);
		$this->email->to($to); // Ganti dengan email tujuan
        if($file!=''){
            $this->email->attach(base_url('./assets/files/'.$file));
        }
        $this->email->subject($subject);
        $this->email->message($desc);
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
        redirect('finance/send');
	}

    function _uploadImage($id)
    {
    $config['upload_path']          = './assets/files/';
    $config['allowed_types']        = 'pdf|docx|doc';
    $config['file_name']            = $id;
    $config['overwrite']			= true;
    $config['max_size']             = 10240; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);
 
    if ( ! $this->upload->do_upload('gambar')){
        $error = array('error' => $this->upload->display_errors());
        return $error;
    }else{
        $data = array('upload_data' => $this->upload->data());
        return $data['upload_data']['file_name'];
    }
    }
}
