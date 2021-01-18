<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class content_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_content($code = "")
    {
        $this->db->select('*');
        $this->db->from('content');
        //$this->db->where('code','about'); //หมายถึง code='about'
        $this->db->where('code',$code); //หมายถึง where code='about'
        $query = $this->db->get();
        return $query->row_array();
    }
    
}
