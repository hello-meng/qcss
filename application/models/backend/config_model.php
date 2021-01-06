<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class config_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function count_all()
    {
        $this->db->select('count(*) as count_rec');
        $this->db->from('config');
        
        $fType = @$this->input->post('columns')[0]['search']['value'];
        if($fType != "")
        {
            $this->db->where('config.type', $fType);
        }

        $fCode = @$this->input->post('columns')[1]['search']['value'];
        if($fCode != "")
        {
            $this->db->where('config.code', $fCode);
        }

        $fName = @$this->input->post('columns')[2]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(config.name_th LIKE '%".$fName."%' or config.name_en LIKE '%".$fName."%')");
        }

        $fStatus = @$this->input->post('columns')[3]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('config.status', $fStatus);
        }

        $this->db->where("config.status <> 'D'");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_rec'];
    }

    function get_all($start = 0, $limit = 0)
    {
        $this->db->select('config.*');
        $this->db->from('config');

        $fType = @$this->input->post('columns')[0]['search']['value'];
        if($fType != "")
        {
            $this->db->where('config.type', $fType);
        }

        $fCode = @$this->input->post('columns')[1]['search']['value'];
        if($fCode != "")
        {
            $this->db->where('config.code', $fCode);
        }

        $fName = @$this->input->post('columns')[2]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(config.name_th LIKE '%".$fName."%' or config.name_en LIKE '%".$fName."%')");
        }

        $fStatus = @$this->input->post('columns')[3]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('config.status', $fStatus);
        }

        $this->db->where("config.status <> 'D'");

        if(@$this->input->post('order')[0]['column'] != "" && $this->input->post('order')[0]['dir'] != "")
        {
            $this->db->order_by($this->input->post('columns')[$this->input->post('order')[0]['column']]['data'].' '.$this->input->post('order')[0]['dir']);
        }
        else
        {
            $this->db->order_by('id asc');
        }

        if($limit > 0)
        {
            $this->db->limit($limit, $start);   
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_by_id()
    {
        $this->db->select('*');
        $this->db->from('config');
        $this->db->where('id', $this->uri->segment(4));
        $this->db->where("status <> 'D'");
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function insert()
    {
        $data['type'] = $this->input->post('type');
        $data['code'] = $this->input->post('code');
        $data['name_th'] = $this->input->post('name_th');
        $data['name_en'] = $this->input->post('name_en');
        $data['value'] = $this->input->post('value');
        $data['status'] = $this->input->post('status');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->authen->username;
        $data['updated_on'] = '0000-00-00 00:00:00';
        $data['updated_by'] = '-';
        $this->db->insert('config', $data);
    }
    
    function update()
    {
        $data['type'] = $this->input->post('type');
        $data['code'] = $this->input->post('code');
        $data['name_th'] = $this->input->post('name_th');
        $data['name_en'] = $this->input->post('name_en');
        $data['value'] = $this->input->post('value');
        $data['status'] = $this->input->post('status');
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $this->uri->segment(4));
        $this->db->where("status <> 'D'");
        $this->db->update('config', $data);
    }
    
    function delete()
    {
        $data['status'] = 'D';
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $this->uri->segment(4));
        $this->db->where("status <> 'D'");
        $this->db->update('config', $data);
    }
}