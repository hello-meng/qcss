<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_section()
    {
        $this->db->select('*');
        $this->db->from('backend_section');
        $this->db->where("status <> 'D'");
        $this->db->order_by('order_on asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function count_all()
    {
        $this->db->select('count(*) as count_rec');
        $this->db->from('backend_menu');
        $this->db->join('backend_section', 'backend_section.id = backend_menu.section_id');
        
        $fSection = @$this->input->post('columns')[0]['search']['value'];
        if($fSection != "")
        {
            $this->db->where("(backend_menu.section_id LIKE '%".$fSection."%')");
        }

        $fName = @$this->input->post('columns')[1]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(backend_menu.name LIKE '%".$fName."%')");
        }

        $fStatus = @$this->input->post('columns')[2]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('backend_menu.status', $fStatus);
        }

        $this->db->where("backend_menu.status <> 'D'");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_rec'];
    }

    function get_all($start = 0, $limit = 0)
    {
        $this->db->select('backend_menu.*, backend_section.name as section');
        $this->db->from('backend_menu');
        $this->db->join('backend_section', 'backend_section.id = backend_menu.section_id');

        $fSection = @$this->input->post('columns')[0]['search']['value'];
        if($fSection != "")
        {
            $this->db->where("(backend_menu.section_id LIKE '%".$fSection."%')");
        }

        $fName = @$this->input->post('columns')[1]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(backend_menu.name LIKE '%".$fName."%')");
        }

        $fStatus = @$this->input->post('columns')[2]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('backend_menu.status', $fStatus);
        }

        $this->db->where("backend_menu.status <> 'D'");

        if(@$this->input->post('order')[0]['column'] != "" && $this->input->post('order')[0]['dir'] != "")
        {
            $this->db->order_by($this->input->post('columns')[$this->input->post('order')[0]['column']]['data'].' '.$this->input->post('order')[0]['dir']);
        }
        else
        {
            $this->db->order_by('order_on asc');
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
        $this->db->from('backend_menu');
        $this->db->where('id', $this->uri->segment(4));
        $this->db->where("status <> 'D'");
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function insert()
    {
        $data['section_id'] = $this->input->post('section_id');
        $data['name'] = $this->input->post('name');
        $data['controller'] = $this->input->post('controller');
        $data['order_on'] = $this->input->post('order_on');
        $data['status'] = $this->input->post('status');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->authen->username;
        $data['updated_on'] = '0000-00-00 00:00:00';
        $data['updated_by'] = '-';
        $this->db->insert('backend_menu', $data);
    }
    
    function update()
    {
        $data['section_id'] = $this->input->post('section_id');
        $data['name'] = $this->input->post('name');
        $data['controller'] = $this->input->post('controller');
        $data['order_on'] = $this->input->post('order_on');
        $data['status'] = $this->input->post('status');
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $this->uri->segment(4));
        $this->db->where("status <> 'D'");
        $this->db->update('backend_menu', $data);
    }
    
    function delete()
    {
        $data['status'] = 'D';
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $this->uri->segment(4));
        $this->db->where("status <> 'D'");
        $this->db->update('backend_menu', $data);
    }
}