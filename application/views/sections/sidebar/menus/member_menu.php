<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
 
    <li>
        <a href="<?php echo base_url();?>ps/my_mailbox/">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <small class="label pull-right bg-yellow"><?php echo $mcount;?></small>
        </a>
    </li>
    
     <li>
        <a href="<?php echo base_url();?>ps/my_gamingHistory/">
            <i class="fa fa-archive"></i> <span>Gaming History</span>
           
        </a>
    </li>
    
     <li>
        <a href="<?php echo base_url();?>ps/my_gamingInvoices/">
            <i class="fa fa-money"></i> <span>Receipts</span>
            <small class="label pull-right bg-aqua"><?php echo $icount;?></small>
            
        </a>
    </li>
  
</ul>