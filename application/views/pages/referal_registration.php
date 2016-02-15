<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PS | Referal registration</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!-- Ionicons -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/sweetalert.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/facebook.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .login-page{

                box-shadow: 0 16px 24px 2px rgba(0, 0, 0, .14), 0 6px 30px 5px rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2);

            }
            #result{
                color:red;
            }

        </style>

        <script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/jQueryUI/jquery-ui.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo base_url(); ?>dist/js/sweetalert.min.js"></script>
        <script src="<?php echo base_url(); ?>dist/js/notify.min.js"></script>

    </head>
    <body class="hold-transition login-page" style="background: url(<?php echo base_url(); ?>images/PlayStation_logo1.jpg); padding-bottom: 1px; ">
        <div class="login-box" style="display:none;">
            <div class="login-logo">
                <span style="color:white;"><b>PS PALOUR</b> LOGIN</span>
            </div><!-- /.login-logo -->
            <div class="login-box-body well">

                <p class="login-box-msg">Sign in to start your session</p>
                <form id="LoginForm">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control "  id="lemail" name="lemail" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control loginbox" id="lpass" name="lpass" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <!--                <label>
                                                  <input type="checkbox"> Remember Me
                                                </label>-->
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <input type="button" class="btn btn-primary btn-block btn-flat" value="Sign In" id="doLogin"/>
                        </div><!-- /.col -->
                    </div>
                </form>

                <!--        <div class="social-auth-links text-center">
                          <p>- OR -</p>
                          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
                        </div> /.social-auth-links -->

                <a href="#Reset-Password" id="PReset">I forgot my password</a><br>
                <a href="#register" id="Register" class="text-center">Register a new membership</a>
            </div>

        </div><!-- /.login-box-body -->

        <div class="register-box" style="">

            <div class="register-logo">
                <span style="color:white;"><b>FRIEND INVITE</b> REGISTRATION</span>
            </div><!-- /.login-logo -->

            <div class="register-box-body">

                <p class="register-box-msg">Register to become a valued member and get 20 free minutes</p>
                <form  id="RegisterForm">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="rname" name="rname" placeholder="Name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="rphone" name="rphone" placeholder="Phone">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" id="remail" name="remail" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="rpassword"  name="rpassword" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        	<span id="result"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="rconfirm_pass" placeholder="Confirm Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="col-xs-4">
                        <input type="button" class="btn btn-primary btn-block btn-flat " id="RegisterUser" value="Register"/>
                    </div><!-- /.col -->

                </form>
                <a href="#Login" class="text-center" id="Login">Login</a>
                <p> <span class="btn-info">If Register button is disabled, Your password does not meet the criteria</span></p>

            </div>


        </div><!-- /.register-box-body -->

        <div class="preset-box " style="display: none;" >
            <div class="preset-logo">
                <span style="color:white;"><b>PS PALOUR</b> PASS RESET</span>
            </div><!-- /.login-logo -->
            <div class="preset-box-body well">

                <p class="preset-box-msg">Enter your E-mail for password reset</p>
                <form  id="ResetPForm">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" id="pemail" name="pemail" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="ppass" name="ppass" placeholder="New Passowrd">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="cppass" placeholder="Confirm New Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">

                        <div class="col-xs-4">
                            <input type="button" class="btn btn-primary btn-block btn-flat" id="ResetPass" value="Reset"/>
                        </div><!-- /.col -->
                        <a href="#Login" id="PRLogin">Login</a><br>

                    </div>
                </form>

                <!--        <div class="social-auth-links text-center">
                          <p>- OR -</p>
                          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
                        </div> /.social-auth-links -->


            </div>

        </div><!-- /.login-box-body -->


        <!-- /.login-box -->

        <!-- jQuery 2.1.4 -->

        <script>
            $(document).ready(function () {

                base_url = "<?php echo base_url(); ?>ps/";
                base_url2 = "<?php echo base_url(); ?>";
                u="<?php echo $u;?>";
                c="<?php echo $c;?>";
                $('#Login').click(function () {
                    $('.register-box').slideUp('slow');
                    $('.login-box').slideDown('slow');

                    return false;
                });
                $('#Register').click(function () {
                    $('.login-box').slideUp('slow');
                    $('.register-box').slideDown('slow');
                    return false;
                });

                $('#PReset').click(function () {
                    $('.login-box').slideUp('slow');
                    $('.preset-box').slideDown('slow');
                    return false;
                });

                $('#PRLogin').click(function () {
                    $('.preset-box').slideUp('slow');
                    $('.login-box').slideDown('slow');

                    return false;
                });

                $('#RegisterUser').click(function () {
                    $register(u,c);
                });

                $('#doLogin').click(function () {
                    $login();
                });

                $('#ResetPass').click(function () {
                    $change_password();
                });
                $(function () {
                    $('input').iCheck({
                        checkboxClass: 'icheckbox_square-blue',
                        radioClass: 'iradio_square-blue',
                        increaseArea: '20%' // optional
                    });
                });
                
            $('#rpassword').keyup(function()
	{
		$('#result').html(checkStrength($('#rpassword').val()))
	})	

                $register = function (u,c) {

                    if ($('#rname').val() === '') {
                        $('#rname').css('border', 'solid red 1px');
                        $('#rname').prop('placeholder', 'required!');
                        $.notify("Please you cannot leave your e-mail blank!", "error");

                        return false;
                    } else if ($('#rphone').val() === '') {
                        $('#rphone').css('border', 'solid red 1px');
                        $('#rphone').prop('placeholder', 'required!');
                        $.notify("Please you cannot afford your phone blank!", "error");


                        return false;
                    } else if ($('#remail').val() === '') {
                        $('#remail').css('border', 'solid red 1px');
                        $('#remail').prop('placeholder', 'required!');
                        $.notify("Please you cannot afford to leave your e-mail blank!", "error");


                        return false;
                    } else if ($('#rpassword').val() === '') {
                        $('#rpassword').css('border', 'solid red 1px');
                        $('#rpassword').prop('placeholder', 'required!');
                        $.notify("Please you cannot afford to leave your  password blank!", "error");


                        return false;
                    } else if ($('#rconfirm_pass').val() === '') {
                        $('#rconfirm_pass').css('border', 'solid red 1px');
                        $('#rconfirm_pass').prop('placeholder', 'required!');
                        $.notify("Please you cannot afford to leave your confirm password blank!", "error");


                        return false;
                    } else if ($('#rpassword').val() !== $('#rconfirm_pass').val()) {
                        $.notify("your passwords do not match!", "error");


                        return false;
                    }else if (!validateEmail($('#remail').val())) {
                        $.notify("Invalid Email Provided!", "error");


                        return false;
                    }else if (!isNumber($('#rphone').val())) {
                        $.notify("Only enter numbers for phone!", "error");


                        return false;
                    }else if ($('#rname').val().length < 2) {                    
                        $.notify("Your name should have at least 2 characters", "error");

                        return false;
                    } else if ($('#rpassword').val().length < 8) {                    
                        $.notify("Your password should have at least 8 characters", "error");

                        return false;
                    }else if ($('#rphone').val().length < 10) {                    
                        $.notify("Your Phone Number should have at least 10 Numbers", "error");

                        return false;
                    }else {

                        $data = $('#RegisterForm').serialize();
                        $.post(base_url + 'doRegisterInvitedUser/'+u+'/'+c, $data, function (resp) {
                            if(resp==='1'){
                            swal({
                                title: "INVALID CODE",
                                text: "Sorry but this code does not exist",
                                type: "error"

                            });
                            }else if(resp==='2'){
                            swal({
                                title: "INVALID CODE",
                                text: "Sorry but this code has been redeemed already",
                                type: "error"

                            });
                            }else{
                               /*swal({
                                title: "Sweet!",
                                text: "Redirecting you to your Login in a second.",
                                imageUrl: "<?php echo base_url(); ?>images/thumbs-up.jpg"
                            });*/
                            setInterval(function () {
                                window.location.href = base_url2;
                            }, 2000);
                            return false;
                            
                            }
                        }).fail(function () {
                            swal({
                                title: "USER EXISTS",
                                text: "Please choose another email!",
                                type: "error"

                            });
                        });
                    }
                };
                $login = function () {
                    if ($('#lemail').val() === '') {
                        $('#lemail').css('border', 'solid red 1px');
                        $('#lemail').prop('placeholder', 'required!');
                        $.notify("Please you cannot afford to leave your e-mail blank!", "error");

                        return false;
                    } else if ($('#lpass').val() === '') {
                        $('#lpass').css('border', 'solid red 1px');
                        $('#lpass').prop('placeholder', 'required!');
                        $.notify("Please you cannot afford to leave your password blank!", "error");


                        return false;
                    } else {
                        $data = $('#LoginForm').serialize();
                        $.post(base_url + 'doLogin/', $data, function (response) {
                            if (response === 'success') {
                                swal({
                                    title: "Sweet!",
                                    text: "Redirecting you to your Homepage in a second.",
                                    imageUrl: "<?php echo base_url(); ?>images/thumbs-up.jpg"
                                });
                                setInterval(function () {
                                    window.location.href = base_url;
                                }, 2000);
                            } else {
                                swal({
                                    title: "ACCESS DENIED",
                                    text: "Wrong Username or Password!",
                                    type: "error"

                                });
                                $('.loginbox').val('');

                                console.log('Wrong Username or Pasword')
                            }

                        }).fail(function () {
                            alert('Sorry An error Occured')
                        });
                    }
                }


                $change_password = function () {
                    if ($('#pemail').val() === '') {
                        $('#pemail').css('border', 'solid red 1px');
                        $('#pemail').prop('placeholder', 'required!');
                        $.notify("Please you cannot afford to leave your e-mail blank!", "error");

                        return false;
                    } else if ($('#ppass').val() === '') {
                        $('#ppass').css('border', 'solid red 1px');
                        $('#ppass').prop('placeholder', 'required!');
                        $.notify("Please you cannot afford to leave your password blank!", "error");


                        return false;
                    } else if ($('#cppass').val() === '') {
                        $('#cppass').css('border', 'solid red 1px');
                        $('#cppass').prop('placeholder', 'required!');
                        $.notify("Please you cannot afford to leave your confirm password blank!", "error");


                        return false;
                    } else if ($('#ppass').val() !== $('#cppass').val()) {

                        $.notify("your passwords do not match!", "error");


                        return false;
                    } else {
                        $data = $('#ResetPForm').serialize();
                        $.post(base_url + 'doUserEmailCheck/', $data, function (response) {
                            if (response === 'success') {
                                swal({
                                    title: "Sweet!",
                                    text: "Redirecting you to your Login in a second.",
                                    imageUrl: "<?php echo base_url(); ?>images/thumbs-up.jpg"
                                });
                                setInterval(function () {
                                    window.location.href = base_url2;
                                }, 2000);
                            } else {
                                swal({
                                    title: "REQUEST DENIED",
                                    text: "That email address does not exist!",
                                    type: "error"

                                });

                            }

                        }).fail(function () {
                            alert('Sorry An error Occured')
                        });
                    }
                }
                
                 function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}



function isNumber(n) {
return !isNaN(+n) && isFinite(n);
}

function checkStrength(password){
		//initial strength
		var strength = 0
		
		//if the password length is less than 6, return message.
		if (password.length < 6) { 
			$('#result').removeClass()
			$('#result').addClass('short')
                          $('#RegisterUser').prop('disabled',true);
			return 'Too short' 
		}
		
		//length is ok, lets continue.
		
		//if length is 8 characters or more, increase strength value
		if (password.length > 7) strength += 1
		
		//if password contains both lower and uppercase characters, increase strength value
		if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
		
		//if it has numbers and characters, increase strength value
		if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
		
		//if it has one special character, increase strength value
		if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
		
		//if it has two special characters, increase strength value
		if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
		
		//now we have calculated strength value, we can return messages
		
		//if value is less than 2
		if (strength < 2 )
		{
			$('#result').removeClass()
			$('#result').addClass('weak')
                        $('#RegisterUser').prop('disabled',true);
			return 'Weak, should contain numbers, small letters,\n\
                                capital letters and special characters example: my1Pa$word (do not use this)'			
		}
		else if (strength == 2 )
		{
			$('#result').removeClass()
			$('#result').addClass('good')
                          $('#RegisterUser').prop('disabled',false);
			return 'Good'		
		}
		else
		{
			$('#result').removeClass()
			$('#result').addClass('strong')
                          $('#RegisterUser').prop('disabled',false);
			return 'Strong'
		}
	}





            });
        </script>
    </body>
</html>

