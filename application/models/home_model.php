<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_banner()
    {
        $this->db->select('*');
        $this->db->from('banner');
        $this->db->where('status', 'Y');
        $query = $this->db->get();
        return $query->result_array();
        // all: result_array
    }

    function get_news()
    {
        //$this->db->select('*');
        $this->db->select('*,ABS(DATEDIFF(news.created_on, NOW())) as day_create');        
        $this->db->from('news');
        $this->db->where('status', 'Y');
        $this->db->order_by('id', 'desc');
        $this->db->limit(2);
        $query = $this->db->get();
        return $query->result_array();
        // all: result_array
    }

    function get_product()
    {
        //$this->db->select('product.*, brand.name as brand, model.name as model, year.name as year');
        $this->db->select('product.*, brand.name as brand, model.name as model, year.name as year,ABS(DATEDIFF(product.created_on, NOW())) as day_create');
        $this->db->from('product');
        $this->db->join('brand', 'brand.id = product.brand_id');
        $this->db->join('model', 'model.id = product.model_id');
        $this->db->join('year', 'year.id = product.year_id');
        $this->db->where('product.status', 'Y');
        $this->db->order_by('product.id', 'desc');
        $this->db->limit(10);  
        $query = $this->db->get();
        return $query->result_array();
        // all: result_array
    }
    
}
