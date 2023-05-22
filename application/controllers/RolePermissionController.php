<?php
class RolePermissionController extends CI_Controller {
    public function assignPermission($role_id, $permission_id) {
        $this->load->model('role_permission_model');
        $this->role_permission_model->assignPermission($role_id, $permission_id);
        // Xử lý các thao tác sau khi gán quyền hạn
    }

    public function revokePermission($role_id, $permission_id) {
        $this->load->model('role_permission_model');
        $this->role_permission_model->revokePermission($role_id, $permission_id);
        // Xử lý các thao tác sau khi thu hồi quyền hạn
    }
}
?>
