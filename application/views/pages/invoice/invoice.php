<!-- Main content -->
<section class="invoice">
    <form method="post" action="<?php echo base_url();?>ps/pesapal/">
    <printarea>
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> <?php echo @$sys_name[0]->sys_name;?> Gaming Palour, ltd
                <small class="pull-right"> <?php echo date('l jS \of F Y h:i:s A');?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <?php if ($inv[0]->status == 0) { ?>
                <span class="btn btn-warning pull-right"><i class="fa fa-warning"></i> UNPAID INVOICE</span>
            <?php } else { ?>
                <span class="btn btn-success pull-right"><i class="fa fa-thumbs-o-up"></i> PAID!</span>
            <?php }; ?>
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong> <?php echo @$sys_name[0]->sys_name;?> Gaming Palour, ltd</strong><br>
                <?php echo @$sys_name[0]->address;?><br>                
                Phone: <?php echo @$sys_name[0]->phone;?><br>
                Email: <?php echo @$sys_name[0]->email;?>
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong><?php echo $this->session->userdata('current_user');?></strong><br>
                N/A<br>           
                Phone: <?php echo $this->session->userdata('user_phone');?><br>
                Email: <?php echo $this->session->userdata('user_email');?>
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice #<?php echo $inv[0]->ticket_number;?></b><br>
            <br>
            <b>Order ID:</b> <?php echo substr($inv[0]->ticket_number,-5);?><br>
            <b>Payment Due:</b> <?php echo $inv[0]->date_added;?><br>
            <b>Account:</b> <?php echo $this->session->userdata('current_user');?>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <th>Minutes(Played)</th>
                        <th>Ps No.</th>
                        <th>Game</th>
                        <th>Rate</th>  
                        <th>Description</th>  
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $inv[0]->dur;?> Min(s)</td>
                        <td><?php echo $inv[0]->ps_no;?></td>
                        <td><?php echo $inv[0]->game_name;?></td>
                        <td><?php echo $inv[0]->cost;?></td>    
                          <td>Lovely, Slick and most enjoyable multiplayer Game</td>  
                        <td><?php echo $inv[0]->amount_owed;?>.00</td>
                <input type="text" name="amount" value="<?php echo $inv[0]->amount_owed;?>"/>
                    </tr>
                   
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p class="lead">Payment Methods:</p>
            <img src="<?php echo base_url();?>/images/mpesa1.jpg" alt="M-PESA" title="Buy Goods and Services - Account: 0889765" width="200px" height="100px">
            <img src="<?php echo base_url();?>/images/airtel.png" alt="Airtel-Money" title="Account: PS GAMING - FIFA 16: 1898752" width="200px" height="100px">
            <img src="<?php echo base_url();?>/images/OrangeMoney.jpg" alt="Orange-Money" width="200px" height="100px">
            <img src="<?php echo base_url();?>/dist/img/credit/visa.png" alt="Visa">
            <img src="<?php echo base_url();?>/dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="<?php echo base_url();?>/dist/img/credit/american-express.png" alt="American Express">
            <img src="<?php echo base_url();?>/dist/img/credit/paypal2.png" alt="Paypal">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                You can either pay cash at the counter or pay via mobile money and confirm with us to be cleared
            </p>
        </div><!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">Amount Due <?phpe echo ;?></p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>KES <?php echo $inv[0]->amount_owed;?>.00</td>
                    </tr>
                    <tr>
                        <th>Tax (0.0%)</th>
                        <td>KES 0.00</td>
                    </tr>
                  
                    <tr>
                        <th>Total:</th>
                        <td>KES<span style="font-weight: bolder;">  <?php echo $inv[0]->amount_owed;?>.00</span></td>
                    </tr>
                </table>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </printarea>
    <!-- this row will not appear when printing -->
    <div class="row no-print " >
                    <a href="#print-invoice"  class="btn btn-default printer"><i class="fa fa-print"></i> Print</a>

        <div class="col-xs-12 ">
            <?php if ($inv[0]->status == 0) { ?>
                <span class="btn btn-warning pull-right"><i class="fa fa-warning"></i> UNPAID INVOICE</span>
            <?php } else { ?>
                <span class="btn btn-success pull-right"><i class="fa fa-thumbs-o-up"></i> PAID!</span>
            <?php }; ?>
        </div>
                    <input type="submit" class="btn btn-lg btn-success pull-right" value="Pay"/>
    </div>
    </form>
</section><!-- /.content -->
<div class="clearfix"></div>
</div><!-- /.content-wrapper -->
   <script>
                $(document).ready(function () {
                    $(".printer").on("click", function () {
                        var divContents = $("printarea").html(); //find the specific tag to be printed
                        var printWindow = window.open('', '', 'height=400,width=800'); //open a small window
                        printWindow.document.write(divContents); //append the tag to the contents
                        printWindow.document.close(); //close the writer
                        printWindow.print();//execute print, print to any format from the popup, pdf, printer etc
                    });
                });
            </script>
