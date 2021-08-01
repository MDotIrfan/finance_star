<?php

class M_po extends CI_Model
{
    var $column_order_user = array('no_Po', 'client_Name','project_Name_po','resource_Status','grand_Total_po'); //field yang ada di table user
    var $column_search_user = array('no_Po', 'client_Name','project_Name_po','resource_Status'); //field yang diizin untuk pencarian 
    var $order = '';// default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query($table)
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $name = $userdata->full_Name;
        
        if($table=='purchase_order_word'){
            $this->db->from('purchase_order po');
            $this->db->join('quotation q', 'po.id_quotation=q.no_Quotation', 'left');
            $this->db->where('po.tipe', 'word');
            $this->db->where('po.nama_Pm', $name);
            if($level=="3"){$this->db->like('no_Po', 'SQ-');}
            else if($level=="4"){$this->db->like('no_Po', 'SQM-');}
            else if($level=="6"){$this->db->like('no_Po', 'KEB-');}
            else {$this->db->like('no_Po', 'ST-');}
            $this->order = array('no_Po' => 'asc'); 
            
        } else if($table=='purchase_order_item'){
            $this->db->from('purchase_order po');
            $this->db->join('quotation q', 'po.id_quotation=q.no_Quotation', 'left');
            $this->db->where('po.tipe', 'item');
            $this->db->where('po.nama_Pm', $name);
            if($level=="3"){$this->db->like('no_Po', 'SQ-');}
            else if($level=="4"){$this->db->like('no_Po', 'SQM-');}
            else if($level=="6"){$this->db->like('no_Po', 'KEB-');}
            else {$this->db->like('no_Po', 'ST-');}
            $this->order = array('no_Po' => 'asc'); 
            
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
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $name = $userdata->full_Name;
        
        if($table=='purchase_order_word'){
            $this->db->from('purchase_order po');
            $this->db->join('quotation q', 'po.id_quotation=q.no_Quotation', 'left');
            $this->db->where('po.tipe', 'word');
            $this->db->where('po.nama_Pm', $name);
            if($level=="3"){$this->db->like('no_Po', 'SQ-');}
            else if($level=="4"){$this->db->like('no_Po', 'SQM-');}
            else if($level=="6"){$this->db->like('no_Po', 'KEB-');}
            else {$this->db->like('no_Po', 'ST-');}
            $this->order = array('no_Po' => 'asc'); 
            
        } else if($table=='purchase_order_item') {
            $this->db->from('purchase_order po');
            $this->db->join('quotation q', 'po.id_quotation=q.no_Quotation', 'left');
            $this->db->where('po.tipe', 'item');
            $this->db->where('po.nama_Pm', $name);
            if($level=="3"){$this->db->like('no_Po', 'SQ-');}
            else if($level=="4"){$this->db->like('no_Po', 'SQM-');}
            else if($level=="6"){$this->db->like('no_Po', 'KEB-');}
            else {$this->db->like('no_Po', 'ST-');}
            $this->order = array('no_Po' => 'asc'); 
            
        }
        return $this->db->count_all_results();
    }

    function tampil_data_po_item($where)
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $name = $userdata->full_Name;
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->where('po.tipe', $where);
        $this->db->where('po.nama_Pm', $name);
        if($level=="3"){$this->db->like('no_Po', 'SQ-');}
        else if($level=="4"){$this->db->like('no_Po', 'SQM-');}
        else if($level=="6"){$this->db->like('no_Po', 'KEB-');}
        else {$this->db->like('no_Po', 'ST-');}
        $this->db->group_by('po.no_Po');
        return $query = $this->db->get();
    }

    // mengambil jumlah hari dari hari terakhir data user diupdate
    function last_update_po($tipe=NULL)
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $name = $userdata->full_Name;
        $this->db->select('DATE(created_at) as tgl,
        DATE(DATE_SUB((SELECT created_at as date FROM `purchase_order` ORDER BY created_at DESC LIMIT 1), INTERVAL 1 DAY)) as tgl_sebelum, 
        DATEDIFF(NOW(),(SELECT created_at as date FROM `purchase_order` ORDER BY created_at DESC LIMIT 1)) as last_update');
        $this->db->from('purchase_order');
        $this->db->where('nama_Pm', $name);
        if($tipe){
            $this->db->where('tipe', $tipe);
        }
        if($level=="3"){$this->db->like('no_Po', 'SQ-');}
        else if($level=="4"){$this->db->like('no_Po', 'SQM-');}
        else if($level=="6"){$this->db->like('no_Po', 'KEB-');}
        else {$this->db->like('no_Po', 'ST-');}
        $this->db->order_by('tgl', 'ASC');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil jumlah data in house, freelance, vendor
    function count_po()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $name = $userdata->full_Name;
        $this->db->select("count(no_Po) as 'po'");
        $this->db->from('purchase_order');
        $this->db->where('nama_Pm', $name);
        if($level=="3"){$this->db->like('no_Po', 'SQ-');}
        else if($level=="4"){$this->db->like('no_Po', 'SQM-');}
        else if($level=="6"){$this->db->like('no_Po', 'KEB-');}
        else {$this->db->like('no_Po', 'ST-');}
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil selisih jumlah data in house, freelance, vendor bulan ini dengan bulan kemarin
    function selisih_count_po()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $name = $userdata->full_Name;
        $days_first = $this->m_po->last_update_po()->row()->tgl;
        $days_before = $this->m_po->last_update_po()->row()->tgl_sebelum;
        $this->db->select("count(no_Po) as 'jum_po'");
        $this->db->from('purchase_order');
        $this->db->where('nama_Pm', $name);
        $this->db->where("created_at BETWEEN '".$days_first."' and '".$days_before."'");
        if($level=="3"){$this->db->like('no_Po', 'SQ-');}
        else if($level=="4"){$this->db->like('no_Po', 'SQM-');}
        else if($level=="6"){$this->db->like('no_Po', 'KEB-');}
        else {$this->db->like('no_Po', 'ST-');}
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    function get_total_po(){
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $name = $userdata->full_Name;
        $this->db->select("sum(grand_Total_po) as 'total', 
                        month(created_at) as 'month', 
                        month(created_at) as 'year'");
        $this->db->from('purchase_order');
        $this->db->where('year(created_at) = year(now())');
        $this->db->group_by('(SELECT EXTRACT( YEAR_MONTH FROM `created_at` ))');
        $this->db->where('nama_Pm', $name);
        if($level=="3"){$this->db->like('no_Po', 'SQ-');}
        else if($level=="4"){$this->db->like('no_Po', 'SQM-');}
        else if($level=="6"){$this->db->like('no_Po', 'KEB-');}
        else {$this->db->like('no_Po', 'ST-');}
		return $query = $this->db->get();
    }

    function ambil_data_q($where1, $where2)
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('*');
        $this->db->from('quotation q');
        $this->db->join('quitation_item qi', 'q.no_Quotation=qi.no_Quotation', 'left');
        $this->db->join('purchase_order po', 'q.no_Quotation=po.id_quotation', 'left');
        if($level=="3"){$this->db->like('q.no_Quotation', 'SQ-');}
        else if($level=="4"){$this->db->like('q.no_Quotation', 'SQM-');}
        else if($level=="6"){$this->db->like('q.no_Quotation', 'KEB-');}
        else {$this->db->like('q.no_Quotation', 'ST-');}
        $this->db->where('q.is_Acc', $where1);
        $this->db->where('q.is_Q', $where2);
        $this->db->group_by('q.no_Quotation');
        return $query = $this->db->get();
    }

    function ambil_data_quotitem($where1, $where2)
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('*');
        $this->db->from('quotation q');
        $this->db->join('quitation_item qi', 'q.no_Quotation=qi.no_Quotation', 'left');
        $this->db->join('purchase_order po', 'q.no_Quotation=po.id_quotation', 'left');
        if($level=="3"){$this->db->like('q.no_Quotation', 'SQ-');}
        else if($level=="4"){$this->db->like('q.no_Quotation', 'SQM-');}
        else if($level=="6"){$this->db->like('q.no_Quotation', 'KEB-');}
        else {$this->db->like('q.no_Quotation', 'ST-');}
        $this->db->where('q.is_Acc', $where1);
        $this->db->where('q.is_Q', $where2);
        $this->db->group_by('q.no_Quotation');
        return $query = $this->db->get();
    }

    function ambil_po_ke($id){
        $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->like('no_Po', $id);
        return $query = $this->db->get();
    }

    function ambil_data_po_item($where)
    {
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->join('po_item_itembase i', 'po.no_Po=i.no_po', 'left');
        $this->db->where('po.no_Po', $where);
        return $query = $this->db->get();
    }

    function ambil_data_po_word($where)
    {
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->join('po_item_wordbase i', 'po.no_Po=i.no_Po');
        $this->db->where('po.no_Po', $where);
        return $query = $this->db->get();
    }

    function ambil_data_qi($where){
		$this->db->select('*, q.project_Name as nama_projek, q.currency as kurensi');
        $this->db->from('quotation q');
        $this->db->join('quitation_item qi', 'q.no_Quotation=qi.no_Quotation', 'left');
        $this->db->join('purchase_order po', 'q.no_Quotation=po.id_quotation', 'left');
        $this->db->where('q.no_Quotation', $where);
		return $query = $this->db->get();
	}

    public function CreateCode(){
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        if($level=="3"){$query=$this->db->query("SELECT MID(no_Po,6,4) as no_Po from purchase_order WHERE no_Po LIKE '%SQ-%' ORDER BY no_Po DESC LIMIT 1");}
        else if($level=="4"){$query=$this->db->query("SELECT MID(no_Po,7,4) as no_Po from purchase_order WHERE no_Po LIKE '%SQM-%' ORDER BY no_Po DESC LIMIT 1");}
        else if($level=="6"){$query=$this->db->query("SELECT MID(no_Po,7,4) as no_Po from purchase_order WHERE no_Po LIKE '%KEB-%' ORDER BY no_Po DESC LIMIT 1");}
        else {$query=$this->db->query("SELECT MID(no_Po,6,4) as no_Po from purchase_order WHERE no_Po LIKE '%ST-%' ORDER BY no_Po DESC LIMIT 1");}
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->no_Po) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        if ($level == "3") {
            $kodetampil = "SQ-PR" . $batas;
        } else if ($level == "4") {
            $kodetampil = "SQM-PR" . $batas;
        } else if ($level == "6") {
            $kodetampil = "KEB-PR" . $batas;
        } else {
            $kodetampil = "ST-PR" . $batas;
        }
        return $kodetampil;
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function ambil_data_position()
    {
        return $query = $this->db->get('position_item');
    }
    function edit_data($where, $table)
    {
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->join('po_item_itembase i', 'po.no_Po=i.no_po', 'left');
        $this->db->where('po.no_Po', $where);
        $this->db->group_by('po.no_Po');
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
    function get_resource()
    {
        $this->db->select('*');
        $this->db->from('resource_data r');
        $this->db->join('user u', 'r.id_user = u.id_User', 'left');
        return $this->db->get();
    }
    function get_resource_data($id)
    {
        $this->db->select('*');
        $this->db->from('resource_data r');
        $this->db->join('user u', 'r.id_user = u.id_User', 'left');
        $this->db->where('u.full_Name', $id);
        return $this->db->get();
    }
    function ambil_dataitem_po_item($where)
    {
        $this->db->select('*');
        $this->db->from('po_item_itembase qi');
        $this->db->join('purchase_order q', 'qi.no_Po=q.no_Po', 'left');
        $this->db->where('q.no_Po', $where);
        return $query = $this->db->get();
    }
}
