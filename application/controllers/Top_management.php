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
        // $cost = $this->m_topman->get_total_cost()->result();
        $revenue = $this->m_topman->get_total_revenue()->result();
        $data['total_cost'] = [];
        $data['total_rev'] = [];
        $data['total_project'] = [];

        for($i=1;$i<=12;$i++){
            $check_date = date($i);
            // $data['total_cost'][$check_date] = 0;
            // $data['total_rev'][$check_date] = 0;
            $data['total_project'][$check_date] = 0;
        }
        // foreach($cost as $item){
        //     // $data['total_cost'][$item->month] = $item->total;
        // }
        foreach($revenue as $item){
            // $data['total_rev'][$item->month] = $item->total;
            $data['total_project'][$item->month] = $item->jumlah;
        }

    //dipanggil setelah ada currency
        for($i=1;$i<=12;$i++){
            $check_date = date($i);
            $data['total_cost'][$check_date] = 0;
            $data['total_rev'][$check_date] = 0;
        }
    $jumlah_cost = 0;
    $jumlah_revenue = 0;
    for($i=1;$i<=12;$i++){
        // $month=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $grand_total_cost = 0;
        $grand_total_rev = 0;
        $cost[$i] = $this->m_topman->get_total_cost_2($i)->result();
        $rev[$i] = $this->m_topman->get_total_revenue_2($i)->result();

        for($k=0;$k<count($cost[$i]);$k++){
        $total_cost= array();
        if($cost[$i][$k]->currency_inv=='IDR'){
            $total_cost[$k] = $cost[$i][$k]->total;
        } else if($cost[$i][$k]->currency_inv=='USD'){
            $total_cost[$k] = $this->currencyConverter('USD','IDR',$cost[$i][$k]->total);
        } if($cost[$i][$k]->currency_inv=='EUR'){
            $total_cost[$k] = $this->currencyConverter('EUR','IDR',$cost[$i][$k]->total);
        }
        $grand_total_cost+=  $total_cost[$k];
        }

        for($k=0;$k<count($rev[$i]);$k++){
        $total_rev= array();
        if($rev[$i][$k]->currency_inv=='IDR'){
            $total_rev[$k] = $rev[$i][$k]->total;
        } else if($rev[$i][$k]->currency_inv=='USD'){
            $total_rev[$k] = $this->currencyConverter('USD','IDR',$rev[$i][$k]->total);
        } if($rev[$i][$k]->currency_inv=='EUR'){
            $total_rev[$k] = $this->currencyConverter('EUR','IDR',$rev[$i][$k]->total);
        }
        $grand_total_rev+=  $total_rev[$k];
        }

        $data['total_cost'][$i] = $grand_total_cost;
        $data['total_rev'][$i] = $grand_total_rev;
        $jumlah_cost += $grand_total_cost;
        $jumlah_revenue += $grand_total_rev;
    }
    $data['jumlah_cost'] = $jumlah_cost;
    $data['jumlah_revenue'] = $jumlah_revenue;

        $data['po'] = $this->m_topman->tampil_data_po_item()->result();
        $data['interval'] = $this->m_topman->last_update_data()->row()->last_update;
        // $data['tgl'] = $this->m_topman->last_update_data()->row()->tgl_sebelum;
        $data['jumlah_1'] = $this->m_topman->count_project()->result();
        $data['selisih_1'] = $this->m_topman->selisih_count_project()->result();
        // $data['jumlah_2'] = $this->m_topman->count_cost()->result();
        // $data['selisih_2'] = $this->m_topman->selisih_count_cost()->result();
        // $data['jumlah_3'] = $this->m_topman->count_revenue()->result();
        // $data['selisih_3'] = $this->m_topman->selisih_count_revenue()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('top_management/dashboard', $data);
        $this->load->view('templates/footer', [
            'load' => ['charttopm.js', 'charttopmq.js']
        ]);
    }

    function currencyConverter($fromCurrency,$toCurrency,$amount) {	
		$from = $fromCurrency;
		$to = $toCurrency;	
        $amount = number_format($amount,0,"","");
		// $encode_amount = 1;

        $url="https://open.er-api.com/v6/latest/".$from;
        // $url="https://api.exchangerate-api.com/v4/latest/".$from;
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

        // for($i=1;$i<=12;$i++){
        //     $check_date = date($i);
        //     $data['total_cost'][$check_date] = 0;
        // }
        // foreach($cost as $item){
        //     $data['total_cost'][$item->month] = $item->total;
        // }

        // for($i=1;$i<=12;$i++){
        //     $check_date = date($i);
        //     $data['total_rev'][$check_date] = 0;
        // }
        // foreach($revenue as $item){
        //     $data['total_rev'][$item->month] = $item->total;
        // }

        for($i=1;$i<=12;$i++){
            $check_date = date($i);
            $data['total_cost'][$check_date] = 0;
            $data['total_rev'][$check_date] = 0;
        }
    $jumlah_cost = 0;
    $jumlah_revenue = 0;
    for($i=1;$i<=12;$i++){
        // $month=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $grand_total_cost = 0;
        $grand_total_rev = 0;
        $cost[$i] = $this->m_topman->get_total_cost_2($i)->result();
        $rev[$i] = $this->m_topman->get_total_revenue_2($i)->result();

        for($k=0;$k<count($cost[$i]);$k++){
        $total_cost= array();
        if($cost[$i][$k]->currency_inv=='IDR'){
            $total_cost[$k] = $cost[$i][$k]->total;
        } else if($cost[$i][$k]->currency_inv=='USD'){
            $total_cost[$k] = $this->currencyConverter('USD','IDR',$cost[$i][$k]->total);
        } if($cost[$i][$k]->currency_inv=='EUR'){
            $total_cost[$k] = $this->currencyConverter('EUR','IDR',$cost[$i][$k]->total);
        }
        $grand_total_cost+=  $total_cost[$k];
        }

        for($k=0;$k<count($rev[$i]);$k++){
        $total_rev= array();
        if($rev[$i][$k]->currency_inv=='IDR'){
            $total_rev[$k] = $rev[$i][$k]->total;
        } else if($rev[$i][$k]->currency_inv=='USD'){
            $total_rev[$k] = $this->currencyConverter('USD','IDR',$rev[$i][$k]->total);
        } if($rev[$i][$k]->currency_inv=='EUR'){
            $total_rev[$k] = $this->currencyConverter('EUR','IDR',$rev[$i][$k]->total);
        }
        $grand_total_rev+=  $total_rev[$k];
        }

        $data['total_cost'][$i] = $grand_total_cost;
        $data['total_rev'][$i] = $grand_total_rev;
        $jumlah_cost += $grand_total_cost;
        $jumlah_revenue += $grand_total_rev;
    }
    
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('top_management/report_2', $data);
        $this->load->view('templates/footer', [
            'load' => ['chartcost.js', 'chartrevenue.js']
        ]);
    }
}

// //dipanggil setelah ada currency
// for($i=1;$i<=12;$i++){
//     $check_date = date($i);
//     $data['total_cost'][$check_date] = 0;
//     $data['total_rev'][$check_date] = 0;
// }
// for($i=1;$i<=12;$i++){
// // $month=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
// $grand_total_cost = 0;
// $grand_total_rev = 0;
// $cost[$i] = $this->m_topman->get_total_cost($i)->result();
// // $rev[$i] = $this->m_po->get_total_po($i)->result();
// for($k=0;$k<count($cost[$i]);$k++){
// $total_cost= array();
// echo '<pre>';
// print_r($cost[$i][$k]->month);
// echo ' - ';
// print_r($cost[$i][$k]->currency_inv);
// echo ' - ';
// print_r($cost[$i][$k]->total);
// echo ' - Converted Amount : ';
// if($cost[$i][$k]->currency_inv=='IDR'){
//     echo 'Rp. ';
//     print_r($cost[$i][$k]->total);
//     $total_cost[$k] = $cost[$i][$k]->total;
// } else if($cost[$i][$k]->currency_inv=='USD'){
//     echo 'Rp. ';
//     print_r($this->currencyConverter('USD','IDR',$cost[$i][$k]->total));
//     $total_cost[$k] = $this->currencyConverter('USD','IDR',$cost[$i][$k]->total);
// } if($cost[$i][$k]->currency_inv=='EUR'){
//     $total_cost[$k] = $this->currencyConverter('EUR','IDR',$cost[$i][$k]->total);
// }
// echo '</pre>';
// echo '<pre> total = ';
// print_r($total_cost);
// echo 'end </pre>';
// $grand_total_cost+=  $total_cost[$k];
// }
// $data['total_cost'][$i] = $grand_total_cost;
// echo '<pre> grand_total = ';
// print_r($data['total_cost'][$i]);;
// echo ' end</pre>';
// }
