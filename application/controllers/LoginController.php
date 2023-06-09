
<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class LoginController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model'); 

	}

	public function index()
	{
		$data['content'] = $this->load->view('login/index', '', true);

		$this->load->view('layout', $data);
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == true) {

			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$user = $this->User_Model->login($username, $password);

			if ($user) {
				// Save data user in session
				$user_data = [
					'id' 		=> $user->id,
					'email' 	=> $user->username,
				];

				$user_role = $this->User_Model->get_role_name_by_user_id($user->id);

				$this->session->set_userdata('learn_user_logged', $user_data);

				$this->session->set_userdata('user_role', $user_role);

				// Redirect to home page
				redirect(base_url('dashboard'));

			} else {
				$this->session->set_flashdata('error', 'Invalid username or password!');
				redirect(base_url('login'));
			}
		}else{
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('login'));
		}

		// load view login
		redirect(base_url('login'));
	}

	public function logout()
	{
		$this->session->unset_userdata('learn_user_logged');

		$this->session->unset_userdata('user_role');

		$this->session->unset_userdata('error');
		
		$this->session->set_flashdata('success', 'Logged out successfully.');

		redirect(base_url('login'));
	}
	public function not_authorized()
	{
		$this->load->view('admin_template/header');
		$this->load->view('not_authorized');
		$this->load->view('admin_template/footer');
		
	}
}
