<?php 
class Registrasi extends CI_Controller{

    public function index(){
        $this->form_validation->set_rules('nama','nama','required',['required'=>'Nama Wajib Diisi']);
        $this->form_validation->set_rules('email','email','required',['required'=>'email Wajib Diisi']);
        $this->form_validation->set_rules('password_1','password','required|matches[password_2]',['required'=>'password Wajib Diisi','matches'=>'Password tidak sama']);
        $this->form_validation->set_rules('password_2','password','required|matches[password_1]');

        if($this->form_validation->run()==false){
            $this->load->view('template/header');
            $this->load->view('registrasi');
            $this->load->view('template/footer');
        } else {
            $id            ='';
            $nama          =$this->input->post('nama');
            $email         =$this->input->post('email');
            $password      =$this->input->post('password_1');
            $img_profil    =$_FILES['img_profil']['name'];
                if ($img_profil =''){}else{
                    $config['upload_path']  ='./uploads';
                    $config['allowed_types'] ='jpg|jpeg|png|gif';

                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('img_profil')){
                        echo "gambar gagal diupload!";
                    }else{
                        $img_profil=$this->upload->data('file_name');
                    }
                }
            $data = array(
                'id'         =>$id,
                'nama'       =>$nama,
                'email'      =>$email,
                'password'   =>$password,
                'img_profil' =>$img_profil,
            );
            $this->db->insert('user',$data);
            redirect('auth/login');
        }
    }
}
?>