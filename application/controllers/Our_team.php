<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Our_team extends CI_Controller {

    public function index() {
        $this->load->model('important_model');
        $this->important_model->__loadView__('our_team/index', null, 'Our Team');
    }
}
?>