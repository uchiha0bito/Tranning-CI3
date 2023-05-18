
<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class LoginController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model'); // Tải model User_model

	}

	public function index()
	{
		$data['content'] = $this->load->view('login/index', '', true);

		$this->load->view('layout', $data);
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Username', 'required', ['required' => 'Bạn chưa điền %s!']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Bạn chưa điền %s!']);



		if ($this->form_validation->run() == true) {

			$username = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$user = $this->User_model->login($username, $password);

			if ($user) {
				// Save data user in session
				$session_array= [
					'id'=> $user->id,
					'email'=> $user->username,
				];

				$this->session->set_userdata('userLogged',$session_array);
				$this->session->set_flashdata('success','Login Successfully!');

				// Redirect to home page
				redirect(base_url('home'));
			} else {

				$this->session->set_flashdata('error','Invalid username or password!');
				redirect(base_url('login'));

			}
		}

		// Load view đăng nhập
		$this->load->view('login', $data);
	}
}
