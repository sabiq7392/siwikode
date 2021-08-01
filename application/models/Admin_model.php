<?php
class Admin_model extends CI_Model {
    // public function findById($id) {
    //     $query = $this->db->get_where("users_sub_menu", array('id' => $id));
    //     return $query->row();
    // }
    // public function getAll() {
    //     $query = $this->db->get("users_sub_menu");
    //     return $query->result();
    // }

    // public function joinTable() {
    //     $this->db->select('users_sub_menu.*, users_menu.menu');
    //     $this->db->from('users_sub_menu');
    //     $this->db->join('users_menu', 'users_menu.id = users_sub_menu.menu_id', 'left');

    //     return $this->db->get()->result();
    // }

    // public function whoCanAccessMenu() {
    //     $query = $this->db->get('users_menu');
    //     return $query->result();
    // }

    // public function insert_menu($data) {
    //     $this->db->insert("users_sub_menu", $data);
    // } 

    // public function delete_menu($data) {
    //     $sql = "DELETE FROM users_sub_menu WHERE id=?";
    //     $this->db->query($sql, $data); 
    // }
}
?>