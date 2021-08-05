<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Freelance extends CI_Controller
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

    function get_data_invoicein($table)
    {
        $list = $this->m_inv_in->get_datatables($table);
        $data = array();
        foreach ($list as $field) {
            $row = array();
            if ($field->tipe == 'word') {
                $action1 = '<a href="'.base_url('freelance/editwordbase/' . $field->no_invoice).'"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';  
            } else {
                $action1 = '<a href="'.base_url('freelance/edititembase/' . $field->no_invoice).'"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>';
            }
            $action2 = '<a onclick="return confirm(\'Yakin ingin hapus?\')" href="'.base_url('freelance/delete/' . $field->no_invoice).'"><button type="button" class="btn" style="color:red" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash" aria-hidden="true"></i></button></a>
            <a href="'.base_url('assets/files/' . $field->no_invoice . '.pdf').'" target="_blank"><button type="button" class="btn" style="color:black"><i class="fas fa-print" aria-hidden="true"></i></button></a>';
            $action = $action1 . $action2;
            $row[] = $field->no_invoice;
            $row[] = $field->jobdesc;
            $row[] = $field->invoice_date;
            $row[] = $field->grand_total;
            $row[] = $action;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_inv_in->count_all($table),
            "recordsFiltered" => $this->m_inv_in->count_filtered($table),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function dashboard()
    {
        $data['inv'] = $this->m_inv_in->tampil_data_inv()->result();
        $data['interval'] = $this->m_inv_in->last_update_inv()->row()->last_update;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('freelance/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function invoice()
    {
        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['po'] = $this->m_inv_in->ambil_data_po_w(0)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('freelance/invoice', $data);
        $this->load->view('templates/footer', [
            'load' => ['addq_2.js', 'add_inv_in.js']
        ]);
    }
    public function invoice_item()
    {
        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['po'] = $this->m_inv_in->ambil_data_po_i(0)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('freelance/invoice_item', $data);
        $this->load->view('templates/footer', [
            'load' => ['addq_3.js', 'add_inv_in2.js']
        ]);
    }
    function add_inv_word($tujuan=NULL)
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('status');
        $no_rek = $this->input->post('cn');
        $cabang_bank = $this->input->post('pm');
        $mitra_name = $this->input->post('ps');
        $address = $this->input->post('address');
        $dp = $this->input->post('dp');
        $inv_date = $this->input->post('invoicedate');
        $due_date = $this->input->post('duedate');
        $email = $this->input->post('email');
        $npwp = $this->input->post('ce');
        $public_notes = $this->input->post('public_notes');
        $terms = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $signature = $this->input->post('address_resource');
        $total_cost = $this->input->post('total');
        $grand_total = $this->input->post('grand');
        $tipe = $this->input->post('tipe');
        $company = $this->input->post('company');
        $currency = $this->input->post('curr_awal');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];

        $data = array(
            'no_invoice' => $no_inv,
            'no_Po' => $no_po,
            'no_rekening' => $no_rek,
            'cabang_bank' => $cabang_bank,
            'mitra_name' => $mitra_name,
            'address' => $address,
            'down_payment' => $dp,
            'invoice_date' => $inv_date,
            'due_date' => $due_date,
            'email' => $email,
            'no_npwp' => $npwp,
            'public_notes' => $public_notes,
            'terms' => $terms,
            'footer' => $footer,
            'signature' => $signature,
            'total_cost' => $total_cost,
            'grand_Total' => $grand_total,
            'tipe' => $tipe,
            'currency_inv' =>$currency
        );
        $this->m_po->input_data($data, 'invoice_in');
        if (!empty($jobdesc)) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data = array(
                        'no_invoice' => $no_inv,
                        'jobdesc' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'rate' => $price[$a],
                        'amount' => $cost[$a],
                    );
                    $this->m_po->input_data($data, 'invoice_in_item');
                }
            }
        }
        $dat2 = array(
            'is_inv_in' => 1,
        );
        $where = array(
            'no_Po' => $no_po,
        );
        $this->m_quotation->update_data($where, $dat2, 'purchase_order');
        if ($this->input->post('company')=='Speequal Malaysia'||$this->input->post('company')=='Speequal Jakarta') {
            $this->laporan_pdf_sq($no_inv);
        } else if ($this->input->post('company')=='kodegiri') {
            $this->laporan_pdf_kdgr($no_inv);
        } else {
            $this->laporan_pdf_star($no_inv);
        }
        if($tujuan=='email'){
            $this->kirimemail($no_inv, 'create');
        }
        $this->session->set_flashdata('success','Invoice '.$no_inv.' Berhasil Dibuat');
        redirect('freelance/dashboard');
    }

    function add_inv_item($tujuan=NULL)
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('status');
        $no_rek = $this->input->post('cn');
        $cabang_bank = $this->input->post('pm');
        $mitra_name = $this->input->post('ps');
        $address = $this->input->post('address');
        $dp = $this->input->post('dp');
        $inv_date = $this->input->post('invoicedate');
        $due_date = $this->input->post('duedate');
        $email = $this->input->post('email');
        $npwp = $this->input->post('ce');
        $public_notes = $this->input->post('public_notes');
        $terms = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $signature = $this->input->post('address_resource');
        $total_cost = $this->input->post('total');
        $grand_total = $this->input->post('grand');
        $tipe = $this->input->post('tipe');
        $v_form = $this->input->post('v_form');
        $company = $this->input->post('company');
        $currency = $this->input->post('curr_awal');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];

        $data = array(
            'no_invoice' => $no_inv,
            'no_Po' => $no_po,
            'no_rekening' => $no_rek,
            'cabang_bank' => $cabang_bank,
            'mitra_name' => $mitra_name,
            'address' => $address,
            'down_payment' => $dp,
            'invoice_date' => $inv_date,
            'due_date' => $due_date,
            'email' => $email,
            'no_npwp' => $npwp,
            'public_notes' => $public_notes,
            'terms' => $terms,
            'v_form' => $v_form,
            'footer' => $footer,
            'signature' => $signature,
            'total_cost' => $total_cost,
            'grand_Total' => $grand_total,
            'tipe' => $tipe,
            'currency_inv'=>$currency
        );
        $this->m_po->input_data($data, 'invoice_in');
        if (!empty($jobdesc)) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data = array(
                        'no_invoice' => $no_inv,
                        'jobdesc' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'unit' => $unit[$a],
                        'rate' => $price[$a],
                        'amount' => $cost[$a],
                    );
                    $this->m_po->input_data($data, 'invoice_in_item');
                }
            }
        }
        $dat2 = array(
            'is_inv_in' => 1,
        );
        $where = array(
            'no_Po' => $no_po,
        );
        $this->m_quotation->update_data($where, $dat2, 'purchase_order');
        if ($this->input->post('company')=='Speequal Malaysia'||$this->input->post('company')=='Speequal Jakarta') {
            $this->laporan_pdf_sq($no_inv);
        } else if ($this->input->post('company')=='kodegiri') {
            $this->laporan_pdf_kdgr($no_inv);
        } else {
            $this->laporan_pdf_star($no_inv);
        }
        if($tujuan=='email'){
            $this->kirimemail($no_inv, 'create');
        }
        $this->session->set_flashdata('success','Invoice '.$no_inv.' Berhasil Dibuat');
        redirect('freelance/dashboard');
    }

    public function laporan_pdf_kdgr($id)
    {
        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['inv'] = $this->m_inv_in->edit_data($id, 'invoice')->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi($id)->result();
        $data['a'] = $this->m_inv_in->ambil_data_allin($id)->result();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('freelance/invkdgr', $data, $id);
    }
    public function laporan_pdf_star($id)
    {
        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['inv'] = $this->m_inv_in->edit_data($id, 'invoice')->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi($id)->result();
        $data['a'] = $this->m_inv_in->ambil_data_allin($id)->result();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('freelance/invstar', $data, $id);
    }
    public function laporan_pdf_sq($id)
    {
        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['a'] = $this->m_inv_in->ambil_data_allin($id)->result();
        $data['inv'] = $this->m_inv_in->edit_data($id, 'invoice')->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi($id)->result();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('freelance/invspqmtrlst', $data, $id);
    }

    public function tampilkanData($id)
    {
        $no_po = substr($id, 0, -6);
        $data['no_inv'] = $this->m_inv_in->CreateCode($no_po);
        $data['po'] = $this->m_inv_in->ambil_data_po_word($id)->result();
        echo json_encode($data);
    }
    public function tampilkanDataitem($id)
    {
        $no_po = substr($id, 0, -6);
        $data['no_inv'] = $this->m_inv_in->CreateCode($no_po);
        $data['po'] = $this->m_inv_in->ambil_data_po_item($id)->result();
        echo json_encode($data);
    }
    public function editwordbase($id)
    {
        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['inv'] = $this->m_inv_in->edit_data($id, 'invoice')->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi($id)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('freelance/editinvoice', $data);
        $this->load->view('templates/footer', [
            'load' => ['edit_inv_in.js']
        ]);
    }
    public function edititembase($id)
    {
        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['inv'] = $this->m_inv_in->edit_data($id, 'invoice')->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi($id)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('freelance/editinvoiceitem', $data);
        $this->load->view('templates/footer', [
            'load' => ['edit_inv_in2.js']
        ]);
    }
    function edit_inv_word($tujuan=NULL)
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('status');
        $no_rek = $this->input->post('cn');
        $cabang_bank = $this->input->post('pm');
        $mitra_name = $this->input->post('ps');
        $address = $this->input->post('address');
        $dp = $this->input->post('dp');
        $inv_date = $this->input->post('invoicedate');
        $due_date = $this->input->post('duedate');
        $email = $this->input->post('email');
        $npwp = $this->input->post('ce');
        $public_notes = $this->input->post('public_notes');
        $terms = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $signature = $this->input->post('address_resource');
        $total_cost = $this->input->post('total');
        $grand_total = $this->input->post('grand');
        $tipe = $this->input->post('tipe');
        $company = $this->input->post('company');
        $currency = $this->input->post('curr_awal');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];

        $data = array(
            'no_invoice' => $no_inv,
            'no_Po' => $no_po,
            'no_rekening' => $no_rek,
            'cabang_bank' => $cabang_bank,
            'mitra_name' => $mitra_name,
            'address' => $address,
            'down_payment' => $dp,
            'invoice_date' => $inv_date,
            'due_date' => $due_date,
            'email' => $email,
            'no_npwp' => $npwp,
            'public_notes' => $public_notes,
            'terms' => $terms,
            'footer' => $footer,
            'signature' => $signature,
            'total_cost' => $total_cost,
            'grand_Total' => $grand_total,
            'tipe' => $tipe,
            'currency_inv' => $currency
        );
        $where = array(
            'no_invoice' => $no_inv,
        );
        $this->m_po->update_data($where, $data, 'invoice_in');
        $this->m_po->hapus_data($where, 'invoice_in_item');
        if (!empty($jobdesc)) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data = array(
                        'no_invoice' => $no_inv,
                        'jobdesc' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'rate' => $price[$a],
                        'amount' => $cost[$a],
                    );
                    $this->m_po->input_data($data, 'invoice_in_item');
                }
            }
        }
        if ($this->input->post('company')=='Speequal Malaysia'||$this->input->post('company')=='Speequal Jakarta') {
            $this->laporan_pdf_sq($no_inv);
        } else if ($this->input->post('company')=='kodegiri') {
            $this->laporan_pdf_kdgr($no_inv);
        } else {
            $this->laporan_pdf_star($no_inv);
        }
        if($tujuan=='email'){
            $this->kirimemail($no_inv, 'edit');
        }
        $this->session->set_flashdata('success','Invoice '.$no_inv.' Berhasil Diubah');
        redirect('freelance/dashboard');
    }
    function edit_inv_item($tujuan=NULL)
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('status');
        $no_rek = $this->input->post('cn');
        $cabang_bank = $this->input->post('pm');
        $mitra_name = $this->input->post('ps');
        $address = $this->input->post('address');
        $dp = $this->input->post('dp');
        $inv_date = $this->input->post('invoicedate');
        $due_date = $this->input->post('duedate');
        $email = $this->input->post('email');
        $npwp = $this->input->post('ce');
        $public_notes = $this->input->post('public_notes');
        $terms = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $signature = $this->input->post('address_resource');
        $total_cost = $this->input->post('total');
        $grand_total = $this->input->post('grand');
        $tipe = $this->input->post('tipe');
        $company = $this->input->post('company');
        $currency = $this->input->post('curr_awal');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];

        $data = array(
            'no_invoice' => $no_inv,
            'no_Po' => $no_po,
            'no_rekening' => $no_rek,
            'cabang_bank' => $cabang_bank,
            'mitra_name' => $mitra_name,
            'address' => $address,
            'down_payment' => $dp,
            'invoice_date' => $inv_date,
            'due_date' => $due_date,
            'email' => $email,
            'no_npwp' => $npwp,
            'public_notes' => $public_notes,
            'terms' => $terms,
            'footer' => $footer,
            'signature' => $signature,
            'total_cost' => $total_cost,
            'grand_Total' => $grand_total,
            'tipe' => $tipe,
            'currency_inv' => $currency
        );
        $where = array(
            'no_invoice' => $no_inv,
        );
        $this->m_po->update_data($where, $data, 'invoice_in');
        $this->m_po->hapus_data($where, 'invoice_in_item');
        if (!empty($jobdesc)) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data = array(
                        'no_invoice' => $no_inv,
                        'jobdesc' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'unit' => $unit[$a],
                        'rate' => $price[$a],
                        'amount' => $cost[$a],
                    );
                    $this->m_po->input_data($data, 'invoice_in_item');
                }
            }
        }
        if ($this->input->post('company')=='Speequal Malaysia'||$this->input->post('company')=='Speequal Jakarta') {
            $this->laporan_pdf_sq($no_inv);
        } else if ($this->input->post('company')=='kodegiri') {
            $this->laporan_pdf_kdgr($no_inv);
        } else {
            $this->laporan_pdf_star($no_inv);
        }
        if($tujuan=='email'){
            $this->kirimemail($no_inv, 'edit');
        }
        $this->session->set_flashdata('success','Invoice '.$no_inv.' Berhasil Diubah');
        redirect('freelance/dashboard');
    }
    public function editaddrow()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('freelance/editaddrow');
        $this->load->view('templates/footer');
    }
    public function addrow()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('freelance/addrow');
        $this->load->view('templates/footer');
    }
    function delete($id)
    {
        $data = $this->db->get_where('invoice_in', ['no_invoice' => $id])->row_array();
        unlink(APPPATH.'../assets/files/'.$id.'.pdf');
        $where = array('no_invoice' => $id);
        $dat2 = array(
            'is_inv_in' => 0,
        );
        $where2 = array(
            'no_Po' => $data['no_Po'],
        );
        print_r($data['no_Po']);
        $this->m_quotation->update_data($where2, $dat2, 'purchase_order');
        $this->m_po->hapus_data($where, 'invoice_in_item');
        $this->m_po->hapus_data($where, 'invoice_in');
        redirect('freelance/dashboard');
    }
    public function print($id)
    {
        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['inv'] = $this->m_inv_in->edit_data($id, 'invoice')->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi($id)->result();
        $data['a'] = $this->m_inv_in->ambil_data_allin($id)->result();
        $this->load->view('freelance/invkdgr', $data);
    }
    public function prints($id)
    {
        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['inv'] = $this->m_inv_in->edit_data($id, 'invoice')->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi($id)->result();
        $data['a'] = $this->m_inv_in->ambil_data_allin($id)->result();
        $this->load->view('freelance/invstar', $data);
    }
    public function printsqm($id)
    {
        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['a'] = $this->m_inv_in->ambil_data_allin($id)->result();
        $data['inv'] = $this->m_inv_in->edit_data($id, 'invoice')->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi($id)->result();
        $this->load->view('freelance/invspqmtrlst', $data);
    }

    public function kirimemail($id=NULL, $mode=NULL){
		$data['qi'] = $this->m_inv_in->ambil_data_email($id)->row_array();
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
        $this->email->to($data['qi']['email_pm']); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach(base_url('assets/files/' . $data['qi']['no_invoice'] . '.pdf'));

        // Subject email
        if($mode=='create'){
            $this->email->subject('Invoice Baru untuk project '. $data['qi']['project_Name_po']);
        } else if($mode=='edit'){
            $this->email->subject('Perubahan Invoice Baru untuk project '. $data['qi']['project_Name_po']);
        }

        // Isi email
        if($mode=='create'){
            $this->email->message("berikut adalah Invoice Baru Baru untuk project ".$data['qi']['project_Name_po']);
        } else if($mode=='edit'){
            $this->email->message("berikut adalah Perubahan Invoice untuk project ".$data['qi']['project_Name_po']);
        }

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
            echo $this->email->print_debugger();
        }
	}

    function preview_inv_word()
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('status');
        $no_rek = $this->input->post('cn');
        $cabang_bank = $this->input->post('pm');
        $mitra_name = $this->input->post('ps');
        $address = $this->input->post('address');
        $dp = $this->input->post('dp');
        $inv_date = $this->input->post('invoicedate');
        $due_date = $this->input->post('duedate');
        $email = $this->input->post('email');
        $npwp = $this->input->post('ce');
        $public_notes = $this->input->post('public_notes');
        $terms = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $signature = $this->input->post('address_resource');
        $total_cost = $this->input->post('total');
        $grand_total = $this->input->post('grand');
        $company = $this->input->post('company');
        $tipe = $this->input->post('tipe');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];

        $data['res'] = $this->m_inv_in->ambil_data_res()->result();
        $data['a'] = $this->m_inv_in->ambil_data_po($no_po)->result();
        // $data['inv'] = $this->m_inv_in->edit_data($id, 'invoice')->result();
        // $data['pi'] = $this->m_inv_in->ambil_data_qi($id)->result();

        
        $data['inv'][0]= (object) array(
            'no_invoice' => $no_inv,
            'no_Po' => $no_po,
            'no_rekening' => $no_rek,
            'cabang_bank' => $cabang_bank,
            'mitra_name' => $mitra_name,
            'address' => $address,
            'down_payment' => $dp,
            'invoice_date' => $inv_date,
            'due_date' => $due_date,
            'email' => $email,
            'no_npwp' => $npwp,
            'public_notes' => $public_notes,
            'terms' => $terms,
            'footer' => $footer,
            'signature' => $signature,
            'total_cost' => $total_cost,
            'grand_total' => $grand_total,
            'tipe' => $tipe,
        );
        if (!empty($jobdesc)) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data['pi'][$a] = (object) array(
                        'no_invoice' => $no_inv,
                        'jobdesc' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'rate' => $price[$a],
                        'amount' => $cost[$a],
                    );
                }
            }
        } else {
            $data['pi'][0] = (object) array(
                'no_invoice' => $no_inv,
                'jobdesc' => $jobdesc[0],
                'qty' => $volume[0],
                'rate' => $price[0],
                'amount' => $cost[0],
            );
        }
        
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $this->load->library('pdf_2');
    
        $this->pdf_2->setPaper('A4', 'potrait');

        if ($this->input->post('company')=='Speequal Malaysia'||$this->input->post('company')=='Speequal Jakarta') {
            $this->pdf_2->load_view('freelance/invspqmtrlst', $data, $no_inv);
        } else if ($this->input->post('company')=='kodegiri') {
            $this->pdf_2->load_view('freelance/invkdgr', $data, $no_inv);
        } else {
            $this->pdf_2->load_view('freelance/invstar', $data, $no_inv);
        }
    }
}
