<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class UserRoleController extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Role_Model');
		$this->load->model('User_Model');
		$this->load->model('Role_Model');

	}

	public function editRoleForUser($user_id) {
        // Get data user
        $user 		= $this->User_Model->get_user_by_id($user_id);
        $user_name 	= $this->User_Model->get_user_name_by_id($user_id);
        
        // Get lits roles of user
        $assigned_roles = $this->User_Role_Model->get_roles_by_user_id($user_id);

        // Get list roles
        $all_roles = $this->Role_Model->get_roles();

        // Data to view
        $data['user'] 			= $user;
        $data['assigned_roles'] = $assigned_roles;
        $data['all_roles'] 		= $all_roles;

        // View edit roles cho user

		$this->load->view('admin_template/header');
        $this->load->view('users/edit_roles', $data);
		$this->load->view('admin_template/footer');

    }

	public function updateRoleForUser() {


        // Get data
        $user_id 				= $this->input->post('user_id');
        $selected_role 			= $this->input->post('selected_role');

        // Update roles for user 
        $this->User_Role_Model->update_role_for_user($user_id, $selected_role);

		redirect(base_url('/users'));
    }
}
?>
