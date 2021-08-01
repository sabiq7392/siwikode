<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('crud_model','crud');
        $this->load->model('important_model');
    }
    
    public function index() {
        $data['profesi'] = $this->crud->getAll('profesi');
        $this->important_model->__loadView__('profesi/index', $data, 'Profesi');

    }

    public function create() {
        $data['profesi'] = $this->crud->getAll('profesi');
        $this->important_model->__loadView__('profesi/create', $data, 'Create Profesi');
    }

    public function store() {
        $data = [
            'id' => htmlspecialchars($this->input->post('id', true)),
            'nama_profesi' => htmlspecialchars($this->input->post('nama_profesi', true))
        ];
        $this->crud->insert('profesi',$data);
        redirect('profesi');
    }

    public function delete($id){
        $this->crud->delete('profesi',$id);
        redirect('profesi');
    }

    public function edit($id) {
        $data['profesi'] = $this->crud->findById('profesi',$id);
        $this->important_model->__loadView__('profesi/edit', $data, 'Edit Profesi');
    }

    public function update() {
        $data = [
            'id' => htmlspecialchars($this->input->post('id', true)),
            'nama_profesi' => htmlspecialchars($this->input->post('nama_profesi', true))
        ];
        $this->crud->update('profesi', $data['id'], $data);
        redirect('profesi');
    }
}

?>