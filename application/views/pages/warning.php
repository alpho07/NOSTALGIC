<?php     $this->load->view('sections/header/header');?>
<style>
    @-webkit-keyframes blink {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
@-moz-keyframes blink {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
@-o-keyframes blink {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
img ,.text-red,.btn-danger{
    -webkit-animation: blink 1s;
    -webkit-animation-iteration-count: infinite;
    -moz-animation: blink 1s;
    -moz-animation-iteration-count: infinite;
    -o-animation: blink 1s;
    -o-animation-iteration-count: infinite;
}
</style>
<body class="row" >
    <div class="row" style="background: white;">

   
        <!-- Content Header (Page header) -->


     

          <div class="error-page">
            <h2 class="headline text-red">ILEGAL </h2>
            <div class="error-content">
                <h3><i class="fa fa-warning text-red"></i> Whaaat! Are you trying to hack me <strong class="btn-danger"><?php echo ucwords($this->session->userdata('current_user'));?></strong>?</h3>
              <p>
               I am sounding the alarm and reporting this activity to the Administrator, You might not be allowed to play any more games, or loose all your privileges
               you have played so hard to get.
              </p>
              <div class="row">
                  <img src="<?php echo base_url();?>images/warning2.png" alt="WARNING" height="450" width="450"/>
              </div>
              <div class="row">
                  <input type="button" class="btn  btn-lg btn-success pull-right" value="SHHHHHHH & AND KICK ME OUT OF HERE, PLEASE I BEG YOU SYSTEM AND DON'T REPORT ME, WON'T DO IT AGAIN"/>
              </div>
            </div>
          </div><!-- /.error-page -->

      
      </div><!-- /.content-wrapper -->
</body>
<script src="<?php echo base_url(); ?>dist/js/jquery.playSound.js"></script>

<script> 

    $(document).ready(function () {
        $('.btn-lg').click(function(){
        window.location.href="<?php echo base_url();?>ps/my_gamingHistory/";    
        })
        
     
        setInterval(function () {


              
                        $.playSound("<?php echo base_url() . 'notification/accessdenied'; ?>");
                       

        }, 8000);




    });
</script>
