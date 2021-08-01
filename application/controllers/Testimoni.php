<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('crud_model','crud');
        $this->load->model('important_model');
    }

    public function index(){
        $data = [
            'testimoni' => $this->crud->joinTable('testimoni_wisata.*, profesi.nama_profesi, wisata_depok.nama_wisata',
                'testimoni_wisata',
                [
                    ['profesi','profesi.id = testimoni_wisata.profesi_id', 'left'],
                    ['wisata_depok','wisata_depok.id = testimoni_wisata.wisata_depok_id']
                ]),
            'wisata' => $this->crud->getAll('wisata_depok'),
            'profesi' => $this->crud->getAll('profesi')
        ];  

        $this->important_model->__loadView__('testimoni/index', $data, 'Testimoni');
    }

    // public function create() {
    //     $data = [
    //         'profesi' => $this->crud->getAll('profesi'),
    //         'wisata' => $this->crud->getAll('wisata_depok')
    //     ];

    //     $this->important_model->__loadView__('testimoni/create', $data, 'Create Testimoni');
    // }

    // public function store() {
    //     $data = [
    //         'nama_testimoni' => htmlspecialchars($this->input->post('nama_testimoni', true)),
    //         'email' => htmlspecialchars($this->input->post('email', true)),
    //         'wisata_depok_id' => htmlspecialchars($this->input->post('wisata', true)),
    //         'profesi_id' => htmlspecialchars($this->input->post('profesi', true)),
    //         'rating' => htmlspecialchars($this->input->post('rating', true)),
    //         'komentar' => htmlspecialchars($this->input->post('komentar', true))
    //     ];
    //     $this->crud->insert('testimoni_wisata',$data);
    //     // update bintang di wisata
    //     // $this->wisata_model->update_rating($data, $data['wisata_depok_id']);
    //     redirect('/testimoni/index');
    // }

    // public function delete($id) {
    //     // $testimoni = $this->testimoni_model->findById($id)
    //     $this->crud->delete('testimoni_wisata',$id);
    //     // update bintang di wisata
    //     // $this->wisata_model->update_rating($testimoni->wisata_depok_id);
    //     redirect('/testimoni/index');
    // }

    // public function edit($id) {
    //     $data = [
    //         'profesi' => $this->crud->getAll('profesi'),
    //         'wisataId' => $this->crud->findById('wisata_depok',$this->crud->findById('testimoni_wisata',$id)->wisata_depok_id),
    //         'wisata' => $this->crud->getAll('wisata_depok'),
    //         'testimoniId' => $this->crud->findById('testimoni_wisata',$id),
    //         'testimoni' => $this->crud->joinTable('testimoni_wisata.*, profesi.nama_profesi, wisata_depok.nama_wisata','testimoni_wisata',[['profesi','profesi.id = testimoni_wisata.profesi_id', 'left'],['wisata_depok','wisata_depok.id = testimoni_wisata.wisata_depok_id']])
    //     ];

    //     $this->important_model->__loadView__('testimoni/edit', $data, 'Edit Testimoni');
    // }

    // public function update() {
    //     $data = [
    //         'id' => htmlspecialchars($this->input->post('id', true)),
    //         'nama_testimoni' => htmlspecialchars($this->input->post('nama_testimoni', true)),
    //         'email' => htmlspecialchars($this->input->post('email', true)),
    //         'wisata_depok_id' => htmlspecialchars($this->input->post('wisata', true)),
    //         'profesi_id' => htmlspecialchars($this->input->post('profesi', true)),
    //         'rating' => htmlspecialchars($this->input->post('rating', true)),
    //         'komentar' => htmlspecialchars($this->input->post('komentar', true))
    //     ];
    //     $this->crud->update('testimoni_wisata', $data['id'], $data);
    //     // update bintang di wisata
    //     // $this->wisata_model->update_rating($data, $data['wisata_depok_id']);
    //     redirect('/testimoni/index');
    // }
}
?>