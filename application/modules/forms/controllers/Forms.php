<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \utils\HttpUtil;

class Forms extends MX_Controller
{


	public  function __construct()
	{
		parent::__construct();
		$this->module = "forms";
		$this->load->model("Forms_mdl", 'forms_mdl');
	}

	public function index()
	{
		$data = array(
			'module' => $this->module, 'title' => "Forms",
			'uptitle' => "Forms and Fields", 'view' => "forms"
		);
		echo Modules::run('templates/main', $data);
	}
	public function partners($id = FALSE)
	{
		if (empty($id)) {
			$data['uptitle'] = $data['title']     = " Partners";
		} else {
			$data['uptitle'] = $data['title']     = " Manage Partners";
		}

		$data['partners']   = $this->partners_model->get_data('partners');

		$data['module'] = $this->module;
		$data['field'] 	= "name";
		$data['label'] 	= "Partners";
		$data['view']   = "settings/option";

		echo Modules::run('templates/main', $data);
	}
	public function sub_work_areas()
	{

		$data['uptitle'] = $data['title']     = " Sub Work Areas";
		$data['title'] = $data['title']     = " Sub Work Areas";
		$table = "sub_work_areas";
		$parent_table = "work_areas";
		$data['datas'] = $this->forms_mdl->get_data($table, $parent_table);
		$data['lists'] = $this->forms_mdl->get_parent_data($parent_table);
		$data['module'] = $this->module;
		$data['field'] 	= "name";
		$data['parent'] = "work_areas";
		$data['label'] 	= "Sub Work Areas";
		$data['label_parent'] = "Work Areas";
		$data['view']   	= "settings/option_linked";
		echo Modules::run('templates/main', $data);
	}
	public function activities()
	{

		$data['uptitle'] = $data['title']     = "Activities";
		$data['title'] = $data['title']     = "Activities";
		$table = "activities";
		$parent_table = "sub_work_areas";
		$data['datas'] = $this->forms_mdl->get_data($table, $parent_table);
		$data['lists'] = $this->forms_mdl->get_parent_data($parent_table);
		$data['module'] = $this->module;
		$data['field'] 	= "name";
		$data['parent'] = "sub_work_areas";
		$data['label'] 	= "Activities";
		$data['label_parent'] = "Work Areas";
		$data['view']   	= "settings/option_linked";
		echo Modules::run('templates/main', $data);
	}

	public function save_form_data()
	{
		$data = $this->forms_mdl->save_form_data();

		$this->session->set_flashdata('message_name', $data);
		redirect('sub_work_areas');
	}
}
