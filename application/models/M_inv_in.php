<?php

class M_inv_in extends CI_Model
{
    var $_table = 'invoice_in';

    // var $column_order_invoicein = array('po.no_invoice', 'mitra_name', 'jobdesc', 'invoice_date', 'grand_total'); //field yang ada di table 
    // // var $column_search_invoicein = array('po.no_invoice', 'mitra_name', 'jobdesc', 'invoice_date'); //field yang diizin untuk pencarian 
    // var $column_order_invoiceout = array('po.no_invoice', 'client_name', 'project_Name_po', 'nama_Pm', 'invoice_date', 'grand_total'); //field yang ada di table 
    // var $column_search_invoiceout = array('po.no_invoice', 'project_Name_po', 'invoice_date'); //field yang diizin untuk pencarian 
    // var $column_order_bast = array('id_bast', 'pic_client', 'item', 'qty'); //field yang ada di table 
    // var $column_search_bast = array('id_bast', 'pic_client', 'item'); //field yang diizin untuk pencarian 
    var $order = ''; // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($table)
    {

        if ($table == 'invoice_in') {
            $userdata = $this->session->userdata('user_logged');
            $name = $userdata->full_Name;
            $column_order = array('po.no_invoice', 'mitra_name', 'jobdesc', 'invoice_date', 'grand_total', 'currency_inv');
            $column_search = array('po.no_invoice', 'mitra_name', 'jobdesc', 'invoice_date');
            $this->db->from('invoice_in po');
            $this->db->join('invoice_in_item i', 'po.no_invoice=i.no_invoice');
            $this->db->where('po.mitra_name', $name);
            $this->db->group_by('po.no_invoice');

            $this->order = array('po.no_invoice' => 'asc');
        } else if ($table == 'invoice_in_finance') {
            $userdata = $this->session->userdata('user_logged');
            $level = $userdata->id_Status;
            $column_order = array('p.no_invoice', 'mitra_name', 'jobdesc', 'invoice_date', 'grand_total', 'currency_inv');
            $column_search = array('p.no_invoice', 'mitra_name', 'jobdesc', 'invoice_date');
            $this->db->from('invoice_in p');
            $this->db->join('invoice_in_item q', 'p.no_invoice=q.no_invoice');
            if ($level == "3") {
                $this->db->like('p.no_invoice', 'SQJAK-');
            } else if ($level == "4") {
                $this->db->like('p.no_invoice', 'SQM-');
            } else if ($level == "6") {
                $this->db->like('p.no_invoice', 'KEB-');
            } else {
                $this->db->like('p.no_invoice', 'STJAK-');
            }
            $this->db->group_by('p.no_invoice');

            $this->order = array('p.invoice_date' => 'asc');
        } else if ($table == 'invoice_out'||$table == 'project_dashboard') {
            $userdata = $this->session->userdata('user_logged');
            $level = $userdata->id_Status;
            $column_order = array('po.no_invoice','client_name', 'project_Name_po', 'nama_Pm', 'invoice_date', 'grand_total', 'currency_inv');
            $column_search = array('po.no_invoice','client_name', 'project_Name_po', 'nama_Pm', 'invoice_date');
            $this->db->from('invoice_out po');
            $this->db->join('purchase_order p', 'po.no_po=p.no_Po');
            if ($level == "3") {
                $this->db->like('po.no_invoice', 'SQJAK-');
            } else if ($level == "4") {
                $this->db->like('po.no_invoice', 'SQM-');
            } else if ($level == "6") {
                $this->db->like('po.no_invoice', 'KEB-');
            } else {
                $this->db->like('po.no_invoice', 'STJAK-');
            }
            $this->db->group_by('po.no_invoice');

            $this->order = array('po.invoice_date' => 'asc');
        } else if ($table == 'bast') {
            $userdata = $this->session->userdata('user_logged');
            $level = $userdata->id_Status;
            $column_order = array('po.no_invoice', 'mitra_name', 'jobdesc', 'invoice_date', 'grand_total');
            $column_search = array('id_bast', 'pic_client', 'item', 'qty');
            $this->db->select('*');
            $this->db->from('bast po');
            $this->db->join('bast_item i', 'po.id_bast=i.id_bast');
            if ($level == "3") {
                $this->db->like('po.no_invoice', 'SQJAK-');
            } else if ($level == "4") {
                $this->db->like('po.no_invoice', 'SQM-');
            } else if ($level == "6") {
                $this->db->like('po.no_invoice', 'KEB-');
            } else {
                $this->db->like('po.no_invoice', 'STJAK-');
            }
            $this->db->group_by('po.id_bast');

            $this->order = array('po.due_date' => 'asc');
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
        if ($table == 'invoice_in') {
            $userdata = $this->session->userdata('user_logged');
            $name = $userdata->full_Name;
            $this->db->from('invoice_in po');
            $this->db->where('po.mitra_name', $name);
        } else if ($table == 'invoice_in_finance') {
            $userdata = $this->session->userdata('user_logged');
            $level = $userdata->id_Status;
            $this->db->from('invoice_in p');
            if ($level == "3") {
                $this->db->like('p.no_invoice', 'SQJAK-');
            } else if ($level == "4") {
                $this->db->like('p.no_invoice', 'SQM-');
            } else if ($level == "6") {
                $this->db->like('p.no_invoice', 'KEB-');
            } else {
                $this->db->like('p.no_invoice', 'STJAK-');
            }
        } else if ($table == 'invoice_out') {
            $userdata = $this->session->userdata('user_logged');
            $level = $userdata->id_Status;
            $this->db->from('invoice_out po');
            if ($level == "3") {
                $this->db->like('po.no_invoice', 'SQJAK-');
            } else if ($level == "4") {
                $this->db->like('po.no_invoice', 'SQM-');
            } else if ($level == "6") {
                $this->db->like('po.no_invoice', 'KEB-');
            } else {
                $this->db->like('po.no_invoice', 'STJAK-');
            }
        } else if ($table == 'bast') {
            $userdata = $this->session->userdata('user_logged');
            $level = $userdata->id_Status;
            $this->db->from('bast po');
            if ($level == "3") {
                $this->db->like('po.no_invoice', 'SQJAK-');
            } else if ($level == "4") {
                $this->db->like('po.no_invoice', 'SQM-');
            } else if ($level == "6") {
                $this->db->like('po.no_invoice', 'KEB-');
            } else {
                $this->db->like('po.no_invoice', 'STJAK-');
            }
        }
        return $this->db->count_all_results();
    }

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
        if ($level == "3") {
            $this->db->like('po.no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('po.no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('po.no_invoice', 'KEB-');
        } else {
            $this->db->like('po.no_invoice', 'STJAK-');
        }
        $this->db->group_by('po.no_invoice');
        return $query = $this->db->get();
    }

    function tampil_data_bast()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('*');
        $this->db->from('bast po');
        $this->db->join('bast_item i', 'po.id_bast=i.id_bast');
        if ($level == "3") {
            $this->db->like('po.no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('po.no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('po.no_invoice', 'KEB-');
        } else {
            $this->db->like('po.no_invoice', 'STJAK-');
        }
        $this->db->group_by('po.id_bast');
        return $query = $this->db->get();
    }

    function edit_data_bast($id)
    {
        $this->db->select('*');
        $this->db->from('bast po');
        $this->db->join('bast_item i', 'po.id_bast=i.id_bast');
        $this->db->where('po.id_bast', $id);
        $this->db->group_by('po.id_bast');
        return $query = $this->db->get();
    }

    function ambil_data_bast_item($id)
    {
        $this->db->select('*');
        $this->db->from('bast_item po');
        $this->db->where('po.id_bast', $id);
        return $query = $this->db->get();
    }

    function tampil_data_inv_out()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po');
        if ($level == "3") {
            $this->db->like('po.no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('po.no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('po.no_invoice', 'KEB-');
        } else {
            $this->db->like('po.no_invoice', 'STJAK-');
        }
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
        $this->db->join('quotation q', 'po.id_quotation=q.no_Quotation', 'left');
        $this->db->join('client_data c', 'c.client_name=q.client_Name', 'left');
        $this->db->where('po.no_Po', $where);
        return $query = $this->db->get();
    }

    function po_word()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('po.no_Po');
        $this->db->from('purchase_order po');
        $this->db->join('po_item_wordbase i', 'po.no_Po=i.no_Po');
        if ($level == "3") {
            $this->db->like('po.no_Po', 'SQ-');
        } else if ($level == "4") {
            $this->db->like('po.no_Po', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('po.no_Po', 'KEB-');
        } else {
            $this->db->like('po.no_Po', 'ST-');
        }
        $this->db->group_by('po.no_Po');
        return $query = $this->db->get();
    }

    function po_item()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('po.no_Po');
        $this->db->from('purchase_order po');
        $this->db->join('po_item_itembase i', 'po.no_Po=i.no_Po');
        if ($level == "3") {
            $this->db->like('po.no_Po', 'SQ-');
        } else if ($level == "4") {
            $this->db->like('po.no_Po', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('po.no_Po', 'KEB-');
        } else {
            $this->db->like('po.no_Po', 'ST-');
        }
        $this->db->group_by('po.no_Po');
        return $query = $this->db->get();
    }


    function ambil_data_po_word($where)
    {
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->join('po_item_wordbase i', 'po.no_Po=i.no_Po', 'left');
        $this->db->join('quotation q', 'po.id_quotation=q.no_Quotation', 'left');
        $this->db->join('client_data c', 'c.client_name=q.client_Name', 'left');
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

    function ambil_data_qi($where)
    {
        $this->db->select('*');
        $this->db->from('invoice_in po');
        $this->db->join('invoice_in_item i', 'po.no_invoice=i.no_invoice');
        $this->db->where('po.no_invoice', $where);
        return $query = $this->db->get();
    }

    function ambil_data_qi_spq($where)
    {
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('invoice_item_spq i', 'po.no_invoice=i.no_invoice');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po');
        $this->db->where('po.no_invoice', $where);
        return $query = $this->db->get();
    }

    function ambil_data_qi_luar($where)
    {
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('invoice_item_luar i', 'po.no_invoice=i.no_invoice');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po');
        $this->db->where('po.no_invoice', $where);
        return $query = $this->db->get();
    }

    function ambil_data_qi_luar2($where)
    {
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('invoice_item_luar_2 i', 'po.no_invoice=i.no_invoice');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po');
        $this->db->where('po.no_invoice', $where);
        return $query = $this->db->get();
    }

    function ambil_data_qi_spq2($where)
    {
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('invoice_item_spq_2 i', 'po.no_invoice=i.no_invoice');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po');
        $this->db->where('po.no_invoice', $where);
        return $query = $this->db->get();
    }

    function ambil_data_tax($where)
    {
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('tax_invoice i', 'po.no_invoice=i.no_invoice');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po');
        $this->db->where('po.no_invoice', $where);
        return $query = $this->db->get();
    }

    function ambil_data_qi_local($where)
    {
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('invoice_item_local i', 'po.no_invoice=i.no_invoice');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po');
        $this->db->where('po.no_invoice', $where);
        return $query = $this->db->get();
    }

    function ambil_data_allin($id)
    {
        $this->db->select('*, po.tipe as tipe_inv, i1.jobdesc as jobdesc1, i3.jobdesc as jobdesc3, i4.jobdesc as jobdesc4');
        $this->db->from('invoice_in po');
        $this->db->join('invoice_item_luar i1', 'po.no_invoice=i1.no_invoice', 'left');
        $this->db->join('invoice_item_local i2', 'po.no_invoice=i2.no_invoice', 'left');
        $this->db->join('invoice_item_spq i3', 'po.no_invoice=i3.no_invoice', 'left');
        $this->db->join('invoice_item_luar_2 i4', 'po.no_invoice=i4.no_invoice', 'left');
        $this->db->join('invoice_item_spq_2 i5', 'po.no_invoice=i5.no_invoice', 'left');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po', 'left');
        $this->db->join('quotation q', 'p.id_quotation=q.no_Quotation', 'left');

        $this->db->where('po.no_invoice', $id);
        return $query = $this->db->get();
    }

    function ambil_data_email($id)
    {
        $this->db->select('*');
        $this->db->from('invoice_in po');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po', 'left');

        $this->db->where('po.no_invoice', $id);
        return $query = $this->db->get();
    }

    function ambil_data_email_finance($id)
    {
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po', 'left');

        $this->db->where('po.no_invoice', $id);
        return $query = $this->db->get();
    }

    function ambil_data_inv_out($id)
    {
        $this->db->select('*');
        $this->db->from('invoice_out po');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po', 'left');

        $this->db->where('po.no_invoice', $id);
        return $query = $this->db->get();
    }

    function last_update_inv()
    {
        $this->db->select('DATE(created_at) as tgl,
        DATE(DATE_SUB((SELECT created_at as date FROM `invoice_in` ORDER BY created_at DESC LIMIT 1), INTERVAL 1 DAY)) as tgl_sebelum, 
        DATEDIFF(NOW(),(SELECT created_at as date FROM `invoice_in` ORDER BY created_at DESC LIMIT 1)) as last_update');
        $this->db->from('invoice_in');
        $this->db->order_by('tgl', 'ASC');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    function ambil_data_po($id)
    {
        $this->db->from('purchase_order po');;
        $this->db->join('quotation q', 'po.id_quotation=q.no_Quotation', 'left');

        $this->db->where('po.no_Po', $id);
        return $query = $this->db->get();
    }

    function ambil_data_all($id)
    {
        $this->db->select('*, po.tipe as tipe_inv, i1.jobdesc as jobdesc1, i3.jobdesc as jobdesc3, i4.jobdesc as jobdesc4');
        $this->db->from('invoice_out po');
        $this->db->join('invoice_item_luar i1', 'po.no_invoice=i1.no_invoice', 'left');
        $this->db->join('invoice_item_local i2', 'po.no_invoice=i2.no_invoice', 'left');
        $this->db->join('invoice_item_spq i3', 'po.no_invoice=i3.no_invoice', 'left');
        $this->db->join('invoice_item_luar_2 i4', 'po.no_invoice=i4.no_invoice', 'left');
        $this->db->join('invoice_item_spq_2 i5', 'po.no_invoice=i5.no_invoice', 'left');
        $this->db->join('purchase_order p', 'po.no_po=p.no_Po', 'left');
        $this->db->join('quotation q', 'p.id_quotation=q.no_Quotation', 'left');
        $this->db->join('client_data c', 'po.client_name=c.client_name', 'left');
        $this->db->where('po.no_invoice', $id);
        return $query = $this->db->get();
    }

    public function CreateCode_Out()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $year = date("Y");
        if ($level == "3") {
            $query = $this->db->query("SELECT MID(no_invoice,7,4) as no_inv from invoice_in WHERE no_invoice LIKE '%SQJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,7,4) as no_inv from invoice_out WHERE no_invoice LIKE '%SQJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");
        } else if ($level == "4") {
            $query = $this->db->query("SELECT MID(no_invoice,5,4) as no_inv from invoice_in WHERE no_invoice LIKE '%SQM-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,5,4) as no_inv from invoice_out WHERE no_invoice LIKE '%SQM-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");
        } else if ($level == "6") {
            $query = $this->db->query("SELECT MID(no_invoice,5,4) as no_inv from invoice_in WHERE no_invoice LIKE '%KEB-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,5,4) as no_inv from invoice_out WHERE no_invoice LIKE '%KEB-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");
        } else {
            $query = $this->db->query("SELECT MID(no_invoice,7,4) as no_inv from invoice_in WHERE no_invoice LIKE '%STJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,7,4) as no_inv from invoice_out WHERE no_invoice LIKE '%STJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");
        }
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


    public function CreateCode($level)
    {
        $year = date("Y");
        if ($level == "SQ-") {
            $query = $this->db->query("SELECT MID(no_invoice,7,4) as no_inv from invoice_in WHERE no_invoice LIKE '%SQJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,7,4) as no_inv from invoice_out WHERE no_invoice LIKE '%SQJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");
        } else if ($level == "SQM-") {
            $query = $this->db->query("SELECT MID(no_invoice,5,4) as no_inv from invoice_in WHERE no_invoice LIKE '%SQM-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,5,4) as no_inv from invoice_out WHERE no_invoice LIKE '%SQM-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");
        } else if ($level == "KEB-") {
            $query = $this->db->query("SELECT MID(no_invoice,5,4) as no_inv from invoice_in WHERE no_invoice LIKE '%KEB-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,5,4) as no_inv from invoice_out WHERE no_invoice LIKE '%KEB-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");
        } else {
            $query = $this->db->query("SELECT MID(no_invoice,7,4) as no_inv from invoice_in WHERE no_invoice LIKE '%STJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' UNION all SELECT MID(no_invoice,7,4) as no_inv from invoice_out WHERE no_invoice LIKE '%STJAK-%' ESCAPE '!' AND no_invoice LIKE '%{$year}%' ESCAPE '!' ORDER BY no_inv DESC LIMIT 1");
        }
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

    function numberToRomanRepresentation($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    public function CreateCodeBast()
    {
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
        $this->db->select('*, p.company');
        $this->db->from('invoice_in po');
        $this->db->join('purchase_order p', 'po.no_Po=p.no_Po');
        $this->db->join('invoice_in_item i', 'po.no_invoice=i.no_invoice');
        $this->db->where('po.no_invoice', $where);
        $this->db->group_by('po.no_invoice');
        return $query = $this->db->get();
    }
    function edit_data_out($where, $table)
    {
        $this->db->select('*');
        $this->db->from('invoice_out po');
        // $this->db->join('invoice_item_spq i', 'po.no_invoice=i.no_invoice');
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

    function last_update_data_finance()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('DATE(created_at) as tgl,
        DATE(DATE_SUB((SELECT created_at as date FROM `invoice_out` ORDER BY created_at DESC LIMIT 1), INTERVAL 1 DAY)) as tgl_sebelum, 
        DATEDIFF(NOW(),(SELECT created_at as date FROM `invoice_out` ORDER BY created_at DESC LIMIT 1)) as last_update');
        $this->db->from('invoice_out');
        if ($level == "3") {
            $this->db->like('no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('no_invoice', 'KEB-');
        } else {
            $this->db->like('no_invoice', 'STJAK-');
        }
        $this->db->order_by('tgl', 'ASC');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    function last_update_inv_in()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('DATE(created_at) as tgl,
        DATE(DATE_SUB((SELECT created_at as date FROM `invoice_in` ORDER BY created_at DESC LIMIT 1), INTERVAL 1 DAY)) as tgl_sebelum, 
        DATEDIFF(NOW(),(SELECT created_at as date FROM `invoice_in` ORDER BY created_at DESC LIMIT 1)) as last_update');
        $this->db->from('invoice_in');
        if ($level == "3") {
            $this->db->like('no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('no_invoice', 'KEB-');
        } else {
            $this->db->like('no_invoice', 'STJAK-');
        }
        $this->db->order_by('tgl', 'ASC');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil jumlah data in house, freelance, vendor
    function count_project_finance()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select("count(no_invoice) as 'project'");
        $this->db->from('invoice_out');
        if ($level == "3") {
            $this->db->like('no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('no_invoice', 'KEB-');
        } else {
            $this->db->like('no_invoice', 'STJAK-');
        }
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil selisih jumlah data in house, freelance, vendor bulan ini dengan bulan kemarin
    function selisih_count_project_finance()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $days_first = $this->m_inv_in->last_update_data_finance()->row()->tgl;
        $days_before = $this->m_inv_in->last_update_data_finance()->row()->tgl_sebelum;
        $this->db->select("(SELECT count(no_invoice) from `invoice_out` where created_at BETWEEN '".$days_first."' and '".$days_before."') as 'jum_project'");
        $this->db->from('invoice_out');
        if ($level == "3") {
            $this->db->like('no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('no_invoice', 'KEB-');
        } else {
            $this->db->like('no_invoice', 'STJAK-');
        }
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    function last_update_data_bast()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select('DATE(created_at) as tgl,
        DATE(DATE_SUB((SELECT created_at as date FROM `bast` ORDER BY created_at DESC LIMIT 1), INTERVAL 1 DAY)) as tgl_sebelum, 
        DATEDIFF(NOW(),(SELECT created_at as date FROM `bast` ORDER BY created_at DESC LIMIT 1)) as last_update');
        $this->db->from('invoice_out');
        if ($level == "3") {
            $this->db->like('no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('no_invoice', 'KEB-');
        } else {
            $this->db->like('no_invoice', 'STJAK-');
        }
        $this->db->order_by('tgl', 'ASC');
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil jumlah data in house, freelance, vendor
    function count_bast_finance()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select("count(no_invoice) as 'bast'");
        $this->db->from('bast');
        if ($level == "3") {
            $this->db->like('no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('no_invoice', 'KEB-');
        } else {
            $this->db->like('no_invoice', 'STJAK-');
        }
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    // mengambil selisih jumlah data in house, freelance, vendor bulan ini dengan bulan kemarin
    function selisih_count_bast_finance()
    {
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $days_first = $this->m_inv_in->last_update_data_finance()->row()->tgl;
        $days_before = $this->m_inv_in->last_update_data_finance()->row()->tgl_sebelum;
        $this->db->select("(SELECT count(no_invoice) from `invoice_out` where created_at BETWEEN '".$days_first."' and '".$days_before."') as 'jum_bast'");
        $this->db->from('bast');
        if ($level == "3") {
            $this->db->like('no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('no_invoice', 'KEB-');
        } else {
            $this->db->like('no_invoice', 'STJAK-');
        }
        $this->db->limit(1);
        return $query = $this->db->get();
    }

    function get_total_revenue(){
        $userdata = $this->session->userdata('user_logged');
        $level = $userdata->id_Status;
        $this->db->select("sum(grand_total) as 'total',
                        count(no_invoice) as 'jumlah', 
                        month(invoice_date) as 'month', 
                        year(invoice_date) as 'year'");
        $this->db->from('invoice_out');
        if ($level == "3") {
            $this->db->like('no_invoice', 'SQJAK-');
        } else if ($level == "4") {
            $this->db->like('no_invoice', 'SQM-');
        } else if ($level == "6") {
            $this->db->like('no_invoice', 'KEB-');
        } else {
            $this->db->like('no_invoice', 'STJAK-');
        }
        $this->db->where('year(invoice_date) = year(now())');
        $this->db->group_by('(SELECT EXTRACT( YEAR_MONTH FROM `invoice_date` ))');
		return $query = $this->db->get();
    }
}
