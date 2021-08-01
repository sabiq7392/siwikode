<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('form_validation');   
        $this->load->model('crud_model', 'crud');
    }

    private function __loadView__($whatView, $data, $title) {
        $this->load->view('layouts/authHeader', $title);
        $this->load->view($whatView, $data);
        $this->load->view('layouts/authFooter');
    }
    
    public function signin() {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if($this->form_validation->run() == false) {
            // jika gagal login 
            $data['title'] = 'Login Page';
            $this->__loadView__('auth/signin', null, $data /* title */);

        } else {
            // jika login success
            $this->__login__();
        }
    }

    private function __login__() {
        $data = [
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ];
        $user = $this->crud->__processLogin__('users', $data['email']);

        // user exist
        if ($user) {
            // if user active
            if($user['is_active'] == 1) {
                // cek password
                if (password_verify($data['password'], $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin/dashboard');

                    } else {
                        redirect('user');
                    }

                } else {
                    $this->session->set_userdata('message', '<div class="alert alert-danger" role="alert">Wrong email/password</div>');
                    redirect('auth/signin');
                }

            } else {
                $this->session->set_userdata('message', '<div class="alert alert-danger" role="alert">This Account has not been activated</div>');
                redirect('auth/signin');
            }

        } else {
            $this->session->set_userdata('message', '<div class="alert alert-danger" role="alert">Wrong email/password</div>');
            redirect('auth/signin');
        }
    }

    // private function __login__() {
    //     $data = [
    //         'email' => htmlspecialchars($this->input->post('email')),
    //         'password' => htmlspecialchars($this->input->post('password'))
    //     ];

    //     $user = $this->crud->__processLogin__('users', $data['email']);

    //     if ($user) {
    //         if ($user['is_active'] == 1) {
    //             if(password_verify($data['password'], $user['password'])) {
    //                 $data = [
    //                     'email' => $user['email'],
    //                     'role_id' => $user['role_id']
    //                 ];
    //                 $this->session->set_userdata($data);
    //                 redirect('user');
    //             } else {
    //                 echo "user not active";
    //             }
    //         } 
    //     }
    // }

    public function signup() {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        
        $this->form_validation->set_rules(
            'username', 'Username', 
            'required|trim|is_unique[users.username]', 
            ['is_unique' => 'This username has already used']
        );
        $this->form_validation->set_rules(
            'email', 'Email', 
            'required|trim|valid_email|is_unique[users.email]', 
            ['is_unique' => 'This email has already registered']
        );
        $this->form_validation->set_rules(
            'password', 'Password', 
            'required|trim|min_length[5]|matches[repeat_password]', 
            [
                'matches' => '',
                'min_length' => 'Password too short!'
            ]
        );
        $this->form_validation->set_rules(
            'repeat_password', 'Repeat_Password', 
            'required|trim|min_length[5]|matches[password]', 
            [
                'required' => 'The Repeat Password field is required',
                'matches' => 'Password didnt matches!',
                'min_length' => 'Password didnt matches!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page';
            $this->__loadView__('auth/signup', null, $data /* title */);

        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT ),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time() 
            ];
            if ($data['email'] == 'admin.siwikode@gmail.com') {
                $data['role_id'] = 1;
            }

            $this->auth_model->insert_user($data);
            $this->session->set_userdata('message', '<div class="alert alert-success" role="alert">Create an account is successful</div>');
            redirect('/auth/signin', 'refresh');
            
        }
    }

    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_userdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        
        redirect('home');
        // echo '
        // <script>
        //     localStorage.removeItem("dom")
        // </script>'
        ;
    }

}

?>
