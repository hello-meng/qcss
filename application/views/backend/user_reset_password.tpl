<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reset Password - {$site_name} : {$company_name}</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{$image_url}theme/default/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{$image_url}theme/default/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="{$image_url}theme/default/dist/css/skins/_all-skins.css">
        <link rel="stylesheet" href="{$image_url}theme/default/dist/css/main.css?ver={$smarty.now}">
        <link rel="shortcut icon" href="{$image_url}theme/default/favicon.ico?v=2" type="image/x-icon" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue layout-top-nav is-layout2" style="background-image: url('{$image_url}theme/default/BG.png')">
        <div class="wrapper">
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header" style=" padding-left: 10px;">
                            <a href="index.php" class="navbar-brand">
                                <img src="{$image_url}theme/default/logo.png" width="80px">
                            </a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="content-wrapper">
                <div class="container">
                    <section class="content">
                        <div class="login-box">
                            <div class="login-box-body">
                                <div class="inner">
                                    <div class="text-center">
                                        <img src="{$image_url}theme/default/logo.jpg" width="170px">
                                    </div>
                                    <br />
                                    <p class="login-box-msg">Reset Password <b>{$site_name}</b></p>
                                    <script>
                                        function check_data()
                                        {
                                            $('#password_req').hide();
                                            $('#confirm_password_req').hide();
                                            $('#confirm_password_inc').hide();
                                            $('.has-error').removeClass('has-error');
                                            
                                            with(document.reset_password)
                                            {
                                                if(password.value=="")
                                                {
                                                    $('#password_req').show();
                                                    $('#password_req').parent('div').addClass('has-error');
                                                    $('#password').focus();
                                                    return false;
                                                }
                                                else if(cpassword.value=="")
                                                {
                                                    $('#confirm_password_req').show();
                                                    $('#confirm_password_req').parent('div').addClass('has-error');
                                                    $('#cpassword').focus();
                                                    return false;
                                                }
                                                else if(password.value!=cpassword.value)
                                                {
                                                    $('#confirm_password_inc').show();
                                                    $('#confirm_password_inc').parent('div').addClass('has-error');
                                                    $('#cpassword').focus();
                                                    return false;
                                                }
                                            }
                                        }
                                    </script>
                                    <form name="reset_password" method="post" onsubmit="return check_data();">
                                        <div class="form-group has-feedback">
                                            <input class="form-control" placeholder="New Password" id="password" name="password" type="password">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                            <label id="password_req" for="inputError" style="display: none;" class="control-label">Please input New Password.</label>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input class="form-control" placeholder="Confirm Password" id="cpassword" name="cpassword" type="password">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                            <label id="confirm_password_req" for="inputError" style="display: none;" class="control-label">Please Confirm Password.</label>
                                            <label id="confirm_password_inc" for="inputError" style="display: none;" class="control-label">Confirm Password Incorrect.</label>
                                        </div>
                                        {if $error_msg != ""}
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <font color="red">{$error_msg}</font>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">&nbsp;</div>
                                            </div>
                                        {/if}
                                        {if $success_msg != ""}
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <font color="green">{$success_msg}</font>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">&nbsp;</div>
                                            </div>
                                        {/if}
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <a href="{$base_url}backend/{$page}/login" class="btn btn-success btn-flat">Login</a>
                                            </div>
                                            <div class="col-xs-6">
                                                <button type="submit" name="reset_password" value="reset_password" class="btn btn-primary  btn-flat pull-right">Reset Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <footer class="main-footer">
                <div class="container">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 1.0.0
                    </div>
                    <strong>Copyright &copy; 2018 {$company_name}</strong> All rights reserved.
                </div>
            </footer>
        </div>
        <script src="{$image_url}theme/default/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="{$image_url}theme/default/bootstrap/js/bootstrap.min.js"></script>
        <script src="{$image_url}theme/default/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="{$image_url}theme/default/plugins/fastclick/fastclick.js"></script>
        <script src="{$image_url}theme/default/dist/js/app.min.js"></script>
        <script src="{$image_url}theme/default/dist/js/demo.js"></script>
        <script src="{$image_url}theme/default/dist/js/main.js?ver={$smarty.now}"></script>
    </body>
</html>