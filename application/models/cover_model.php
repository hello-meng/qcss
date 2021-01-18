<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cover_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_cover($code = "")
    {
        $this->db->select('*');
        $this->db->from('cover');
        $this->db->where('code',$code); //หมายถึง code='about'
        $query = $this->db->get();
        return $query->row_array();
    }
    
}
