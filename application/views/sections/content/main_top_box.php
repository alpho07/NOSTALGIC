<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($area == 'dashboard') {
    $this->load->view('sections/content/small_top_boxes_admin');
} else if ($area == 'ps_dashboard') {
    $this->load->view('sections/content/small_top_boxes_ps');
} else {
    $this->load->view('sections/content/small_top_boxes_member');
}

