<?php

 Class Model_squrity extends CI_Model{
        function getsqurity(){
		//	return $this->ci->session->has_userdata('username') && $this->ci->session->has_userdata('password') && $this->ci->session->has_userdata('email');

        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->session->sess_destroy();
            redirect('Auth');
        }
    }
}
