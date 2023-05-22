<?php
class Permission_Model extends CI_Model {
  public function getPermissions() {
    return $this->db->get('permissions')->result();
  }

  public function getPermission($permissionId) {
    return $this->db->get_where('permissions', ['id' => $permissionId])->row();
  }

  public function createPermission($data) {
    $this->db->insert('permissions', $data);
    return $this->db->insert_id();
  }

  public function updatePermission($permissionId, $data) {
    $this->db->where('id', $permissionId);
    $this->db->update('permissions', $data);
  }

  public function deletePermission($permissionId) {
    $this->db->delete('permissions', ['id' => $permissionId]);
  }
}
