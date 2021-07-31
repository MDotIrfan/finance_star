<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_user");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        // jika form login disubmit
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
        if($this->form_validation->run() === FALSE)
        {
            $this->login();
        }
        else
        {
            $this->m_user->doLogin();
        }
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('auth/login'));
    }

    public function login()
    {
        $this->load->view('templates/auth_header.php');
        $this->load->view('auth/login_2.php');
        $this->load->view('templates/auth_footer.php');
    }
}
