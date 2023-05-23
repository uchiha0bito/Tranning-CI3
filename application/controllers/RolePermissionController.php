<?php


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class RolePermissionController extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Role_Permission_Model');
        $this->load->model('Role_Model');
		$this->load->model('Permission_Model');
	}

	public function editPermissionsForRole($role_id) {

        $role 			= $this->Role_Model->get_role($role_id);
        $role_name 	    = $this->Role_Model->get_name_role($role_id);
        $permissions 	= $this->Permission_Model->getPermissions();

	
        // Get list permissions assigned role
        $assigned_permissions = $this->Role_Permission_Model->getPermissionsByRoleId($role_id);

        // Data to view
        $data['role_id'] 				= $role_id;
        $data['role'] 					= $role;
        $data['role_name'] 				= $role_name;
        $data['permissions'] 			= $permissions;
        $data['assigned_permissions'] 	= $assigned_permissions;

        // View edit permissions for role
		$this->load->view('admin_template/header');
        $this->load->view('roles/edit_permissions', $data);
		$this->load->view('admin_template/footer');

    }

    public function updatePermissionsForRole() {


        // Get data
        $role_id 				= $this->input->post('role_id');
        $selected_permissions 	= $this->input->post('selected_permissions');


        // Update permissions for role 
        $this->Role_Permission_Model->updatePermissionsForRole($role_id, $selected_permissions);

		redirect(base_url('/dashboard'));
    }
}
?>
