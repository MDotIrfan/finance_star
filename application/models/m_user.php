<?php

class M_user extends CI_Model
{

    var $_table = 'user';
    var $column_order_user = array('id_User', 'user_Name','full_Name','position_Name','status_Name'); //field yang ada di table user
    var $column_search_user = array('id_User', 'user_Name','full_Name','position_Name','status_Name'); //field yang diizin untuk pencarian 
    var $order = '';// default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query($table)
    {
        
        if($table=='user'){
            $this->db->from('user u');
            $this->db->join('position_item p', 'p.id=u.id_Position', 'left');
            $this->db->join('status_item s', 's.id=u.id_Status', 'left');
            
            $this->order = array('id_User' => 'asc'); 
        }
 
        $i = 0;
     
        foreach ($this->column_search_user as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search_user) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order_user[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($table)
    {
        $this->_get_datatables_query($table);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($table)
    {
        $this->_get_datatables_query($table);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($table)
    {
        if($table=='user'){
            $this->db->from('user u'); 
        }
        return $this->db->count_all_results();
    }

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
            if (md5($post["password"]) === $user->pass_Word) {
                // login sukses yay!
                $this->session->set_userdata('user_logged', $user);
                $this->session->set_userdata('menu', 'Dashboard');
                $this->_updateLastLogin($user->id_User);
                if ($user->id_Position == '1') { redirect(site_url('purchase/dashboard'));} 
                elseif ($user->id_Position == '2') { echo 'Top Management';} 
                elseif ($user->id_Position == '3') { redirect(site_url('finance/dashboard'));} 
                elseif ($user->id_Position == '4') { redirect(site_url('user/dashboard'));} 
                elseif ($user->id_Position == '5') { redirect(site_url('quitation/data'));}
                elseif ($user->id_Position == '6') { echo 'Team';} 
                elseif ($user->id_Position == '7') { echo 'Individu';} 
                else { redirect(site_url('user/dashboard'));}
            } else
            $this->session->set_flashdata('error','Username / Password salah');
            redirect('auth');
        } else
        $this->session->set_flashdata('error','Username / Password salah');
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

    // mengambil data user dari table user, position_item dan status_item 
    function tampil_data_user()
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('position_item p', 'p.id=u.id_Position', 'left');
        $this->db->join('status_item s', 's.id=u.id_Status', 'left');
        return $query = $this->db->get();
    }

    // mengambil jumlah hari dari hari terakhir data user diupdate
    function last_update_user()
    {
        $this->db->select('DATE(created_at) as tgl,
        DATE(DATE_SUB((SELECT created_at as date FROM `user` ORDER BY created_at DESC LIMIT 1), INTERVAL 1 DAY)) as tgl_sebelum, 
        DATEDIFF(NOW(),(SELECT created_at as date FROM `user` ORDER BY created_at DESC LIMIT 1)) as last_update');
        $this->db->from('user');
        $this->db->order_by('tgl', 'ASC');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil jumlah data in house, freelance, vendor
    function count_user()
    {
        $this->db->select("SUM(CASE WHEN id_Status = '0' OR id_Status = '2' OR id_Status = '3' OR id_Status = '4' OR id_Status = '6' THEN 1 ELSE 0 END) AS `in_house`,
        SUM(CASE WHEN id_Status = '1' THEN 1 ELSE 0 END) AS `freelance`,
        SUM(CASE WHEN id_Status = '5' THEN 1 ELSE 0 END) AS `vendor`");
        $this->db->from('user');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil selisih jumlah data in house, freelance, vendor bulan ini dengan bulan kemarin
    function selisih_count_user()
    {
        $days_first = $this->m_user->last_update_user()->row()->tgl;
        $days_before = $this->m_user->last_update_user()->row()->tgl_sebelum;
        $this->db->select("(SELECT SUM(CASE WHEN id_Status = '0' OR id_Status = '2' OR id_Status = '3' OR id_Status = '4' OR id_Status = '6' THEN 1 ELSE 0 END) from `user` where created_at BETWEEN '".$days_first."' and '".$days_before."') as 'jum_in_house',
        (SELECT SUM(CASE WHEN id_Status = '1' THEN 1 ELSE 0 END) from `user` where created_at BETWEEN '".$days_first."' and '".$days_before."') as 'jum_freelance',
        (SELECT SUM(CASE WHEN id_Status = '5' THEN 1 ELSE 0 END) from `user` where created_at BETWEEN '".$days_first."' and '".$days_before."') as 'jum_vendor'");
        $this->db->from('user');
        $this->db->limit(1);
        return $query = $this->db->get();
    }
    // mengambil data user dari table client
    // function tampil_data_client()
    // {
    //     $this->db->select('*');
    //     $this->db->from('client_data');
    //     return $query = $this->db->get();
    // }

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
