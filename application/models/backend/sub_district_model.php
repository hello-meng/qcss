<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sub_district_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_region()
    {
        $this->db->select('*');
        $this->db->from('region');
        $this->db->where('status', 'Y');
        $this->db->order_by('name_th asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_province($region_id)
    {
        $this->db->select('*');
        $this->db->from('province');
        $this->db->where('status', 'Y');
        $this->db->where('region_id', $region_id);
        $this->db->order_by('name_th asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_district($province_id)
    {
        $this->db->select('*');
        $this->db->from('district');
        $this->db->where('status', 'Y');
        $this->db->where('province_id', $province_id);
        $this->db->order_by('name_th asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function count_all()
    {
        $this->db->select('count(*) as count_rec');
        $this->db->from('sub_district');
        $this->db->join('district', 'district.id = sub_district.district_id');
        $this->db->join('province', 'province.id = district.province_id');
        $this->db->join('region', 'region.id = province.region_id');
        
        $fRegion = @$this->input->post('columns')[0]['search']['value'];
        if($fRegion != "")
        {
            $this->db->where('province.region_id', $fRegion);
        }

        $fProvince = @$this->input->post('columns')[1]['search']['value'];
        if($fProvince != "")
        {
            $this->db->where('district.province_id', $fProvince);
        }

        $fDistrict = @$this->input->post('columns')[2]['search']['value'];
        if($fDistrict != "")
        {
            $this->db->where('sub_district.district_id', $fDistrict);
        }

        $fName = @$this->input->post('columns')[3]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(sub_district.name_th LIKE '%".$fName."%' or sub_district.name_en LIKE '%".$fName."%')");
        }

        $fStatus = @$this->input->post('columns')[4]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('sub_district.status', $fStatus);
        }

        $this->db->where("sub_district.status <> 'D'");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_rec'];
    }

    function get_all($start = 0, $limit = 0)
    {
        $this->db->select('sub_district.*, region.name_th as region, province.name_th as province, district.name_th as district');
        $this->db->from('sub_district');
        $this->db->join('district', 'district.id = sub_district.district_id');
        $this->db->join('province', 'province.id = district.province_id');
        $this->db->join('region', 'region.id = province.region_id');

        $fRegion = @$this->input->post('columns')[0]['search']['value'];
        if($fRegion != "")
        {
            $this->db->where('province.region_id', $fRegion);
        }

        $fProvince = @$this->input->post('columns')[1]['search']['value'];
        if($fProvince != "")
        {
            $this->db->where('district.province_id', $fProvince);
        }

        $fDistrict = @$this->input->post('columns')[2]['search']['value'];
        if($fDistrict != "")
        {
            $this->db->where('sub_district.district_id', $fDistrict);
        }

        $fName = @$this->input->post('columns')[3]['search']['value'];
        if($fName != "")
        {
            $this->db->where("(sub_district.name_th LIKE '%".$fName."%' or sub_district.name_en LIKE '%".$fName."%')");
        }

        $fStatus = @$this->input->post('columns')[4]['search']['value'];
        if($fStatus != "")
        {
            $this->db->where('sub_district.status', $fStatus);
        }

        $this->db->where("sub_district.status <> 'D'");

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
        $this->db->select('sub_district.*, district.province_id, province.region_id');
        $this->db->from('sub_district');
        $this->db->join('district', 'district.id = sub_district.district_id');
        $this->db->join('province', 'province.id = district.province_id');
        $this->db->where('sub_district.id', $this->uri->segment(4));
        $this->db->where("sub_district.status <> 'D'");
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function insert()
    {
        $data['district_id'] = $this->input->post('district_id');
        $data['code'] = $this->input->post('code');
        $data['name_th'] = $this->input->post('name_th');
        $data['name_en'] = $this->input->post('name_en');
        $data['postcode'] = $this->input->post('postcode');
        $data['lat'] = $this->input->post('lat');
        $data['lng'] = $this->input->post('lng');
        $data['status'] = $this->input->post('status');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->authen->username;
        $data['updated_on'] = '0000-00-00 00:00:00';
        $data['updated_by'] = '-';
        $this->db->insert('sub_district', $data);
    }
    
    function update()
    {
        $data['district_id'] = $this->input->post('district_id');
        $data['code'] = $this->input->post('code');
        $data['name_th'] = $this->input->post('name_th');
        $data['name_en'] = $this->input->post('name_en');
        $data['postcode'] = $this->input->post('postcode');
        $data['lat'] = $this->input->post('lat');
        $data['lng'] = $this->input->post('lng');
        $data['status'] = $this->input->post('status');
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $this->uri->segment(4));
        $this->db->where("status <> 'D'");
        $this->db->update('sub_district', $data);
    }
    
    function delete()
    {
        $data['status'] = 'D';
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->authen->username;
        $this->db->where('id', $this->uri->segment(4));
        $this->db->where("status <> 'D'");
        $this->db->update('sub_district', $data);
    }
}