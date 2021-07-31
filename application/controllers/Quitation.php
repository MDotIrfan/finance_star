<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quitation extends CI_Controller
{
    function __construct(){
		parent::__construct();		
		$this->load->model('m_user');
        $this->load->model('m_quotation');
        if($this->m_user->isNotLogin()) redirect(site_url('auth/login'));
        $this->load->library('pdfgenerator');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}
    public function data()
    {
        $data['quotation']=$this->m_quotation->tampil_data_q()->result();
        $this->session->set_userdata('menu', 'Quotation');
        $data['interval'] = $this->m_quotation->last_update_quotation()->row()->last_update;
        $this->load->view('templates/header', [
            'load' => ['dataq.js']
           ]);
        $this->load->view('templates/sidebar');
        $this->load->view('quitation/data', $data);
        $this->load->view('templates/footer');
    }

    function currencyConverter($fromCurrency,$toCurrency,$amount) {	
		$from = $fromCurrency;
		$to = $toCurrency;	
        $amount = number_format($amount,0,"","");
		// $encode_amount = 1;
		$url  = "https://www.google.com/search?q=".$from."+to+".$to;
		$get = file_get_contents($url);
		$data = preg_split('/\D\s(.*?)\s=\s/',$get);
		$exhangeRate = (float) substr($data[1],0,7);
		$convertedAmount = $amount*$exhangeRate;
        return $convertedAmount;
        // echo $from.' '.$to.' '.$amount;
		// $data = array( 'exhangeRate' => $exhangeRate, 'convertedAmount' => $convertedAmount, 'fromCurrency' => strtoupper($fromCurrency), 'toCurrency' => strtoupper($toCurrency));
		// echo json_encode( $data );	
	}

    function get_data_user($table)
    {
        $list = $this->m_quotation->get_datatables($table);
        $data = array();
        foreach ($list as $field) {
            if($field->currency!='IDR'){
                $conv = $this->currencyConverter($field->currency,'IDR',$field->grand_Total);
            } else {
                $conv = $field->grand_Total;
            }
            $row = array();
            $row[] = $field->no_Quotation;
            $row[] = $field->client_Name;
            $row[] = $field->project_Name;
            $row[] = $field->grand_Total;
            $row[] = number_format($conv,2,".","");
            $str1 = '<a href="'.base_url('quitation/edit/' . $field->no_Quotation).'"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
            <a onclick="return confirm(\'Yakin ingin hapus?\')" href="'.base_url('quitation/delete/' . $field->no_Quotation).'"><button type="button" class="btn" style="color:red"><i class="fas fa-trash" aria-hidden="true"></i></button></a>';
            if($field->is_Acc == "0") {
                $str2 = '<a onclick="return confirm(\'Yakin ingin acc quotation ini?\')" href="'.base_url('quitation/acc/' . $field->no_Quotation).'"><button type="button" class="btn" style="color:orange"><i class="fa fa-times-circle"></i></button></a>';
            } else {
                $str2 = '<a onclick="return confirm(\'Yakin ingin membatalkan acc quotation ini?\')" href="'.base_url('quitation/unacc/' . $field->no_Quotation).'" ><button type="button" class="btn" style="color:green"><i class="far fa-check-circle"></i></button></a>';
            }
            $str3 ='<a href="'.base_url('assets/files/' . $field->no_Quotation . '.pdf').'" target="_blank"><button type="button" class="btn" style="color:black"><i class="fas fa-print" aria-hidden="true"></i></button></a>';
            $str = $str1 . $str2 . $str3;
            $row[] = $str;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_quotation->count_all($table),
            "recordsFiltered" => $this->m_quotation->count_filtered($table),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function add()
    {
        $data['client'] = $this->m_quotation->get_client()->result();
        $data['kode_quotation']= $this->m_quotation->CreateCode();
        $this->session->set_userdata('menu', 'Create Quotation');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('quitation/add',$data);
        $this->load->view('templates/footer', [
            'load' => ['addq.js']
           ]);
    }
    public function tampilkanData($id)
    {
        $url = urldecode($id);
        $data = $this->m_quotation->ambil_data_client($url)->result();
        echo json_encode($data);
    }

    function add_quitation(){
        $this->form_validation->set_rules('pm', 'Project Name', 'required', array('required' => 'Project Name tidak boleh kosong'));
        $this->form_validation->set_rules('cn', 'Cilent Name', 'required', array('required' => 'Client Name tidak boleh kosong'));
        $this->form_validation->set_rules('ce', 'Cilent Email', 'required|valid_email', array('required' => 'Client Email tidak boleh kosong', 'valid_email' => 'Format Email tidak benar'));
        $this->form_validation->set_error_delimiters('<div style="color:red; font-size:12px;">', '</div>');
        if($this->form_validation->run() === FALSE)
        {
            $this->add();
        }
        else
        {   
            $noquitation = $this->input->post('noquitation');
            $project_name = $this->input->post('pm');
            $due_date = $this->input->post('dd');
            $client_name = $this->input->post('cn');
            $project_start = $this->input->post('ps');
            $client_email = $this->input->post('ce');
            $public_notes = $this->input->post('public_notes');
            $header = $this->input->post('header');
            $footer = $this->input->post('footer');
            $sales_name = $this->input->post('sn');
            $total_cost = $this->input->post('total');
            $grand_total = $this->input->post('grand');
            $v_form = $this->input->post('v_form');
            $curr = $this->input->post('curr');
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $unit = $_POST['unit'];
            $price = $_POST['price'];
            $cost = $_POST['cost'];
 
		    $data = array(
			    'no_Quotation' => $noquitation,
			    'project_Name' => $project_name,
			    'client_Name' => $client_name,
                'project_Start' => $project_start,
                'due_date' => $due_date,
                'client_Email' => $client_email,
                'public_Notes' => $public_notes,
                'header' => $header,
                'footer' => $footer,
                'total_Cost' => $total_cost,
                'grand_Total' => $grand_total,
                'sales_name' => $sales_name,
                'v_form' => $v_form,
                'currency' => $curr,
			    );
		    $this->m_quotation->input_data($data,'quotation');
            if(!empty($jobdesc)){
                for($a = 0; $a < count($jobdesc); $a++){
                    if(!empty($jobdesc[$a])){
                        $data = array(
                            'no_Quotation' => $noquitation,
                            'job_Desc' => $jobdesc[$a],
                            'volume' => $volume[$a],
                            'unit' => $unit[$a],
                            'price' => $price[$a],
                            'cost' => $cost[$a],
                            );
                        $this->m_quotation->input_data($data,'quitation_item');
                    }
                }
            }
            $this->laporan_pdf($noquitation);
            $this->session->set_flashdata('success','Quotation '.$noquitation.' Berhasil Dibuat');
            redirect('quitation/data');
        }
	}


    public function laporan_pdf($noquitation){

        $data['qi'] = $this->m_quotation->ambil_data_q($noquitation)->result();
        $data['quotation'] = $this->m_quotation->getAll($noquitation)->result();
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('quitation/print', $data, $noquitation);
    }

    public function edit($id)
    {
        $data['client'] = $this->m_quotation->get_client()->result();
        $data['quotation'] = $this->m_quotation->edit_data($id,'quotation')->result();
        $data['qi'] = $this->m_quotation->ambil_data_q($id)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('quitation/edit', $data);
        $this->load->view('templates/footer', [
            'load' => ['addq.js']
           ]);
    }

    function edit_quitation(){
        $this->form_validation->set_rules('pm', 'Project Name', 'required', array('required' => 'Project Name tidak boleh kosong'));
        $this->form_validation->set_rules('cn', 'Cilent Name', 'required', array('required' => 'Client Name tidak boleh kosong'));
        $this->form_validation->set_rules('ce', 'Cilent Email', 'required|valid_email', array('required' => 'Client Email tidak boleh kosong', 'valid_email' => 'Format Email tidak benar'));
        $this->form_validation->set_error_delimiters('<div style="color:red; font-size:12px;">', '</div>');
        if($this->form_validation->run() === FALSE)
        {
            $this->edit($this->input->post('noquitation'));
        }
        else
        {
		    $noquitation = $this->input->post('noquitation');
		    $project_name = $this->input->post('pm');
		    $due_date = $this->input->post('dd');
            $client_name = $this->input->post('cn');
            $project_start = $this->input->post('ps');
            $client_email = $this->input->post('ce');
            $public_notes = $this->input->post('public_notes');
            $header = $this->input->post('header');
            $footer = $this->input->post('footer');
            $total_cost = $this->input->post('total');
            $grand_total = $this->input->post('grand');
            $sales_name = $this->input->post('sn');
            $v_form = $this->input->post('v_form');
            $jobdesc = $_POST['jobdesc'];
            $volume = $_POST['volume'];
            $unit = $_POST['unit'];
            $price = $_POST['price'];
            $cost = $_POST['cost'];
            $curr = $this->input->post('curr');
 
		    $data = array(
			    'no_Quotation' => $noquitation,
			    'project_Name' => $project_name,
			    'client_Name' => $client_name,
                'project_Start' => $project_start,
                'due_date' => $due_date,
                'client_Email' => $client_email,
                'public_Notes' => $public_notes,
                'header' => $header,
                'footer' => $footer,
                'total_Cost' => $total_cost,
                'grand_Total' => $grand_total,
                'sales_name' => $sales_name,
                'v_form' => $v_form,
                'currency' => $curr,
			    );
                $where = array(
                    'no_Quotation' => $noquitation,
                );
            $this->m_quotation->update_data($where,$data,'quotation');
            $this->m_quotation->hapus_data($where,'quitation_item');
            if(!empty($jobdesc)){
                for($a = 0; $a < count($jobdesc); $a++){
                    if(!empty($jobdesc[$a])){
                        $data = array(
                            'no_Quotation' => $noquitation,
                            'job_Desc' => $jobdesc[$a],
                            'volume' => $volume[$a],
                            'unit' => $unit[$a],
                            'price' => $price[$a],
                            'cost' => $cost[$a],
                            );
                        $this->m_quotation->input_data($data,'quitation_item');
                    }
                }
            }
            $this->laporan_pdf($noquitation);
            $this->session->set_flashdata('success','Quotation '.$noquitation.' Berhasil Diubah');
            redirect('quitation/data');
        }
	}

    function delete($id){
        // $data = $this->db->get_where('quotation', ['no_Quotation' => $id])->row_array();
		unlink(APPPATH.'../assets/files/'.$id.'.pdf');
        $where = array('no_Quotation' => $id);
        $this->m_quotation->hapus_data($where,'quitation_item');
        $this->m_quotation->hapus_data($where,'quotation');
        redirect('quitation/data');
    }

    public function print($id)
    {
        $data['qi'] = $this->m_quotation->ambil_data_q($id)->result();
        $data['quotation'] = $this->m_quotation->getAll($id)->result();
        $this->load->view('quitation/print', $data);
    }

    function acc($id){
		$data = array(
			'is_Acc' => 1,
			);
            $where = array(
                'no_Quotation' => $id,
            );
        $this->m_quotation->update_data($where,$data,'quotation');
        redirect('quitation/data');
	}

    function unacc($id){
		$data = array(
			'is_Acc' => 0,
			);
            $where = array(
                'no_Quotation' => $id,
            );
        $this->m_quotation->update_data($where,$data,'quotation');
        redirect('quitation/data');
	}
}
