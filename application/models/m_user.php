<?php

class M_user extends CI_Model
{

    private $_table = "user";

    function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email_Address', $post["email"])
            ->or_where('user_Name', $post["email"]);
        $user = $this->db->get($this->_table)->row();
        print_r($user);
        echo "pass input = " . $post["password"];
        echo " pass betul = " . $user->pass_Word;

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            // $isPasswordTrue = password_verify($post["password"], $user->pass_Word);

            // jika password benar dan dia admin
            if ($post["password"] === $user->pass_Word) {
                // login sukses yay!
                $this->session->set_userdata('user_logged', $user);
                $this->_updateLastLogin($user->id_User);
                redirect(site_url('user/index'));
            } else
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Salah !
                </div>');
            redirect('auth');
        } else
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username Salah !
                </div>');
        redirect('auth');
    }

    function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    function _updateLastLogin($user_id)
    {
        $sql = "UPDATE {$this->_table} SET last_Login=now() WHERE id_User='" . $user_id . "'";
        $this->db->query($sql);
    }

    function tampil_data_user()
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('position_item p', 'p.id=u.id_Position', 'left');
        $this->db->join('status_item s', 's.id=u.id_Status', 'left');
        return $query = $this->db->get();
    }

    function tampil_data_client()
    {
        $this->db->select('*');
        $this->db->from('client_data');
        return $query = $this->db->get();
    }

    function ambil_data_status()
    {
        return $query = $this->db->get('status_item');
    }
    function ambil_data_position()
    {
        return $query = $this->db->get('position_item');
    }
    public function CreateCode()
    {
        $this->db->select('RIGHT(user.id_User,3) as kode_user', FALSE);
        $this->db->order_by('kode_user', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('user');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_user) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "STR" . $batas;
        return $kodetampil;
    }
    public function CreateCodeClient()
    {
        $this->db->select('RIGHT(client_data.client_id,3) as kode_client', FALSE);
        $this->db->order_by('kode_client', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('client_data');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_client) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "CL" . $batas;
        return $kodetampil;
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function edit_data($where, $table)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('position_item p', 'p.id=u.id_Position', 'left');
        $this->db->join('status_item s', 's.id=u.id_Status', 'left');
        $this->db->join('resource_data r', 'r.id_user=u.id_User', 'left');
        $this->db->where('u.id_User', $where);
        return $query = $this->db->get();
    }
    function edit_data_client($where, $table)
    {
        $this->db->select('*');
        $this->db->from('client_data');
        $this->db->where('client_id', $where);
        return $query = $this->db->get();
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
