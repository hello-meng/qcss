<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('status', 'Y');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
        // all: result_array
    }

    function get_by_id($id = 0)
    {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
        // one: row_array
    }
    
}
