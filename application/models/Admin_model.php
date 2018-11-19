<?php
	class Admin_model extends CI_Model
	{
		function add_user($data)
		{
			$result = $this->db->insert("users",$data);
			//print_r($result);

			return $this->db->insert_id();
		}

		function user_activation_process($id)
		{
			$arr = array(
              "ustatus" => 1
			);

			$this->db->where("uid",$id);
			$this->db->update("users",$arr);
			return true;
		}

		function auth($email,$pass)
		{
			//echo $email;
			//echo $pass;
			// $ans = $this->db->get_where("users",array("uemail"=>$email))->result();

			 $ans = $this->db->select('upass')->get_where("users",array("uemail"=>$email))->result_array();

			 if(count($ans)>0)
			 {
			 	$dbpass = $ans[0]['upass'];

			 	if($dbpass != $pass)
			 	{
			 		return false;
			 	}
			 	else
			 	{
			 		return true;
			 	}
			 }
			 else
			 {
			 	return false;
			 }
		}

		function check_password($pass,$email)
		{
// 			echo $pass;
// 			echo $email;
// exit;
			$ans = $this->db->select('upass')->get_where("users",array("uemail"=>$email))->result_array();

			//print_r($ans);

			$dbpass = $ans[0]['upass'];
			//echo $dbpass;

			if($dbpass==$pass)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function update_password($pass,$email)
		{
			 /*echo $email;
			echo $pass;
			exit;*/
			$data = array(
				"upass"=> $pass
			);

			$this->db->where("uemail",$email);
			return $this->db->update("users",$data);

		}//update_password

		function get_userdata($email)
		{
			 //$ans = $this->db->select('uname,uemail,umobile,ustatus,uprofile')->get_where("users",array("uemail"=>$email))->result_object();

			 $ans = $this->db->select("uid,uname,uemail,umobile,ustatus,uprofile");

			 return $this->db->get_where("users",array("uemail"=>$email))->result();

		}
	}//Admin_model
?>