
<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class HomeController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['content'] = $this->load->view('home/index', '', true);

		$this->load->view('layout', $data);
	}

	public function about()
	{
		$data['content'] = $this->load->view('home/about', '', true);
		$this->load->view('layout', $data);
	}
}
