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
        $cost = $this->m_topman->get_total_cost()->result();
        $revenue = $this->m_topman->get_total_revenue()->result();
        $data['total_cost'] = [];
        $data['total_rev'] = [];
        $data['total_project'] = [];

        for($i=1;$i<=12;$i++){
            $check_date = date($i);
            $data['total_cost'][$check_date] = 0;
            $data['total_rev'][$check_date] = 0;
            $data['total_project'][$check_date] = 0;
        }
        foreach($cost as $item){
            $data['total_cost'][$item->month] = $item->total;
        }
        foreach($revenue as $item){
            $data['total_rev'][$item->month] = $item->total;
            $data['total_project'][$item->month] = $item->jumlah;
        }

    //dipanggil setelah ada currency
    //     for($i=1;$i<=12;$i++){
    //         $check_date = date($i);
    //         $data['total_cost'][$check_date] = 0;
    //         $data['total_rev'][$check_date] = 0;
    //     }
    // for($i=1;$i<=12;$i++){
    //     // $month=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    //     $grand_total_cost = 0;
    //     $grand_total_rev = 0;
    //     $cost[$i] = $this->m_po->get_total_cost($i)->result();
    //     $rev[$i] = $this->m_po->get_total_po($i)->result();
    //     for($k=0;$k<count($rev[$i]);$k++){
    //     $total= array();
    //     // echo '<pre>';
    //     // print_r($po[$i][$k]->month);
    //     // echo ' - ';
    //     // print_r($po[$i][$k]->currency_po);
    //     // echo ' - ';
    //     // print_r($po[$i][$k]->grand_Total_po);
    //     // echo ' - Converted Amount : ';
    //     if($cost[$i][$k]->currency_po=='IDR'){
    //         // echo 'Rp. ';
    //         // print_r($po[$i][$k]->grand_Total_po);
    //         $total[$k] = $po[$i][$k]->grand_Total_po;
    //     } else if($po[$i][$k]->currency_po=='USD'){
    //         // echo 'Rp. ';
    //         // print_r($this->currencyConverter('USD','IDR',$po[$i][$k]->grand_Total_po));
    //         $total[$k] = $this->currencyConverter('USD','IDR',$po[$i][$k]->grand_Total_po);
    //     } if($po[$i][$k]->currency_po=='EUR'){
    //         $total[$k] = $this->currencyConverter('EUR','IDR',$po[$i][$k]->grand_Total_po);
    //     }
    //     // echo '</pre>';
    //     // echo '<pre> total = ';
    //     // print_r($total);
    //     // echo 'end </pre>';
    //     $grand_total+=  $total[$k];
    //     }
    //     $data['total_po'][$i] = $grand_total;
    //     // echo '<pre> grand_total = ';
    //     // print_r($data['total_po'][$i]);;
    //     // echo ' end</pre>';
    // }

        $data['po'] = $this->m_topman->tampil_data_po_item()->result();
        $data['interval'] = $this->m_topman->last_update_data()->row()->last_update;
        $data['tgl'] = $this->m_topman->last_update_data()->row()->tgl_sebelum;
        $data['jumlah_1'] = $this->m_topman->count_project()->result();
        $data['selisih_1'] = $this->m_topman->selisih_count_project()->result();
        $data['jumlah_2'] = $this->m_topman->count_cost()->result();
        $data['selisih_2'] = $this->m_topman->selisih_count_cost()->result();
        $data['jumlah_3'] = $this->m_topman->count_revenue()->result();
        $data['selisih_3'] = $this->m_topman->selisih_count_revenue()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('top_management/dashboard', $data);
        $this->load->view('templates/footer', [
            'load' => ['charttopm.js', 'charttopmq.js']
        ]);
    }

    function get_data_project($table)
    {
        $list = $this->m_topman->get_datatables($table);
        $data = array();
        if($table=='project_dashboard'){
            foreach ($list as $field) {
                if($field->currency_inv=='IDR'){
                    $grand_total = 'Rp. '.$field->grand_total;
                } else if($field->currency_inv=='USD'){
                    $grand_total = '$ '.$field->grand_total;
                } else if($field->currency_inv=='EUR'){
                    $grand_total = '€ '.$field->grand_total;
                } else {
                    $grand_total = '';
                }
                $row = array();
                $row[] = $field->project_Name_po;
                $row[] = $field->client_name;
                $row[] = $field->due_date;
                $row[] = $grand_total;
                    
                $data[] = $row;
            }
        } else if ($table=='project_data') {
            foreach ($list as $field) {
                if($field->currency_inv=='IDR'){
                    $grand_total = 'Rp. '.$field->grand_total;
                } else if($field->currency_inv=='USD'){
                    $grand_total = '$ '.$field->grand_total;
                } else if($field->currency_inv=='EUR'){
                    $grand_total = '€ '.$field->grand_total;
                } else {
                    $grand_total = '';
                }
                $row = array();
                $row[] = $field->no_invoice;
                $row[] = $field->project_Name_po;
                $row[] = $field->client_name;
                $row[] = $field->due_date;
                $row[] = $grand_total;
                    
                $data[] = $row;
            }
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_topman->count_all($table),
            "recordsFiltered" => $this->m_topman->count_filtered($table),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
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
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('top_management/report_2', $data);
        $this->load->view('templates/footer', [
            'load' => ['chartcost.js', 'chartrevenue.js']
        ]);
    }
}
