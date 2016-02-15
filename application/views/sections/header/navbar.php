<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-fixed-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success"><?php echo $mcount;?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have <?php echo $mcount;?> messages</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                       <?php 
                   
                       foreach ($messages as $m):?>
                            <li>
                                <a href="<?php echo base_url()."ps/my_mailbox/".$m->id;?>/#u/0/inbox">
                                    <div class="pull-left">
                                        <img src="<?php echo base_url(); ?>dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                       PS Admin @  <?php echo @$sys_name[0]->sys_name;?>
                               
                                       <small><i class="fa fa-clock-o"></i><?php echo $m->date_sent;?></small>
                                    </h4>
                                    <p><?php echo $m->subject;?></p>
                                </a>
                            </li>
                            <?php endforeach;?>
                     
                       
                        </ul>
                    </li>
                    <li class="footer"><a href="<?php echo base_url();?>ps/my_mailbox/">See All Messages</a></li>
                </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning"><?php echo $icount;?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have <?php echo $icount;?> payment notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                       <?php foreach ($invoices as $i):?>
                            <li>
                                <a href="<?php echo base_url()."ps/my_account/".$i->id;?>/#u/0/invoicebox">
                                    <i class="fa fa-shopping-cart text-green"></i> You played <?php echo $i->game_name .' for '.$i->dur .'Min(s). Pay '.$i->amount_owed .'/-';?>
                                </a>
                            </li>
                   
                        <?php endforeach;?>
                        </ul>
                    </li>
                    <li class="footer"><a href="<?php echo base_url();?>ps/my_gamingInvoices/">View all</a></li>
                </ul>
            </li>
  
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url(); ?>dist/img/user2-160x160.png" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo $this->session->userdata('current_user');?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="<?php echo base_url(); ?>dist/img/user2-160x160.png" class="img-circle" alt="User Image">
                        <p>
                            <?php echo $this->session->userdata('current_user') .' - '.$this->session->userdata('current_group');?>
                            <small>Member since  <?php echo $this->session->userdata('member_since');?></small>
                        </p>
                    </li>
                    <!-- Menu Body -->
<!--                    <li class="user-body">
                        <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </li>-->
                    <!-- Menu Footer-->
                    <li class="user-footer">
<!--                        <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>-->
                        <div class="pull-right">
                            <a href="<?php echo base_url();?>ps/doLogout/" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>

</nav>