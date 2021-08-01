<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud_model','crud');
        $this->load->model('important_model');
    }

	public function index() {
        $data = [
            'wisata' => $this->crud->joinTable(
                'wisata_depok.*, jenis_wisata.jenis, kategori.nama_kategori',
                'wisata_depok',
                [['jenis_wisata', 'jenis_wisata.id = wisata_depok.jenis_wisata_id', 'left'],['kategori', 'kategori.id = wisata_depok.kategori_id']]
            )
        ];

        $this->__howPageShouldOpen__('home/index', $data, 'Home');
	}

    public function rekreasi() {
        $data = [
            'wisata' => $this->crud->joinTable('wisata_depok.*, jenis_wisata.jenis, kategori.nama_kategori','wisata_depok',[['jenis_wisata', 'jenis_wisata.id = wisata_depok.jenis_wisata_id', 'left'],['kategori', 'kategori.id = wisata_depok.kategori_id']])
        ];

        $this->__howPageShouldOpen__('home/rekreasi', $data, 'Rekreasi');
    }

    public function kuliner() {
        $data = [
            'wisata' => $this->crud->joinTable('wisata_depok.*, jenis_wisata.jenis, kategori.nama_kategori','wisata_depok',[['jenis_wisata', 'jenis_wisata.id = wisata_depok.jenis_wisata_id', 'left'],['kategori', 'kategori.id = wisata_depok.kategori_id']])
        ];
        
        $this->__howPageShouldOpen__('home/kuliner', $data, 'Kuliner');
    }

    public function our_teams() {
        $this->__howPageShouldOpen__('our_team/index', null, 'Our Teams');
    }

    // ============================== PRIVATE FUNCTION =====================================
    private function isAdmin($email){
        $role_id = $this->crud->findByEmail('users',$email)->role_id;
        if ($role_id == 1){
            redirect('admin');
        }
    }

    private function __howPageShouldOpen__($whatView, $data, $title) {
        $email = $this->session->userdata('email');
        if ($email) {
            $this->important_model->__loadView__($whatView, $data, $title);

        } else if (!$email) {
            $user = [
                'username' => 'SIWIKODE',
                'is_active' => 0
            ];

            $dataHeader['title'] = 'Home';
            $dataHeader['user'] = $user;
            
            $this->__loadView__($whatView, $data, $dataHeader);
        }
    }

    private function __loadView__($whatView, $data, $dataHeader) {
        $this->load->view('layouts/header', $dataHeader);
        $this->load->view($whatView, $data);
        $this->load->view('layouts/footer');
    }
}
