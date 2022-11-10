<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends MX_Controller
{


	public function __Construct()
	{

		parent::__Construct();

		$this->load->model('settings_mdl', 'settingsmodel');
		$this->user = $this->session->get_userdata();
	}


	public function index()
	{
		$data['title'] = "Settings - Constants & Variables";
		$data['uptitle'] = "Constants & Variables";
		$data['module'] = 'svariables';
		$data['view'] = "variables";
		$postdata = $this->input->post();
		if ($this->input->post('language')) {
			$data['message'] = $this->settingsmodel->update_variables($postdata);
		}
		echo Modules::run('templates/main', $data);
	}
	public function getSettings()
	{
		return $this->settingsmodel->getSettings();
	}
	public function readLogs()
	{
		$myfile = fopen("log.txt", "r") or die("Unable to open file!");

		return fread($myfile, filesize("log.txt"));
	}
	public function logs()
	{
		$data['title'] = "Biotime & System Logs";
		$data['uptitle'] = "Biotime & System Logs";
		$data['module'] = 'svariables';
		$data['view'] = "logs";
		echo Modules::run('templates/main', $data);
	}
}
