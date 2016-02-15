<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome
 *
 * @author Alphy
 */
class Ps extends PS_Controller {

    protected $Auth;
    protected $User;

    function __construct() {
        parent::__construct();
        $this->User = new User();
        $this->Auth = new User_Authentication();
    }

    function index() {
        $this->showMetomyPage();
    }

    function login() {
        $this->load->view('pages/login');
    }
     function invited_friend() {
         $data['u']= $this->uri->segment(3);
         $data['c']= $this->uri->segment(4);
        $this->load->view('pages/referal_registration',$data);
    }

    function doRegister() {
        $this->User->RegisterUser();
      
    }
    
    function doRegisterInvitedUser($u,$c){
        $this->User->RegisterInvitedUser($u, $c); 
    }

    function doUserUpdate($id) {
        $this->User->EditUser($id);
    }

    function doLogin() {
        $username = $this->input->post('lemail');
        $password = $this->input->post('lpass');
        $this->Auth->Authenticate_user($username, $password);
    }
    
    function credit_account($id){
        $token=  $this->input->post('token_minutes');
          $this->db->query("UPDATE user_accounts SET token = token + $token WHERE uacc_id='$id' ");
    }
    
     function debit_account($id){
        $token=  $this->input->post('token_minutes1');
          $this->db->query("UPDATE user_accounts SET token = token - $token WHERE uacc_id='$id' ");
    }

    function doAssignment($id) {
    
        $uid = $this->input->post('uid');
        $gid = $this->input->post('gid');
        $token = $this->input->post('b_o_r');
        
      echo  $token_action = $this->input->post('token_action');
       
        

        $array = array(
            'uid' => $uid,
            'gid' => $gid,
            'assign_status'=>'1',
            'dur'=>'0'
           
     
        );
        $this->db->where('id', $id)->update('ps_statistics', $array);
         if($token_action=='Redeem'){
         $this->db->query("UPDATE ps_statistics SET token = '$token' WHERE id='$id' ");

            $this->db->query("UPDATE user_accounts SET token = token - 10 WHERE uacc_id='$uid' ");
        }else{
            $this->db->query("UPDATE ps_statistics SET token = '$token'  WHERE id='$id'  ");

        }
    }

    function doLogout() {
        $this->Auth->kill_session();
    }

    function doUserEmailCheck() {


        $username = $this->input->post('pemail');
        $password = $this->input->post('ppass');
        $this->Auth->check_user_details($username, $password);
    }

    function updateSiteInfo() {
        $this->db->truncate('system_name');
        $this->db->truncate('gaming_level');
        $this->db->truncate('member_levels');

        $title = $this->input->post('site_name');
        $footer = $this->input->post('footer');
        $website = $this->input->post('website');
        $address = $this->input->post('site_address');
        $phone = $this->input->post('site_phone');
        $email = $this->input->post('site_email');

        $site_info = array(
            'sys_name' => $title,
            'footer' => $footer,
            'website' => $website,
            'address' => $address,
            'phone' => $phone,
            'email' => $email
        );
        $this->db->insert('system_name', $site_info);
        $m_level = $this->input->post('m_level');

        for ($i = 0; $i < count($m_level); $i++):
            $ml = array(
                'level' => $m_level[$i]
            );
            $this->db->insert('member_levels', $ml);
        endfor;

        $g_level = $this->input->post('g_level');
        $g_days = $this->input->post('g_days');
        $g_cost = $this->input->post('g_cost');

        for ($i = 0; $i < count($g_level); $i++):
            $gl = array(
                'level' => $g_level[$i],
                'days' => $g_days[$i],
                'cost' => $g_cost[$i]
            );
            $this->db->insert('gaming_level', $gl);
        endfor;
    }

    function getUsers() {
        $q = $this->db->query("SELECT u.*, m.level FROM user_accounts u, member_levels m WHERE u.uacc_group_fk = m.id ")->result();

        if (empty($q)):
            echo '[]';
        else:
            echo json_encode($q);
        endif;
    }

    function getUsersById($id) {
        $q = $this->db->query("SELECT u.*, m.level FROM user_accounts u, member_levels m WHERE u.uacc_group_fk = m.id AND u.uacc_id='$id'")->result();

        if (empty($q)):
            echo '[]';
        else:
            echo json_encode($q);
        endif;
    }

    function dashboard() {
 
        $data['title'] = 'PS Dashboard';
        $data['contents'] = 'pages/sample_dash';
        $this->render($data);
    }

    function ps_s_dashboard() {

        $data['title'] = 'PS Dashboard';
        $data['contents'] = 'pages/sample_dash';
        $this->render($data);
    }

    function ps_mydashboard() {
        $data['title'] = 'My Area';
        $data['contents'] = 'pages/ps_my_area';
        $this->render($data);
    }

    function my_mailbox() {
        $data['title'] = 'Mailbox';
        $data['contents'] = 'pages/mailbox/mailbox';
        $this->render($data);
    }

    function my_account($id) {
        $data['title'] = 'Invoice';
        $data['inv'] = $this->getMyInvoice($id);
        $data['contents'] = 'pages/invoice/invoice';
        $this->render($data);
    }

    function my_gamingHistory() {
        $data['title'] = 'My Gaming History';
        $data['contents'] = 'pages/gaming_history';
        $this->render($data);
    }

    function my_gamingInvoices() {
        $data['title'] = 'My Gaming Invoices';
        $data['contents'] = 'pages/gaming_receipts';
        $this->render($data);
    }

    function read_mail($mid) {
        $data['title'] = 'Mailbox - Read';
        $data['mymessage'] = $this->getMyMessage($mid);
        $data['contents'] = 'pages/mailbox/read_mail';
        $this->render($data);
    }

    function ps_dashboard() {
        $role = $this->session->userdata('role');
        if ($role == '1') {
            $this->AccessDenied();
        } else {
            $data['title'] = 'Activity Area';
            $data['contents'] = 'pages/ps_area';
            $this->render($data);
        }
    }

    function ps_members() {
        $role = $this->session->userdata('role');
        if ($role == '1') {
            $this->AccessDenied();
        } else {
            $data['title'] = 'Members Area';
            $data['contents'] = 'pages/ps_members_area';
            $this->render($data);
        }
    }

    function ps_allsessionInvoices() {
        $role = $this->session->userdata('role');
        if ($role == '1') {
            $this->AccessDenied();
        } else {
            $data['title'] = 'All Invoices';
            $data['contents'] = 'pages/invoice/ps_allinvoices';
            $this->render($data);
        }
    }
    
    
    function save_ref($u,$ref){
        $_ref = array(
            'user_id'=>  $u,
            'referal_code'=>  $ref
        );
        $this->db->insert('referals',$_ref);
    }

    function ps_settings() {
        $role = $this->session->userdata('role');
        if ($role == '1') {
            $this->AccessDenied();
        } else {
            $data['title'] = 'Settings Area';
            $data['contents'] = 'pages/ps_settings_area';
            $this->render($data);
        }
    }
}
    