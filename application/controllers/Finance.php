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
    public function bast()
    {

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/bast');
        $this->load->view('templates/footer');
    }
    public function addbast()
    {

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/addbast');
        $this->load->view('templates/footer');
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
        $data['inv'] = $this->m_inv_in->edit_data_out($id, 'invoice_out')->result();
        $data['pi'] = $this->m_inv_in->ambil_data_qi_out($id)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/editinvoiceout', $data);
        $this->load->view('templates/footer', [
            'load' => ['edit_inv_out.js', 'add_inv_in.js']
        ]);
    }
    public function datainvoicein()
    {
        $data['inv'] = $this->m_inv_in->tampil_data_inv()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/datainvoicein', $data);
        $this->load->view('templates/footer');
    }

    function edit_inv_out()
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('status');
        $client_name = $this->input->post('cn');
        $account = $this->input->post('acc');
        $swift_code = $this->input->post('swift');
        $address = $this->input->post('address');
        $dp = $this->input->post('dp');
        $inv_date = $this->input->post('invoicedate');
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
        $price = $_POST['price'];
        $cost = $_POST['cost'];

        $data = array(
            'no_invoice' => $no_inv,
            'no_Po' => $no_po,
            'client_name' => $client_name,
            'account' => $account,
            'swift_code' => $swift_code,
            'address' => $address,
            'down_payment' => $dp,
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
        );
        $where = array(
            'no_invoice' => $no_inv,
        );
        $this->m_po->update_data($where, $data, 'invoice_out');
        $this->m_po->hapus_data($where, 'invoice_item_spq');
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
        $data['kode_inv'] = $this->m_inv_in->CreateCode();
        $data['po'] = $this->m_inv_in->ambil_data_po_w(0)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('finance/invoiceout', $data);
        $this->load->view('templates/footer', [
            'load' => ['addq_2.js', 'add_inv_in.js']
        ]);
    }

    function add_inv_out()
    {
        $no_inv = $this->input->post('noinv');
        $no_po = $this->input->post('status');
        $client_name = $this->input->post('cn');
        $account = $this->input->post('acc');
        $swift_code = $this->input->post('swift');
        $address = $this->input->post('address');
        $dp = $this->input->post('dp');
        $inv_date = $this->input->post('invoicedate');
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
        $price = $_POST['price'];
        $cost = $_POST['cost'];

        $data = array(
            'no_invoice' => $no_inv,
            'no_Po' => $no_po,
            'client_name' => $client_name,
            'account' => $account,
            'swift_code' => $swift_code,
            'address' => $address,
            'down_payment' => $dp,
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
        );
        $this->m_po->input_data($data, 'invoice_out');
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
        $dat2 = array(
            'is_inv' => 1,
        );
        $where = array(
            'no_Po' => $no_po,
        );
        $this->m_quotation->update_data($where, $dat2, 'purchase_order');
        redirect('finance/datainvoiceout');
    }
    public function print()
    {


        // $data['qi'] = $this->m_quotation->ambil_data_q($id)->result();
        // $data['quotation'] = $this->m_quotation->getAll($id)->result();
        $this->load->view('finance/invluar');
    }
}
