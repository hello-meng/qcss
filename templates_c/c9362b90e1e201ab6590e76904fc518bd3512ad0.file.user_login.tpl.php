<?php /* Smarty version Smarty-3.1.18, created on 2021-01-07 09:55:06
         compiled from "application\views\backend\user_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5262161835ff6780aa3aeb7-71548911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9362b90e1e201ab6590e76904fc518bd3512ad0' => 
    array (
      0 => 'application\\views\\backend\\user_login.tpl',
      1 => 1609988016,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5262161835ff6780aa3aeb7-71548911',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'site_name' => 0,
    'company_name' => 0,
    'image_url' => 0,
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ff6780aa5c416_53111406',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ff6780aa5c416_53111406')) {function content_5ff6780aa5c416_53111406($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $_smarty_tpl->tpl_vars['page_name']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
 : <?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/css/skins/_all-skins.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/css/main.css?ver=<?php echo time();?>
">
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
                                        <?php if ($_smarty_tpl->tpl_vars['error_msg']->value!='') {?>
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <font class="required">-- <?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
 --</font>
                                                    <br/><br/>
                                                </div>
                                            </div>
                                        <?php }?>
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
                    <strong>Copyright &copy; 2020 <?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
</strong> All rights reserved.
                </div>
            </footer>
        </div>
        <script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/fastclick/fastclick.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/app.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/demo.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/main.js?ver=<?php echo time();?>
"></script>
    </body>
</html><?php }} ?>
