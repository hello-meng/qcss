<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class brand_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function count_all()
    {
        $this->db->select('count(*) as count_rec');
        $this->db->from('brand');

        $fName = @$this->input->post('columns')[0]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(brand.name LIKE '%".$fName."%')");
        }

        $fStatus = @$this->input->post('columns')[1]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('brand.status', $fStatus);
        }

        $this->db->where("brand.status <> 'D'");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_rec'];
    }

    function get_all($start = 0, $limit = 0)
    {
        $this->db->select('brand.*');
        $this->db->from('brand');

        $fName = @$this->input->post('columns')[0]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(brand.name LIKE '%".$fName."%')");
        }

        $fStatus = @$this->input->post('columns')[1]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('brand.status', $fStatus);
        }

        $this->db->where("brand.status <> 'D'");

        if(@$this->input->post('order')[0]['column'] != "" && $this->input->post('order')[0]['dir'] != "")
        {
            $this->db->order_by($this->input->post('columns')[$this->input->post('order')[0]['column']]['data'].' '.$this->input->post('order')[0]['dir']);
        }
        else
        {
            $this->db->order_by('brand.order_on asc');
        }

        if($limit > 0)
        {
            $this->db->limit($limit, $start);   
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_by_id($id=0)
    {
        $this->db->select('brand.*');
        $this->db->from('brand');
        $this->db->where('brand.id', $id);
        $this->db->where("brand.status <> 'D'");
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function insert()
    {
        //$data['code'] = $this->input->post('code');
        $data['name'] = $this->input->post('name');
        //$data['description'] = $this->input->post('description');
        $data['image'] = $this->input->post('image');
        // $data['url'] = $this->input->post('url');
        $data['order_on'] = $this->input->post('order_on');
        $data['status'] = $this->input->post('status');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->authen->username;
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = '-';
        $this->db->insert('brand', $data);
    }
    
    function update($id=0)
    {
        $data['name'] = $this->input->post('name');
        $data['image'] = $this->input->post('image');
        //$data['description'] = $this->input->post('description');
        $data['order_on'] = $this->input->post('order_on');
        $data['status'] = $this->input->post('status');
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $id);
        $this->db->update('brand', $data);
    }
    
    function delete($id=0)
    {
        $data['status'] = 'D';
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $id);
        $this->db->where("brand.status <> 'D'");
        $this->db->update('brand', $data);
    }
}