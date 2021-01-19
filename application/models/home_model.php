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
        //$this->db->select('*,DATEDIFF(news.created_on, DATE_ADD(news.created_on, INTERVAL 7 DAY)) as day_create');
        $this->db->select('*');
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
        //$this->db->select('product.*, brand.name as brand, model.name as model, year.name as year,DATEDIFF(product.created_on, DATE_ADD(product.created_on, INTERVAL 7 DAY)) as day_create');
        $this->db->select('product.*, brand.name as brand, model.name as model, year.name as year');
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
