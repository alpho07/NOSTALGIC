<?php

require APPPATH . 'libraries/OAuth.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ps4_Controller
 *
 * @author Alphy
 */
class PS_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->library('OAuth');
    }

    function harris() {
        echo '1111';
    }

    function getHeaderFooter() {

        return $this->db->get('system_name')->result();
    }

    function getUsers1() {
        return $this->db->get('user_accounts')->result();
    }

    function getGames() {
        return $this->db->get('games_inventory')->result();
    }

    function getTotalCost() {

        return $this->db->query("SELECT FORMAT(SUM(amount_owed+token_cost),2) as all_sales FROM `ps_daily_usage` ")->result();
    }

    function getDailyCost() {

        return $this->db->query("SELECT FORMAT(SUM(amount_owed+token_cost),2) as all_sales FROM `ps_daily_usage` WHERE DATE_FORMAT(end_time,'%Y-%m-%d') = CURDATE()")->result();
    }

    function getMemberLevel() {
        return $this->db->get('member_levels')->result();
    }

    function getGameLevel() {
        return $this->db->get('gaming_level')->result();
    }

    function getMessageCount($uid) {
        return $this->db
                        ->where('uid', $uid)
                        ->where('status', '0')
                        ->get('player_messages')->num_rows();
    }

    function getInvoiceCount($uid) {
        return $this->db->where('uid', $uid)->where('status', '0')->get('ps_daily_usage')->num_rows();
    }

    function getMessage($uid) {
        return $this->db
                        ->where('uid', $uid)
                        ->where('status', '0')
                        ->get('player_messages')->result();
    }

    function getMyHistory($uid) {
        return $this->db->query("SELECT pd.*, gi.game_name,ua.uacc_gl,gl.level,gl.cost
                                    FROM ps_daily_usage pd, games_inventory gi, user_accounts ua, gaming_level gl
                                    WHERE pd.gid = gi.id
                                    AND pd.uid = ua.uacc_id
                                    AND ua.uacc_gl = gl.id
                                    AND pd.uid ='$uid' ")->result();
    }

    function getMyMessage($mid) {
        $uid = $this->session->userdata('user_id');
        $this->db
                ->where('uid', $uid)
                ->where('id', $mid)
                ->update('player_messages', array('status' => '1'));

        return $this->db
                        ->where('uid', $uid)
                        ->where('id', $mid)
                        ->get('player_messages')->result();
    }

    function getInvoice($uid) {
        return $this->db->query("SELECT pd.*, gi.game_name,ua.uacc_gl,gl.level,gl.cost
                                    FROM ps_daily_usage pd, games_inventory gi, user_accounts ua, gaming_level gl
                                    WHERE pd.gid = gi.id
                                    AND pd.uid = ua.uacc_id
                                    AND ua.uacc_gl = gl.id
                                    AND pd.uid ='$uid' ")->result();
    }

    function getMyInvoice($id) {
        return $this->db->query("SELECT pd.*, gi.game_name,ua.uacc_gl,gl.level,gl.cost
                                    FROM ps_daily_usage pd, games_inventory gi, user_accounts ua, gaming_level gl
                                    WHERE pd.gid = gi.id
                                    AND pd.uid = ua.uacc_id
                                    AND ua.uacc_gl = gl.id
                                    AND pd.id ='$id' ")->result();
    }

    function getAllInvoices() {
        echo json_encode($this->db->query("SELECT pd.*, gi.game_name,ua.uacc_gl,gl.level,gl.cost,ua.uacc_username
                                    FROM ps_daily_usage pd, games_inventory gi, user_accounts ua, gaming_level gl
                                    WHERE pd.gid = gi.id
                                    AND pd.uid = ua.uacc_id
                                    AND ua.uacc_gl = gl.id
                                  ")->result());
    }

    function getAllInvoicesToday() {
        echo json_encode($this->db->query("SELECT pd.*, gi.game_name,ua.uacc_gl,gl.level,gl.cost,ua.uacc_username
                                    FROM ps_daily_usage pd, games_inventory gi, user_accounts ua, gaming_level gl
                                    WHERE pd.gid = gi.id
                                    AND pd.uid = ua.uacc_id
                                    AND ua.uacc_gl = gl.id
                                    AND DATE_FORMAT(pd.end_time,'%Y-%m-%d') = CURDATE() 
                                  ")->result());
    }

    function AccessDenied() {
        $data['title'] = '500 | Access Denied!';
        $this->load->view('pages/warning', $data);
    }

    function showMetomyPage() {
        $role = $this->session->userdata('role');
        if ($role == '1') {
            redirect('ps/ps_mydashboard');
        } else if ($role == '2') {
            redirect('ps/ps_s_dashboard');
        } else {
            redirect('ps/dashboard');
        }
    }

    function pesapal() {
        //pesapal params
        $token = $params = NULL;

        /*
          PesaPal Sandbox is at http://demo.pesapal.com. Use this to test your developement and
          when you are ready to go live change to https://www.pesapal.com.
         */
        $consumer_key = ' 4/4lmsqsHf7QHIrBYnY0oep+oAbOi1AH'; //Register a merchant account on
        //demo.pesapal.com and use the merchant key for testing.
        //When you are ready to go live make sure you change the key to the live account
        //registered on www.pesapal.com!
        $consumer_secret = 'AiC8CsR0sB9lx7YO0JTWuQIhwpM='; // Use the secret from your test
        //account on demo.pesapal.com. When you are ready to go live make sure you 
        //change the secret to the live account registered on www.pesapal.com!
        $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
        $iframelink = 'http://demo.pesapal.com/api/PostPesapalDirectOrderV4'; //change to      
        //https://www.pesapal.com/API/PostPesapalDirectOrderV4 when you are ready to go live!
//get form details
        $amount = $this->input->post('amount');
        $amount = number_format($amount, 2); //format amount to 2 decimal places
        
        
        $desc = 'PS Gaming Payment';
$type = 'MERCHANT'; //default value = MERCHANT
$reference = '2147483647';//unique order id of the transaction, generated by merchant
$first_name = 'Tom';
$last_name = "Nyang'au";
$email = 'mkate@harristumbo.com';
$phonenumber = '0715882227';//ONE of email or phonenumber is required



        $callback_url = base_url(); //redirect url, the page that will handle the response from pesapal.

        $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"" . $amount . "\" Description=\"" . $desc . "\" Type=\"" . $type . "\" Reference=\"" . $reference . "\" FirstName=\"" . $first_name . "\" LastName=\"" . $last_name . "\" Email=\"" . $email . "\" PhoneNumber=\"" . $phonenumber . "\" xmlns=\"http://www.pesapal.com\" />";
        $post_xml = htmlentities($post_xml);

        $consumer = new OAuthConsumer($consumer_key, $consumer_secret);

//post transaction to pesapal
        $iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
        $iframe_src->set_parameter("oauth_callback", $callback_url);
        $iframe_src->set_parameter("pesapal_request_data", $post_xml);
        $iframe_src->sign_request($signature_method, $consumer, $token);

//display pesapal - iframe and pass iframe_src

        $html = '<iframe src="' . $iframe_src . '" width="100%" height="700px"  scrolling="no" frameBorder="0">
    <p>Browser unable to load iFrame</p>
</iframe>';
        echo $html;
    }

    function render($data) {
        $data['uid'] = $uid = $this->session->userdata('user_id');
        $data['token'] = $this->session->userdata('token');
        $data['area'] = $this->uri->segment(2);
        $data['user_role'] = $this->session->userdata('role');
        $data['sys_name'] = $this->getHeaderFooter();
        $data['dailycost'] = $this->getDailyCost();
        $data['totalcost'] = $this->getTotalCost();
        $data['mlevels'] = $this->getMemberLevel();
        $data['musers'] = $this->getUsers1();
        $data['mgames'] = $this->getGames();
        $data['glevels'] = $this->getGameLevel();
        $data['mcount'] = $this->getMessageCount($uid);
        $data['icount'] = $this->getInvoiceCount($uid);
        $data['messages'] = $this->getMessage($uid);
        $data['invoices'] = $this->getInvoice($uid);
        $data['myhistory'] = $this->getMyHistory($uid);
        $this->load->view('main/ps_template', $data);
    }

    function isLoggedIn($data) {
        if (!$this->session->userdata('user_id')) {
            $this->load->view('pages/login');
        } else {
            $this->load->view('main/ps_template', $data);
        }
    }

}
