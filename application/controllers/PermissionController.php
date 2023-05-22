<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class PermissionController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Permission_Model');
		check_login();
	}

	public function index()
	{
		$data['permissions'] = $this->Permission_Model->getPermissions();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('permissions/index', $data);
		$this->load->view('admin_template/footer');
		$this->load->view('permissions/js');
	}

	// Return view create permission
	public function create()
	{
		if (check_access('add_permission')) {
			$this->load->view('admin_template/header');
			$this->load->view('admin_template/navbar');
			$this->load->view('permissions/create');
			$this->load->view('admin_template/footer');
			$this->load->view('permissions/js');

		} else {
			redirect(base_url('/dashboard'));
		}
	}


	public function store()
	{

		$this->form_validation->set_rules('name', 'Permission Name', 'required|min_length[3]');


		if ($this->form_validation->run() == TRUE) {

			if ($this->input->post()) {
				$data = array(
					'name' 				=> $this->input->post('name'),
				);
				$this->Permission_Model->createPermission($data);
				redirect(base_url('permission'));
			}
		} else {
			redirect(base_url('permission/create'));
		}

		// Show view create role
		$this->create();
	}

	// Return view edit permission
	public function edit($permissionId)
	{

		if (check_access('edit_permission')) {
			$data['permission'] = $this->Permission_Model->getPermission($permissionId);
			$this->load->view('admin_template/header');
			$this->load->view('admin_template/navbar');
			$this->load->view('permissions/edit', $data);
			$this->load->view('admin_template/footer');
		} else {
			redirect(base_url('/dashboard'));
		}
	}

	public function update($permissionId)
	{

		$this->form_validation->set_rules('name', 'Permission Name', 'min_length[3]');

		if ($this->form_validation->run() == TRUE) {

			if ($this->input->post()) {
				$data = array(
					'name' => $this->input->post('name'),
				);
				$this->Permission_Model->updatePermission($permissionId, $data);
				redirect(base_url('permission'));
			}

			$data['role'] = $this->Permission_Model->getPermission($permissionId);

			$this->load->view('permissions/edit', $data);
		} else {
			$this->edit($permissionId);
		}
	}

	public function delete($permissionId)
	{
		if (check_access('delete_permission')) {
			$this->Permission_Model->deletePermission($permissionId);
			redirect(base_url('permission'));
		} else {
			redirect(base_url('/dashboard'));
		}
	}
}
