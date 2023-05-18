<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class GroupUserController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('GroupUser_model');
    }

	public function index()
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('group_user/index');
		$this->load->view('admin_template/footer');
	}

	public function add()
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('group_user/add');
		$this->load->view('admin_template/footer');
	}

    public function create() {

		$group_name 		=  $this->input->post('group_name');
		$group_description 	=  $this->input->post('group_description');


        $group_data = [
            'name'        => $group_name,
            'description' => $group_description,
        ];

        $group_id = $this->GroupUser_model->create_group($group_data);
        
		return redirect(base_url('dashboard'));
    }

    public function delete($group_id) {
        $this->GroupUser_model->delete_group($group_id);
		return redirect(base_url('dashboard'));
    }

    public function update($group_id) {
        $group_data = [
            'name'        => 'new_group_name',
            'description' => 'New group description',
        ];
        $this->GroupUser_model->update_group($group_id, $group_data);
		return redirect(base_url('dashboard'));
    }
}

?>
