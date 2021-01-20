<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class car_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_brand()
    {
        $this->db->select('*');
        $this->db->from('brand');
        //$this->db->order_by('id', 'desc');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_model()
    {
        $this->db->select('*');
        $this->db->from('model');
        //$this->db->order_by('id', 'desc');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_year()
    {
        $this->db->select('*');
        $this->db->from('year');
        $this->db->order_by('name', 'desc');

        $query = $this->db->get();
        return $query->result_array();
    }

    function count_all($fBrand="",$fModel="",$fYear="")
    {
        $this->db->select('count(*) as count_rec');
        $this->db->from('product');
        $this->db->join('brand', 'brand.id = product.brand_id');
        $this->db->join('model', 'model.id = product.model_id');
        $this->db->join('year', 'year.id = product.year_id');   
        $this->db->where("product.status <> 'D'");
        //$this->db->where("product.id = '3'");

        //brand
        if($fBrand != "")
        {
            $this->db->where('product.brand_id', $fBrand);
        }

        //model
        if($fModel != "")
        {
            $this->db->where('product.model_id', $fModel);
        }
        
        //year
        if($fYear != "")
        {
            $this->db->where('product.year_id', $fYear);
        }  

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_rec'];
    }

    function get_all($fBrand="",$fModel="",$fYear="")
    {
        $this->db->select('product.*,brand.name,brand.image as brand_image,model.name as model_name,year.name as year_name');
        $this->db->from('product');
        $this->db->join('brand', 'brand.id = product.brand_id');
        $this->db->join('model', 'model.id = product.model_id');
        $this->db->join('year', 'year.id = product.year_id');      
        $this->db->where("product.status <> 'D'");
        //$this->db->where("product.id = '3'");

        //brand
        //$fBrand = @$this->input->post('fBrand');
        if($fBrand != "")
        {
            $this->db->where('product.brand_id', $fBrand);
        }

        //model
        if($fModel != "")
        {
            $this->db->where('product.model_id', $fModel);
        }
        
        //year
        if($fYear != "")
        {
            $this->db->where('product.year_id', $fYear);
        }   

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_by_id($id=0)
    {
        // $this->db->select('product.*');
        // $this->db->from('product');
        // $this->db->where('product.id', $id);
        // $this->db->where("product.status <> 'D'");

        $this->db->select('product.*,brand.name,brand.image as brand_image,model.name as model_name,year.name as year_name');
        $this->db->from('product');
        $this->db->join('brand', 'brand.id = product.brand_id');
        $this->db->join('model', 'model.id = product.model_id');
        $this->db->join('year', 'year.id = product.year_id');
        $this->db->where('product.id', $id);      
        $this->db->where("product.status <> 'D'");

        $query = $this->db->get();
        return $query->row_array();
    }
}
