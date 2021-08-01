<?php

class Auth_Model extends CI_Model {

    public function getAll() {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function insert_user($data) {
        $this->db->insert('users', $data);
    }

    public function checkAccessLogin($email) {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }
}
?>
