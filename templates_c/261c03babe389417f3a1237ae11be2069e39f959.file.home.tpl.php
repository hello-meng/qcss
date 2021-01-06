<?php /* Smarty version Smarty-3.1.18, created on 2021-01-06 21:13:38
         compiled from "application\views\backend\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13699408205ff5c592355935-73649485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '261c03babe389417f3a1237ae11be2069e39f959' => 
    array (
      0 => 'application\\views\\backend\\home.tpl',
      1 => 1609905326,
      2 => 'file',
    ),
    '72f9288cfdf41e45ba9ca494c7af2351582c66ca' => 
    array (
      0 => 'application\\views\\backend\\layout.tpl',
      1 => 1609905288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13699408205ff5c592355935-73649485',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'site_name' => 0,
    'company_name' => 0,
    'image_url' => 0,
    'base_url' => 0,
    'admin' => 0,
    'authen' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ff5c5925245c5_20274283',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ff5c5925245c5_20274283')) {function content_5ff5c5925245c5_20274283($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Home - <?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
 : <?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
</title>
		
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/default/assets/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/datatables/dataTables.bootstrap.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/css/font-awesome.min.css?v=4.5.0">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/css/ionicons.min.css?v=2.1.0">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/css/skins/_all-skins.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/morris/morris.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/css/css.css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/css/fullcalendar.min.css?v=3.1.0">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/css/main.css?ver=<?php echo time();?>
">
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/default/assets/css/bootstrap-tagsinput.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/select2/css/select2.css">
		
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/jquery-ui.min.js?v=1.11.4"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/ckeditor.js?v=4.5.7"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/modal/modal.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/raphael-min.js?v=2.1.0"></script>
		<!--<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/morris/morris.min.js"></script>-->
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/sparkline/jquery.sparkline.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/knob/jquery.knob.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/moment.min.js?v=2.11.2"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/default/assets/js/bootstrap-tagsinput.min.js"></script>
		
	</head>
	<body class="hold-transition is-layout2 skin-blue skin-white sidebar-mini sidebar-collapse">
		<div class="wrapper">
			<header class="main-header">
				<a class="logo" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/backend">
					<span class="logo-mini">A</span>
					<span class="logo-lg text-left" style="font-size: 600;"><b>A</b>dmin</span>
			    </a>
				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
upload/user/<?php echo ($_smarty_tpl->tpl_vars['admin']->value['id']%4000);?>
/<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
/thumbnail.jpg" onerror="this.src='<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/img/avatar5.png';" class="user-image" alt="User Image">
									<span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['admin']->value['prefix'];?>
<?php echo $_smarty_tpl->tpl_vars['admin']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['admin']->value['last_name'];?>
</span>
								</a>
								<ul class="dropdown-menu">
									<li class="user-header">
										<img src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
upload/user/<?php echo ($_smarty_tpl->tpl_vars['admin']->value['id']%4000);?>
/<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
/thumbnail.jpg" onerror="this.src='<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/img/avatar5.png';" class="img-circle" alt="User Image">
										<p>
											<?php echo $_smarty_tpl->tpl_vars['admin']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['admin']->value['last_name'];?>

											<small><?php echo $_smarty_tpl->tpl_vars['admin']->value['role_name'];?>
</small>
										</p>
									</li>
									<li class="user-footer">
										<div class="row">
											<div class="col-sm-6">
												<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/user/edit_profile" class="btn btn-default btn-block">Profile</a>
											</div>
											<div class="col-sm-6">
												<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/user/logout" class="btn btn-default btn-block">Sign out</a>
											</div>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<aside class="main-sidebar">
				<section class="sidebar">
					<ul class="sidebar-menu">
						<li class="header">backend</li>
						<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='home') {?> class="active"<?php }?>>
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend">
								<i class="fa fa-th-large"></i> <span>Dashboard</span>
							</a>
						</li>
						<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['banner']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['banner']=='A'||$_smarty_tpl->tpl_vars['authen']->value->authen['cover']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['cover']=='A')) {?>
							<li class="treeview<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='banner') {?> active<?php }?>">
								<a href="#">
									<i class="fa fa-photo"></i> <span>Banner</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['banner']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['banner']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='banner') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/banner"><i class="fa fa-photo"></i> <span>Banner</span></a></li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['cover']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['cover']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='cover') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/cover"><i class="fa fa-photo"></i> <span>Cover</span></a></li>
									<?php }?>
								</ul>
							</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['content']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['content']=='A')) {?>
							<li class="treeview<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='content'||$_smarty_tpl->tpl_vars['authen']->value->controller=='faq_category'||$_smarty_tpl->tpl_vars['authen']->value->controller=='faq') {?> active<?php }?>">
								<a href="#">
									<i class="fa fa-file-text"></i> <span>Content</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['content']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['content']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='content') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/content"><i class="fa fa-file-text"></i> <span>Content</span></a></li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['news']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['news']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='news') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/news"><i class="fa fa-file-text"></i> <span>News</span></a></li>
									<?php }?>
								</ul>
							</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['brand']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['brand']=='A'||$_smarty_tpl->tpl_vars['authen']->value->authen['model']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['model']=='A'||$_smarty_tpl->tpl_vars['authen']->value->authen['year']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['year']=='A'||$_smarty_tpl->tpl_vars['authen']->value->authen['product']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['product']=='A')) {?>
							<li class="treeview<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='product'||$_smarty_tpl->tpl_vars['authen']->value->controller=='faq_category'||$_smarty_tpl->tpl_vars['authen']->value->controller=='faq') {?> active<?php }?>">
								<a href="#">
									<i class="fa fa-cubes"></i> <span>Product</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['brand']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['brand']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='brand') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/brand"><i class="fa fa-th-list"></i> <span>Brand</span></a></li>
									<?php }?>	
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['model']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['model']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='model') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/model"><i class="fa fa-th-list"></i> <span>Model</span></a></li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['year']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['year']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='year') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/year"><i class="fa fa-th-list"></i> <span>Year</span></a></li>
									<?php }?>		
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['product']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['product']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='product') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/product"><i class="fa fa-th-list"></i> <span>Product</span></a></li>
									<?php }?>
								</ul>
							</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['tax_rate']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['tax_rate']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['setting']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['setting']=='A')) {?>
							<li class="treeview<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='tax_rate'||$_smarty_tpl->tpl_vars['authen']->value->controller=='setting') {?> active<?php }?>">
								<a href="#">
									<i class="fa fa-tv"></i> <span>POS</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['setting']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['setting']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='setting') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/setting"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
									<?php }?>
								</ul>
							</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['prefix']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['prefix']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['company_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['company_type']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['partner_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['partner_type']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['charge_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['charge_type']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['discount_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['discount_type']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['payment_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['payment_type']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['bank']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['bank']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['shiping_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['shiping_type']=='A')) {?>
							<li class="treeview<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='prefix'||$_smarty_tpl->tpl_vars['authen']->value->controller=='company_type'||$_smarty_tpl->tpl_vars['authen']->value->controller=='partner_type'||$_smarty_tpl->tpl_vars['authen']->value->controller=='charge_type'||$_smarty_tpl->tpl_vars['authen']->value->controller=='discount_type'||$_smarty_tpl->tpl_vars['authen']->value->controller=='payment_type'||$_smarty_tpl->tpl_vars['authen']->value->controller=='shiping_type'||$_smarty_tpl->tpl_vars['authen']->value->controller=='bank'||$_smarty_tpl->tpl_vars['authen']->value->controller=='peroid'||$_smarty_tpl->tpl_vars['authen']->value->controller=='installments'||$_smarty_tpl->tpl_vars['authen']->value->controller=='package_feature') {?> active<?php }?>">
								<a href="#">
									<i class="fa fa-database"></i> <span>Master Data</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['prefix']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['prefix']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='prefix') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/prefix"><i class="fa fa-th-list"></i> <span>Prefix</span></a></li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['bank']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['bank']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='bank') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/bank"><i class="fa fa-bank"></i> <span>Bank</span></a></li>
									<?php }?>
								</ul>
							</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['region']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['region']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['province']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['province']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['district']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['district']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['sub_district']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['sub_district']=='A')) {?>
							<li class="treeview<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='region'||$_smarty_tpl->tpl_vars['authen']->value->controller=='province'||$_smarty_tpl->tpl_vars['authen']->value->controller=='district'||$_smarty_tpl->tpl_vars['authen']->value->controller=='sub_district') {?> active<?php }?>">
								<a href="#">
									<i class="fa fa-map-marker"></i> <span>Localization</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['region']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['region']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='region') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/region"><i class="fa fa-th-large"></i> <span>Region</span></a></li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['province']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['province']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='province') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/province"><i class="fa fa-th"></i> <span>Province</span></a></li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['district']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['district']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='district') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/district"><i class="fa fa-th-list"></i> <span>District</span></a></li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['sub_district']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['sub_district']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='sub_district') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/sub_district"><i class="fa fa-list"></i> <span>Sub District</span></a></li>
									<?php }?>
								</ul>
							</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['user']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['user']=='A')) {?>
							<li class="treeview<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='user'||$_smarty_tpl->tpl_vars['authen']->value->controller=='role') {?> active<?php }?>">
								<a href="#">
									<i class="fa fa-users"></i> <span>Users</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['user']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['user']=='A')) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='user') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/user"><i class="fa fa-users"></i> <span>Users</span></a></li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true) {?>
										<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='role') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/role"><i class="fa fa-shield"></i> <span>Role</span></a></li>
									<?php }?>
								</ul>
							</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true) {?>
							<li class="treeview<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='section'||$_smarty_tpl->tpl_vars['authen']->value->controller=='menu'||$_smarty_tpl->tpl_vars['authen']->value->controller=='config'||$_smarty_tpl->tpl_vars['authen']->value->controller=='feature') {?> active<?php }?>">
								<a href="#">
									<i class="fa fa-gears"></i> <span>System</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='section') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/section"><i class="fa fa-th-large"></i> <span>Section</span></a></li>
									<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='menu') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/menu"><i class="fa fa-th"></i> <span>Menu</span></a></li>
									<li<?php if ($_smarty_tpl->tpl_vars['authen']->value->controller=='config') {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/config"><i class="fa fa-gear"></i> <span>Configuration</span></a></li>
									
								</ul>
							</li>
						<?php }?>
					</ul>
				</section>
			</aside>	
			<div class="content-wrapper" id="<?php echo $_smarty_tpl->tpl_vars['authen']->value->controller;?>
-page">
				
    <section class="content-header">
        <h1>
            <?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>

            <small><?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
</a></li>
            <li class="active">Home</li>
        </ol>
    </section>
    <section class="content">
        <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['banner']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['banner']=='A')) {?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-photo"></i>&nbsp; Banner</h3>
                        </div>
                        <div class="box-body">
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['banner']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['banner']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/banner" class="btn btn-app">
                                    <i class="fa fa-photo"></i> Banner
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['cover']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['cover']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/cover" class="btn btn-app">
                                    <i class="fa fa-photo"></i> Cover
                                </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['content']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['content']=='A')) {?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-file-text"></i>&nbsp; Content</h3>
                        </div>
                        <div class="box-body">
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['content']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['content']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/content" class="btn btn-app">
                                    <i class="fa fa-file-text"></i> Content
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['news']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['news']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/news" class="btn btn-app">
                                    <i class="fa fa-file-text"></i> News
                                </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['brand']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['brand']=='A'||$_smarty_tpl->tpl_vars['authen']->value->authen['model']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['model']=='A'||$_smarty_tpl->tpl_vars['authen']->value->authen['year']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['year']=='A'||$_smarty_tpl->tpl_vars['authen']->value->authen['product']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['product']=='A')) {?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-cubes"></i>&nbsp; Product</h3>
                        </div>
                        <div class="box-body">
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['brand']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['brand']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/brand" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> Brand
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['model']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['model']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/model" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> Model
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['year']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['year']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/year" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> Year
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['product']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['product']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/product" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> Product
                                </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['setting']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['setting']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['tax_rate']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['tax_rate']=='A')) {?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-tv"></i>&nbsp; POS</h3>
                        </div>
                        <div class="box-body">
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['setting']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['setting']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/setting" class="btn btn-app">
                                    <i class="fa fa-gears"></i> Settings
                                </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['prefix']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['prefix']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['shiping_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['company_type']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['partner_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['partner_type']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['charge_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['charge_type']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['discount_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['discount_type']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['payment_type']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['payment_type']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['bank']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['bank']=='A')) {?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-database"></i>&nbsp; Master Data</h3>
                        </div>
                        <div class="box-body">
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['prefix']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['prefix']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/prefix" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> Prefix
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['bank']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['bank']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/bank" class="btn btn-app">
                                    <i class="fa fa-bank"></i> Bank
                                </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['region']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['region']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['province']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['province']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['district']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['district']=='A')||($_smarty_tpl->tpl_vars['authen']->value->authen['sub_district']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['sub_district']=='A')) {?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-map-marker"></i>&nbsp; Localization</h3>
                        </div>
                        <div class="box-body">
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['region']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['region']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/region" class="btn btn-app">
                                    <i class="fa fa-th-large"></i> Region
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['province']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['province']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/province" class="btn btn-app">
                                    <i class="fa fa-th"></i> Province
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['district']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['district']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/district" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> District
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['sub_district']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['sub_district']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/sub_district" class="btn btn-app">
                                    <i class="fa fa-list"></i> Sub District
                                </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['user']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['user']=='A')) {?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-users"></i>&nbsp; Users</h3>
                        </div>
                        <div class="box-body">
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true||($_smarty_tpl->tpl_vars['authen']->value->authen['user']=='M'||$_smarty_tpl->tpl_vars['authen']->value->authen['user']=='A')) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/user" class="btn btn-app">
                                    <i class="fa fa-users"></i> Users
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true||$_smarty_tpl->tpl_vars['authen']->value->is_admin==true) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/role" class="btn btn-app">
                                    <i class="fa fa-shield"></i> Role
                                </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['authen']->value->is_developer==true) {?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-gears"></i>&nbsp; System</h3>
                        </div>
                        <div class="box-body">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/section" class="btn btn-app">
                                <i class="fa fa-th-large"></i> Section
                            </a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/menu" class="btn btn-app">
                                <i class="fa fa-th"></i> Menu
                            </a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/config" class="btn btn-app">
                                <i class="fa fa-gear"></i> Configuration
                            </a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
backend/feature" class="btn btn-app">
                                <i class="fa fa-sitemap"></i> Feature
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </section>

			</div>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.0.0
				</div>
				<strong>Copyright &copy; 2020 <?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
</strong> All rights reserved.
			</footer>
		</div>
		
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/plugins/fastclick/fastclick.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/app.min.js"></script>
		<!--<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/pages/dashboard.js"></script>-->
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/demo.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/fullcalendar.min.js?v=3.1.0"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/main.js?ver=<?php echo time();?>
"></script>

		<script src="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
theme/backend/dist/js/select2/js/select2.min.js"></script>
		
		
	</body>
</html><?php }} ?>
