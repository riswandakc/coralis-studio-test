<?php 
class Dashboard extends CI_Controller{
    
    public function index(){
        $data = $this->m_auth->ambil_data($this->session->userdata('email'));
        $data = array(
            'nama'       => $data->nama,
            'email'      => $data->email,
            'img_profil' => $data->img_profil,
        );

        $this->load->view('template/header');
        $this->load->view('dashboard',$data);
        $this->load->view('template/footer');
    }
}

?>