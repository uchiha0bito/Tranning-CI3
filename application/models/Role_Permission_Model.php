<?php
class Role_Permission_Model extends CI_Model {

	public function getPermissionsByRoleId($role_id) {
        $this->db->select('permissions.*');
        $this->db->from('permissions');
        $this->db->join('role_permissions', 'role_permissions.permission_id = permissions.id');
        $this->db->where('role_permissions.role_id', $role_id);

        $query = $this->db->get();
        return $query->result();
    }

	public function updatePermissionsForRole($role_id, $selected_permissions) {

        // Delete permissions current of role in table role_permissions
        $this->db->where('role_id', $role_id);
        $this->db->delete('role_permissions');

        // Add new permissions for role in role_permissions
        if (!empty($selected_permissions)) {
            foreach ($selected_permissions as $permission_id) {
                $data = array(
                    'role_id' => $role_id,
                    'permission_id' => $permission_id
                );
                $this->db->insert('role_permissions', $data);
            }
        }
    }
}
?>
