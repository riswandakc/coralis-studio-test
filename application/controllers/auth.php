<?php 
class Auth extends CI_Controller{

    public function index(){
        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
    }
    

    public function login(){
        $this->form_validation->set_rules('email','Email','required|valid_email',['required' => 'Email wajib diisi','valid_email'=>'alamat email tidak valid']);
        $this->form_validation->set_rules('password','Password','required',['required' => 'Password wajib diisi']);

        if($this->form_validation->run()==false){
            $this->load->view('template/header');
            $this->load->view('login');
            $this->load->view('template/footer');
        } else {
            $auth = $this->m_auth->cek_login(); 
            if($auth == false){  /** jika model auth nnya gagal */
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password anda salah!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth/login');
            } else{
                $this->session->set_userdata('email',$auth->email);
                redirect('dashboard');
            }
        }
            
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function forgotPassword(){
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        if($this->form_validation->run() == false){

            $this->load->view('template/header');
            $this->load->view('forgot_password');
            $this->load->view('template/footer');
        }else{
            $email= $this->input->post('email');
            $user = $this->db->get_where('user',['email'=>$email])->row_array();

            if($user){
                $token = base64_encode(random_bytes(32));
                $user_token =[
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time() 
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token);

                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                tolong cek email anda untuk mereset password anda!!
                </div>');
                redirect('auth/forgotPassword');
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email belum terdaftar!!
                </div>');
                redirect('auth/forgotPassword');
            }
        }

    }

    private function _sendEmail($token){
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'mamangusro52@gmail.com',
            'smtp_pass' => 'Indonesia45',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);
        $this->load->library('email');
        $this->email->from('mamangusro52@gmail.com','Riswanda Kuncahyo');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Reset Password');
        $this->email->message('klik link ini untuk mengganti password anda : <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');


        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetPassword(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user){
            $user_token = $this->db->get_where('user_token',['token' => $token])->row_array();
            if($user_token){
                $this->session->set_userdata('reset_email', $email);
                $this->gantiPassword();
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Reset password gagal!! Token tidak valid
                </div>');
                redirect('auth/login');
            }
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Reset password gagal!!
            </div>');
            redirect('auth/login');
        }
    }

    public function gantiPassword(){
        if(!$this->session->userdata('reset_email')){
            redirect('auth/login');
        }

        $this->form_validation->set_rules('password_1','password','required|matches[password_2]',['required'=>'password Wajib Diisi','matches'=>'Password tidak sama']);
        $this->form_validation->set_rules('password_2','ulangi password','required|matches[password_1]');

        if($this->form_validation->run() == false){
            $this->load->view('template/header');
            $this->load->view('ganti_password');
            $this->load->view('template/footer');
        }else{
            //$password = password_hash($this->input->post('password_1'),PASSWORD_DEFAULT);
            $password = $this->input->post('password_1');
            $email    = $this->session->userdata('reset_email');

            $this->db->set('password',$password);
            $this->db->where('email',$email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            password sudah diubah!!! silahkan login menggunakan password baru
            </div>');
            redirect('auth/login');
        }
    }
}

?>