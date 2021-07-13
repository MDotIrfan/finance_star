<?php 

class M_topman extends CI_Model{

	function get_total_cost(){
        $this->db->select("sum(grand_total) as 'total', 
                        month(invoice_date) as 'month', 
                        year(invoice_date) as 'year'");
        $this->db->from('invoice_in');
        $this->db->where('year(invoice_date) = year(now())');
        $this->db->group_by('(SELECT EXTRACT( YEAR_MONTH FROM `invoice_date` ))');
		return $query = $this->db->get();
    }

    function get_total_revenue(){
        $this->db->select("sum(grand_total) as 'total', 
                        month(invoice_date) as 'month', 
                        year(invoice_date) as 'year'");
        $this->db->from('invoice_out');
        $this->db->where('year(invoice_date) = year(now())');
        $this->db->group_by('(SELECT EXTRACT( YEAR_MONTH FROM `invoice_date` ))');
		return $query = $this->db->get();
    }
}