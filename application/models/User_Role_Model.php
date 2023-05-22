<?php
class User_Role_Model extends CI_Model {
    public function assignRole($user_id, $role_id) {
        // Thêm bản ghi mới vào bảng user_roles
        $data = array(
            'user_id' => $user_id,
            'role_id' => $role_id
        );
        $this->db->insert('user_roles', $data);
    }

    public function revokeRole($user_id, $role_id) {
        // Xóa bản ghi khỏi bảng user_roles
        $this->db->where('user_id', $user_id);
        $this->db->where('role_id', $role_id);
        $this->db->delete('user_roles');
    }
}
?>
