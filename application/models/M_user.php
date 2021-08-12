<?php

class M_user extends CI_Model
{

    var $_table = 'user';
    // var $column_order_user = array('id_User', 'user_Name','full_Name','position_Name','status_Name'); //field yang ada di table user
    // var $column_search_user = array('id_User', 'user_Name','full_Name','position_Name','status_Name'); //field yang diizin untuk pencarian 
    var $order = '';// default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query($table)
    {
        if ($table == 'user') {
            $column_order = array('id_User', 'user_Name', 'full_Name', 'position_Name', 'status_Name');
            $column_search = array('id_User', 'user_Name', 'full_Name', 'position_Name', 'status_Name');
            $this->db->from('user u');
            $this->db->join('position_item p', 'p.id=u.id_Position', 'left');
            $this->db->join('status_item s', 's.id=u.id_Status', 'left');
            $this->order = array('id_User' => 'asc');
        } else if ($table == 'vendor') {
            $column_order = array('id', 'pic_name', 'company', 'email', 'wa', 'address', 'npwp', 'rekening');
            $column_search = array('id', 'pic_name', 'company', 'email', 'wa', 'address', 'npwp', 'rekening');
            $this->db->from('vendor');
            $this->order = array('id' => 'asc');
        } else if ($table == 'freelance_data') {
            $column_order = array('id', 'firstname', 'lastname', 'email', 'wa', 'address', 'npwp', 'rekening');
            $column_search = array('id', 'firstname', 'lastname', 'email', 'wa', 'address', 'npwp', 'rekening');
            $this->db->from('freelance_data');
            $this->order = array('id' => 'asc');
        } else if ($table == 'client_data') {
            $column_order = array('client_id', 'client_name', 'client_email', 'company_name', 'address');
            $column_search = array('client_id', 'client_name', 'client_email', 'company_name', 'address');
            $this->db->from('client_data');
            $this->order = array('client_id' => 'asc');
        }

        $i = 0;

        foreach ($column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($table)
    {
        $this->_get_datatables_query($table);
        if ($_POST['length'] != -1)
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
        if ($table == 'user') {
            $this->db->from('user u');
            $this->db->join('position_item p', 'p.id=u.id_Position', 'left');
            $this->db->join('status_item s', 's.id=u.id_Status', 'left');
        } else if ($table == 'vendor') {
            $this->db->from('vendor');
        } else if ($table == 'freelance_data') {
            $this->db->from('freelance_data');
        } else if ($table == 'client_data') {
            $this->db->from('client_data');
        }
        return $this->db->count_all_results();
    }

    function tampil_data_freelance()
    {
        $this->db->select('*');
        $this->db->from('freelance_data');
        return $query = $this->db->get();
    }

    function tampil_data_client()
    {
        $this->db->select('*');
        $this->db->from('client_data');
        return $query = $this->db->get();
    }


    function tampil_data_vendor()
    {
        $this->db->select('*');
        $this->db->from('vendor');
        return $query = $this->db->get();
    }

    function last_update_freelance()
    {
        $this->db->select('DATE(created_at) as tgl,
        DATE(DATE_SUB((SELECT created_at as date FROM `client_data` ORDER BY created_at DESC LIMIT 1), INTERVAL 1 DAY)) as tgl_sebelum, 
        DATEDIFF(NOW(),(SELECT created_at as date FROM `client_data` ORDER BY created_at DESC LIMIT 1)) as last_update');
        $this->db->from('freelance_data');
        $this->db->order_by('tgl', 'ASC');
        $this->db->limit(1);
        return $query = $this->db->get();
    }
    function last_update_vendor()
    {
        $this->db->select('DATE(created_at) as tgl,
        DATE(DATE_SUB((SELECT created_at as date FROM `resource_data` ORDER BY created_at DESC LIMIT 1), INTERVAL 1 DAY)) as tgl_sebelum, 
        DATEDIFF(NOW(),(SELECT created_at as date FROM `resource_data` ORDER BY created_at DESC LIMIT 1)) as last_update');
        $this->db->from('vendor');
        $this->db->order_by('tgl', 'ASC');
        $this->db->limit(1);
        return $query = $this->db->get();
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
                elseif ($user->id_Position == '2') { redirect(site_url('top_management/dashboard'));} 
                elseif ($user->id_Position == '3') { redirect(site_url('finance/dashboard'));} 
                elseif ($user->id_Position == '4') { redirect(site_url('user/dashboard'));} 
                elseif ($user->id_Position == '5') { redirect(site_url('quitation/data'));}
                elseif ($user->id_Position == '6' || $user->id_Position == '7') { redirect(site_url('freelance/dashboard'));} 
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
        $this->db->select('RIGHT(freelance_data.id,3) as kode_freelance', FALSE);
        $this->db->order_by('kode_freelance', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('freelance_data');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_freelance) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "FL" . $batas;
        return $kodetampil;
    }
    public function CreateCodeResource()
    {
        $this->db->select('RIGHT(vendor.id,3) as kode_vendor', FALSE);
        $this->db->order_by('kode_vendor', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('vendor');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_vendor) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "VEN" . $batas;
        return $kodetampil;
    }
    function get_prov(){
        $this->db->select('prov_id, prov_name');
        $this->db->from('ec_provinces');
        $this->db->order_by('prov_name', 'ASC');
        return $query = $this->db->get();
    }
    function get_city($prov_id){
        $this->db->select('city_name, p.prov_id, city_id');
        $this->db->from('ec_cities c');
        $this->db->join('ec_provinces p', 'c.prov_id=p.prov_id');
        $this->db->where('p.prov_name', $prov_id);
        $this->db->order_by('city_name', 'ASC');
        return $query = $this->db->get();
    }
    function get_district($prov_id){
        $this->db->select('dis_name, c.city_id, dis_id');
        $this->db->from('ec_districts d');
        $this->db->join('ec_cities c', 'c.city_id=d.city_id');
        $this->db->where('c.city_name', $prov_id);
        $this->db->order_by('dis_name', 'ASC');
        return $query = $this->db->get();
    }
    function get_postal($prov_id){
        $this->db->select('postal_code, postal_id, d.dis_id');
        $this->db->from('ec_postalcode p');
        $this->db->join('ec_districts d', 'd.dis_id=p.dis_id');
        $this->db->where('d.dis_name', $prov_id);
        $this->db->order_by('postal_code', 'ASC');
        $this->db->group_by('postal_code');
        return $query = $this->db->get();
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
        $this->db->where('u.id_User', $where);
        return $query = $this->db->get();
    }
    function edit_data_client($where, $table)
    {
        $this->db->select('*');
        $this->db->from('freelance_data');
        $this->db->where('id', $where);
        return $query = $this->db->get();
    }
    function edit_data_client2($where, $table)
    {
        $this->db->select('*');
        $this->db->from('client_data');
        $this->db->where('client_id', $where);
        return $query = $this->db->get();
    }
    function edit_data_resource($where, $table)
    {
        $this->db->select('*');
        $this->db->from('vendor');
        $this->db->where('id', $where);
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
