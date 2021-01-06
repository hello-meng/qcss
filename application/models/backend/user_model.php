<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	function check_username_exists($input)
    {
    	if(@$input['username'] == "")
    	{
    		return true;
    	}
		
		$this->db->select('count(*) as count_rec');
        $this->db->from('user');
        $this->db->where('username', $input['username']);
        $query = $this->db->get();
        $data = $query->row_array();

		if($data['count_rec'] > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function log($user_id, $action)
    {
    	$data['user_id'] = $user_id;
		$data['action'] = $action;
        $data['ip'] = @$_SERVER['REMOTE_ADDR'];
		$data['user_agent'] = @$_SERVER['HTTP_USER_AGENT'];
		$data['created_on'] = date('Y-m-d H:i:s');
        $this->db->insert('user_log', $data);
    }

    function login()
    {
		$this->db->select('user.*, role.name as role_name, role.priority as role_priority, prefix.name_en as prefix');
		$this->db->from('user');
		$this->db->join('role', 'role.id = user.role_id');
		$this->db->join('prefix', 'prefix.id = user.prefix_id');
		$this->db->where('user.username', $this->input->post('username'));
		$this->db->where('user.status', 'Y');
		$this->db->where('role.status', 'Y');
		$query = $this->db->get();
		$data = $query->row_array();

		if(@$data['id'] > 0 && $data['password'] == md5($this->input->post('password')))
		{
			$this->log($data['id'], 'login');
			return $data;
		}
		else
		{
			return false;
		}
    }

	function get_auth($role_id)
    {
    	$this->db->select('backend_menu.*, role_menu.status as authen');
        $this->db->from('role');
        $this->db->join('role_menu', 'role_menu.role_id = role.id');
        $this->db->join('backend_menu', 'role_menu.menu_id = backend_menu.id');
        $this->db->join('backend_section', 'backend_section.id = backend_menu.section_id');
        $this->db->where('backend_section.status', 'Y');
        $this->db->where('backend_menu.status', 'Y');
        $this->db->where('role.status', 'Y');
        $this->db->where('role.id', $role_id);
        $query = $this->db->get();
        $data = $query->result_array();

        $return = array();
        foreach($data as $key => $value)
        {
        	$return[$value['controller']] = $value['authen'];
        }

        return $return;
    }

    function forget_password()
    {
    	$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('user.status', 'Y');
		$query = $this->db->get();
		$data = $query->row_array();

		if(@$data['id'] > 0)
		{
			$salt = md5($this->input->post('username').'-'.$this->input->post('email').'-'.time());
			$data2['salt'] = $salt;
			$this->db->where('id', $data['id']);
			$this->db->update('user', $data2);

			return $salt;
		}
		else
		{
			return false;
		}
    }

    function get_salt($username)
    {
    	$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('user.status', 'Y');
		$query = $this->db->get();
		$data = $query->row_array();

		if(@$data['id'] > 0)
		{
			return $data['salt'];
		}
		else
		{
			return false;
		}
    }

    function reset_password()
    {
		$data['password'] = md5($this->input->post('password'));
		$data['salt'] = '';
		$data['updated_on'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->input->get('username');
		$this->db->where('username', $this->input->get('username'));
		$this->db->where('user.status', 'Y');
		$this->db->update('user', $data);
    }

    function get_role()
    {
    	$this->db->select('*');
        $this->db->from('role');
        $this->db->where("priority > ".$this->authen->user_data['role_priority']);
        $this->db->where('status', 'Y');
		$this->db->order_by('priority asc');
		$query = $this->db->get();
        return $query->result_array();
    }
	
	function get_prefix()
    {
    	$this->db->select('*, name_en as name');
        $this->db->from('prefix');
        $this->db->where('status', 'Y');
		$this->db->order_by('order_on asc');
		$query = $this->db->get();
        return $query->result_array();
    }

    function count_all()
    {
        $this->db->select('count(*) as count_rec');
		$this->db->from('user');
		$this->db->join('role', 'role.id = user.role_id');
		$this->db->join('prefix', 'prefix.id = user.prefix_id');
		
		$fRole = @$this->input->post('columns')[0]['search']['value'];
        if($fRole != "")
        {
        	$this->db->where('user.role_id', $fRole);
        }

        $fPrefix = @$this->input->post('columns')[1]['search']['value'];
        if($fPrefix != "")
        {
        	$this->db->where('user.prefix_id', $fPrefix);
        }
        
        $fFirstName = @$this->input->post('columns')[2]['search']['value'];
        if($fFirstName != "")
        {
        	$this->db->where("user.first_name LIKE '%".$fFirstName."%'");
        }
        
        $fLastName = @$this->input->post('columns')[3]['search']['value'];
        if($fLastName != "")
        {
        	$this->db->where("user.last_name LIKE '%".$fLastName."%'");
        }

        $fStatus = @$this->input->post('columns')[4]['search']['value'];
        if($fStatus != "")
        {
        	$this->db->where('user.status', $fStatus);
        }

        $this->db->where("role.priority > ".$this->authen->user_data['role_priority']);
        $this->db->where("user.status <> 'D'");

		$query = $this->db->get();
        $data = $query->row_array();
        return $data['count_rec'];
    }

    function get_all($start = 0, $limit = 0)
    {
        $this->db->select('user.*, role.name as role_name, prefix.name_en as prefix');
		$this->db->from('user');
		$this->db->join('role', 'role.id = user.role_id');
		$this->db->join('prefix', 'prefix.id = user.prefix_id');

        $fRole = @$this->input->post('columns')[0]['search']['value'];
        if($fRole != "")
        {
        	$this->db->where('user.role_id', $fRole);
        }

        $fPrefix = @$this->input->post('columns')[1]['search']['value'];
        if($fPrefix != "")
        {
        	$this->db->where('user.prefix_id', $fPrefix);
        }
        
        $fFirstName = @$this->input->post('columns')[2]['search']['value'];
        if($fFirstName != "")
        {
        	$this->db->where("user.first_name LIKE '%".$fFirstName."%'");
        }
        
        $fLastName = @$this->input->post('columns')[3]['search']['value'];
        if($fLastName != "")
        {
        	$this->db->where("user.last_name LIKE '%".$fLastName."%'");
        }

        $fStatus = @$this->input->post('columns')[4]['search']['value'];
        if($fStatus != "")
        {
        	$this->db->where('user.status', $fStatus);
        }

		$this->db->where("role.priority > ".$this->authen->user_data['role_priority']);
        $this->db->where("user.status <> 'D'");

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
        $this->db->select('user.*');
		$this->db->from('user');
		$this->db->join('role', 'role.id = user.role_id');
		$this->db->where("role.priority > ".$this->authen->user_data['role_priority']);
        $this->db->where("user.status <> 'D'");
		$this->db->where('user.id = '.$this->uri->segment(4));
		$query = $this->db->get();
        return $query->row_array();
    }
	
	function get_profile()
    {
    	$this->db->select('user.*, role.name as role_name, role.priority as role_priority, prefix.name_en as prefix');
		$this->db->from('user');
		$this->db->join('role', 'role.id = user.role_id');
		$this->db->join('prefix', 'prefix.id = user.prefix_id');
		$this->db->where('user.id', $this->authen->id);
		$this->db->where('user.status', 'Y');
		$query = $this->db->get();
        return $query->row_array();
    }

    function last_id()
	{
        $this->db->select('max(id) as id');
		$this->db->from('user');
		$this->db->where('created_by', $this->authen->username);
		$query = $this->db->get();
		$data = $query->row_array();
		return $data['id'];
	}
	
    function insert()
    {
    	$this->db->select('*');
        $this->db->from('role');
        $this->db->where("priority > ".$this->authen->user_data['role_priority']);
        $this->db->where('id', $this->input->post('role_id'));
        $this->db->where('status', 'Y');
		$query = $this->db->get();
        $check_role = $query->row_array();

        if($check_role['id'] > 0)
        {
			$data['role_id'] = $this->input->post('role_id');
			$data['username'] = $this->input->post('username');
	        $data['password'] = md5($this->input->post('password'));
			$data['prefix_id'] = $this->input->post('prefix_id');
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['email'] = $this->input->post('email');
			$data['telephone'] = $this->input->post('telephone');
			$data['salt'] = '';
			$data['status'] = $this->input->post('status');
			$data['created_on'] = date('Y-m-d H:i:s');
			$data['created_by'] = $this->authen->username;
			$data['updated_on'] = '0000-00-00 00:00:00';
			$data['updated_by'] = '-';
	        $this->db->insert('user', $data);
	    }
    }
	
	function update()
    {
    	$this->db->select('user.*');
		$this->db->from('user');
		$this->db->join('role', 'role.id = user.role_id');
		$this->db->where("role.priority > ".$this->authen->user_data['role_priority']);
		$this->db->where('user.id = '.$this->uri->segment(4));
        $this->db->where("user.status <> 'D'");
		$query = $this->db->get();
        $check_data = $query->row_array();

        if(@$check_data['id'] > 0)
        {
			$data['role_id'] = $this->input->post('role_id');

			if($this->input->post('password')!="")
			{
				$data['password'] = md5($this->input->post('password'));
			}

			$data['prefix_id'] = $this->input->post('prefix_id');
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['email'] = $this->input->post('email');
			$data['telephone'] = $this->input->post('telephone');
			$data['status'] = $this->input->post('status');
			$data['updated_on'] = date('Y-m-d H:i:s');
			$data['updated_by'] = $this->authen->username;
			$this->db->where('id', $this->uri->segment(4));
        	$this->db->where("user.status <> 'D'");
			$this->db->update('user', $data);
		}
    }

	function update_profile()
    {
		if($this->input->post('password')!="")
		{
			$data['password'] = md5($this->input->post('password'));
		}

		$data['prefix_id'] = $this->input->post('prefix_id');
		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['email'] = $this->input->post('email');
		$data['telephone'] = $this->input->post('telephone');
		$data['updated_on'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $this->authen->username;
		$this->db->where('id', $this->authen->id);
        $this->db->where('status', 'Y');
		$this->db->update('user', $data);
    }
	
	function delete()
    {
    	$this->db->select('user.*');
		$this->db->from('user');
		$this->db->join('role', 'role.id = user.role_id');
		$this->db->where("role.priority > ".$this->authen->user_data['role_priority']);
		$this->db->where('user.id = '.$this->uri->segment(4));
        $this->db->where("user.status <> 'D'");
		$query = $this->db->get();
        $check_data = $query->row_array();

        if(@$check_data['id'] > 0)
        {
        	$data['status'] = 'D';
        	$data['updated_on'] = date('Y-m-d H:i:s');
			$data['updated_by'] = $this->authen->username;
			$this->db->where('id', $this->uri->segment(4));
			$this->db->update('user', $data);
		}
    }
}