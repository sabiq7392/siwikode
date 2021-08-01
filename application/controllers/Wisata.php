<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('crud_model','crud');
        $this->load->model('important_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

    public function index(){
        $data = [
            'wisata' => $this->crud->joinTable(
                'wisata_depok.*, jenis_wisata.jenis, kategori.nama_kategori',
                'wisata_depok',[
                    ['jenis_wisata', 'jenis_wisata.id = wisata_depok.jenis_wisata_id', 'left'],
                    ['kategori', 'kategori.id = wisata_depok.kategori_id']
                ]
            ),
            'wisataGetAll' => $this->crud->getAll('wisata_depok'),
            'jenis_wisata' => $this->crud->__jenisWisata__(),
            'kategori' => $this->crud->__kategori__()
        ]; 
        $this->important_model->__loadView__('wisata/index', $data, 'Wisata');
    }
}
?>