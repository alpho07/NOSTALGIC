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
#RRRRRR{
    -webkit-animation: blink 1s;
    -webkit-animation-iteration-count: infinite;
    -moz-animation: blink 1s;
    -moz-animation-iteration-count: infinite;
    -o-animation: blink 1s;
    -o-animation-iteration-count: infinite;
}




</style>


<div class="row">
        <div class="col-md-4">
    <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">My Free Minutes</span>
                  <span class="info-box-number"><?php echo $token;?> Minutes</span>
                  <div class="progress">
                    <div style="width: 20%" class="progress-bar"></div>
                  </div>
                  <span class="progress-description">
                    20% Increase for active participation
                  </span>
                </div><!-- /.info-box-content -->
              </div>
            
            <div class="ssb">
	<!-- Twitter -->
	<a href="http://twitter.com/home?status=http://example.com/" title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
	<!-- Facebook -->
	<a href="https://www.facebook.com/sharer/sharer.php?u=http://example.com/" title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
	<!-- Google+ -->
	<a href="https://plus.google.com/share?url=http://example.com/" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
	<!-- StumbleUpon -->
	<a href="http://www.stumbleupon.com/submit?url=http://example.com/" title="Share on StumbleUpon" target="_blank" data-placement="top" class="btn btn-stumbleupon"><i class="fa fa-stumbleupon"></i> Stumbleupon</a>
	<!-- LinkedIn -->
	<a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=http://example.com/" title="Share on LinkedIn" target="_blank" class="btn btn-linkedin"><i class="fa fa-linkedin"></i> LinkedIn</a>
</div>
    </div>
    <a href="#invite-my-friend" id="referrer" >
    <div class="col-md-4">
      
              <div class="info-box bg-aqua" id="RRRRRR">
                <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><span style="font-weight:bolder;"> CLICK ME</span> to Invite a friend and get</span>
                  <span class="info-box-number">10 free minutes</span>
                  <div class="progress">
                    <div style="width: 6%" class="progress-bar"></div>
                  </div>
                  <span class="progress-description">
                    6% of an Hour for each friend who joins
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->

             
            </div>
    </a>
    
   <div class="modal modal-info">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Refer Link: Copy and send to a friend</h4>
                  </div>
                  <div class="modal-body">
                    <p id="r_link"></p>
                    <input type="hidden" id="r_code" />
                  </div>
                  <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-outline pull-left" type="button">Close</button>
                    <button class="btn btn-outline" type="button" onclick="copyToClipboard('#r_link')">Copy</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
        
</div>

<script> 
$().ready(function(){
 
   $('#referrer').click(function(){
       $('.modal-info').modal('show');
         ref = $.now();
         link="<?php echo site_url('ps/invited_friend/'.$uid);?>/"+ref;
         $('#r_link').text(link);
          $('#r_code').val(ref);
  
    });
    

   
});

    function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  save($('#r_code').val());
}

function save(data){
    uid="<?php echo $uid;?>";
    $.post("<?php echo base_url();?>ps/save_ref/"+uid+'/'+data, function(){
        $.notify('Successfully copied to clipboard, paste in text or email and send','success');
    }).fail(function(){
        $.notify('Link has already been copied, go paste now');
    });
}
</script>
