<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function count_all()
    {
        $this->db->select('count(*) as count_rec');
        $this->db->from('news');

        $fName = @$this->input->post('columns')[0]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(news.name LIKE '%".$fName."%' or news.description LIKE '%".$fName."%')");
        }

        $fStatus = @$this->input->post('columns')[1]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('news.status', $fStatus);
        }

        $this->db->where("news.status <> 'D'");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_rec'];
    }

    function get_all($start = 0, $limit = 0)
    {
        $this->db->select('news.*');
        $this->db->from('news');

        $fName = @$this->input->post('columns')[0]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(news.name LIKE '%".$fName."%' or news.description LIKE '%".$fName."%')");
        }

        $fStatus = @$this->input->post('columns')[1]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('news.status', $fStatus);
        }

        $this->db->where("news.status <> 'D'");

        if(@$this->input->post('order')[0]['column'] != "" && $this->input->post('order')[0]['dir'] != "")
        {
            $this->db->order_by($this->input->post('columns')[$this->input->post('order')[0]['column']]['data'].' '.$this->input->post('order')[0]['dir']);
        }
        else
        {
            $this->db->order_by('news.id desc');
        }

        if($limit > 0)
        {
            $this->db->limit($limit, $start);   
        }
        
        //$query = $this->db->get();
        //return $query->result_array();

        $query = $this->db->get();
        $data = $query->result_array();

        foreach($data as $key => $value)
        {
            $data[$key]['image'] = json_decode($value['image'], true);
        }

        return $data;

    }
    
    function get_by_id($id=0)
    {
        $this->db->select('news.*');
        $this->db->from('news');
        $this->db->where('news.id',$id);
        $this->db->where("news.status <> 'D'");
        $query = $this->db->get();
        //return $query->row_array();

        $data = $query->row_array();
        $data['image'] = json_decode($data['image'], true);     //set ให้ data[image] อยู่ในรูปแบบ array โดยการ Decode 
        return $data;
    }
    
    function insert()
    {
        $data['name'] = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        //$data['image'] = $this->input->post('image');

        $data['image'] = json_encode($this->input->post('image'));

        //$data['url'] = $this->input->post('url');
        //$data['order_on'] = $this->input->post('order_on');
        $data['status'] = $this->input->post('status');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->authen->username;
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = '-';
        $this->db->insert('news', $data);
    }
    
    function update($id = 0)
    {
        $data['name'] = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        //$data['image'] = $this->input->post('image');

        $data['image'] = json_encode($this->input->post('image'));

        //$data['url'] = $this->input->post('url');
        //$data['order_on'] = $this->input->post('order_on');
        $data['status'] = $this->input->post('status');
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }
    
    function delete($id = 0)
    {
        $data['status'] = 'D';
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $id);
        $this->db->where("news.status <> 'D'");
        $this->db->update('news', $data);
    }
}