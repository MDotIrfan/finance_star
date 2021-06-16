<?php 

class M_quotation extends CI_Model{

	function tampil_data_q(){
        $this->db->select('*');
        $this->db->from('quotation q'); 
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