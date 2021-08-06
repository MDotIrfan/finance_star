<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

require './vendor/autoload.php';

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
    function get_data_invoicein($table)
    {
        $list = $this->m_inv_in->get_datatables($table);
        $data = array();
        foreach ($list as $field) {
            if($field->currency_inv!='IDR'){
                $conv = $this->currencyConverter($field->currency_inv,'IDR',$field->grand_total);
            } else {
                $conv = $field->grand_total;
            }
            $row = array();
            $row[] = $field->no_invoice;
            $row[] = $field->mitra_name;
            $row[] = $field->jobdesc;
            $row[] = $field->invoice_date;
            $row[] = "Rp. ".number_format($conv,2,",",".");
            $row[] = '<a href=""><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                    <a onclick="return confirm(\'Yakin ingin hapus?\')" href=""><button type="button" class="btn" style="color:red" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash" aria-hidden="true"></i></button></a>';

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
    function get_data_invoiceout($table)
    {
        $list = $this->m_inv_in->get_datatables($table);
        $data = array();
        foreach ($list as $field) {
            $row = array();
            if($field->currency_inv!='IDR'){
                $conv = $this->currencyConverter($field->currency_inv,'IDR',$field->grand_total);
            } else {
                $conv = $field->grand_total;
            }
            $row[1] = $field->no_invoice;
            $row[2] = $field->client_name;
            $row[3] = $field->project_Name_po;
            $row[4] = $field->nama_Pm;
            $row[5] = $field->invoice_date;
            $row[6] = $field->due_date;
            $row[7] = "Rp. ".number_format($conv,2,",",".");
            $row[8] = '<a href="'.base_url('finance/editinvoiceout/' . $field->no_invoice).'"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                    <a onclick="return confirm(\'Yakin ingin hapus?\')" href="'.base_url('finance/delete/' . $field->no_invoice).'"><button type="button" class="btn" style="color:red" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash" aria-hidden="true"></i></button></a>
                    <a href="'.base_url('assets/files/' . $field->no_invoice . '.pdf').'" target="_blank"><button type="button" class="btn" style="color:black"><i class="fas fa-print" aria-hidden="true"></i></button></a>
                    ';

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
    function get_data_bast($table)
    {
        $list = $this->m_inv_in->get_datatables($table);
        $data = array();
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->id_bast;
            $row[] = $field->pic_client;
            $row[] = $field->item;
            $row[] = $field->qty;
            $row[] = '<a href="'.base_url('finance/editbast/' . $field->id_bast).'"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                    <a onclick="return confirm(\'Yakin ingin hapus?\')" href="'.base_url('finance/delete_bast/' . $field->no_invoice).'"><button type="button" class="btn" style="color:red" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash" aria-hidden="true"></i></button></a>';

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

    public function datainvoiceout()
    {
        $data['inv'] = $this->m_inv_in->tampil_data_inv_out()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/datainvoiceout', $data);
        $this->load->view('templates/footer');
    }

    public function dashboard()
    {
        $revenue = $this->m_inv_in->get_total_revenue()->result();
        $data['total_project'] = [];

        for($i=1;$i<=12;$i++){
            $check_date = date($i);
            $data['total_project'][$check_date] = 0;
        }
        foreach($revenue as $item){
            $data['total_project'][$item->month] = $item->jumlah;
        }

        $data['inv'] = $this->m_inv_in->tampil_data_inv_out()->result();
        $data['interval'] = $this->m_inv_in->last_update_data_finance()->row()->last_update;
        $data['jumlah_1'] = $this->m_inv_in->count_project_finance()->result();
        $data['selisih_1'] = $this->m_inv_in->selisih_count_project_finance()->result();
        $data['jumlah_2'] = $this->m_inv_in->count_bast_finance()->result();
        $data['selisih_2'] = $this->m_inv_in->selisih_count_bast_finance()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/dashboard', $data);
        $this->load->view('templates/footer', [
            'load' => ['chartfinance.js']
        ]);
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
        $this->load->view('finance/bast', $data);
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

    function edit_bast_data($tujuan=NULL)
    {
        $no_bast = $this->input->post('nobast');
        $no_inv = $this->input->post('noinv');
        $typeofwork = $this->input->post('swift');
        $due_date = $this->input->post('duedate');
        $project_name = $this->input->post('pn');
        $pic_client = $this->input->post('cn');
        $perihal = $this->input->post('perihal');
        $company = $this->input->post('company');
        $email = $this->input->post('email');
        $first_party = $this->input->post('first_party');
        $second_party = $this->input->post('second_party');
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
            'email' => $email,
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
        $this->laporan_pdf_bast($no_bast);
        if($tujuan=='email'){
            $this->kirimemail_bast($no_bast, 'edit');
        }
        $this->session->set_flashdata('success','BAST '.$no_bast.' Berhasil Diubah');
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
        if ($inv['tipe'] == '1') {
            $data['pi'] = $this->m_inv_in->ambil_data_qi_luar($id)->result();
        } else if ($inv['tipe'] == '2') {
            $data['pi'] = $this->m_inv_in->ambil_data_qi_local($id)->result();
        } else if ($inv['tipe'] == '3') {
            $data['pi'] = $this->m_inv_in->ambil_data_qi_spq($id)->result();
        } else if ($inv['tipe'] == '4') {
            $data['pi'] = $this->m_inv_in->ambil_data_qi_luar2($id)->result();
        } else if ($inv['tipe'] == '5') {
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
        $data['interval'] = $this->m_inv_in->last_update_inv_in()->row()->last_update;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/datainvoicein', $data);
        $this->load->view('templates/footer');
    }

    function edit_inv_out($tujuan=NULL)
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('nopo');
        $client_name = $this->input->post('cn');
        $account = $this->input->post('acc');
        $swift_code = $this->input->post('swift');
        $address = $this->input->post('address');
        $inv_date = $this->input->post('invoicedate');
        $tipe = $this->input->post('tipe');
        $due_date = $this->input->post('duedate');
        $email = $this->input->post('email');
        $no_rek = $this->input->post('no_rek');
        $public_notes = $this->input->post('public_notes');
        $terms = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $signature = $this->input->post('address_resource');
        $total_cost = $this->input->post('total');
        $grand_total = $this->input->post('grand');
        $currency = $this->input->post('curr_awal');
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
            'grand_total' => $grand_total,
            'tipe' => $tipe,
            'currency_inv' => $currency
        );
        $where = array(
            'no_invoice' => $no_inv,
        );
        $this->m_po->update_data($where, $data, 'invoice_out');
        if ($tipe == '1') {
            $this->m_po->hapus_data($where, 'invoice_item_luar');
        } else if ($tipe == '2') {
            $this->m_po->hapus_data($where, 'invoice_item_local');
        } else if ($tipe == '3') {
            $this->m_po->hapus_data($where, 'invoice_item_spq');
        } else if ($tipe == '4') {
            $this->m_po->hapus_data($where, 'invoice_item_luar_2');
        } else if ($tipe == '5') {
            $this->m_po->hapus_data($where, 'invoice_item_spq_2');
        }
        if ($tipe == '1') {
            $proman = $_POST['proman'];
            $starnum = $_POST['starnum'];
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $price = $_POST['price'];
            $cost = $_POST['cost'];
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
        } else if ($tipe == '2') {
            $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];
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
        } else if ($tipe == '3') {
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $price = $_POST['price'];
            $cost = $_POST['cost'];
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
        } else if ($tipe == '4') {
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $unit = $_POST['unit'];
            $price = $_POST['price'];
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
        } else if ($tipe == '5') {
            $jobdesc = $_POST['jobdesc'];
            $price = $_POST['price'];
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
        if ($tipe == '1') {
            $this->laporan_pdf_inv1($no_inv);
        } else if ($tipe == '2') {
            $this->laporan_pdf_inv2($no_inv);
        } else if ($tipe == '3') {
            $this->laporan_pdf_inv3($no_inv);
        } else if ($tipe == '4') {
            $this->laporan_pdf_inv4($no_inv);
        } else if ($tipe == '5') {
            $this->laporan_pdf_inv5($no_inv);
        }
        if($tujuan=='email'){
            $this->kirimemail_pdf($no_inv, 'edit');
        }
        $this->session->set_flashdata('success','Invoice '.$no_po.' Berhasil Diubah');
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

    function add_inv_out($tujuan=NULL)
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('nopo');
        $client_name = $this->input->post('cn');
        $account = $this->input->post('acc');
        $swift_code = $this->input->post('swift');
        $address = $this->input->post('address');
        $inv_date = $this->input->post('invoicedate');
        $tipe = $this->input->post('tipe');
        $due_date = $this->input->post('duedate');
        $email = $this->input->post('email');
        $no_rek = $this->input->post('no_rek');
        $public_notes = $this->input->post('public_notes');
        $terms = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $signature = $this->input->post('address_resource');
        $total_cost = $this->input->post('total');
        $grand_total = $this->input->post('grand');
        $currency = $this->input->post('curr_awal');
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
            'grand_total' => $grand_total,
            'tipe' => $tipe,
            'currency_inv' => $currency
        );
        $this->m_po->input_data($data, 'invoice_out');
        if ($tipe == '1') {
            $proman = $_POST['proman'];
            $starnum = $_POST['starnum'];
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $price = $_POST['price'];
            $cost = $_POST['cost'];
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
        } else if ($tipe == '2') {
            $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];
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
        } else if ($tipe == '3') {
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $price = $_POST['price'];
            $cost = $_POST['cost'];
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
        } else if ($tipe == '4') {
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $unit = $_POST['unit'];
            $price = $_POST['price'];
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
        } else if ($tipe == '5') {
            $jobdesc = $_POST['jobdesc'];
            $price = $_POST['price'];
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
        if ($tipe == '1') {
            $this->laporan_pdf_inv1($no_inv);
        } else if ($tipe == '2') {
            $this->laporan_pdf_inv2($no_inv);
        } else if ($tipe == '3') {
            $this->laporan_pdf_inv3($no_inv);
        } else if ($tipe == '4') {
            $this->laporan_pdf_inv4($no_inv);
        } else if ($tipe == '5') {
            $this->laporan_pdf_inv5($no_inv);
        }
        if($tujuan=='email'){
            $this->kirimemail_pdf($no_inv, 'create');
        }
        $this->session->set_flashdata('success','Invoice '.$no_po.' Berhasil Dibuat');
        redirect('finance/datainvoiceout');
    }
    function delete($id)
    {
        $data = $this->db->get_where('invoice_out', ['no_invoice' => $id])->row_array();
        unlink(APPPATH.'../assets/files/'.$id.'.pdf');
        $where = array('no_invoice' => $id);
        $this->m_po->hapus_data($where, 'tax_invoice');
        if ($data['tipe'] == '1') {
            $this->m_po->hapus_data($where, 'invoice_item_luar');
        } else if ($data['tipe'] == '2') {
            $this->m_po->hapus_data($where, 'invoice_item_local');
        } else if ($data['tipe'] == '3') {
            $this->m_po->hapus_data($where, 'invoice_item_spq');
        } else if ($data['tipe'] == '4') {
            $this->m_po->hapus_data($where, 'invoice_item_luar_2');
        } else if ($data['tipe'] == '5') {
            $this->m_po->hapus_data($where, 'invoice_item_spq_2');
        }
        $this->m_po->hapus_data($where, 'invoice_out');
        redirect('finance/datainvoiceout');
    }

    function add_bast_data($tujuan=NULL)
    {
        $no_bast = $this->input->post('nobast');
        $no_inv = $this->input->post('noinv');
        $typeofwork = $this->input->post('swift');
        $due_date = $this->input->post('duedate');
        $project_name = $this->input->post('pn');
        $pic_client = $this->input->post('cn');
        $perihal = $this->input->post('perihal');
        $company = $this->input->post('company');
        $email = $this->input->post('email');
        $first_party = $this->input->post('first_party');
        $second_party = $this->input->post('second_party');
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
            'email' => $email,
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
        $this->laporan_pdf_bast($no_bast);
        if($tujuan=='email'){
            $this->kirimemail_bast($no_bast, 'create');
        }
        $this->session->set_flashdata('success','BAST '.$no_bast.' Berhasil Dibuat');
        redirect('finance/bast');
    }

    public function print()
    {


        // $data['qi'] = $this->m_quotation->ambil_data_q($id)->result();
        // $data['quotation'] = $this->m_quotation->getAll($id)->result();
        $this->load->view('finance/invluar');
    }
    function acc($id)
    {
        $data = array(
            'is_Acc' => 1,
        );
        $where = array(
            'no_invoice' => $id,
        );
        $this->m_quotation->update_data($where, $data, 'invoice_in');
        redirect('finance/datainvoicein');
    }

    function unacc($id)
    {
        $data = array(
            'is_Acc' => 0,
        );
        $where = array(
            'no_invoice' => $id,
        );
        $this->m_quotation->update_data($where, $data, 'invoice_in');
        redirect('finance/datainvoicein');
    }
    function delete_bast($id)
    {
        $data = $this->db->get_where('invoice_in', ['no_invoice' => $id])->row_array();
        unlink(APPPATH.'../assets/files/'.$id.'.pdf');
        $where = array('id_bast' => $id);
        $this->m_po->hapus_data($where, 'bast_item');
        $this->m_po->hapus_data($where, 'bast');
        redirect('finance/bast');
    }

    public function kirimemail()
    {
        $userdata = $this->session->userdata('user_logged');
        $email_ini = $userdata->email_Address;
        $name = $userdata->full_Name;
        $to = $this->input->post('to');
        $cc = $this->input->post('cc');
        $subject = $this->input->post('subject');
        $desc = $this->input->post('desc');

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'finance@kodegiri.com';
        $mail->Password = 'Finance1234';
        $mail->setFrom('randa@kodegiri.com', $name);
        $mail->addReplyTo('finance@kodegiri.com', $name);
        $mail->addAddress($to, 'pm star 1');
        $mail->Subject = $subject;
        // $mail->msgHTML(file_get_contents('message.html'), __DIR__);
        $mail->Body = $desc;
        //$mail->addAttachment('test.txt');
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'The email message was sent.';
            redirect('finance/send');
        }
    }

    public function kirimemail_2()
    {
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
        if ($file != '') {
            $this->email->attach(base_url('./assets/files/' . $file));
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
        $config['overwrite']            = true;
        $config['max_size']             = 10240; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data']['file_name'];
        }
    }

    function preview_inv_out()
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('nopo');
        $client_name = $this->input->post('cn');
        $account = $this->input->post('acc');
        $swift_code = $this->input->post('swift');
        $address = $this->input->post('address');
        $inv_date = $this->input->post('invoicedate');
        $tipe = $this->input->post('tipe');
        $due_date = $this->input->post('duedate');
        $email = $this->input->post('email');
        $no_rek = $this->input->post('no_rek');
        $public_notes = $this->input->post('public_notes');
        $terms = $this->input->post('regards');
        $footer = $this->input->post('footer');
        $signature = $this->input->post('address_resource');
        $total_cost = $this->input->post('total');
        $grand_total = $this->input->post('grand');
        $currency = $this->input->post('curr_awal');

        $data['user'][0] = $this->session->userdata('user_logged');

        $data['inv'][0] = (object) array(
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
            'grand_total' => $grand_total,
            'tipe' => $tipe,
            'currency_inv' => $currency
        );
        if ($tipe == '1') {
            $proman = $_POST['proman'];
            $starnum = $_POST['starnum'];
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $price = $_POST['price'];
            $cost = $_POST['cost'];
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data['pi'][$a] = (object) array(
                            'no_invoice' => $no_inv,
                            'jobdesc' => $jobdesc[$a],
                            'project_manager' => $proman[$a],
                            'star_number' => $starnum[$a],
                            'number_word' => $volume[$a],
                            'unit_price' => $price[$a],
                            'amount' => $cost[$a],
                        );
                    }
                }
            }
        } else if ($tipe == '2') {
            $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data['pi'][$a] = (object) array(
                            'no_invoice' => $no_inv,
                            'domain' => $jobdesc[$a],
                            'volume' => $volume[$a],
                            'unit' => $unit[$a],
                            'price' => $price[$a],
                            'amount' => $cost[$a],
                        );
                    }
                }
            }
        } else if ($tipe == '3') {
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $price = $_POST['price'];
            $cost = $_POST['cost'];
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data['pi'][$a] = (object) array(
                            'no_invoice' => $no_inv,
                            'jobdesc' => $jobdesc[$a],
                            'qtt_word' => $volume[$a],
                            'price' => $price[$a],
                            'amount' => $cost[$a],
                        );
                    }
                }
            }
        } else if ($tipe == '4') {
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $unit = $_POST['unit'];
            $price = $_POST['price'];
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data['pi'][$a] = (object) array(
                            'no_invoice' => $no_inv,
                            'jobdesc' => $jobdesc[$a],
                            'star_number' => $volume[$a],
                            'number_line' => $unit[$a],
                            'amount' => $price[$a],
                        );
                    }
                }
            }
        } else if ($tipe == '5') {
            $jobdesc = $_POST['jobdesc'];
            $price = $_POST['price'];
            $deliv = $_POST['deliv'];
            if (!empty($jobdesc)) {
                for ($a = 0; $a < count($jobdesc); $a++) {
                    if (!empty($jobdesc[$a])) {
                        $data['pi'][$a] = (object) array(
                            'no_invoice' => $no_inv,
                            'pre_invoice' => $jobdesc[$a],
                            'date_deliv' => $deliv[$a],
                            'amount' => $price[$a],
                        );
                    }
                }
            }
        }
        
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $this->load->library('pdf_2');
    
        $this->pdf_2->setPaper('A4', 'potrait');

        if ($tipe == '1') {
            $this->pdf_2->load_view('finance/invstarluar', $data, $no_inv);
        } else if ($tipe == '2') {
            $this->pdf_2->load_view('finance/invlokal', $data, $no_inv);
        } else if ($tipe == '3') {
            $this->pdf_2->load_view('finance/invspqm', $data, $no_inv);
        } else if ($tipe == '4') {
            $this->pdf_2->load_view('finance/invstar', $data, $no_inv);
        } else if ($tipe == '5') {
            $this->pdf_2->load_view('finance/invspqi', $data, $no_inv);
        }
    }
    public function laporan_pdf_inv1($no_invoice){

        $data['inv'] = $this->m_inv_in->ambil_data_inv_out($no_invoice)->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi_luar($no_invoice)->result();
        $data['user'][0]=$this->session->userdata('user_logged');
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('finance/invstarluar', $data, $no_invoice);
    }
    public function laporan_pdf_inv2($no_invoice){

        $data['inv'] = $this->m_inv_in->ambil_data_inv_out($no_invoice)->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi_local($no_invoice)->result();
        $data['user'][0]=$this->session->userdata('user_logged');

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('finance/invlokal', $data, $no_invoice);
    }
    public function laporan_pdf_inv3($no_invoice){

        $data['inv'] = $this->m_inv_in->ambil_data_inv_out($no_invoice)->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi_spq($no_invoice)->result();
        $data['user'][0]=$this->session->userdata('user_logged');
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('finance/invspqm', $data, $no_invoice);
    }
    public function laporan_pdf_inv4($no_invoice){

        $data['inv'] = $this->m_inv_in->ambil_data_inv_out($no_invoice)->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi_luar2($no_invoice)->result();
        $data['user'][0]=$this->session->userdata('user_logged');
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('finance/invstar', $data, $no_invoice);
    }
    public function laporan_pdf_inv5($no_invoice){

        $data['inv'] = $this->m_inv_in->ambil_data_inv_out($no_invoice)->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi_luar($no_invoice)->result();
        $data['user'][0]=$this->session->userdata('user_logged');
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('finance/invspqi', $data, $no_invoice);
    }

    public function kirimemail_pdf($id=NULL, $mode=NULL){
		$data['qi'] = $this->m_inv_in->ambil_data_email_finance($id)->row_array();
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
        $this->email->to($data['qi']['email']); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach(base_url('assets/files/' . $data['qi']['no_invoice'] . '.pdf'));

        // Subject email
        if($mode=='create'){
            $this->email->subject('Invoice Baru untuk project '. $data['qi']['project_Name_po']);
        } else if($mode=='edit'){
            $this->email->subject('Perubahan Invoice untuk project '. $data['qi']['project_Name_po']);
        }

        // Isi email
        if($mode=='create'){
            $this->email->message("berikut adalah Invoice Baru untuk project ".$data['qi']['project_Name_po']);
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

    public function kirimemail_bast($id=NULL, $mode=NULL){
		$data['qi'] = $this->m_inv_in->edit_data_bast($id)->row_array();
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
        $this->email->to($data['qi']['email']); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach(base_url('assets/files/' . $data['qi']['id_bast'] . '.pdf'));

        // Subject email
        if($mode=='create'){
            $this->email->subject('Invoice Baru untuk project '. $data['qi']['type_of_work']);
        } else if($mode=='edit'){
            $this->email->subject('Perubahan Invoice untuk project '. $data['qi']['type_of_work']);
        }

        // Isi email
        if($mode=='create'){
            $this->email->message("berikut adalah Invoice Baru untuk project ".$data['qi']['type_of_work']);
        } else if($mode=='edit'){
            $this->email->message("berikut adalah Perubahan Invoice untuk project ".$data['qi']['type_of_work']);
        }

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
            echo $this->email->print_debugger();
        }
	}

    function preview_bast()
    {
        $data['user'][0] = $this->session->userdata('user_logged');
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;

        $no_bast = $this->input->post('nobast');
        $no_inv = $this->input->post('noinv');
        $typeofwork = $this->input->post('swift');
        $due_date = $this->input->post('duedate');
        $project_name = $this->input->post('pn');
        $pic_client = $this->input->post('cn');
        $perihal = $this->input->post('perihal');
        $company = $this->input->post('company');
        $email = $this->input->post('email');
        $first_party = $this->input->post('first_party');
        $second_party = $this->input->post('second_party');
        $jobdesc = $_POST['jobdesc'];
        $volume = $_POST['volume'];
        $unit = $_POST['unit'];
        $status = $_POST['status'];

        $data['b'][0] = (object) array(
            'id_bast' => $no_bast,
            'type_of_work' => $typeofwork,
            'due_date' => $due_date,
            'no_invoice' => $no_inv,
            'project_name' => $project_name,
            'pic_client' => $pic_client,
            'perihal' => $perihal,
            'company_name' => $company,
            'email' => $email,
            'first_party' => $first_party,
            'second_party' => $second_party
        );
        if (!empty($jobdesc)) {
            for ($a = 0; $a < count($jobdesc); $a++) {
                if (!empty($jobdesc[$a])) {
                    $data['bi'][0] = (object) array(
                        'id_bast' => $no_bast,
                        'item' => $jobdesc[$a],
                        'qty' => $volume[$a],
                        'Unit' => $unit[$a],
                        'status' => $status[$a]
                    );
                }
            }
        }
        $this->load->library('pdf_2');
    
        $this->pdf_2->setPaper('A4', 'potrait');
        if ($level == "6") {
            $this->pdf_2->load_view('finance/bastkdgr', $data, $no_bast);
        } else {
            $this->pdf_2->load_view('finance/baststar', $data, $no_inv);
        }
        
    }

    public function laporan_pdf_bast($no_bast){
        $data['b'] = $this->m_inv_in->edit_data_bast($no_bast)->result();
        $data['bi'] = $this->m_inv_in->ambil_data_bast_item($no_bast)->result();
        $data['user'][0]=$this->session->userdata('user_logged');
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        if ($level == "6") {
            $this->pdf->load_view('finance/bastkdgr', $data, $no_bast);
        } else {
            $this->pdf->load_view('finance/baststar', $data, $no_bast);
        }
    }

    function currencyConverter($fromCurrency,$toCurrency,$amount) {	
		$from = $fromCurrency;
		$to = $toCurrency;	
        $amount = number_format($amount,0,"","");
		// $encode_amount = 1;

        $url="https://api.exchangerate-api.com/v4/latest/".$from;
        $get_url = file_get_contents($url);
        $data = json_decode($get_url);

        $data_array = array(
            'datalist' => $data
        );
        $rates = $data_array['datalist']->rates->IDR;
        $amountConverted = $rates*$amount;
        return $amountConverted;
        // echo '<pre>';
        // print_r($data_array['datalist']->rates->USD);
        // echo '</pre>';
        // echo $from.' '.$to.' '.$amount;
		// $data = array( 'exhangeRate' => $exhangeRate, 'convertedAmount' => $convertedAmount, 'fromCurrency' => strtoupper($fromCurrency), 'toCurrency' => strtoupper($toCurrency));
		// echo json_encode( $data );	
	}
}
