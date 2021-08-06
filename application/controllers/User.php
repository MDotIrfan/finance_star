<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct(){
		parent::__construct();		
		$this->load->model('m_user');
        if($this->m_user->isNotLogin()) redirect(site_url('auth/login'));
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}

    function get_data_user($table)
    {
        $list = $this->m_user->get_datatables($table);
        $data = array();
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->id_User;
            $row[] = $field->user_Name;
            $row[] = $field->full_Name;
            $row[] = $field->position_Name;
            $row[] = $field->status_Name;
            $row[] = '<a href="'.base_url('user/edit/' . $field->id_User).'"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                    <a onclick="return confirm(\'Yakin ingin hapus?\')" href="'.base_url('user/delete/' . $field->id_User).'"><button type="button" class="btn" style="color:red" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash" aria-hidden="true"></i></button></a>';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_user->count_all($table),
            "recordsFiltered" => $this->m_user->count_filtered($table),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function get_data_client($table)
    {
        $list = $this->m_user->get_datatables($table);
        $data = array();
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->client_id;
            $row[] = $field->client_name;
            $row[] = $field->client_email;
            $row[] = $field->company_name;
            $row[] = $field->address;
            $row[] = '<a href="' . base_url('user/edit_client/' . $field->client_id) . '"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                    <a onclick="return confirm(\'Yakin ingin hapus?\')" href="' . base_url('user/delete_client/' . $field->client_id) . '"><button type="button" class="btn" style="color:red" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash" aria-hidden="true"></i></button></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_user->count_all($table),
            "recordsFiltered" => $this->m_user->count_filtered($table),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    function get_data_resource($table)
    {
        $list = $this->m_user->get_datatables($table);
        $data = array();
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->id_resource;
            $row[] = $field->resource_name;
            $row[] = $field->mobile_phone;
            $row[] = $field->cabang_bank;
            $row[] = $field->no_rekening;
            $row[] = $field->address;
            $row[] = $field->no_npwp;
            $row[] = $field->jenis;
            $row[] = '<a href="' . base_url('user/edit_resource/' . $field->id_resource) . '"><button type="button" class="btn" style="color:blue"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                    <a onclick="return confirm(\'Yakin ingin hapus?\')" href="' . base_url('user/delete_resource/' . $field->id_resource) . '"><button type="button" class="btn" style="color:red" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash" aria-hidden="true"></i></button></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_user->count_all($table),
            "recordsFiltered" => $this->m_user->count_filtered($table),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }


    // menampilkan halaman dashboard user
    public function dashboard()
    {
        $data['user'] = $this->m_user->tampil_data_user()->result();
        $data['interval'] = $this->m_user->last_update_user()->row()->last_update;
        $data['tgl'] = $this->m_user->last_update_user()->row()->tgl_sebelum;
        $data['jumlah'] = $this->m_user->count_user()->result();
        $data['selisih'] = $this->m_user->selisih_count_user()->result();
        $this->session->set_userdata('menu', 'Dashboard');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    // menampilkan halaman list data user
    public function list()
    {
        $data['user'] = $this->m_user->tampil_data_user()->result();
        $data['interval'] = $this->m_user->last_update_user()->row()->last_update;
        $this->session->set_userdata('menu', 'User');
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
    //menampilkan halaman data resource
    public function list_resource()
    {
        $data['resource'] = $this->m_user->tampil_data_resource()->result();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/data_resource', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['position'] = $this->m_user->ambil_data_position()->result();
        $data['status'] = $this->m_user->ambil_data_status()->result();
        $data['kode_user']= $this->m_user->CreateCode();
        $this->session->set_userdata('menu', 'Create User');
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/add', $data);
        $this->load->view('templates/footer');
    }
    public function add_client()
    {
        $data['kode_client'] = $this->m_user->CreateCodeClient();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/add_client', $data);
        $this->load->view('templates/footer');
    }
    public function add_resource()
    {
        $data['kode_resource'] = $this->m_user->CreateCodeResource();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/add_resource', $data);
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
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.user_Name]', array('required' => 'Username tidak boleh kosong', 'is_unique' => 'username sudah digunakan'));
        $this->form_validation->set_rules('fullname', 'Fullname', 'required', array('required' => 'Full Name tidak boleh kosong'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong'));
        $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email|is_unique[user.email_Address]', array('required' => 'Email tidak boleh kosong', 'valid_email' => 'Format Email tidak valid', 'is_unique' => 'email sudah digunakan'));
        $this->form_validation->set_rules('position', 'Position', 'required', array('required' => 'Silahkan Pilih Posisi'));
        $this->form_validation->set_rules('status', 'Status', 'required', array('required' => 'Silahkan Pilih Status'));
        $this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
        if($this->form_validation->run() === FALSE)
        {
            $this->add();
        }
        else
        {
            $id = $this->input->post('id');
		    $username = $this->input->post('username');
		    $password = md5($this->input->post('password'));
            $fullname = $this->input->post('fullname');
            $inisial= $this->generate($fullname);
            $email_address = $this->input->post('email_address');
            $id_position = $this->input->post('position');
            $id_status = $this->input->post('status');
            if (!empty($_FILES["gambar"]["name"])) {
               $photo = $this->_uploadImage($id);
            } else {
                $photo = 'default.jpg';
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
		    $this->m_user->input_data($data,'user');

        // if($id_status==1||$id_status==5){
        //     $data2 = array(
        //         'id_user' => $id,
        //         'mobile_phone' => $mobile_phone,
        //         'cabang_bank' => $cab_bank,
        //         'no_rekening' => $no_rek,
        //         'address' => $address,
        //         'jenis' => $jenis,
        //         'no_npwp' => $npwp,
        //         );
        //     $this->m_user->input_data($data2,'resource_data');
        // }
            $this->session->set_flashdata('success','Data Berhasil Ditambahkan');
            redirect('user/list');
        }
	}


    function add_client_data()
    {
        $id = $this->input->post('id');
        $client_name = $this->input->post('username');
        $email_address = $this->input->post('email_address');
        $company = $this->input->post('company');
        $address = $this->input->post('address');

        $data = array(
            'client_id' => $id,
            'client_name' => $client_name,
            'client_email' => $email_address,
            'address' => $address,
            'company_name' => $company,
        );
        $this->m_user->input_data($data, 'client_data');
        redirect('user/list_client');
    }
    function add_resource_data()
    {
        $id_resource = $this->input->post('id_resource');
        $resource_name = $this->input->post('resource_name');
        $mobile_phone = $this->input->post('mobile_phone');
        $cabang_bank = $this->input->post('cabang_bank');
        $no_rekening = $this->input->post('no_rekening');
        $address = $this->input->post('address');
        $no_npwp = $this->input->post('no_npwp');
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_resource' => $id_resource,
            'resource_name' => $resource_name,
            'mobile_phone' => $mobile_phone,
            'cabang_bank' => $cabang_bank,
            'no_rekening' => $no_rekening,
            'address' => $address,
            'no_npwp' => $no_npwp,
            'jenis' => $jenis,
        );
        $this->m_user->input_data($data, 'resource_data');
        redirect('user/list_resource');
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
        $this->session->set_userdata('menu', 'Edit User');
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer', [
            'load' => ['user.js']
        ]);
    }

    public function edit_client($id)
    {
        $data['client'] = $this->m_user->edit_data_client($id, 'client_data')->result();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/edit_client', $data);
        $this->load->view('templates/footer');
    }
    public function edit_resource($id)
    {
        $data['resource'] = $this->m_user->edit_data_resource($id, 'resource_data')->result();
        $this->load->view('templates/header',);
        $this->load->view('templates/sidebar');
        $this->load->view('user/edit_resource', $data);
        $this->load->view('templates/footer');
    }

    function edit_user(){
        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username tidak boleh kosong'));
        $this->form_validation->set_rules('fullname', 'Fullname', 'required', array('required' => 'Full Name tidak boleh kosong'));
        $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email', array('required' => 'Email tidak boleh kosong', 'valid_email' => 'Format Email tidak valid'));
        $this->form_validation->set_rules('position', 'Position', 'required', array('required' => 'Silahkan Pilih Posisi'));
        $this->form_validation->set_rules('status', 'Status', 'required', array('required' => 'Silahkan Pilih Status'));
        $this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
        if($this->form_validation->run() === FALSE)
        {
            $this->edit($this->input->post('id'));
        }
        else
        {
            $id = $this->input->post('id');
		    $username = $this->input->post('username');
		    $password = $this->input->post('password');
            $fullname = $this->input->post('fullname');
            $inisial= $this->generate($fullname);
            $email_address = $this->input->post('email_address');
            $id_position = $this->input->post('position');
            $id_status = $this->input->post('status');
            if (!empty($_FILES["gambar"]["name"])) {
               $photo = $this->_uploadImage($id);
            } else {
                $photo = $this->input->post('old_pp');
            }
        
            $data = array(
                'id_User' => $id,
                'user_Name' => $username,
                'full_Name' => $fullname,
                'email_Address' => $email_address,
                'id_Position' => $id_position,
                'id_Status' => $id_status,
                'profile_Photo' => $photo,
                'inisial' => $inisial
            );

            if($this->input->post('password')!=''){
                $data['pass_Word'] = md5($password);
            }
        
            $where = array(
                'id_User' => $id
            );
        
            $this->m_user->update_data($where,$data,'user');
    
            // if($id_status==1||$id_status==5){
            //     $data2 = array(
            //         'id_user' => $id,
            //         'mobile_phone' => $mobile_phone,
            //         'cabang_bank' => $cab_bank,
            //         'no_rekening' => $no_rek,
            //         'address' => $address,
            //         'no_npwp' => $npwp,
            //         'jenis' => $jenis
            //         );
            //         $where2 = array(
            //             'id_user' => $id
            //         );
            //         $this->m_user->update_data($where2,$data2,'resource_data');
            // }
    
            $this->session->set_flashdata('success','Data Berhasil Diubah');
            redirect('user/list');
        }

       
    }
    function edit_client_data()
    {
        $id = $this->input->post('id');
        $client_name = $this->input->post('username');
        $email_address = $this->input->post('email_address');
        $company = $this->input->post('company');
        $address = $this->input->post('address');

        $data = array(
            'client_id' => $id,
            'client_name' => $client_name,
            'client_email' => $email_address,
            'company_name' => $company,
            'address' => $address
        );

        $where = array(
            'client_id' => $id
        );

        $this->m_user->update_data($where, $data, 'client_data');
        redirect('user/list_client');
    }
    function edit_resource_data()
    {
        $id_resource = $this->input->post('id_resource');
        $resource_name = $this->input->post('resource_name');
        $mobile_phone = $this->input->post('mobile_phone');
        $cabang_bank = $this->input->post('cabang_bank');
        $no_rekening = $this->input->post('no_rekening');
        $address = $this->input->post('address');
        $no_npwp = $this->input->post('no_npwp');
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_resource' => $id_resource,
            'resource_name' => $resource_name,
            'mobile_phone' => $mobile_phone,
            'cabang_bank' => $cabang_bank,
            'no_rekening' => $no_rekening,
            'address' => $address,
            'no_npwp' => $no_npwp,
            'jenis' => $jenis,
        );

        $where = array(
            'id_resource' => $id_resource
        );

        $this->m_user->update_data($where, $data, 'resource_data');
        redirect('user/list_resource');
    }
    function delete($id)
    {
        $data = $this->db->get_where('user', ['id_User' => $id])->row_array();
        unlink(APPPATH . '../assets/img/' . $data['profile_Photo']);
        $where = array('id_User' => $id);
        $this->m_user->hapus_data($where, 'user');
        $where2 = array('id_user' => $id);
        $this->m_user->hapus_data($where, 'resource_data');
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect('user/list');
    }

    function delete_client($id)
    {
        $where = array('client_id' => $id);
        $this->m_user->hapus_data($where, 'client_data');
        redirect('user/list_client');
    }
    function delete_resource($id)
    {
        $where = array('id_resource' => $id);
        $this->m_user->hapus_data($where, 'resource_data');
        redirect('user/list_resource');
    }
    
}
