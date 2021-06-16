<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quitation extends CI_Controller
{
    function __construct(){
		parent::__construct();		
		$this->load->model('m_user');
        $this->load->model('m_quotation');
        if($this->m_user->isNotLogin()) redirect(site_url('auth/login'));
        $this->load->helper(array('form', 'url'));
	}
    public function data()
    {
        $data['quotation']=$this->m_quotation->tampil_data_q()->result();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('quitation/data', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['client'] = $this->m_quotation->get_client()->result();
        $data['kode_quotation']= $this->m_quotation->CreateCode();
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
        $v_form = $this->input->post('v_form');
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
            'v_form' => $v_form,
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
        redirect('quitation/data');
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
        $v_form = $this->input->post('v_form');
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
            'v_form' => $v_form,
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
        redirect('quitation/data');
	}

    function delete($id){
        // $data = $this->db->get_where('Quotation', ['no_Quotation' => $noquitation])->row_array();
		// unlink(APPPATH.'../assets/img/'.$data['profile_Photo']);
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
