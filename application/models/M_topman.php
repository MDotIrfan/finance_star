<?php 

class M_topman extends CI_Model{

    var $column_order_user = array('no_invoice','project_Name_po', 'client_name','due_date','grand_total','currency_inv'); //field yang ada di table user
    var $column_search_user = array('no_invoice','project_Name_po', 'client_name','due_date'); //field yang diizin untuk pencarian 
    var $order = '';// default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query($table)
    {
        $this->db->select('*');
        $this->db->from('invoice_out i');
        $this->db->join('purchase_order po', 'i.no_Po=po.no_Po');

        $this->order = array('no_invoice' => 'asc'); 
 
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
        $this->db->select('*');
        $this->db->from('invoice_out i');
        $this->db->join('purchase_order po', 'i.no_Po=po.no_Po');
        return $this->db->count_all_results();
    }

	function get_total_cost(){
        $this->db->select("sum(grand_total) as 'total', 
                        count(no_invoice) as 'jumlah',
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

    function tampil_data_po_item()
    {
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->group_by('po.no_Po');
        return $query = $this->db->get();
    }

    // mengambil jumlah hari dari hari terakhir data user diupdate
    function last_update_data()
    {
        $this->db->select('DATE(created_at) as tgl,
        DATE(DATE_SUB((SELECT created_at as date FROM `invoice_out` ORDER BY created_at DESC LIMIT 1), INTERVAL 1 DAY)) as tgl_sebelum, 
        DATEDIFF(NOW(),(SELECT created_at as date FROM `invoice_out` ORDER BY created_at DESC LIMIT 1)) as last_update');
        $this->db->from('invoice_out');
        $this->db->order_by('tgl', 'ASC');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil jumlah data in house, freelance, vendor
    function count_project()
    {
        $this->db->select("count(no_invoice) as 'project'");
        $this->db->from('invoice_out');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil selisih jumlah data in house, freelance, vendor bulan ini dengan bulan kemarin
    function selisih_count_project()
    {
        $days_first = $this->m_topman->last_update_data()->row()->tgl;
        $days_before = $this->m_topman->last_update_data()->row()->tgl_sebelum;
        $this->db->select("(SELECT count(no_invoice) from `invoice_out` where created_at BETWEEN '".$days_first."' and '".$days_before."') as 'jum_project'");
        $this->db->from('invoice_out');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    function count_cost()
    {
        $this->db->select("sum(grand_total) as 'cost'");
        $this->db->from('invoice_in');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil selisih jumlah data in house, freelance, vendor bulan ini dengan bulan kemarin
    function selisih_count_cost()
    {
        $days_first = $this->m_topman->last_update_data()->row()->tgl;
        $days_before = $this->m_topman->last_update_data()->row()->tgl_sebelum;
        $this->db->select("(SELECT sum(grand_total) from `invoice_in` where created_at BETWEEN '".$days_first."' and '".$days_before."') as 'jum_cost'");
        $this->db->from('invoice_in');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    function count_revenue()
    {
        $this->db->select("sum(grand_total) as 'revenue'");
        $this->db->from('invoice_out');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil selisih jumlah data in house, freelance, vendor bulan ini dengan bulan kemarin
    function selisih_count_revenue()
    {
        $days_first = $this->m_topman->last_update_data()->row()->tgl;
        $days_before = $this->m_topman->last_update_data()->row()->tgl_sebelum;
        $this->db->select("(SELECT sum(grand_total) from `invoice_out` where created_at BETWEEN '".$days_first."' and '".$days_before."') as 'jum_revenue'");
        $this->db->from('invoice_out');
        $this->db->limit(1);
        return $query = $this->db->get();
    }
}