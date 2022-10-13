<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'data_model'
		));
		$this->watermark = FCPATH . "assets/images/moh.png";
		$this->load->library('pagination');
	}


	public function create_projects($id = FALSE)

	{

		if (empty($id)) {
			$data['uptitle'] = $data['title']     = " Register Partner";
		} else {
			$data['uptitle'] = $data['title']     = " Manage Partner";
			$data['partners'] = $this->partners_mdl->get();
		}
		$data['districts'] = $this->data_model->get_district();
		$data['funders'] = $this->data_model->get_data('funder');
		$data['partners'] = $this->data_model->get_data('partners');
		$data['areas'] = $this->data_model->get_data('work_areas');
		$data['activities'] = $this->data_model->get_data('activities');
		

		$data['module'] 	= "data";
		$data['view']   	= "form";

		echo Modules::run('templates/main', $data);
	}

	public function manage_projects($id = FALSE, $csv = FALSE)

	{
		if (empty($id)) {
			$data['uptitle'] = $data['title']     = " Register";
		} else {
			$data['uptitle'] = $data['title']     = " Manage Partner";
		}
		$route = "data/manage_projects";
		$district = $this->input->post('district');
		$work_areas = $this->input->post('work_areas');

		$totals = $this->data_model->get_projects($district, $work_areas, $perPage = 0, $page = 0, $csv);
		if ($csv != 1) {
			$data['links'] = paginate($route, $totals, $perPage = 50, $segment = 3);
		}
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['datas'] = $this->data_model->get_projects($district, $work_areas, $perPage = 0, $page = 0, $csv);

		$data['module'] 	= "data";
		$data['view']   	= "list";
		echo Modules::run('templates/main', $data);
	}
	public function funders()

	{
		if (empty($id)) {
			$data['uptitle'] = $data['title']     = "Funders";
		} else {
			$data['uptitle'] = $data['title']     = " Manage Funders";
		}
		$table = "funder";
		$data['datas'] = $this->data_model->get_data($table);

		$data['module'] 	= "data";
		$data['field'] 	= "name";
		$data['label'] 	= "Funders";
		$data['view']   	= "settings/option";
		$data['action'] 	= "data/funders";

		echo Modules::run('templates/main', $data);
	}
	public function work_areas()

	{
		if (empty($id)) {
			$data['uptitle'] = $data['title']     = " Work Areas";
		} else {
			$data['uptitle'] = $data['title']     = " Manage Work Areas";
		}
		$table = "work_areas";
		$data['datas'] = $this->data_model->get_data($table);

		$data['module'] 	= "data";
		$data['field'] 	= "name";
		$data['label'] 	= "Work Areas";
		$data['view']   	= "settings/option";
		$data['action'] 	= "data/work_areas";

		echo Modules::run('templates/main', $data);
	}
	public function activities()

	{
		if (empty($id)) {
			$data['uptitle'] = $data['title']     = " Work Activities";
		} else {
			$data['uptitle'] = $data['title']     = " Manage Activities";
		}
		$table = "activities";
		$data['datas'] = $this->data_model->get_data($table);

		$data['module'] 	= "data";
		$data['field'] 	= "name";
		$data['label'] 	= "Activity";
		$data['view']   	= "settings/option";
		$data['action'] 	= "data/activities";

		echo Modules::run('templates/main', $data);
	}
	public function manage_partner()

	{
		if (empty($id)) {
			$data['uptitle'] = $data['title']     = "Partners";
		} else {
			$data['uptitle'] = $data['title']     = " Manage Partner";
		}
		$table = "activities";
		$data['datas'] = $this->data_model->get_data($table);

		$data['module'] 	= "data";
		$data['field'] 	= "name";
		$data['label'] 	= "Activity";
		$data['view']   	= "settings/option";
		$data['action'] 	= "data/activities";

		echo Modules::run('templates/main', $data);
	}
}