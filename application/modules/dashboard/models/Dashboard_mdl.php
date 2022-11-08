<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_mdl extends CI_Model
{


    public function __Construct()
    {

        parent::__Construct();
    }
    public function get_reports()
    {
        return  $this->db->get('partners_reports')->num_rows();
    }
    public function get_monthly_submissions()
    {
        $month = date('Y-m');

        return $query = $this->db->query("SELECT * from partners_reports where date like'$month%'")->num_rows();
    }
    public function get_partners()
    {
        return  $this->db->get('partners')->num_rows();
    }
    public function get_locations()
    {
        return  $this->db->get('partners')->num_rows();
    }

    public function get_work_areas()
    {
        return  $this->db->get('work_areas')->num_rows();
    }
    public function get_sub_work_areas()
    {
        return  $this->db->get('activities')->num_rows();
    }
}
