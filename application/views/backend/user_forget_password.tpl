<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Forget Password - {$site_name} : {$company_name}</title>
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
                                    <p class="login-box-msg">Forget Password <b>{$site_name}</b></p>
                                    <script>
                                        function check_data()
                                        {
                                            $('#username_req').hide();
                                            $('#email_req').hide();
                                            $('.has-error').removeClass('has-error');
                                            
                                            with(document.forget_password)
                                            {
                                                if(username.value=="")
                                                {
                                                    $('#username_req').show();
                                                    $('#username_req').parent('div').addClass('has-error');
                                                    $('#username').focus();
                                                    return false;
                                                }
                                                else if(email.value=="")
                                                {
                                                    $('#email_req').show();
                                                    $('#email_req').parent('div').addClass('has-error');
                                                    $('#email').focus();
                                                    return false;
                                                }
                                            }
                                        }
                                    </script>
                                    <form name="forget_password" method="post" onsubmit="return check_data();">
                                        <div class="form-group has-feedback">
                                            <input class="form-control" placeholder="Username" id="username" name="username" type="text">
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            <label id="username_req" for="inputError" style="display: none;" class="control-label">Please input Username.</label>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input class="form-control" placeholder="Email" id="email" name="email" type="email">
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                            <label id="email_req" for="inputError" style="display: none;" class="control-label">Please input Email.</label>
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
                                                <button type="submit" name="forget_password" value="forget_password" class="btn btn-primary  btn-flat pull-right">Forget Password</button>
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