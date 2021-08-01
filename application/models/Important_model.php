<?php
class Important_model extends CI_Model {
    public function __loadView__($whatView, $dataContent, $titlePage) {
        $dataHeader['user'] = $this->__getSession__();
        $dataHeader['title'] = $titlePage;
        $dataHeader['whoCanAccessMenu'] = $this->__whoCanAccessMenu__();

        // jika sesi tidak ada 
        if($dataHeader['user'] == false) {
            redirect('home');
            $dataHeader = null;
        } 
        $this->load->view('layouts/header', $dataHeader);
        $this->load->view($whatView, $dataContent);
        $this->load->view('layouts/footer');
    }

    public function __getSession__() {
        return $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function __whoCanAccessMenu__() {
        return $this->db
        ->select('*')
        ->from('users_menu')
        ->join('users_access_menu', 'users_access_menu.menu_id = users_menu.id')
        ->where(array('users_access_menu.role_id' => $this->session->userdata('role_id')))
        ->order_by('users_access_menu.menu_id', 'ASC')
        ->get()->result_array();

        // $role_id = $this->session->userdata('role_id');
        // $sql = "SELECT `users_menu`.`id`, `menu`
        //             FROM `users_menu` JOIN `users_access_menu`
        //             ON `users_menu`.`id` = `users_access_menu`.`menu_id`
        //             WHERE `users_access_menu`.`role_id` = $role_id
        //             ORDER BY `users_access_menu`.`menu_id` ASC
        //         ";

        // return $this->db->query($sql)->result_array();
    }

    public function __showUserMenuManagement__($menuId) {  // Spawn di layouts/header
        return $this->db
        ->select('*')
        ->from('users_sub_menu')
        ->join('users_menu', 'users_menu.id = users_sub_menu.menu_id')
        ->where(array('users_sub_menu.menu_id' => $menuId, 'is_active' => 1))
        ->get()->result_array();

        // $sql = "SELECT * 
        //             FROM `users_sub_menu` JOIN `users_menu`
        //             ON `users_sub_menu`.`menu_id` = `users_menu`.`id`
        //             WHERE `users_sub_menu`.`menu_id` = $menuId
        //             AND `is_active` = 1
        //         ";

        // return $this->db->query($sql)->result_array();
    }
}
?>