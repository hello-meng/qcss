<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class about_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_content()
    {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('code','about'); //หมายถึง code='about'
        $query = $this->db->get();
        return $query->row_array();
    }
    
}
