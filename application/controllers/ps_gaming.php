<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ps_Gaming extends PS_Controller {

    function get_online() {
        echo json_encode($this->db->query("SELECT COUNT(`id`) AS status FROM ps_statistics WHERE status='1'")->result());
    }

    function get_offline() {
        echo json_encode($this->db->query("SELECT COUNT(`id`) AS status FROM ps_statistics WHERE status='0' ")->result());
    }

    function get_token($id) {
        echo json_encode($this->db->query("SELECT token FROM user_accounts WHERE uacc_id='$id'  ")->result());
    }

    function get_timeplayed() {
        echo json_encode($this->db->query("SELECT SUM(dur) AS time FROM ps_daily_usage  ")->result());
    }

    function unassign_ps($id, $uid, $token) {
        $array = array(
            'uid' => '1',
            'gid' => '1',
            'assign_status' => '0',
            'status' => '0',
            'token' => '0'
        );
        $this->db->where('id', $id)->update('ps_statistics', $array);
        $this->db->query("UPDATE user_accounts SET token = token + $token WHERE uacc_id='$uid'");
    }

    function getPSStatus() {
        $result = $this->db->query("SELECT ps.*, gi.game_name, u.uacc_username
FROM ps_statistics ps, games_inventory gi, user_accounts u 
WHERE ps.uid = u.uacc_id
AND ps.gid = gi.id")->result();
        echo json_encode($result);
    }

    function getPSStatusById($id) {
        $result = $this->db->query("SELECT ps.*, gi.game_name, u.uacc_username
FROM ps_statistics ps, games_inventory gi, user_accounts u 
WHERE ps.uid = u.uacc_id
AND ps.gid = gi.id
AND ps.id='$id'")->result();
        echo json_encode($result);
    }

    function getPSStatus_1() {
        $result = $this->db->query("select * from ps_statistics")->result();
        echo json_encode(array('result' => $result));
    }

    function getPSStatus_byID($ip) {
        //$ip= $this->input->get('ip_addr');
        $result = $this->db->query("select * from ps_statistics where ip_addr='$ip'")->result();
        echo json_encode(array('result' => $result));
    }

    function updatePS($id) {
        $ps_no = $this->input->post('ps_no');
        $ip_addr = $this->input->post('ip_addr');
        $uarray = array('ps_no' => $ps_no, 'ip_addr' => $ip_addr);
        $updated = $this->db->where('id', $id)->update('ps_statistics', $uarray);

        if ($updated == true) {
            echo 'Device No. ' . $id . ' Updated Successfully!';
        } else {
            echo $this->db->_error_message();
        }
    }

    function delete_ps($id) {
        $delete = $this->db->where('id', $id)->delete('ps_statistics');
        if ($delete == true) {
            echo $id . ' Record has been successfully been deleted';
        } else {
            echo $this->db->_error_message();
        }
    }

    function delete_user($id) {
        $this->db->where('uacc_id', $id)->delete('user_accounts');
    }

    function clear_player($id) {
        $this->db->where('id', $id)->update('ps_daily_usage', array('status' => 1));
    }

    function get_ips() {
        $result = $this->db->query("select ps_no, ip_addr,status from ps_statistics")->result();
        return $result;
    }

    function save_costs() {
        $s_ps_no_i = $this->input->post('s_ps_no_i');
        $s_end_i = $this->input->post('s_end_i');
        $s_start_i = $this->input->post('s_start_i');
        $s_duration_i = $this->input->post('s_duration_i');
        $s_amount_i = $this->input->post('s_amount_i');
        $ticket_no = $this->input->post('ticket_no');
        $token = $this->input->post('s_token_i');
        $token_cost = $this->input->post('s_token_ki');
        $token_balance = $this->input->post('s_token_kib');
        $uid = $this->input->post('uid');
        $gid = $this->input->post('gid');
        $ps_palyer = $this->input->post('ps_palyer');

        $cost_saving = array(
            'ps_no' => $s_ps_no_i,
            'date_added' => date('d-m-Y'),
            'start_time' => $s_start_i,
            'end_time' => $s_end_i,
            'dur' => $s_duration_i,
            'ticket_number' => $ticket_no,
            'amount_owed' => $s_amount_i,
            'uid' => $uid,
            'gid' => $gid,
            'token'=>$token,
            'token_cost'=>$token_cost
        );
        if($token_balance > 0){
        $this->db->query("UPDATE user_accounts SET token = token + $token_balance WHERE uacc_id='$uid' ");

        }else{
             $this->db->query("UPDATE user_accounts SET token = '0' WHERE uacc_id='$uid' ");

        }
        $this->db->insert('ps_daily_usage', $cost_saving);
        $this->upgardeGamer($uid, $ps_palyer);
        
    }

    function upgardeGamer($uid, $player) {
        $subject = "LEVEL UPGARADE!";
        $count = $this->db
                        ->select('SUM(dur) as determiner')
                        ->where('uid', $uid)
                        //->group_by('date_added')
                        ->get('ps_daily_usage')->result();
        $said_days = $this->db->get('gaming_level')->result();

        if ($count[0]->determiner < 60) {
            echo 'You remain Brass level';
        } else if ($count[0]->determiner >= 60 && $count[0]->determiner <= 120) {
            $message = "Congratulations $player, You gaming level has been upgraded to " . strtoupper($said_days[1]->level) . ", "
                    . "you will now pay " . $said_days[1]->cost . "/- for any game you play per minute from the previous " . $said_days[0]->cost . "/- "
                    . "PLAY MORE AND GET MORE DISCOUNT ";
            $this->db->where('uacc_id', $uid)->update('user_accounts', array('uacc_gl' => '2'));
            $this->sendPlayerMessage($uid, $subject, $message);
        } else if ($count[0]->determiner >= 120 && $count[0]->determiner <= 180) {
            $message = "Congratulations $player, You gaming level has been upgraded to " . strtoupper($said_days[2]->level) . ", "
                    . "you will now pay " . $said_days[2]->cost . "/- for any game you play per minute from the previous " . $said_days[1]->cost . "/- "
                    . "PLAY MORE AND GET MORE DISCOUNT ";
            $this->db->where('uacc_id', $uid)->update('user_accounts', array('uacc_gl' => '3'));
            $this->sendPlayerMessage($uid, $subject, $message);
        } elseif ($count[0]->determiner >= 180 && $count[0]->determiner <= 250) {
            $message = "Congratulations $player, You gaming level has been upgraded to " . strtoupper($said_days[3]->level) . ", "
                    . "you will now pay " . $said_days[3]->cost . "/- for any game you play per minute from the previous " . $said_days[2]->cost . "/- "
                    . "PLAY MORE AND GET EVEN MORE DISCOUNT ";
            $this->db->where('uacc_id', $uid)->update('user_accounts', array('uacc_gl' => '4'));
            $this->sendPlayerMessage($uid, $subject, $message);
        } else {
            echo 'You stay in that level' . $count;
        }
    }
    
    
     function upgardeGamer2($uid, $player) {
        $subject = "LEVEL UPGARADE!";
        $count = $this->db
                        ->select('SUM(dur) as determiner')
                        ->where('uid', $uid)
                        ->group_by('date_added')
                        ->get('ps_daily_usage')->num_rows();
        $said_days = $this->db->get('gaming_level')->result();

        if ($count <= $said_days[0]->days) {
            echo 'You remain Brass level';
        } else if ($count == $said_days[1]->days) {
            $message = "Congratulations $player, You gaming level has been upgraded to " . strtoupper($said_days[1]->level) . ", "
                    . "you will now pay " . $said_days[1]->cost . "/- for any game you play per minute from the previous " . $said_days[0]->cost . "/- "
                    . "PLAY MORE AND GET MORE DISCOUNT ";
            $this->db->where('uacc_id', $uid)->update('user_accounts', array('uacc_gl' => '2'));
            $this->sendPlayerMessage($uid, $subject, $message);
        } else if ($count == $said_days[2]->days) {
            $message = "Congratulations $player, You gaming level has been upgraded to " . strtoupper($said_days[2]->level) . ", "
                    . "you will now pay " . $said_days[2]->cost . "/- for any game you play per minute from the previous " . $said_days[1]->cost . "/- "
                    . "PLAY MORE AND GET MORE DISCOUNT ";
            $this->db->where('uacc_id', $uid)->update('user_accounts', array('uacc_gl' => '3'));
            $this->sendPlayerMessage($uid, $subject, $message);
        } elseif ($count == $said_days[3]->days) {
            $message = "Congratulations $player, You gaming level has been upgraded to " . strtoupper($said_days[3]->level) . ", "
                    . "you will now pay " . $said_days[3]->cost . "/- for any game you play per minute from the previous " . $said_days[2]->cost . "/- "
                    . "PLAY MORE AND GET EVEN MORE DISCOUNT ";
            $this->db->where('uacc_id', $uid)->update('user_accounts', array('uacc_gl' => '4'));
            $this->sendPlayerMessage($uid, $subject, $message);
        } else {
            echo 'You stay in that level' . $count;
        }
    }


    function sendPlayerMessage($uid, $subject, $message) {
        $cost_saving = array(
            'uid' => $uid,
            'subject' => strtoupper($subject),
            'message' => $message,
        );
        $this->db->insert('player_messages', $cost_saving);
    }

    function register_user() {

        $cost_saving = array(
            'ps_name' => $this->input->post('name'),
            'ps_username' => $this->input->post('username'),
            'ps_email' => $this->input->post('email'),
            'ps_password' => sha1($this->login_salt($this->input->post('password')) . $this->input->post('password')),
        );
        $result = $this->db->insert('ps_login', $cost_saving);

        if ($result == TRUE) {
            echo "User Successfully Registered";
        } else {
            echo $this->db->_error_message();
        }
    }

    function run_check() {
        $array = $this->get_ips();
        foreach ($array as $host) {
            exec("ping -n 2 -w 1 $host->ip_addr", $input, $result);
            if ($result == 0) {

                if ($host->status == '1'):
                    $now = date("Y-m-d H:i:s");
                    $this->db->query("UPDATE ps_statistics SET dur=TIMESTAMPDIFF(MINUTE,`start_time`,'$now') WHERE ip_addr='$host->ip_addr'");

                    echo '';
                else:

                    $this->db->where('ip_addr', $host->ip_addr)->update('ps_statistics', array('start_time' => date("Y-m-d H:i:s"), 'end_time' => 'Still Online', 'status' => '1'));
                    echo json_encode('on' . $host->ps_no);
                endif;
            } else {

                if ($host->status == '0'):
                    echo '';
                else:
                    $this->db->where('ip_addr', $host->ip_addr)->update('ps_statistics', array('end_time' => date("Y-m-d H:i:s"), 'status' => '0','assign_status'=>'0'));
                    $this->db->query("UPDATE ps_statistics SET dur=TIMESTAMPDIFF(MINUTE,`start_time`,`end_time`) WHERE ip_addr='$host->ip_addr'");
                    $gone_down = 'off' . $host->ps_no;
                    echo json_encode($gone_down);
                endif;
            }
        }
    }

    function load_owed_amount($ip_addr) {
        echo json_encode($this->db->where('ip_addr', $ip_addr)->get('ps_statistics')->result());
    }
    
    function check_5(){
      echo json_encode($this->db->query("SELECT id, (token-dur) as remtime FROM ps_statistics WHERE status='1'")->result()) ; 
    }

    function ps_validateLogin() {
        error_reporting(0);
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->db->query(" select * from ps_login where ps_email = '$email'")->result();
        $db_password = $result[0]->ps_password;

        if ($db_password === sha1($this->login_salt($password) . $password)):
            $session_array = array(
                'user_id' => $result[0]->id,
                'username' => $result[0]->ps_username
            );
            $this->session->set_userdata($session_array);

            redirect('/');
        else:
            $data['error'] = 'Wrong username or password!';
            $this->load->view('login', $data);
        endif;
    }

    function ps_validateLogin_android() {
        error_reporting(0);
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->db->query(" select * from ps_login where ps_email = '$email'")->result();
        $db_password = $result[0]->ps_password;

        if ($db_password === sha1($this->login_salt($password) . $password)):
            $session_array = array(
                'user_id' => $result[0]->id,
                'username' => $result[0]->ps_username
            );
            // $this->session->set_userdata($session_array);

            echo 'success';
        else:
            echo 'Wrong username or password!';

        endif;
    }

    function get_session_ticket($ip_addr) {
        $ps_no = str_replace("_", '', $ip_addr);
        echo json_encode($this->db->query("SELECT ps.*,gl.level,gl.cost,gl.days, gi.game_name, u.uacc_username
FROM ps_statistics ps, games_inventory gi, user_accounts u ,gaming_level gl
WHERE ps.uid = u.uacc_id
AND ps.gid = gi.id
AND u.uacc_gl = gl.id
AND ps.id='$ps_no'")->result());
    }

    function savePS() {
        $ps_no = $this->input->post('ps_number');
        $ip = $this->input->post('ps_ip_address');
        $array_data = array(
            'ps_no' => $ps_no,
            'ip_addr' => $ip,
            'start_time' => '',
            'end_time' => '',
            'dur' => '',
            'status' => '',
            'amount_owed' => '0.00',
        );
        $return = $this->db->insert('ps_statistics', $array_data);
        if ($return == true) {
            echo 'Device Successfully Added!';
        } else {
            echo $this->db->_error_message();
        }
    }

    function saveGame() {
        $ps_no = $this->input->post('game_name');

        $array_data = array(
            'game_name' => $ps_no,
        );
        $return = $this->db->insert('games_inventory', $array_data);
        if ($return == true) {
            echo 'Game Successfully Added!';
        } else {
            echo $this->db->_error_message();
        }
    }

    function get_last_number() {
        $query = $this->db->query("SELECT MAX(id) AS last_id FROM ps_statistics")->result();
        $query2 = $this->db->where('id', $query[0]->last_id)->get('ps_statistics')->result();
        echo json_encode($query2);
    }

    function get_last_number_android() {
        $query = $this->db->query("SELECT MAX(id) AS last_id FROM ps_statistics")->result();
        $query2 = $this->db->where('id', $query[0]->last_id)->get('ps_statistics')->result();
        echo json_encode(array('result' => $query));
    }

}
