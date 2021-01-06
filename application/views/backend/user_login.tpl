<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{$page_name} - {$site_name} : {$company_name}</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{$image_url}theme/backend/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{$image_url}theme/backend/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="{$image_url}theme/backend/dist/css/skins/_all-skins.css">
        <link rel="stylesheet" href="{$image_url}theme/backend/dist/css/main.css?ver={$smarty.now}">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue layout-top-nav is-layout2">
        <div class="wrapper" >
            <div class="content-wrapper" >
                <div class="container">
                    <section class="content">
                        <div class="login-box" >
                            <div class="login-box-body" >
                                <div class="inner">
                                    <div class="text-center">
                                        {*
                                        <img src="{$image_url}theme/backend/logo.png" width="170px">
                                        *}
                                        <h3 class="text-white">Sign in to <b class="text-custom">Admin</b></h3>
                                        <br/><br/>
                                    </div>
                                    <script>
                                        function check_data()
                                        {
                                            $('#username_req').hide();
                                            $('#password_req').hide();
                                            $('.has-error').removeClass('has-error');
                                            
                                            with(document.login)
                                            {
                                                if(username.value=="")
                                                {
                                                    $('#username_req').show();
                                                    $('#username_req').parent('div').addClass('has-error');
                                                    $('#username').focus();
                                                    return false;
                                                }
                                                else if(password.value=="")
                                                {
                                                    $('#password_req').show();
                                                    $('#password_req').parent('div').addClass('has-error');
                                                    $('#password').focus();
                                                    return false;
                                                }
                                            }
                                        }
                                    </script>
                                    <form name="login" method="post" onsubmit="return check_data();">
                                        <div class="form-group has-feedback">
                                            <input class="form-control" placeholder="Username" name="username" type="text">
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            <label id="username_req" for="inputError" style="display: none;" class="control-label">Please input Username.</label>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input class="form-control" placeholder="Password" name="password" type="password">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                            <label id="password_req" for="inputError" style="display: none;" class="control-label">Please input Password.</label>
                                        </div>
                                        {if $error_msg != ""}
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <font class="required">-- {$error_msg} --</font>
                                                    <br/><br/>
                                                </div>
                                            </div>
                                        {/if}
                                        <br/>
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <button type="submit" name="login" value="login" class="btn btn-default btn-block btn-flat">Sign In</button>
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
                    <strong>Copyright &copy; 2020 {$company_name}</strong> All rights reserved.
                </div>
            </footer>
        </div>
        <script src="{$image_url}theme/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="{$image_url}theme/backend/bootstrap/js/bootstrap.min.js"></script>
        <script src="{$image_url}theme/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="{$image_url}theme/backend/plugins/fastclick/fastclick.js"></script>
        <script src="{$image_url}theme/backend/dist/js/app.min.js"></script>
        <script src="{$image_url}theme/backend/dist/js/demo.js"></script>
        <script src="{$image_url}theme/backend/dist/js/main.js?ver={$smarty.now}"></script>
    </body>
</html>