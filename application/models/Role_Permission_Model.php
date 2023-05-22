<?php
class Role_Permission_Model extends CI_Model {
    public function assignPermission($role_id, $permission_id) {
        // Thêm bản ghi mới vào bảng role_permissions
        $data = array(
            'role_id' => $role_id,
            'permission_id' => $permission_id
        );
        $this->db->insert('role_permissions', $data);
    }

    public function revokePermission($role_id, $permission_id) {
        // Xóa bản ghi khỏi bảng role_permissions
        $this->db->where('role_id', $role_id);
        $this->db->where('permission_id', $permission_id);
        $this->db->delete('role_permissions');
    }
}
?>
