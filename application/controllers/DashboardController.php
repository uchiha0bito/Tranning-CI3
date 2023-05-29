<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class DashboardController extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin/index');
		$this->load->view('admin_template/footer');
	}


}
