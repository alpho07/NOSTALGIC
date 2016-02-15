<?php

if ($user_role === '1') {
    $this->load->view('sections/sidebar/menus/member_menu');
} else if ($user_role == '2') {
    $this->load->view('sections/sidebar/menus/supervisor_menu');
} else {
    $this->load->view('sections/sidebar/menus/admin_menu');
}
