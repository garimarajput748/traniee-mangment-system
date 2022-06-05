<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->model('user_model');
		$this->load->model('trainee_model');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
	}


	public function index()
	{
		$this->student_details();
	}

	public function student_profile()
	{
		$stu_profile_sess = $this->session->userdata();
		$get['user_data'] = $this->dashboard_model->get_data($stu_profile_sess['id']);
		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('profile/student_profile', $get);
		$this->load->view('dashboard/dashboard_footer_view');
	}

	public function mentor_profile()
	{

		$mentor_profile_sess = $this->session->userdata();
		$get['user_data'] = $this->dashboard_model->get_mentor_data($mentor_profile_sess['id']);

		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('profile/mentor_profile', $get);
		$this->load->view('dashboard/dashboard_footer_view');
	}

	public function user_profile()
	{

		$uni_profile_sess = $this->session->userdata();
		$get['user_data'] = $this->dashboard_model->get_uni_data($uni_profile_sess['id']);

		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('profile/user_profile', $get);
		$this->load->view('dashboard/dashboard_footer_view');
	}

	public function mentor_dashboard()
	{

		$session_data_mentor = $this->session->userdata();
		$get['user_data'] = $this->dashboard_model->get_mentor_data($session_data_mentor['id']);

		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('dashboard/dashboard_view_mentor', $get);
		$this->load->view('dashboard/dashboard_footer_view');
	}

	public function admin_dashboard()
	{

		$session_data_uni = $this->session->userdata();
		$get['user_data'] = $this->user_model->list_user($session_data_uni['id']);

		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('dashboard/dashboard_view_super_admin', $get);
		$this->load->view('dashboard/dashboard_footer_view');
	}
	public function student_details()
	{

		$session_data_student = $this->session->userdata();
		$get['user_data'] = $this->dashboard_model->get_data($session_data_student['id']);

		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('dashboard/dashboard_view_student', $get);
		$this->load->view('dashboard/dashboard_footer_view');
		// print_r($get);
		//  $this->load->view('pages/success', $get);
	}

	public function dash_student_details()
	{
		$session_details = $this->session->userdata();
		if ($this->input->post('dash_submit')) {

			$dash_dob = $this->input->post('dash_dob');
			$dash_gender = $this->input->post('dash_gender');
			$dash_city = $this->input->post('dash_city');
			$dash_state = $this->input->post('dash_state');
			$dash_zip = $this->input->post('dash_zip');
			$dash_country = $this->input->post('dash_country');
			$dash_course = $this->input->post('dash_course');
			$dash_yop = $this->input->post('dash_yop');
			$dash_marks = $this->input->post('dash_marks');
			$dash_college = $this->input->post('dash_college');


			$data = array(
				'id' => $session_details['id'],
				'email' => $session_details['email'],
				'dob' => $dash_dob,
				'gender' => $dash_gender,
				'city' => $dash_city,
				'state' => $dash_state,
				'postal' => $dash_zip,
				'country' => $dash_country,
				'course' => $dash_course,
				'yop' => $dash_yop,
				'marks' => $dash_marks,
				'college' => $dash_college,
			);

			// $id = $session_details['id'];

			$result = $this->dashboard_model->insert_student_data($data);
			// print_r($data);
			redirect("dashboard_controller/", 'refresh');
		} else if ($this->input->post('dash_update')) {
			$up_city = $this->input->post('dash_city');
			$up_state = $this->input->post('dash_state');
			$up_zip = $this->input->post('dash_zip');
			$up_country = $this->input->post('dash_country');
			$up_college = $this->input->post('dash_college');


			$updated_data = array(
				'city' => $up_city,
				'state' => $up_state,
				'postal' => $up_zip,
				'country' => $up_country,
				'college' => $up_college
			);

			$id = $session_details['id'];
			//print_r($updated_data);
			$up_result = $this->dashboard_model->update_data($updated_data, $id);

			redirect("dashboard_controller/", 'refresh');
		} else {

			echo "<script>window.alert('Oops! Something Went Wrong!');</script>";
		}
	}


	public function dash_uni_details()
	{

		$session_uni = $this->session->userdata();

		if ($this->input->post('uni_submit')) {
			$uni_found = $this->input->post('uni_found');
			$college1 = $this->input->post('college1');
			$seats1 = $this->input->post('seats1');
			$college2 = $this->input->post('college2');
			$seats2 = $this->input->post('seats2');
			$college3 = $this->input->post('college3');
			$seats3 = $this->input->post('seats3');
			$college4 = $this->input->post('college4');
			$seats4 = $this->input->post('seats4');
			$college5 = $this->input->post('college5');
			$seats5 = $this->input->post('seats5');
			$uni_reg = $this->input->post('uni_reg');


			$uni_data = array(
				'id' => $session_uni['id'],
				'email' => $session_uni['email'],
				'founder_day' => $uni_found,
				'college1' => $college1,
				'seats1' => $seats1,
				'college2' => $college2,
				'seats2' => $seats2,
				'college3' => $college3,
				'seats3' => $seats3,
				'college4' => $college4,
				'seats4' => $seats4,
				'college5' => $college5,
				'seats5' => $seats5,
				'reg_no' => $uni_reg
			);

			$result = $this->dashboard_model->insert_data_uni($uni_data);
			// print_r($uni_data);
			$this->admin_dashboard();
		} else if ($this->input->post('uni_update')) {
			$college1 = $this->input->post('college1');
			$seats1 = $this->input->post('seats1');
			$college2 = $this->input->post('college2');
			$seats2 = $this->input->post('seats2');
			$college3 = $this->input->post('college3');
			$seats3 = $this->input->post('seats3');
			$college4 = $this->input->post('college4');
			$seats4 = $this->input->post('seats4');
			$college5 = $this->input->post('college5');
			$seats5 = $this->input->post('seats5');

			$updated_data = array(
				'college1' => $college1,
				'seats1' => $seats1,
				'college2' => $college2,
				'seats2' => $seats2,
				'college3' => $college3,
				'seats3' => $seats3,
				'college4' => $college4,
				'seats4' => $seats4,
				'college5' => $college5,
				'seats5' => $seats5
			);


			$id = $session_uni['id'];
			// print_r($updated_data);
			$up_result = $this->dashboard_model->update_uni($updated_data, $id);

			$this->admin_dashboard();
		} else {

			echo "<script>window.alert('Oops! Something Went Wrong!');</script>";
		}
	}


	public function dash_mentor_details()
	{

		$session_mentor = $this->session->userdata();

		if ($this->input->post('ment_submit')) {
			$ment_dob = $this->input->post('ment_dob');
			$ment_gender = $this->input->post('ment_gender');
			$ment_city = $this->input->post('ment_city');
			$ment_state = $this->input->post('ment_state');
			$ment_zip = $this->input->post('ment_zip');
			$ment_country = $this->input->post('ment_country');
			$ment_designation = $this->input->post('ment_designation');

			$ment_data = array(
				'id' => $session_mentor['id'],
				'email' => $session_mentor['email'],
				'dob' => $ment_dob,
				'gender' => $ment_gender,
				'city' => $ment_city,
				'state' => $ment_state,
				'postal' => $ment_zip,
				'country' => $ment_country,
				'designation' => $ment_designation
			);

			$result = $this->dashboard_model->insert_data_mentor($ment_data);
			//print_r($ment_data);
			$this->mentor_dashboard();
		} else if ($this->input->post('ment_update')) {
			$up_city = $this->input->post('ment_city');
			$up_state = $this->input->post('ment_state');
			$up_zip = $this->input->post('ment_zip');
			$up_country = $this->input->post('ment_country');



			$updated_data = array(
				'city' => $up_city,
				'state' => $up_state,
				'postal' => $up_zip,
				'country' => $up_country,
			);

			$id = $session_mentor['id'];
			// print_r($updated_data);
			$up_result = $this->dashboard_model->update_mentor($updated_data, $id);

			$this->mentor_dashboard();
		} else {

			echo "<script>window.alert('Oops! Something Went Wrong!');</script>";
		}
	}

	public function student_image()
	{

		// if(isset($_FILES['stu_pic'])){
		// 	$target = base_url().'assets/img/profile_pics/';
		// 	 $filename = $_FILES['stu_pic']['name'];
		// 	  $filetmp = $_FILES['stu_pic']['tmp_name'];
		// 	    move_uploaded_file($filetmp, $target.$filename);

		// 	     echo $filename."<br>";

		//               echo $target.$filename;
		// }
		$student_image = $this->session->userdata();
		$id = $student_image['id'];

		$config['upload_path']          = 'assets/img/profile_pics/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$config['encrypt_name']			= TRUE;
		$config['remove_spaces']		= TRUE;
		$config['overwrite']			= FALSE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('stu_pic')) {
			$error = array('error' => $this->upload->display_errors());

			print_r($error);
			echo "<br>";
			echo $config['upload_path'];
			//  $this->load->view('dashboard/student_profile', $error);
		} else {
			$data = $this->upload->data();

			//print_r($data);
			$path = $data['file_name'];

			$this->dashboard_model->student_pic($path, $id);

			$this->student_profile();
			// $this->load->view('dashboard/student_profile';

		}
	}

	//}

	public function mentor_image()
	{

		$mentor_image = $this->session->userdata();
		$id = $mentor_image['id'];

		$config['upload_path']          = 'assets/img/profile_pics/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$config['encrypt_name']			= TRUE;
		$config['remove_spaces']		= TRUE;
		$config['overwrite']			= FALSE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('ment_pic')) {
			$error = array('error' => $this->upload->display_errors());

			print_r($error);
		} else {
			$data = $this->upload->data();

			$path = $data['file_name'];

			$this->dashboard_model->mentor_pic($path, $id);

			$this->mentor_profile();
		}
	}

	public function uni_image()
	{

		$uni_image = $this->session->userdata();
		$id = $uni_image['id'];

		$config['upload_path']          = 'assets/img/profile_pics/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$config['encrypt_name']			= TRUE;
		$config['remove_spaces']		= TRUE;
		$config['overwrite']			= FALSE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('uni_pic')) {
			$error = array('error' => $this->upload->display_errors());

			print_r($error);
		} else {
			$data = $this->upload->data();

			$path = $data['file_name'];

			$this->dashboard_model->uni_pic($path, $id);

			$this->user_profile();
		}
	}


	public function list_students()
	{

		$get['details'] = $this->dashboard_model->list_students();
		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('pages/list_students', $get);
		$this->load->view('dashboard/dashboard_footer_view');
	}

	public function list_mentors()
	{

		$get['details'] = $this->user_model->list_mentor();

		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('pages/list_mentors', $get);
		$this->load->view('dashboard/dashboard_footer_view');
	}
	public function list_trainors()
	{

		$get['details'] = $this->user_model->list_trainor();

		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('pages/list_trainors', $get);
		$this->load->view('dashboard/dashboard_footer_view');
	}

	public function list_university()
	{

		$uni_profile_sess = $this->session->userdata();
		$get['details'] = $this->dashboard_model->get_uni_data($uni_profile_sess['id']);

		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('pages/list_university', $get);
		$this->load->view('dashboard/dashboard_footer_view');
	}

	public function delete_mentor()
	{

		$id = $this->input->get('id');
		$this->dashboard_model->delete_mentor($id);

		redirect('dashboard_controller/list_mentors', 'refresh');

		// $this->list_mentors();

	}

	public function delete_student()
	{

		$id = $this->input->get('id');
		$this->dashboard_model->delete_student($id);

		redirect('dashboard_controller/list_students', 'refresh');
	}

	public function delete_stu_profile()
	{

		$id = $this->input->get('id');
		$this->dashboard_model->delete_student($id);
		$this->session->sess_destroy();

		redirect();
	}

	public function delete_ment_profile()
	{

		$id = $this->input->get('id');
		$this->dashboard_model->delete_mentor($id);
		$this->session->sess_destroy();

		redirect();

		// $this->list_mentors();

	}


	public function delete_all()
	{
		$data = $this->input->post('select');

		// $checked = implode(',',$data);
		// echo "<pre>";
		// print_r($data);
		//  echo "</pre>";
		for ($i = 0; $i < sizeof($data); $i++) {

			$arr[] = $data[$i];

			// $this->dashboard_model->delete_all($data[$i]);
		}

		$da = implode(",", $arr);
		$this->dashboard_model->delete_all($da);
		redirect('dashboard_controller/list_students', 'refresh');
		//      $checked = implode(',',$data[$i]);


		// }

		// print_r($checked);


	}

	public function delete_all_ment()
	{
		$data = $this->input->post('select');

		for ($i = 0; $i < sizeof($data); $i++) {
			$arr[] = $data[$i];
		}
		$da = implode(",", $arr);
		$this->dashboard_model->delete_all_ment($da);
		redirect('dashboard_controller/list_mentors', 'refresh');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}

	public function add_trainee()
	{
		$pass_arr = array();
		$message = '';
		$submit =  $this->input->post("submit");
		$action =  $this->input->get("action");
		$edit_id =  $this->input->post("edit_id");
		if (isset($submit)) {
			$trainee_name = $this->input->post("trainee_name");
			$email = $this->input->post("email");
			if (empty($trainee_name) || empty($email)) {
				echo "<script>window.alert('Oops! Field is required!');</script>";
			} else {
				$insert_trainee_data = array('name' => $trainee_name, 'email' => $email);
				if(!empty($edit_id)){
					$result = $this->trainee_model->update_trainee_data($insert_trainee_data,$edit_id);
					$message = "Trainee Update Successfully :)";
					redirect('dashboard_controller/add_trainee?action=edit&edit_id='.$edit_id, 'refresh');					
				}else{
					$result = $this->trainee_model->insert_trainee_data($insert_trainee_data);
					$message = "Trainee Add Successfully :)";
					redirect('dashboard_controller/list_trainee', 'refresh');
				}
				
				if ($result) {
					echo "<script>window.alert('".$message."');</script>";
				} else {
					echo "<script>window.alert('Something went wrong :(');</script>";
				}
			}
		}elseif(isset($action) && $action=="edit"){
			$pass_arr['action']  = $action;
			$edit_id = $this->input->get("edit_id");
			$result = $this->trainee_model->list_trainee($edit_id);
			if(empty($result)) redirect('dashboard_controller/add_trainee', 'refresh');
			$pass_arr['trainee_details'] = $result[0];
		}
		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('pages/add_trainee',$pass_arr);
		$this->load->view('dashboard/dashboard_footer_view');
		
	}



	public function list_trainee()
	{
		$get['details'] = $this->trainee_model->list_trainee();
		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('pages/list_trainee', $get);
		$this->load->view('dashboard/dashboard_footer_view');
	}
	public function delete_trainee()
	{
		$id = $this->input->get('id');
		$this->trainee_model->delete_trainee($id);
		redirect('dashboard_controller/list_trainee', 'refresh');
	}

	public function add_mentor()
	{
		$pass_arr = array();
		$message = '';
		$submit =  $this->input->post("submit");
		$action =  $this->input->get("action");
		
		if (isset($submit)) {
			$mentor_fname = $this->input->post("mentor_fname");
			$mentor_lname = $this->input->post("mentor_lname");
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$edit_id =  $this->input->post("edit_id");
			if (empty($mentor_fname) || empty($mentor_lname) || empty($email) || empty($password)) {
			echo "<script>window.alert('Oops! Field is required!');</script>";
			} else {
				$insert_mentor_data = array('fname' => $mentor_fname, 'lname' => $mentor_lname, 'email' => $email, 'password' => $password,"user_type"=>"mentor");
				if(!empty($edit_id)){
					$insert_mentor_data['id'] = $edit_id;
					$result = $this->user_model->update_users_data($insert_mentor_data);
					$message = "Mentor Update Successfully :)";
					redirect('dashboard_controller/add_mentor?action=edit&edit_id='.$edit_id, 'refresh');					
				}else{
					$result = $this->user_model->insert_users_data($insert_mentor_data);
					if($result){
						$message = "Mentor Add Successfully :)";
						redirect('dashboard_controller/add_mentor?action=edit&edit_id='.$result, 'refresh');	
					}
				}
				if ($result) {
					echo "<script>window.alert('".$message."');</script>";
				} else {
					echo "<script>window.alert('Something went wrong :(');</script>";
				}
			}
		}elseif(isset($action) && $action=="edit"){
			$pass_arr['action']  = $action;
			$edit_id = $this->input->get("edit_id");
			$result = $this->user_model->list_user($edit_id);
			if(empty($result)) redirect('dashboard_controller/add_mentor', 'refresh');
			$pass_arr['mentor_details'] = $result[0];
		}
		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('pages/add_mentor',$pass_arr);
		$this->load->view('dashboard/dashboard_footer_view');
		
	}
	 public function add_trainor()
	 {
		$pass_arr = array();
		$message = '';
		$submit =  $this->input->post("submit");
		$action =  $this->input->get("action");
		if (isset($submit)) {
			$trainor_fname = $this->input->post("trainor_fname");
			$trainor_lname = $this->input->post("trainor_lname");
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$edit_id =  $this->input->post("edit_id");
			if (empty($trainor_fname) || empty($trainor_lname) || empty($email) || empty($password)) {
			echo "<script>window.alert('Oops! Field is required!');</script>";
			} else {
				$insert_trainor_data = array('fname' => $trainor_fname, 'lname' => $trainor_lname, 'email' => $email, 'password' => $password,"user_type"=>"trainor");
				if(!empty($edit_id)){
					$insert_trainor_data['id'] = $edit_id;

					$result = $this->user_model->update_users_data($insert_trainor_data);
					$message = "Trainor Update Successfully :)";
					redirect('dashboard_controller/add_trainor?action=edit&edit_id='.$edit_id, 'refresh');					
				}else{

					$result = $this->user_model->insert_users_data($insert_trainor_data);
					if($result){
						$message = "Trainor Add Successfully :)";
						redirect('dashboard_controller/add_trainor?action=edit&edit_id='.$result, 'refresh');	
					}
				}
				if ($result) {
					echo "<script>window.alert('".$message."');</script>";
				} else {
					echo "<script>window.alert('Something went wrong :(');</script>";
				}
			}
		}elseif(isset($action) && $action=="edit"){
			$pass_arr['action']  = $action;
			$edit_id = $this->input->get("edit_id");
			$result = $this->user_model->list_user($edit_id);
			if(empty($result)) redirect('dashboard_controller/add_trainor', 'refresh');
			$pass_arr['trainor_details'] = $result[0];
		}
		$this->load->view('dashboard/dashboard_header_view');
		$this->load->view('pages/add_trainor',$pass_arr);
		$this->load->view('dashboard/dashboard_footer_view');
		
	}
	 public function list_trainor()
	 {
		 echo "dffdf";
	 }
	 public function add_course()
	 {
		 echo "dffdf";
	 }
	 public function list_course()
	 {
		 echo "dffdf";
	 }
}
