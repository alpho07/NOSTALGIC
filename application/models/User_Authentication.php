<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_authentication extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function check_client_details($username) {
        $u_avail = $this->db->where('client_username', $username)->get('client_user_details')->num_rows();
        if ($u_avail > 0) {
            $query = $this->db->select('uuid_status')->where('uuid_username', $username)->get('client_applications')->result();
            if ($query[0]->uuid_status === '0') {
                return 'status_default';
            } else {
                return 'status_activated';
            }
        } else {
            return 'username_na';
        }
    }

    function check_user_details($username, $password) {
        $u_avail = $this->db->where('uacc_email', $username)->get('user_accounts')->num_rows();
        if ($u_avail > 0) {
            $return = 'success';
            $this->changePassword($username, $password);
        } else {
            $return = 'fail';
        }
        echo $return;
    }

    function changePassword($email, $password) {
        $this->db->where('uacc_email', $email)
                ->update('user_accounts', array('uacc_password' => $this->cryptPass($password)));
    }

    function cryptPass($input, $rounds = 9) {
        $salt = "";
        $saltChars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        for ($i = 0; $i < 22; $i++):
            $salt.=$saltChars[array_rand($saltChars)];
        endfor;
        return crypt($input, sprintf("$2y$%02d$", $rounds) . $salt);
    }

    function keySalt($sv) {
        return sha1('`^@345=-)97b~!' . $sv);
    }

    function Authenticate_user($username, $password) {

        $u_avail = $this->db->query("SELECT uac.*,ugr.*
             FROM user_accounts uac, user_groups ugr 
             WHERE uac.uacc_group_fk = ugr.ugrp_id
             AND uac.uacc_email='$username' 
            ")->result();

        foreach ($u_avail as $u_d):
            //  $hasedPass = $this->cryptPass($password); 
            //   var_dump($u_d);

            if (crypt($password, $u_d->uacc_password) === $u_d->uacc_password) :

                $session_db = array(
                    'username' => $u_d->uacc_username,
                    'current_user' => $u_d->uacc_username,
                    'user_email' => $u_d->uacc_email,
                    'user_phone' => $u_d->uacc_phone,
                    'current_group' => $u_d->ugrp_name,
                    'member_since' => $u_d->uacc_date_added,
                    'user_id' => $u_d->uacc_id,
                    'role' => $u_d->uacc_group_fk,
                    'token' => $u_d->token
                );
                $this->session->set_userdata($session_db);


                $return = 'success';
            else :
                $return = 'fail';
            endif;
            echo $return;
        endforeach;
    }

    function activate_account($username, $code_1) {
        $u_avail = $this->db->where('uuid_username', $username)->get('client_applications')->result();
        $code = substr($code_1, 4);
        foreach ($u_avail as $u_d):
            $hasedPass = $this->keySalt($code);
            if ($u_d->uuid_hash == $hasedPass) {
                $this->db->where('company_uuid', $code_1)->update('client_applications', array('uuid_status' => '1'));
                return 'success';
            } else {
                return 'fail';
            }
        endforeach;
    }

    function kill_session() {
        $CI = &get_instance();
        $session_items = array(
            'username' => '',
            'current_user' => '',
            'current_group' => '',
            'user_id' => '',
            'role' => ''
        );
        $CI->session->unset_userdata($session_items);
        $this->session->sess_destroy();
        redirect('/');
    }

    function getLoginDetails($u) {
        $details = $this->db->where('client_username', $u)->get('client_user_details')->result();
    }

}
