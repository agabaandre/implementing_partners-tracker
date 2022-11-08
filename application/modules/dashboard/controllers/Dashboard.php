<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{


	public  function __construct()
	{
		parent::__construct();

		$this->dashmodule = "dashboard";
		$this->load->model("dashboard_mdl", 'dash_mdl');
	}

	public function index()
	{
		$data['module'] = $this->dashmodule;
		$data['title'] = "Main Dashboard";
		$data['uptitle'] = "Main Dashboard";
		$data['view'] = "home";

		echo Modules::run('templates/main', $data);
	}
	public  function dashboardData()
	{
		$data['total_records'] = $this->dash_mdl->get_reports();
		$data['monthly_submissions'] = $this->dash_mdl->get_monthly_submissions();
		$data['partners'] = $this->dash_mdl->get_partners();
		$data['locations'] = $this->dash_mdl->get_locations();
		$data['work_areas'] = $this->dash_mdl->get_work_areas();
		$data['sub_work_areas'] = $this->dash_mdl->get_sub_work_areas();

		echo json_encode($data);
	}
	public function theme_partners()
	{
		$data = $this->db->query("SELECT distinct name,id from work_areas")->result();
		foreach ($data as $row) :
			$this->attached_count_theme($row);
		endforeach;

		echo json_encode($data);
	}

	public function attached_count_theme($row)
	{
		$data = $this->db->query("SELECT count(profile_id) as count FROM partners_activities WHERE activity_id='$row->id'")->row();
		$row->count = $data;
		return $row;
	}
}
