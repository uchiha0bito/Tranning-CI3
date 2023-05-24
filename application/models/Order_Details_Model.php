<?php
class Order_Details_Model extends CI_Model {
    public function create_order_detail($data) {
        $this->db->insert('order_details', $data);
        return $this->db->insert_id();
    }
}
