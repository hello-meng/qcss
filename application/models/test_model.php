<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Ref.: https://www.codeigniter.com/userguide3/database/query_builder.html

class test_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    function get_all()
    {
        $this->db->select('*');
        $this->db->from('test');
        $this->db->where('status <>', 'D');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
        // all: result_array
    }

    function get_by_id($id = 0)
    {
        $this->db->select('*');
        $this->db->from('test');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
        // one: row_array
    }

    function insert()
    {
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['order_on'] = $this->input->post('order_on');
        $data['status'] = $this->input->post('status');
        $data['created_on'] = date('Y-m-d H:i:s');
        $this->db->insert('test', $data);
    }

    function update($id = 0)
    {
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['order_on'] = $this->input->post('order_on');
        $data['status'] = $this->input->post('status');
        $data['updated_on'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('test', $data);
    }

    function delete($id = 0)
    {
        $data['status'] = 'D';
        $data['updated_on'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('test', $data);
    }
    
}
