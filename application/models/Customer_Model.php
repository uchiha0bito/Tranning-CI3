<?php
class Customer_model extends CI_Model {
    public function create_customer($data) {
        $this->db->insert('customers', $data);
        return $this->db->insert_id();
    }

    public function get_customer($customer_id) {
        $this->db->where('customer_id', $customer_id);
        return $this->db->get('customers')->row();
    }
}
