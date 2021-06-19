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

    public function dashboard()
    {
        $data['inv'] = $this->m_inv_in->tampil_data_inv()->result();
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
    function add_inv_word()
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
        redirect('freelance/dashboard');
    }

    function add_inv_item()
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
        redirect('freelance/dashboard');
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
        $data['inv'] = $this->m_inv_in->edit_data($id, 'invoice')->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi($id)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('freelance/editinvoiceitem', $data);
        $this->load->view('templates/footer', [
            'load' => ['edit_inv_in2.js']
        ]);
    }
    function edit_inv_word()
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
        redirect('freelance/dashboard');
    }
    function edit_inv_item()
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
        // unlink(APPPATH.'../assets/img/'.$data['profile_Photo']);
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
    public function print()
    {
        // $data['po'] = $this->m_po->edit_data($id, 'purchase_order')->result();
        // $data['pi'] = $this->m_po->ambil_data_po_word($id)->result();
        // $data['position'] = $this->m_user->ambil_data_status()->result();
        $this->load->view('freelance/invstar');
    }
}
