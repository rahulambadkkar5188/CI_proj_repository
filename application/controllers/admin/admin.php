<?php

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function logout()
	{
		$this->session->unset_userdata('status');
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function register()
	{
		$this->load->view('admin/register');
	}

	public function login()
	{
		$this->load->view('admin/login');
	}

	function register_action()
	{
		echo "<pre>";
			print_r ($_POST);
		echo "</pre>";

		echo "<pre>";
			print_r ($_FILES);
		echo "</pre>";
	}

	function login_action()
	{
		echo "<pre>";
			print_r ($_POST);
		echo "</pre>";
	}
}

?>