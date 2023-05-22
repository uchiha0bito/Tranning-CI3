<?php
class UserRoleController extends CI_Controller {
    public function assignRole($user_id, $role_id) {
        $this->load->model('user_role_model');
        $this->user_role_model->assignRole($user_id, $role_id);
        // Xử lý các thao tác sau khi gán vai trò
    }

    public function revokeRole($user_id, $role_id) {
        $this->load->model('user_role_model');
        $this->user_role_model->revokeRole($user_id, $role_id);
        // Xử lý các thao tác sau khi thu hồi vai trò
    }
}
?>
