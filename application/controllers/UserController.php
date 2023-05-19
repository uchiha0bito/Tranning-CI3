<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class UserController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$users = $this->User_model->get_all_users();
		$data['users'] = $users;

		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('users/index', $data);
		$this->load->view('admin_template/footer');
		$this->load->view('users/js');
	}

	public function add()
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('users/add');
		$this->load->view('admin_template/footer');
	}

	public function create()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('re_password', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == TRUE) {

			$username 				=  $this->input->post('username');
			$password 				=  md5($this->input->post('password'));
			$status 				=  $this->input->post('status');

			$user_data = [
				'username'        	=> $username,
				'password' 			=> $password,
				'status' 			=> $status,
			];

			$user_id = $this->User_model->create_user($user_data);

			return redirect(base_url('users'));
		} else {
			$this->add();
		}
	}


	public function edit($user_id)
	{

		$user 			= $this->User_model->get_user_by_id($user_id);
		$data['user'] 	= $user;
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('users/edit', $data);
		$this->load->view('admin_template/footer');
	}

	public function update($user_id)
	{

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			if ($this->form_validation->run() == TRUE) {

				// Get data
				if(!empty($this->input->post('password'))){
					$user_data = array(
						'username' 			=> $this->input->post('username'),
						'password' 			=> md5($this->input->post('password')),
						'status' 			=> $this->input->post('status'),
					);
				}
				elseif(empty($this->input->post('password'))){
					$user_data = array(
						'username' 			=> $this->input->post('username'),
						'status' 			=> $this->input->post('status'),
					);
				}

				// Update data
				$this->User_model->update_user($user_id, $user_data);

				// Redirect to success page
				return redirect(base_url('users'));
			}else{
				return redirect(base_url('users'));
			}
		} else {
			// Redirect to success different page if request not is POST
			return redirect(base_url('dashboard'));
		}
	}

	public function delete($user_id)
	{

		$this->User_model->delete_user($user_id);
		return redirect(base_url('users'));
	}
}
