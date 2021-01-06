<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class role_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_section()
    {
        $this->db->select('*');
        $this->db->from('backend_section');
        $this->db->where('status', 'Y');
        $this->db->order_by('order_on asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_menu()
    {
        $this->db->select('backend_menu.*, role_menu.status as authen');
        $this->db->from('backend_menu');
        $this->db->join('backend_section', 'backend_section.id = backend_menu.section_id');
        
        if($this->uri->segment(4) > 0)
        {
            $this->db->join('role_menu', 'role_menu.menu_id = backend_menu.id and role_menu.role_id = '.$this->uri->segment(4), 'left');
        }
        else
        {
            $this->db->join('role_menu', 'role_menu.menu_id = backend_menu.id and role_menu.role_id = 0', 'left');
        }

        $this->db->where('backend_menu.status', 'Y');
        $this->db->order_by('backend_menu.order_on asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function count_all()
    {
        $this->db->select('count(*) as count_rec');
		$this->db->from('role');

        $fName = @$this->input->post('columns')[0]['search']['value'];
        if($fName != "")
        {
            $this->db->where("role.name LIKE '%".$fName."%'");
        }

        $fStatus = @$this->input->post('columns')[1]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('role.status', $fStatus);
        }

        $this->db->where("role.priority > ".$this->authen->user_data['role_priority']);
        $this->db->where("role.status <> 'D'");

		$query = $this->db->get();
        $data = $query->row_array();
        return $data['count_rec'];
    }

    function get_all($start = 0, $limit = 0)
    {
        $this->db->select('role.*');
		$this->db->from('role');

        $fName = @$this->input->post('columns')[0]['search']['value'];
        if($fName != "")
        {
        	$this->db->where("role.name LIKE '%".$fName."%'");
        }

        $fStatus = @$this->input->post('columns')[1]['search']['value'];
        if($fStatus != "")
        {
        	$this->db->where('role.status', $fStatus);
        }

        $this->db->where("role.priority > ".$this->authen->user_data['role_priority']);
        $this->db->where("role.status <> 'D'");

		if(@$this->input->post('order')[0]['column'] != "" && $this->input->post('order')[0]['dir'] != "")
		{
			$this->db->order_by($this->input->post('columns')[$this->input->post('order')[0]['column']]['data'].' '.$this->input->post('order')[0]['dir']);
		}
		else
		{
			$this->db->order_by('priority asc');
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
		$this->db->from('role');
		$this->db->where('id', $this->uri->segment(4));
        $this->db->where("role.priority > ".$this->authen->user_data['role_priority']);
        $this->db->where("role.status <> 'D'");
		$query = $this->db->get();
        return $query->row_array();
    }
	
    function insert()
    {
        if($this->input->post('priority') > $this->authen->user_data['role_priority'])
        {
    		$data['name'] = $this->input->post('name');
        	$data['priority'] = $this->input->post('priority');
    		$data['status'] = $this->input->post('status');
    		$data['created_on'] = date('Y-m-d H:i:s');
    		$data['created_by'] = $this->authen->username;
    		$data['updated_on'] = '0000-00-00 00:00:00';
    		$data['updated_by'] = '-';
            $this->db->insert('role', $data);

            $role_id = $this->db->insert_id();

            $this->db->where('role_id', $role_id);
            $this->db->delete('role_menu');

            $menu = $this->get_menu();
            
            foreach ($menu as $menu_item)
            {
                if($this->input->post('menu_'.$menu_item['id']) != "")
                {
                    $data2['role_id'] = $role_id;
                    $data2['menu_id'] = $menu_item['id'];
                    $data2['status'] = $this->input->post('menu_'.$menu_item['id']);
                    $this->db->insert('role_menu', $data2);
                }
            }
        }
    }
	
	function update()
    {
        if($this->input->post('priority') > $this->authen->user_data['role_priority'])
        {
        	$data['name'] = $this->input->post('name');
        	$data['priority'] = $this->input->post('priority');
    		$data['status'] = $this->input->post('status');
    		$data['updated_on'] = date('Y-m-d H:i:s');
    		$data['updated_by'] = $this->authen->username;
    		$this->db->where('id', $this->uri->segment(4));
            $this->db->where("role.priority > ".$this->authen->user_data['role_priority']);
            $this->db->where("role.status <> 'D'");
    		$this->db->update('role', $data);

            $role = $this->get_by_id();
            if(@$role['id'] > 2)
            {
                $role_id = $role['id'];

                $this->db->where('role_id', $role_id);
                $this->db->delete('role_menu');

                $menu = $this->get_menu();
                
                foreach ($menu as $menu_item)
                {
                    if($this->input->post('menu_'.$menu_item['id']) != "")
                    {
                        $data2['role_id'] = $role_id;
                        $data2['menu_id'] = $menu_item['id'];
                        $data2['status'] = $this->input->post('menu_'.$menu_item['id']);
                        $this->db->insert('role_menu', $data2);
                    }
                }
            }
        }
    }
	
	function delete()
    {
        $data['status'] = 'D';
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
    	$this->db->where('id', $this->uri->segment(4));
        $this->db->where("role.priority > ".$this->authen->user_data['role_priority']);
        $this->db->where("role.status <> 'D'");
        $this->db->update('role', $data);
    }
}