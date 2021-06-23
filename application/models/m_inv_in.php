<?php

class M_inv_in extends CI_Model
{

    function tampil_data_inv()
    {
        $userdata = $this->session->userdata('user_logged');
        $name = $userdata->full_Name;
        $this->db->select('*');
        $this->db->from('invoice_in po');
        $this->db->join('invoice_in_item i', 'po.no_invoice=i.no_invoice');
        $this->db->where('po.mitra_name', $name);
        $this->db->group_by('po.no_invoice');
        return $query = $this->db->get();
    }

    function tampil_data_inv_all()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('*');
        $this->db->from('invoice_in po');
        $this->db->join('invoice_in_item i', 'po.no_invoice=i.no_invoice');
        if($level=="3"){$this->db->like('po.no_invoice', 'SQJAK-');}
        else if($level=="4"){$this->db->like('po.no_invoice', 'SQM-');}
        else if($level=="6"){$this->db->like('po.no_invoice', 'KEB-');}
        else {$this->db->like('po.no_invoice', 'STJAK-');}
        $this->db->group_by('po.no_invoice');
        return $query = $this->db->get();
    }

    function tampil_data_inv_out()
    {   
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('invoice_item_spq i', 'po.no_invoice=i.no_invoice');
        if($level=="3"){$this->db->like('po.no_invoice', 'SQJAK-');}
        else if($level=="4"){$this->db->like('po.no_invoice', 'SQM-');}
        else if($level=="6"){$this->db->like('po.no_invoice', 'KEB-');}
        else {$this->db->like('po.no_invoice', 'STJAK-');}
        $this->db->group_by('po.no_invoice');
        return $query = $this->db->get();
    }
    

    function ambil_data_po_w($where1)
    {
        $userdata = $this->session->userdata('user_logged');
        $name = $userdata->full_Name;
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->join('po_item_wordbase i', 'po.no_Po=i.no_Po');
        $this->db->where('po.is_inv_in', $where1);
        $this->db->where('po.resource_Name', $name);
        return $query = $this->db->get();
    }

    function ambil_data_po_i($where1)
    {
        $userdata = $this->session->userdata('user_logged');
        $name = $userdata->full_Name;
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->join('po_item_itembase i', 'po.no_Po=i.no_Po');
        $this->db->where('po.is_inv_in', $where1);
        $this->db->where('po.resource_Name', $name);
        $this->db->group_by('po.no_Po');
        return $query = $this->db->get();
    }

    function ambil_data_po_item($where)
    {
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->join('po_item_itembase i', 'po.no_Po=i.no_Po', 'left');
        $this->db->where('po.no_Po', $where);
        return $query = $this->db->get();
    }

    function ambil_data_po_word($where)
    {
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->join('po_item_wordbase i', 'po.no_Po=i.no_Po', 'left');
        $this->db->where('po.no_Po', $where);
        return $query = $this->db->get();
    }

    function ambil_data_res()
    {
        $userdata = $this->session->userdata('user_logged');
        $id = $userdata->id_User;
        $this->db->select('*');
        $this->db->from('resource_data');
        $this->db->where('id_user', $id);
        return $query = $this->db->get();
    }

    function ambil_data_qi($where){
		$this->db->select('*');
        $this->db->from('invoice_in po');
        $this->db->join('invoice_in_item i', 'po.no_invoice=i.no_invoice');
        $this->db->where('po.no_invoice', $where);
		return $query = $this->db->get();
	}

    function ambil_data_qi_out($where){
		$this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('invoice_item_spq i', 'po.no_invoice=i.no_invoice');
        $this->db->where('po.no_invoice', $where);
		return $query = $this->db->get();
	}
    
    public function CreateCode_Out(){
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $year = date("Y");
            if($level=="3"){$query=$this->db->query("SELECT MID(no_invoice,7,4) as no_inv from invoice_in WHERE no_invoice LIKE '%SQJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,7,4) as no_inv from invoice_out WHERE no_invoice LIKE '%SQJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");}
            else if($level=="4"){$query=$this->db->query("SELECT MID(no_invoice,5,4) as no_inv from invoice_in WHERE no_invoice LIKE '%SQM-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,5,4) as no_inv from invoice_out WHERE no_invoice LIKE '%SQM-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");}
            else if($level=="6"){$query=$this->db->query("SELECT MID(no_invoice,5,4) as no_inv from invoice_in WHERE no_invoice LIKE '%KEB-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,5,4) as no_inv from invoice_out WHERE no_invoice LIKE '%KEB-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");}
            else {$query=$this->db->query("SELECT MID(no_invoice,7,4) as no_inv from invoice_in WHERE no_invoice LIKE '%STJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,7,4) as no_inv from invoice_out WHERE no_invoice LIKE '%STJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");}
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->no_inv) + 1;
        } else {
            $kode = 1;
        }
        $month = date("m");
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        if ($level == "3") {
            $kodetampil = "SQJAK-" . $batas . "-" . $month . "-" . $year;
        } else if ($level == "4") {
            $kodetampil = "SQM-" . $batas . "-" . $month . "-" . $year;
        } else if ($level == "6") {
            $kodetampil = "KEB-" . $batas . "-" . $month . "-" . $year;
        } else {
            $kodetampil = "STJAK-" . $batas . "-" . $year;
        }
        return $kodetampil;
    }
    

    public function CreateCode($level){
        $year = date("Y");
            if($level=="SQ-"){$query=$this->db->query("SELECT MID(no_invoice,7,4) as no_inv from invoice_in WHERE no_invoice LIKE '%SQJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,7,4) as no_inv from invoice_out WHERE no_invoice LIKE '%SQJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");}
            else if($level=="SQM-"){$query=$this->db->query("SELECT MID(no_invoice,5,4) as no_inv from invoice_in WHERE no_invoice LIKE '%SQM-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,5,4) as no_inv from invoice_out WHERE no_invoice LIKE '%SQM-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");}
            else if($level=="KEB-"){$query=$this->db->query("SELECT MID(no_invoice,5,4) as no_inv from invoice_in WHERE no_invoice LIKE '%KEB-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,5,4) as no_inv from invoice_out WHERE no_invoice LIKE '%KEB-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");}
            else {$query=$this->db->query("SELECT MID(no_invoice,7,4) as no_inv from invoice_in WHERE no_invoice LIKE '%STJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,7,4) as no_inv from invoice_out WHERE no_invoice LIKE '%STJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");}
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->no_inv) + 1;
        } else {
            $kode = 1;
        }
        $month = date("m");
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        if ($level == "SQ-") {
            $kodetampil = "SQJAK-" . $batas . "-" . $month . "-" . $year;
        } else if ($level == "SQM-") {
            $kodetampil = "SQM-" . $batas . "-" . $month . "-" . $year;
        } else if ($level == "KEB-") {
            $kodetampil = "KEB-" . $batas . "-" . $month . "-" . $year;
        } else {
            $kodetampil = "STJAK-" . $batas . "-" . $year;
        }
        return $kodetampil;
    }

    function numberToRomanRepresentation($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    public function CreateCodeBast(){
        $userdata = $this->session->userdata('user_logged');
        $inis = $userdata->inisial;
        $year = date("Y");
        $month = $this->numberToRomanRepresentation(date("m"));
        $this->db->select('LEFT(bast.id_bast,3) as no_bast', FALSE);
        $this->db->like('id_bast', $year);
        $this->db->order_by('no_bast', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('bast');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->no_bast) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = $batas . "-" . $month . "-" . $inis . "-" . $year;
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
        $this->db->from('invoice_in po');
        $this->db->join('invoice_in_item i', 'po.no_invoice=i.no_invoice');
        $this->db->where('po.no_invoice', $where);
        $this->db->group_by('po.no_invoice');
        return $query = $this->db->get();
    }
    function edit_data_out($where, $table)
    {
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('invoice_item_spq i', 'po.no_invoice=i.no_invoice');
        $this->db->where('po.no_invoice', $where);
        $this->db->group_by('po.no_invoice');
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
