<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Templates extends MX_Controller
{




	public function main($data)
	{
		$data['setting'] = $this->db->get('setting')->row();

		//  check_admin_access();
		if (isset($this->session->userdata('user')->name)) {
			$this->load->view('main', $data);
		} else {
			redirect('auth/login');
		}
	}
}
