<?php 
class M_auth extends Ci_model{
    public function cek_login(){
        $email = set_value('email');
        $password = set_value('password');

        $result   = $this->db->where('email',$email)
                             ->where('password',$password)
                             ->limit(1)
                             ->get('user');
        if($result->num_rows() > 0){
            return $result->row();
        } else {
            return array();
        }
    }

    public function ambil_data($id){
        $this->db->where('email', $id);
        return $this->db->get('user')->row();
    }
    
}

?>