<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct(){
		parent::__construct();		
		$this->load->model('m_user');
        if($this->m_user->isNotLogin()) redirect(site_url('auth/login'));
        $this->load->helper(array('form', 'url'));
	}

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }
    public function list()
    {
        $data['user'] = $this->m_user->tampil_data_user()->result();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/data', $data);
        $this->load->view('templates/footer');
    }
    public function list_client()
    {
        $data['client'] = $this->m_user->tampil_data_client()->result();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/data_client', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['position'] = $this->m_user->ambil_data_position()->result();
        $data['status'] = $this->m_user->ambil_data_status()->result();
        $data['kode_user']= $this->m_user->CreateCode();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/add', $data);
        $this->load->view('templates/footer', [
            'load' => ['user.js']
        ]);
    }
    public function add_client()
    {
        $data['kode_client']= $this->m_user->CreateCodeClient();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/add_client', $data);
        $this->load->view('templates/footer');
    }
    public function generate(string $name) : string
    {
        $words = explode(' ', $name);
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
        }
        return $this->makeInitialsFromSingleWord($name);
    }
    protected function makeInitialsFromSingleWord(string $name) : string
    {
        preg_match_all('#([A-Z]+)#', $name, $capitals);
        if (count($capitals[1]) >= 2) {
            return substr(implode('', $capitals[1]), 0, 2);
        }
        return strtoupper(substr($name, 0, 2));
    }
    function add_user(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
        $fullname = $this->input->post('fullname');
        $inisial= $this->generate($fullname);
        $email_address = $this->input->post('email_address');
        $id_position = $this->input->post('position');
        $id_status = $this->input->post('status');
        $photo = $this->_uploadImage($id);
        $mobile_phone = $this->input->post('mp');
        $cab_bank = $this->input->post('cb');
        $jenis = $this->input->post('jenis');
        $no_rek = $this->input->post('norek');
        $address = $this->input->post('address');
        $npwp = $this->input->post('npwp');
 
		$data = array(
			'id_User' => $id,
			'user_Name' => $username,
			'pass_Word' => $password,
            'full_Name' => $fullname,
            'email_Address' => $email_address,
            'id_Position' => $id_position,
            'id_Status' => $id_status,
            'profile_Photo' => $photo,
            'inisial' => $inisial
			);
		$this->m_user->input_data($data,'user');

        if($id_status==1||$id_status==5){
            $data2 = array(
                'id_user' => $id,
                'mobile_phone' => $mobile_phone,
                'cabang_bank' => $cab_bank,
                'no_rekening' => $no_rek,
                'address' => $address,
                'jenis' => $jenis,
                'no_npwp' => $npwp,
                );
            $this->m_user->input_data($data2,'resource_data');
        }
        redirect('user/list');
	}

    function add_client_data(){
		$id = $this->input->post('id');
		$client_name = $this->input->post('username');
        $email_address = $this->input->post('email_address');
        $address = $this->input->post('address');
 
		$data = array(
			'client_id' => $id,
			'client_name' => $client_name,
            'client_email' => $email_address,
            'address' => $address,
			);
		$this->m_user->input_data($data,'client_data');
        redirect('user/list_client');
	}
    
    function _uploadImage($id)
    {
    $config['upload_path']          = './assets/img/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $id;
    $config['overwrite']			= true;
    $config['max_size']             = 4096; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);
 
    if ( ! $this->upload->do_upload('gambar')){
        $error = array('error' => $this->upload->display_errors());
    }else{
        $data = array('upload_data' => $this->upload->data());
        return $data['upload_data']['file_name'];
    }
    }

    public function edit($id)
    {
		$data['user'] = $this->m_user->edit_data($id,'user')->result();
        $data['position'] = $this->m_user->ambil_data_position()->result();
        $data['status'] = $this->m_user->ambil_data_status()->result();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer', [
            'load' => ['user.js']
        ]);
    }

    public function edit_client($id)
    {
		$data['client'] = $this->m_user->edit_data_client($id,'client_data')->result();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/edit_client', $data);
        $this->load->view('templates/footer');
    }

    function edit_user(){
        $id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
        $fullname = $this->input->post('fullname');
        $inisial= $this->generate($fullname);
        $email_address = $this->input->post('email_address');
        $id_position = $this->input->post('position');
        $id_status = $this->input->post('status');
        $mobile_phone = $this->input->post('mp');
        $cab_bank = $this->input->post('cb');
        $jenis = $this->input->post('jenis');
        $no_rek = $this->input->post('norek');
        $address = $this->input->post('address');
        $npwp = $this->input->post('npwp');
        if (!empty($_FILES["gambar"]["name"])) {
            $photo = $this->_uploadImage($id);
        } else {
            $photo = $this->input->post('old_image');
        }
    
        $data = array(
            'id_User' => $id,
			'user_Name' => $username,
			'pass_Word' => $password,
            'full_Name' => $fullname,
            'email_Address' => $email_address,
            'id_Position' => $id_position,
            'id_Status' => $id_status,
            'profile_Photo' => $photo,
            'inisial' => $inisial
        );
    
        $where = array(
            'id_User' => $id
        );
    
        $this->m_user->update_data($where,$data,'user');

        if($id_status==1||$id_status==5){
            $data2 = array(
                'id_user' => $id,
                'mobile_phone' => $mobile_phone,
                'cabang_bank' => $cab_bank,
                'no_rekening' => $no_rek,
                'address' => $address,
                'no_npwp' => $npwp,
                'jenis' => $jenis
                );
                $where2 = array(
                    'id_user' => $id
                );
                $this->m_user->update_data($where2,$data2,'resource_data');
        }


        redirect('user/list');
    }
    function edit_client_data(){
        $id = $this->input->post('id');
		$client_name = $this->input->post('username');
        $email_address = $this->input->post('email_address');
        $address = $this->input->post('address');
    
        $data = array(
            'client_id' => $id,
			'client_name' => $client_name,
            'client_email' => $email_address,
            'address' => $address,
        );
    
        $where = array(
            'client_id' => $id
        );
    
        $this->m_user->update_data($where,$data,'client_data');
        redirect('user/list_client');
    }
    function delete($id){
        $data = $this->db->get_where('user', ['id_User' => $id])->row_array();
		unlink(APPPATH.'../assets/img/'.$data['profile_Photo']);
        $where = array('id_User' => $id);
        $this->m_user->hapus_data($where,'user');
        $where2 = array('id_user' => $id);
        $this->m_user->hapus_data($where,'resource_data');
        redirect('user/list');
    }

    function delete_client($id){
        $where = array('client_id' => $id);
        $this->m_user->hapus_data($where,'client_data');
        redirect('user/list_client');
    }
    
}
