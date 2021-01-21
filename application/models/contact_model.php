<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_cover()
    {
        $this->db->select('*');
        $this->db->from('cover');
        $this->db->where('code','contact'); //หมายถึง code='about'
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_content($code = "")
    {
        $this->db->select('*');
        $this->db->from('content');
        //$this->db->where('code','about'); //หมายถึง code='about'
        $this->db->where('code','contact'); //หมายถึง where code='about'
        $query = $this->db->get();
        return $query->row_array();
    }

    function insert()
    {
        $data['name'] = $this->input->post('name');
        $data['telephone'] = $this->input->post('telephone');
        $data['email'] = $this->input->post('email');
        $data['message'] = $this->input->post('message');
        $data['created_on'] = date('Y-m-d H:i:s');
        $this->db->insert('contact', $data);
    }

}
