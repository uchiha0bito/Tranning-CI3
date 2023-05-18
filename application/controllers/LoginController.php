
<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class LoginController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model'); // Load user model

	}

	public function index()
	{
		$data['content'] = $this->load->view('login/index', '', true);

		$this->load->view('layout', $data);
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == true) {

			$username = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$user = $this->User_model->login($username, $password);

			if ($user) {
				// Save data user in session
				$user_data = [
					'id' => $user->id,
					'email' => $user->username,
				];

				$this->session->set_userdata('userLogged', $user_data);

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
		$this->session->unset_userdata('userLogged');
		$this->session->unset_userdata('error');
		$this->session->set_flashdata('success', 'Logged out successfully.');
		redirect(base_url('login'));
	}
}
