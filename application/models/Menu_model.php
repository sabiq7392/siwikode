<?php
class Menu_model extends CI_Model {
    public function whoCanAccessMenu() {
        $query = $this->db->get('users_menu');
        return $query->result();
    }
}
