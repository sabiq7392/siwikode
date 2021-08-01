<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('important_model');
        $this->load->model('crud_model', 'crud');
        
        // mencegah ke halaman login jika sudah login

        // if ($email) {
        //     $role_id = $this->crud->findByEmail('users', $email)->role_id;
        //     if ($role_id != 1) {
        //         redirect('home');
        //     }
        // } else {
        //     redirect('home');
        // }
    }

    public function dashboard()
    {
        $data = [
            'wisata' => $this->crud->joinTable('wisata_depok.*, jenis_wisata.jenis, kategori.nama_kategori', 'wisata_depok', [['jenis_wisata', 'jenis_wisata.id = wisata_depok.jenis_wisata_id', 'left'], ['kategori', 'kategori.id = wisata_depok.kategori_id']])
        ];
        $this->important_model->__loadView__('dashboard/index', $data, 'Dashboard');
    }
    
    // ==========================================================================================
    public function wisata()
    {

        $data = [
            'wisata' => $this->crud->joinTable('wisata_depok.*, jenis_wisata.jenis, kategori.nama_kategori', 'wisata_depok', [['jenis_wisata', 'jenis_wisata.id = wisata_depok.jenis_wisata_id', 'left'], ['kategori', 'kategori.id = wisata_depok.kategori_id']]),
            'wisataGetAll' => $this->crud->getAll('wisata_depok'),
            'jenis_wisata' => $this->crud->__jenisWisata__(),
            'kategori' => $this->crud->__kategori__()
        ];
        $this->important_model->__loadView__('wisata/index', $data, 'Wisata');
    }
    public function edit_wisata($id)
    {
        $data = [
            'wisata' => $this->crud->getAll('wisata_depok'),
            'wisataId' => $this->crud->findById('wisata_depok', $id),
            'kategori' => $this->crud->__kategori__(),
            'jenis_wisata' => $this->crud->__jenisWisata__()
        ];

        $this->important_model->__loadView__('wisata/edit', $data, 'Edit Wisata');
    }

    public function detail_wisata($id)
    {
        $data = [
            'wisata' => $this->crud->getAll('wisata_depok'),
            'wisataId' => $this->crud->findById('wisata_depok', $id),
            'kategori' => $this->crud->__kategori__(),
            'jenis_wisata' => $this->crud->__jenisWisata__()
        ];

        $this->important_model->__loadView__('wisata/view', $data, 'Edit Wisata');
    }

    public function update_wisata()
    {
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        
        $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('jenis_wisata_id', 'Jenis Wisata', 'required|trim');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required|trim');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('latlong', 'Latlong', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');

        $data = [
            'id' => htmlspecialchars($this->input->post('id', true)),
            'nama_wisata' => htmlspecialchars($this->input->post('nama_wisata', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'jenis_wisata_id' => htmlspecialchars($this->input->post('jenis_wisata', true)),
            'kategori_id' => htmlspecialchars($this->input->post('kategori', true)),

            'fasilitas' => htmlspecialchars($this->input->post('fasilitas', true)),
            'kontak' => htmlspecialchars($this->input->post('kontak', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'latlong' => htmlspecialchars($this->input->post('latlong', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'url' => htmlspecialchars($this->input->post('url', true))
        ];

        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/photo_wisata/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $new_image = $this->upload->data('file_name');
            $this->db->set('image', $new_image);
        } else {
            echo $this->upload->display_errors();
        }

        $this->crud->update('wisata_depok', $data['id'], $data);

        redirect('/admin/wisata');
    }

    public function store_wisata()
    {
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('jenis_wisata_id', 'Jenis Wisata', 'required|trim');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required|trim');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('latlong', 'Latlong', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');

        $data = [
            'id' => htmlspecialchars($this->input->post('id', true)),
            'nama_wisata' => htmlspecialchars($this->input->post('nama_wisata', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'jenis_wisata_id' => htmlspecialchars($this->input->post('jenis_wisata', true)),
            'kategori_id' => htmlspecialchars($this->input->post('kategori', true)),
            'fasilitas' => htmlspecialchars($this->input->post('fasilitas', true)),
            'kontak' => htmlspecialchars($this->input->post('kontak', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'latlong' => htmlspecialchars($this->input->post('latlong', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'url' => htmlspecialchars($this->input->post('url', true))
        ];
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/photo_wisata/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $new_image = $this->upload->data('file_name');
            $this->db->set('image', $new_image);
        } else {
            echo $this->upload->display_errors();
        }

        $this->crud->insert('wisata_depok', $data);

        redirect('/admin/wisata');
    }

    public function delete_wisata($id)
    {
        $this->crud->delete('wisata_depok', $id);
        redirect('wisata');
    }

    // =====================================================================================================
    public function testimoni()
    {
        $data = [
            'testimoni' => $this->crud->joinTable('testimoni_wisata.*, profesi.nama_profesi, wisata_depok.nama_wisata','testimoni_wisata',[['profesi','profesi.id = testimoni_wisata.profesi_id', 'left'],['wisata_depok','wisata_depok.id = testimoni_wisata.wisata_depok_id']]),
            'wisata' => $this->crud->getAll('wisata_depok'),
            'profesi' => $this->crud->getAll('profesi')
        ];  

        $this->important_model->__loadView__('testimoni/index', $data, 'Testimoni');
    }

    public function update_testimoni()
    {
        $data = [
            'id' => htmlspecialchars($this->input->post('id', true)),
            'nama_testimoni' => htmlspecialchars($this->input->post('nama_testimoni', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'wisata_depok_id' => htmlspecialchars($this->input->post('wisata', true)),
            'profesi_id' => htmlspecialchars($this->input->post('profesi', true)),
            'rating' => htmlspecialchars($this->input->post('rating', true)),
            'komentar' => htmlspecialchars($this->input->post('komentar', true))
        ];
        $this->crud->update('testimoni_wisata', $data['id'], $data);
        redirect('admin/testimoni');
    }

    public function edit_testimoni($id)
    {
        $data = [
            'profesi' => $this->crud->getAll('profesi'),
            'wisataId' => $this->crud->findById('wisata_depok',$this->crud->findById('testimoni_wisata',$id)->wisata_depok_id),
            'wisata' => $this->crud->getAll('wisata_depok'),
            'testimoniId' => $this->crud->findById('testimoni_wisata',$id),
            'testimoni' => $this->crud->joinTable('testimoni_wisata.*, profesi.nama_profesi, wisata_depok.nama_wisata','testimoni_wisata',[['profesi','profesi.id = testimoni_wisata.profesi_id', 'left'],['wisata_depok','wisata_depok.id = testimoni_wisata.wisata_depok_id']])
        ];

        $this->important_model->__loadView__('testimoni/edit', $data, 'Edit Testimoni');
    }

    public function store_testimoni()
    {
        $data = [
            'nama_testimoni' => htmlspecialchars($this->input->post('nama_testimoni', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'wisata_depok_id' => htmlspecialchars($this->input->post('wisata', true)),
            'profesi_id' => htmlspecialchars($this->input->post('profesi', true)),
            'rating' => htmlspecialchars($this->input->post('rating', true)),
            'komentar' => htmlspecialchars($this->input->post('komentar', true))
        ];
        $this->crud->insert('testimoni_wisata',$data);
        redirect('admin/testimoni');
    }

    public function delete_testimoni($id)
    {
        $this->crud->delete('testimoni_wisata',$id);
        redirect('admin/testimoni');
    }

    // =====================================================================================================
    public function user_role()
    {
        $data['user'] = $this->crud->getAll('users');
        $this->important_model->__loadView__('user_role/index', $data, 'User Role');
    }

    public function edit_user_role($id)
    {
        $user = $this->crud->findById('users',$id);
        $data = [
            'user' => $user,
            'role_id' => $user->role_id,
            'is_active' => $user->is_active
        ];

        $this->important_model->__loadView__('user_role/edit', $data, 'Edit Role');
    }

    public function update_user_role()
    {
        $data = [
            'id' => htmlspecialchars($this->input->post('id', true)),
            'role_id' => htmlspecialchars($this->input->post('role_id', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true)),

            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => htmlspecialchars($this->input->post('image', true)),
            'profesi' => htmlspecialchars($this->input->post('profesi', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'password' => htmlspecialchars($this->input->post('password', true)),
            'date_created' => htmlspecialchars($this->input->post('date_created', true))

        ];
        $this->crud->update('users', $data['id'], $data);
        redirect('admin/user_role');
    }

    // =====================================================================================================
    public function menu()
    {
        $data['menu'] = $this->crud->joinTable(
            'users_sub_menu.*, users_menu.menu','users_sub_menu',
            [['users_menu','users_menu.id = users_sub_menu.menu_id', 'left']]
        );
        $this->important_model->__loadView__('menu/index', $data, 'Menu');
    }

    public function update_menu($id) {
        $data = [
            'id' => htmlspecialchars($this->input->post('id', true)),
            'title' => htmlspecialchars($this->input->post('menu_title', true)),
            'url' => htmlspecialchars($this->input->post('menu_url', true)),
            'icon' => htmlspecialchars($this->input->post('menu_icon', true)),
            'menu_id' => htmlspecialchars($this->input->post('menu_access_rights', true)),
            'is_active' => 1
        ];
        $this->crud->update('users_sub_menu',$data['id'], $data);
        redirect('admin/menu', 'refresh');


    }

    public function edit_menu($id)
    {
        $this->load->model('menu_model');
        $data = [
            'menuId' => $this->crud->findById('users_sub_menu',$id),
            'whoCanAccessMenu' => $this->menu_model->whoCanAccessMenu()
        ];
        $this->important_model->__loadView__('menu/edit', $data, 'Menu Edit');
    }

    public function store_menu()
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('menu_title', true)),
            'url' => htmlspecialchars($this->input->post('menu_url', true)),
            'icon' => htmlspecialchars($this->input->post('menu_icon', true)),
            'menu_id' => htmlspecialchars($this->input->post('menu_access_rights', true)),
            'is_active' => 1
        ];
        $this->crud->insert('users_sub_menu',$data);
        redirect('admin/menu', 'refresh');
    }

    public function delete_menu($id)
    {
        $this->crud->delete('users_sub_menu',$id);
        redirect('admin/menu');
    }
}