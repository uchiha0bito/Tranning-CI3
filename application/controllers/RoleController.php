<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class RoleController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_Model');
    }

    public function index()
    {
        // Get list Roles
        $data['roles'] = $this->Role_Model->get_roles();

		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
        $this->load->view('roles/index', $data);
		$this->load->view('admin_template/footer');
		$this->load->view('roles/js');
    }

	public function create()
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('roles/create');
		$this->load->view('admin_template/footer');
	}

    public function store(){

		$this->form_validation->set_rules('name', 'Role Name', 'required|min_length[3]');

		if ($this->form_validation->run() == TRUE) {

        if ($this->input->post()) {
            $data = array(
                'name' 				=> $this->input->post('name'),
            );
            $this->Role_Model->create_role($data);
            redirect(base_url('role'));
        }
	}else{
		$this->create();
	}

        // Show view create role
        $this->create();
    }

	public function edit()
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('roles/edit');
		$this->load->view('admin_template/footer');
	}

    public function update($role_id)
    {

        if ($this->input->post()) {
            $data = array(
                'name' => $this->input->post('name'),
            );
            $this->Role_Model->update_role($role_id, $data);
            redirect('roles');
        }

        $data['role'] = $this->Role_Model->get_role($role_id);

        $this->load->view('roles/edit', $data);
    }

    public function delete($role_id)
    {
        // Delete role
        $this->Role_Model->delete_role($role_id);
        redirect('roles');
    }
}
