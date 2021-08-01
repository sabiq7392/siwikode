<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('important_model');
        $this->load->library('form_validation');  
    }
        
    public function index() {
        $this->important_model->__loadView__('user/index', null, 'User Profile');
    }

    public function edit() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('profesi', 'Profession', 'trim'); 
        $this->form_validation->set_rules('deskripsi', 'Description', 'trim'); 

        if($this->form_validation->run() == false) { 
            // jika submit gagal
            $this->important_model->__loadView__('user/edit', null, 'Edit Profile');
        
        } else {
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $profesi = $this->input->post('profesi');
            $deskripsi = $this->input->post('deskripsi');

            // cek jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']; // ['image'] name ambil dari input > name

            // untuk cek apakah user mengupload gambar atau bukan dan bentuk ukuran seperti apa
            if($upload_image) { 
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/photo_profile/'; //  ("titik") . adalah root

                $this->load->library('upload', $config);

                if($this->upload->do_upload('image')) {
                    // new_image adalah gambar baru yang baru diupload
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);

                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('username', $username);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->set('profesi', $profesi);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->set_userdata('message', '<div class="alert alert-success text-center" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }
}

?>