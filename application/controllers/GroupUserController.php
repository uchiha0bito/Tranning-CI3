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

		$groups = $this->GroupUser_model->get_all_groups();
		$data['groups'] = $groups;

		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('group_user/index', $data);
		$this->load->view('admin_template/footer');
		$this->load->view('group_user/js');

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
        
		return redirect(base_url('group'));

    }



	public function edit($group_id) {
        $group = $this->GroupUser_model->get_group_by_id($group_id);

        $data['group'] = $group;

		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
        $this->load->view('group_user/edit', $data);
		$this->load->view('admin_template/footer');
    }

    public function update($group_id) {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Get data
            $group_data = array(
                'name' 			=> $this->input->post('group_name'),
                'description' 	=> $this->input->post('group_description')
            );

            // Update data
            $this->GroupUser_model->update_group($group_id, $group_data);

            // Redirect to success page
			return redirect(base_url('group'));


        } else {
            // Redirect to success different page if request not is POST
			return redirect(base_url('dashboard'));
        }
    }

	public function delete($group_id) {

        $this->GroupUser_model->delete_group($group_id);
		return redirect(base_url('group'));

    }
}
