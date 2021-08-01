<?php 

class M_quotation extends CI_Model{

    var $column_order_quotation = array('no_Quotation', 'client_Name','project_Name','grand_Total','currency','is_Acc'); //field yang ada di table user
    var $column_search_quotation = array('no_Quotation', 'client_Name','project_Name'); //field yang diizin untuk pencarian 
    var $order = ''; // default order
    var $level = '';
    var $name = ''; 
 
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
        if($table=='quotation'){
            $this->db->from('quotation q');
            $this->db->where('q.sales_name', $name);
            if($level=="3"){$this->db->like('no_Quotation', 'SQ-');}
            else if($level=="4"){$this->db->like('no_Quotation', 'SQM-');}
            else if($level=="6"){$this->db->like('no_Quotation', 'KEB-');}
            else {$this->db->like('no_Quotation', 'ST-');} 
            
            $this->order = array('no_Quotation' => 'asc');
        }
 
        $i = 0;
     
        foreach ($this->column_search_quotation as $item) // looping awal
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
 
                if(count($this->column_search_quotation) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order_quotation[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
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
        if($table=='quotation'){
            $this->db->from('quotation q');
            $this->db->where('q.sales_name', $name);
            if($level=="3"){$this->db->like('no_Quotation', 'SQ-');}
            else if($level=="4"){$this->db->like('no_Quotation', 'SQM-');}
            else if($level=="6"){$this->db->like('no_Quotation', 'KEB-');}
            else {$this->db->like('no_Quotation', 'ST-');}
        }
        return $this->db->count_all_results();
    }

	function tampil_data_q(){
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $name = $userdata->full_Name;
        $this->db->select('*');
        $this->db->from('quotation q');
        $this->db->where('q.sales_name', $name);
        if($level=="3"){$this->db->like('no_Quotation', 'SQ-');}
        else if($level=="4"){$this->db->like('no_Quotation', 'SQM-');}
        else if($level=="6"){$this->db->like('no_Quotation', 'KEB-');}
        else {$this->db->like('no_Quotation', 'ST-');} 
		return $query = $this->db->get();
	}

    // mengambil jumlah hari dari hari terakhir data user diupdate
    function last_update_quotation()
    {
        $this->db->select('DATE(created_at) as tgl,
        DATE(DATE_SUB((SELECT created_at as date FROM `quotation` ORDER BY created_at DESC LIMIT 1), INTERVAL 1 DAY)) as tgl_sebelum, 
        DATEDIFF(NOW(),(SELECT created_at as date FROM `quotation` ORDER BY created_at DESC LIMIT 1)) as last_update');
        $this->db->from('quotation');
        $this->db->order_by('tgl', 'ASC');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    function ambil_data_q($where){
		$this->db->select('*');
        $this->db->from('quitation_item qi'); 
        $this->db->join('quotation q', 'qi.no_Quotation=q.no_Quotation', 'left');
        $this->db->where('q.no_Quotation', $where);
		return $query = $this->db->get();
	}
    function ambil_data_position(){
		return $query = $this->db->get('position_item');
	}

    public function CreateCode(){
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('RIGHT(quotation.no_Quotation,4) as no_Q', FALSE);
        if($level=="3"){$this->db->like('no_Quotation', 'SQ-');}
        else if($level=="4"){$this->db->like('no_Quotation', 'SQM-');}
        else if($level=="6"){$this->db->like('no_Quotation', 'KEB-');}
        else {$this->db->like('no_Quotation', 'ST-');}    
        $this->db->order_by('no_Q','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('quotation');
            if($query->num_rows() <> 0){      
                 $data = $query->row();
                 $kode = intval($data->no_Q) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        if($level=="3"){$kodetampil = "SQ-Q".$batas;}
        else if($level=="4"){$kodetampil = "SQM-Q".$batas;}
        else if($level=="6"){$kodetampil = "KEB-Q".$batas;}
        else {$kodetampil = "ST-Q".$batas;}    
        return $kodetampil;  
    }

    function input_data($data,$table){
		$this->db->insert($table,$data);
	}

    function getAll($where)
    {
        $this->db->select('*');
        $this->db->from('quotation q');
        $this->db->where('q.no_Quotation', $where);
        $this->db->group_by('q.no_Quotation');
        return $this->db->get();
    }

    function edit_data($where,$table){		
		$this->db->select('*');
        $this->db->from('quotation q'); 
        $this->db->join('quitation_item qi', 'qi.no_Quotation=q.no_Quotation', 'left');
        $this->db->where('q.no_Quotation', $where);
        $this->db->group_by('q.no_Quotation');
		return $query = $this->db->get();
	}
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    function get_client()
    {
        $this->db->select('*');
        $this->db->from('client_data');
        return $this->db->get();
    }
    function ambil_data_client($id)
    {
        $this->db->select('*');
        $this->db->from('client_data');
        $this->db->where('client_name', $id);
        return $this->db->get();
    }
}