<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    //get brand
    function get_brand()
    {
        $this->db->select('*');
        $this->db->from('brand');
        $this->db->where('status', 'Y');
        $this->db->order_by('order_on asc');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    //get model
    function get_model()
    {
        $this->db->select('*');
        $this->db->from('model');
        $this->db->where('status', 'Y');
        $this->db->order_by('order_on asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //get year
    function get_year()
    {
        $this->db->select('*');
        $this->db->from('year');
        $this->db->where('status', 'Y');
        $this->db->order_by('order_on desc');
        $query = $this->db->get();
        return $query->result_array();
    }    
    
    function count_all()
    {
        $this->db->select('count(*) as count_rec');
        $this->db->from('product');

        //brand
        $fBrand = @$this->input->post('columns')[0]['search']['value'];
        if($fBrand != "")
        {
            $this->db->where('product.brand_id', $fBrand);
        }

        //model
        $fModel = @$this->input->post('columns')[1]['search']['value'];
        if($fModel != "")
        {
            $this->db->where('product.model_id', $fModel);
        }

        //year
        $fYear = @$this->input->post('columns')[2]['search']['value'];
        if($fYear != "")
        {
            $this->db->where('product.year_id', $fYear);
        }

        $fName = @$this->input->post('columns')[3]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(product.description LIKE '%".$fName."%' )");
        }

        $fStatus = @$this->input->post('columns')[4]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('product.status', $fStatus);
        }

        $this->db->where("product.status <> 'D'");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_rec'];
    }

    function get_all($start = 0, $limit = 0)
    {
        $this->db->select('product.*, brand.name as brand, model.name as model, year.name as year');
        $this->db->from('product');
        $this->db->join('brand', 'brand.id = product.brand_id');
        $this->db->join('model', 'model.id = product.model_id');
        $this->db->join('year', 'year.id = product.year_id');

        //brand
        $fBrand = @$this->input->post('columns')[0]['search']['value'];
        if($fBrand != "")
        {
            $this->db->where('product.brand_id', $fBrand);
        }

        //model
        $fModel = @$this->input->post('columns')[1]['search']['value'];
        if($fModel != "")
        {
            $this->db->where('product.model_id', $fModel);
        }
        
        //year
        $fYear = @$this->input->post('columns')[2]['search']['value'];
        if($fYear != "")
        {
            $this->db->where('product.year_id', $fYear);
        }        
        
        $fStatus = @$this->input->post('columns')[4]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('product.status', $fStatus);
        }

        $this->db->where("product.status <> 'D'");

        if(@$this->input->post('order')[0]['column'] != "" && $this->input->post('order')[0]['dir'] != "")
        {
            $this->db->order_by($this->input->post('columns')[$this->input->post('order')[0]['column']]['data'].' '.$this->input->post('order')[0]['dir']);
        }
        else
        {
            $this->db->order_by('product.order_on asc');
        }

        if($limit > 0)
        {
            $this->db->limit($limit, $start);   
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_by_id($id = 0)
    {
        $this->db->select('product.*');
        $this->db->from('product');
        $this->db->where('product.id', $id);
        $this->db->where("product.status <> 'D'");
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function insert()
    {
        $data['brand_id'] = $this->input->post('brand_id');
        $data['model_id'] = $this->input->post('model_id');
        $data['year_id'] = $this->input->post('year_id');
        $data['description'] = $this->input->post('description');
        $data['image'] = $this->input->post('image');
        $data['price'] = $this->input->post('price');
        //$data['url'] = $this->input->post('url');
        //$data['order_on'] = $this->input->post('order_on');
        $data['status'] = $this->input->post('status');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->authen->username;
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = '-';
        $this->db->insert('product', $data);
    }
    
    function update($id = 0)
    {
        $data['brand_id'] = $this->input->post('brand_id');
        $data['model_id'] = $this->input->post('model_id');
        $data['year_id'] = $this->input->post('year_id');
        $data['description'] = $this->input->post('description');
        $data['image'] = $this->input->post('image');
        $data['price'] = $this->input->post('price');
        //$data['url'] = $this->input->post('url');
        //$data['order_on'] = $this->input->post('order_on');
        $data['status'] = $this->input->post('status');
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $id);
        $this->db->update('product', $data);
    }
    
    function delete($id = 0)
    {
        $data['status'] = 'D';
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $id);
        $this->db->where("product.status <> 'D'");
        $this->db->update('product', $data);
    }
}