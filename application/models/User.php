<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Alphy
 */
class User extends CI_Model {
  public $Auth;
  
    
    function EncryptPass($pass){
      return $this->Auth = User_authentication::cryptPass($input);
    }
                  
    function RegisterUser(){
        $name=  $this->input->post('rname');
        $phone=  $this->input->post('rphone');
        $email=  $this->input->post('remail');
        $password=  $this->input->post('rpassword');
        
        $register = array(
          'uacc_username'=>$name,
          'uacc_phone'=>$phone,
          'uacc_email'=>$email,
          'uacc_password'=>  $this->EncryptPass($password),
          'uacc_date_added'=>date('M. Y')
        );
        $this->db->insert('user_accounts',$register);
    }
    
     function RegisterInvitedUser($u,$code){
        if($this->checkCode($code)<=0){
            echo 1;
        }else if($this->checkCodeUse($code)>0):
            echo 2;
        else:
        $name=  $this->input->post('rname');
        $phone=  $this->input->post('rphone');
        $email=  $this->input->post('remail');
        $password=  $this->input->post('rpassword');
        
        $register = array(
          'uacc_username'=>$name,
          'uacc_phone'=>$phone,
          'uacc_email'=>$email,
          'uacc_password'=>  $this->EncryptPass($password),
          'uacc_date_added'=>date('M. Y'),
          'token'=>'20'
        );
        $this->db->insert('user_accounts',$register);
        $this->userAward($u, $code);
    endif;
    }
    
    function userAward($u,$code){
        $this->db->query("UPDATE user_accounts SET token = token + 10 WHERE uacc_id='$u'"); 
        $this->db->query("UPDATE referals SET status = '1' WHERE referal_code='$code'");
    }
    
    function checkCodeUse($code){
        return $this->db
                ->where('referal_code',$code)
                ->where('status','1')
                ->get('referals')
                ->num_rows();
    }
      function checkCode($code){
        return $this->db
                ->where('referal_code',$code)            
                ->get('referals')
                ->num_rows();
    }
    
    
    
       function EditUser($id){
        $name=  $this->input->post('rname');
        $phone=  $this->input->post('rphone');
        $email=  $this->input->post('remail');
        $password=  $this->input->post('rrole');
        
        $register = array(
          'uacc_username'=>$name,
          'uacc_phone'=>$phone,
          'uacc_email'=>$email,
          'uacc_group_fk'=>  $password,
          
        );
        $this->db->where('uacc_id',$id)->update('user_accounts',$register);
    }
    

    

    
    
}
