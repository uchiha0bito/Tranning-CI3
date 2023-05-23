<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class DatabaseController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		$this->second_db = $this->load->database('second_db', TRUE);
        $this->load->model('Database_Model');

    }

	public function index()
	{

        $data['data_from_default_db'] = $this->Database_Model->get_data_from_default_db();
        $data['data_from_second_db']  = $this->Database_Model->get_data_from_second_db();

		$this->load->view('admin_template/header');
        $this->load->view('demo_database/index', $data);
		$this->load->view('admin_template/footer');
        $this->load->view('demo_database/js');
	}


}
