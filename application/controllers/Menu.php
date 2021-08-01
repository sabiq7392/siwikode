<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Menu extends CI_Controller {
//     public function __construct() {
//         parent::__construct();
//         $this->load->model('menu_model');
//         // $this->load->model('dashboard_model');
//         $this->load->model('important_model');
//         $this->load->library('form_validation');
//     }

//     public function index() {
//         $data['menu'] = $this->menu_model->joinTable();
//         $this->important_model->__loadView__('menu/index', $data, 'Menu');

//     }

//     public function create() {
//         $data['whoCanAccessMenu'] = $this->menu_model->whoCanAccessMenu();
//         $this->important_model->__loadView__('menu/index', $data, 'Menu Create');
//         $this->form_validation->set_rules('menu_title', 'Title', 'required|trim');
//         $this->form_validation->set_rules('menu_url', 'URL', 'required|trim');
//         $this->form_validation->set_rules('menu_icon', 'Icon', 'required|trim');
//         $this->form_validation->set_rules('menu_access_rights', 'Acccess Rights', 'required|trim');
//     }

//     public function edit($id) {
//         $data = [
//             'menuId' => $this->menu_model->findById($id),
//             'whoCanAccessMenu' => $this->menu_model->whoCanAccessMenu()
//         ];
//         $this->important_model->__loadView__('menu/edit', $data, 'Menu Edit');
//     }

//     public function store() {
//         $data = [
//             'title' => htmlspecialchars($this->input->post('menu_title', true)),
//             'url' => htmlspecialchars($this->input->post('menu_url', true)),
//             'icon' => htmlspecialchars($this->input->post('menu_icon', true)),
//             'menu_id' => htmlspecialchars($this->input->post('menu_access_rights', true)),
//             'is_active' => 1
//         ];
//         $this->menu_model->insert_menu($data);
//         redirect('menu/index', 'refresh');
//     }

//     public function update() {
//         $data = [
//             'id' => htmlspecialchars($this->input->post('id', true)),
//             'title' => htmlspecialchars($this->input->post('menu_title', true)),
//             'url' => htmlspecialchars($this->input->post('menu_url', true)),
//             'icon' => htmlspecialchars($this->input->post('menu_icon', true)),
//             'menu_id' => htmlspecialchars($this->input->post('menu_access_rights', true)),
//             'is_active' => 1
//         ];
//         $this->menu_model->update_menu($data['id'], $data);
//         redirect('menu/index', 'refresh');
//     }

//     public function delete($id) {
//         $data['id'] = $id;
//         $this->menu_model->delete_menu($data);
//         redirect('menu/index', 'refresh');
//     }
// }
?>