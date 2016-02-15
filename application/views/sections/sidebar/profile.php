<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="<?php echo base_url(); ?>dist/img/user2-160x160.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p> <?php echo $this->session->userdata('current_user');?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>