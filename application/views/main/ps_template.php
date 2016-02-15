<?php

if (empty($this->session->userdata('user_id'))) {
    redirect('ps/login/');
} else {
    $this->load->view('sections/header/header');
    $this->load->view('sections/header/main_header');
    $this->load->view('sections/sidebar/main_sidebar');
    $this->load->view('sections/content/main_content');
    $this->load->view('sections/footer/footer');
}
?>


