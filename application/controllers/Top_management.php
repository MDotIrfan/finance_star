<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Top_management extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_topman');
        $this->load->helper(array('form', 'url'));
    }

    public function project()
    {
        $data['po'] = $this->m_topman->tampil_data_po_item()->result();
        $this->load->view('templates/header', [
            'load' => ['data_po_word.js']
        ]);
        $this->load->view('templates/sidebar');
        $this->load->view('top_management/project', $data);
        $this->load->view('templates/footer');
    }

    public function dashboard()
    {
        $data['po'] = $this->m_topman->tampil_data_po_item()->result();
        $this->load->view('templates/header', [
            'load' => ['charttopm.js', 'charttopmq.js']
        ]);
        $this->load->view('templates/sidebar');
        $this->load->view('top_management/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function report()
    {
        $cost = $this->m_topman->get_total_cost()->result();
        $revenue = $this->m_topman->get_total_revenue()->result();
        $data['total_cost'] = [];
        $data['total_rev'] = [];

        for($i=1;$i<=12;$i++){
            $check_date = date($i);
            $data['total_cost'][$check_date] = 0;
        }
        foreach($cost as $item){
            $data['total_cost'][$item->month] = $item->total;
        }

        for($i=1;$i<=12;$i++){
            $check_date = date($i);
            $data['total_rev'][$check_date] = 0;
        }
        foreach($revenue as $item){
            $data['total_rev'][$item->month] = $item->total;
        }
        $this->load->view('templates/header', [
            'load' => ['chartcost.js', 'chartrevenue.js']
        ]);
        $this->load->view('templates/sidebar');
        $this->load->view('top_management/report_2', $data);
        $this->load->view('templates/footer');
    }
}
