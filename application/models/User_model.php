<?php
class User_model extends CI_Model {
    public function getAll() {
        return $this->db->get('users')->result();
    }

    public function update_user($username, $email) {
        $this->db->set('username', $username);
        $this->db->where('email', $email);
        $this->db->update('users');
        // khusus untuk update user harus begini lain cara dengan editUpdate wisata, testimoni dll
    }
}
?>