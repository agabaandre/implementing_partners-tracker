<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partners extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'partners_model'
		));
		$this->watermark = FCPATH . "assets/images/moh.png";
		$this->load->library('pagination');
	}


	public function partners_profile($id = FALSE)

	{

		if (empty($id)) {
			$data['uptitle'] = $data['title']     = " Register Partner";
		} else {
			$data['uptitle'] = $data['title']     = " Manage Partner";
			$data['partners'] = $this->partners_mdl->get();
		}
		$data['districts'] = $this->partners_model->get_district();
		$data['funders'] = $this->partners_model->get_data('funder');
		$data['partners'] = $this->partners_model->get_data('partners');
		$data['areas'] = $this->partners_model->get_data('work_areas');
		$data['activities'] = $this->partners_model->get_data('activities');


		$data['module'] 	= "partners";
		$data['view']   	= "activities";

		echo Modules::run('templates/main', $data);
	}

	public function manage_partners($id = FALSE, $csv = FALSE)

	{
		if (empty($id)) {
			$data['uptitle'] = $data['title']     = " Register";
		} else {
			$data['uptitle'] = $data['title']     = " Manage Partner";
		}
		$route = "data/manage_partners";
		$district = $this->input->post('district');
		$work_areas = $this->input->post('work_areas');

		$totals = $this->partners_model->get_projects($district, $work_areas, $perPage = 0, $page = 0, $csv);
		if ($csv != 1) {
			$data['links'] = paginate($route, $totals, $perPage = 50, $segment = 3);
		}
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['datas'] = $this->partners_model->get_projects($district, $work_areas, $perPage = 0, $page = 0, $csv);

		$data['module'] 	= "partners";
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
		$data['datas'] = $this->partners_model->get_data($table);

		$data['module'] 	= "partners";
		$data['field'] 	= "name";
		$data['label'] 	= "Funders";
		$data['view']   	= "settings/option";
		$data['action'] 	= "data/funders";

		echo Modules::run('templates/main', $data);
	}
	public function partners()

	{
		if (empty($id)) {
			$data['uptitle'] = $data['title']     = "Partners";
		} else {
			$data['uptitle'] = $data['title']     = " Manage Partners";
		}
		$table = "partners";
		$data['datas'] = $this->partners_model->get_data($table);

		$data['module'] 	= "partners";
		$data['field'] 	= "name";
		$data['label'] 	= "Partners";
		$data['view']   	= "settings/option";
		$data['action'] 	= "data/partners";

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
		$data['datas'] = $this->partners_model->get_data($table);

		$data['module'] 	= "partners";
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
		$data['districts'] = $this->partners_model->get_district();
		$data['funders'] = $this->partners_model->get_data('funder');
		$data['partners'] = $this->partners_model->get_data('partners');
		$data['areas'] = $this->partners_model->get_data('work_areas');
		$data['activities'] = $this->partners_model->get_data('activities');
		$table = "activities";
		$data['module'] 	= "partners";
		$data['field'] 	= "name";
		$data['label'] 	= "Activity";
		$data['view'] = "form";


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
		$data['datas'] = $this->partners_model->get_data($table);

		$data['module'] 	= "partners";
		$data['field'] 	= "name";
		$data['label'] 	= "Activity";
		$data['view']   	= "settings/option";
		$data['action'] 	= "data/activities";

		echo Modules::run('templates/main', $data);
	}
	public function get_subthme()
	{

		if (!empty($_GET['subtheme'])) {

			$id = urldecode($_GET["subtheme"]);


			$sql = "SELECT DISTINCT id,name,work_area_id FROM sub_work_areas WHERE work_area_id = '$id' ORDER BY name ASC";

			$subtheme = $this->db->query($sql)->result();

			$opt = "<option value=''>Select Subtheme</option>";

			if (!empty($subtheme)) {

				foreach ($subtheme as $sub) {
					$opt .= "<option value='" . $sub->id .  "'>" . ucwords($sub->name) . "</option>";
				}
			}

			echo $opt;
		}
	}
	public function get_activities()
	{

		if (!empty($_GET['activities'])) {

			$id = urldecode($_GET["activities"]);


			$sql = "SELECT DISTINCT name,sub_work_areas_id FROM activities WHERE sub_work_areas_id = '$id' ORDER BY name ASC";

			$activities = $this->db->query($sql)->result();

			$opt = "<option value=''>Select Activities</option>";

			if (!empty($activities)) {

				foreach ($activities as $act) {
					$opt .= "<option value='" . $act->id .  "'>" . ucwords($act->name) . "</option>";
				}
			}

			echo $opt;
		}
	}
	public function create_partner()
	{
		$data = $this->input->post();
		$data['msg'] = $this->partners_model->create_partner($data);

		$data['districts'] = $this->partners_model->get_district();
		$data['funders'] = $this->partners_model->get_data('funder');
		$data['partners'] = $this->partners_model->get_data('partners');
		$data['areas'] = $this->partners_model->get_data('work_areas');
		$data['activities'] = $this->partners_model->get_data('activities');


		$data['module'] 	= "partners";
		$data['view']   	= "form";
		print_r($data['district']);

		echo Modules::run('templates/main', $data);
		// 
	}
}
