<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

use Carbon\Carbon;

class UserController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
	}

	// View list user
	public function index()
	{
		if (check_access('list_user')) {

			$users = $this->User_Model->get_all_users();
			$data['users'] = $users;

			$this->load->view('admin_template/header');
			$this->load->view('admin_template/navbar');
			$this->load->view('users/index', $data);
			$this->load->view('admin_template/footer');
			$this->load->view('users/js');
		} else {
			redirect(base_url('not_authorized'));
		}
	}

	// View create user
	public function create()
	{
		if (check_access('add_user')) {

		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('users/create');
		$this->load->view('admin_template/footer');
		}else{
			redirect(base_url('not_authorized'));
		}
	}

	// Function add user
	public function store()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('re_password', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == TRUE) {

			$username 				=  $this->input->post('username');
			$email 					=  $this->input->post('email');
			$password 				=  md5($this->input->post('password'));
			$status 				=  $this->input->post('status');

			$user_data = [
				'username'        	=> $username,
				'password' 			=> $password,
				'email' 			=> $email,
				'status' 			=> $status,
			];

			$user_id = $this->User_Model->create_user($user_data);

			return redirect(base_url('users'));
		} else {
			$this->create();
		}
	}

	// View edit user
	public function edit($user_id)
	{

		$user 			= $this->User_Model->get_user_by_id($user_id);
		$data['user'] 	= $user;
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('users/edit', $data);
		$this->load->view('admin_template/footer');
	}

	// Function update user

	public function update($user_id)
	{

		$this->form_validation->set_rules('username', 'Username', 'min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');
		$this->form_validation->set_rules('password', 'Password', 'min_length[6]');
		$this->form_validation->set_rules('re_password', 'Confirm Password', 'matches[password]');

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			if ($this->form_validation->run() == TRUE) {

				// Get data
				if (!empty($this->input->post('password'))) {
					$user_data = array(
						'username' 			=> $this->input->post('username'),
						'email' 			=> $this->input->post('email'),
						'password' 			=> md5($this->input->post('password')),
						'status' 			=> $this->input->post('status'),
					);
				} elseif (empty($this->input->post('password'))) {
					$user_data = array(
						'username' 			=> $this->input->post('username'),
						'email' 			=> $this->input->post('email'),
						'status' 			=> $this->input->post('status'),
					);
				}


				// Update data
				$this->User_Model->update_user($user_id, $user_data);

				// Redirect to success page
				return redirect(base_url('users'));
			} else {
				return redirect(base_url('users'));
			}
		} else {
			// Redirect to success different page if request not is POST
			return redirect(base_url('dashboard'));
		}
	}

	// Function delete user
	public function delete($user_id)
	{

		$this->User_Model->delete_user($user_id);
		return redirect(base_url('users'));
	}
}
