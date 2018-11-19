<?php

class Admin extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('admin_model');
		$urldata = $this->uri->segment(3);
		//echo $urldata;

		if($this->session->userdata('status'))
		{
			if(in_array($urldata, url_after_login()))
			{
				redirect(base_url().'index.php/admin/admin/index');
			}

			if($this->session->userdata('userstatus')!=2)
			{
				if(in_array($urldata, for_admin()))
				{
					redirect(base_url().'index.php/admin/admin/index');
				}
			}
		}

		if(!$this->session->userdata('status'))
		{
			if(in_array($urldata, url_before_login()))
			{
				redirect(base_url().'index.php/admin/admin/logout');
			}
		}
	}

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function logout()
	{
		$this->session->unset_userdata('status');
		$this->session->sess_destroy();
		redirect(base_url().'index.php/admin/admin/login');
	}

	public function register()
	{
		$this->load->view('admin/register');
	}//register

	public function login()
	{
		$this->load->view('admin/login');

		/*if($this->session->userdata('status'))
		{
			redirect(base_url());
		}*/
	}//login

	public function password()
	{
		/*if(!$this->session->userdata('status'))
		{
			redirect(base_url().'index.php/admin/admin/login');
		}*/
		$this->load->view('admin/password_view');
	}//password

	public function password_action()
	{
		//print_r($_POST);

		$this->form_validation->set_rules('old_password','Current Password','trim|required|alpha_dash|min_length[4]|max_length[12]');

		$this->form_validation->set_rules('new_password','New Password','trim|required|alpha_dash|min_length[4]|max_length[12]');

		$this->form_validation->set_rules('confirm_password','Confirm New Password','trim|required|alpha_dash|min_length[4]|max_length[12]|matches[new_password]');

		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
				if($_POST['old_password'] == $_POST['new_password'])
				{
					echo "Current and New Password are same";
				}
				else
				{
						//$this->load->model('admin_model');
					$ans_pass = $this->admin_model->check_password(do_hash($_POST['old_password']),$this->session->userdata('email'));
					//var_dump($ans_pass);
				//	exit;
					if($ans_pass)
					{
						$ans_update = $this->admin_model->update_password(do_hash($_POST['new_password']),$this->session->userdata('email'));
					}

					if($ans_update)
					{
						echo "Password updated";
					}
					else
					{
						echo "Current password mismatch";
					}
				}
		}
		

	}//password

	function register_action()
	{
		echo "<pre>";
			print_r ($_POST);
		echo "</pre>";

		echo "<pre>";
			print_r ($_FILES);
		echo "</pre>";

				$this->form_validation->set_rules('uname','Person Name','trim|required|alpha_numeric_spaces|min_length[2]|max_length[50]');

				$this->form_validation->set_rules('umobile','Person Mobile','trim|required|integer|exact_length[10]');

				$this->form_validation->set_rules('uemail','Person Email','trim|required|valid_email|is_unique[users.uemail]');

				$this->form_validation->set_rules('upass','Password','trim|required|alpha_dash|min_length[4]|max_length[12]');

				$this->form_validation->set_rules('ucpass','Confirm Password','trim|required|alpha_dash|min_length[4]|max_length[12]|matches[upass]');
		
				if($this->form_validation->run() == FALSE)
				{
					echo validation_errors();
				}
				else
				{
					
					 $config['upload_path']      = './assets/uploads/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 500;
	                $config['max_width']            = 1024;
	                $config['max_height']           = 1024;
	                $config['remove_spaces']      	= TRUE;
	                $config['file_ext_tolower']     = TRUE;
	
	                $this->upload->initialize($config);
	
	                $path = time().$_FILES['uprofile']['name'];
	                $_FILES['uprofile']['name'] = $path;
	
	                if(!$this->upload->do_upload('uprofile'))
	                {
	                	echo $this->upload->display_errors();
	                }
	                else
	                {
	                	echo "File uploaded";
	                
	    /**************** ADD User in Database ********************************/
	                	//$this->load->model('admin_model');
	                	unset($_POST['ucpass']);
	                	$_POST['uprofile'] = $path;
	                	$_POST['upass'] = do_hash($_POST['upass']);

	                //print_r($_POST);
	                	//exit;
	               	$lastid = $this->admin_model->add_user($_POST);
	              
	      }
		}
	}

	function login_action()
	{
		// echo "<pre>";
		// 	print_r ($_POST);
		// echo "</pre>";

		$this->form_validation->set_rules('uemail','EmailID:','trim|required|valid_email');

		$this->form_validation->set_rules('upass','Password','trim|required|alpha_dash|min_length[4]|max_length[12]');


		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//$this->load->model('admin_model');
			$auth_ans = $this->admin_model->auth($_POST['uemail'],do_hash($_POST['upass']));

			if($auth_ans)
			{
				//echo "ok";
					$this->session->set_userdata('email',$_POST['uemail']);
				$this->session->set_userdata('status',true);

				$details = $this->admin_model->get_userdata($_POST['uemail']);
				// print_r($details);
				// exit;
				$this->session->set_userdata('id',$details[0]->uid);
				$this->session->set_userdata('name',$details[0]->uname);
				$this->session->set_userdata('mobile',$details[0]->umobile);
				$this->session->set_userdata('userstatus',$details[0]->ustatus);
				$this->session->set_userdata('path',$details[0]->uprofile);

				echo "done";
			}
			else
			{
				echo "Invalid Email or Password";
			}
		}
	}

	/*public function activate_user($id)
	{

	} */

	function library()
	{
		echo "TEST";
	} 
}

?>