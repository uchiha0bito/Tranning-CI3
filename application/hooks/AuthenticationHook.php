<?php


class AuthenticationHook {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function checkLogin() {
        $isLoggedIn = $this->CI->session->userdata('userLogged');

        if (!$isLoggedIn) {
            redirect(base_url('login'));
        }
    }
}


?>
