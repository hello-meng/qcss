<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function count_all()
    {
        $this->db->select('count(*) as count_rec');
		$this->db->from('config');

        $fName = @$this->input->post('columns')[0]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(config.name_th LIKE '%".$fName."%' or config.name_en LIKE '%".$fName."%')");
        }

        $this->db->where('config.type', 'S');
        $this->db->where('config.status', 'Y');

		$query = $this->db->get();
        $data = $query->row_array();
        return $data['count_rec'];
    }

    function get_all($start = 0, $limit = 0)
    {
        $this->db->select('config.*');
		$this->db->from('config');

        $fName = @$this->input->post('columns')[0]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(config.name_th LIKE '%".$fName."%' or config.name_en LIKE '%".$fName."%')");
        }

        $this->db->where('config.type', 'S');
        $this->db->where('config.status', 'Y');

		if(@$this->input->post('order')[0]['column'] != "" && $this->input->post('order')[0]['dir'] != "")
		{
			$this->db->order_by($this->input->post('columns')[$this->input->post('order')[0]['column']]['data'].' '.$this->input->post('order')[0]['dir']);
		}
		else
		{
			$this->db->order_by('id asc');
		}

		if($limit > 0)
		{
			$this->db->limit($limit, $start);	
		}
		
		$query = $this->db->get();
        return $query->result_array();
    }
	
	function get_by_id()
    {
        $this->db->select('*');
		$this->db->from('config');
		$this->db->where('id', $this->uri->segment(4));
        $this->db->where('config.type', 'S');
        $this->db->where('config.status', 'Y');
		$query = $this->db->get();
        return $query->row_array();
    }
	
	function update()
    {
    	$data['value'] = $this->input->post('value');
        $data['updated_on'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->authen->username;
		$this->db->where('id', $this->uri->segment(4));
        $this->db->where('config.type', 'S');
        $this->db->where('config.status', 'Y');
		$this->db->update('config', $data);
    }
}