<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
    }
    
    private function check_login()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa

        if (!$this->session->userdata('learn_user_logged')) {
            // Chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
            redirect('login');
        }
    }
}
