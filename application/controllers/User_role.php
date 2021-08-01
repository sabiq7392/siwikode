<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('crud_model','crud');
        $this->load->model('important_model');
    }

    public function index(){
        $data['user'] = $this->crud->getAll('users');
        $this->important_model->__loadView__('user_role/index', $data, 'User Role');
    }

    public function edit($id) {
        $user = $this->crud->findById('users',$id);
        $data = [
            'user' => $user,
            'role_name' => $this->crud->findById('users_role',$user->role_id),
            'is_active' => $user->is_active
        ];

        $this->important_model->__loadView__('user_role/edit', $data, 'Edit Role');
    }

    public function update() {
        $data = [
            'id' => htmlspecialchars($this->input->post('role_id', true)),
            'username' => htmlspecialchars($this->input->post('role_id', true)),
            'email' => htmlspecialchars($this->input->post('role_id', true)),
            'image' => htmlspecialchars($this->input->post('role_id', true)),
            'profesi' => htmlspecialchars($this->input->post('role_id', true)),
            'deskripsi' => htmlspecialchars($this->input->post('role_id', true)),
            'role_id' => htmlspecialchars($this->input->post('role_id', true)),
            'password' => htmlspecialchars($this->input->post('role_id', true)),
            'date' => htmlspecialchars($this->input->post('role_id', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true))
        ];
        $this->crud->update('users', $data['id'], $data);
        redirect('/user_role/index');
    }
}
?>