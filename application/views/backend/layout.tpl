<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{block name=meta_title}{$page} - {$site_name} : {$company_name}{/block}</title>
		{*
		<link rel="icon" href="{$image_url}theme/default/assets/images/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" sizes="180x180" href="{$image_url}theme/default/assets/images/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="{$image_url}theme/default/assets/images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="{$image_url}theme/default/assets/images/favicon-16x16.png">
		*}
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		<link rel="stylesheet" type="text/css" href="{$image_url}theme/default/assets/css/fontawesome.min.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/plugins/datatables/dataTables.bootstrap.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/dist/css/font-awesome.min.css?v=4.5.0">
		<link rel="stylesheet" href="{$image_url}theme/backend/dist/css/ionicons.min.css?v=2.1.0">
		<link rel="stylesheet" href="{$image_url}theme/backend/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/dist/css/skins/_all-skins.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/plugins/morris/morris.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/dist/css/css.css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
		<link rel="stylesheet" href="{$image_url}theme/backend/plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/plugins/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="{$image_url}theme/backend/dist/css/fullcalendar.min.css?v=3.1.0">
		<link rel="stylesheet" href="{$image_url}theme/backend/dist/css/main.css?ver={$smarty.now}">
		{* <link rel="stylesheet" type="text/css" href="{$image_url}theme/default/assets/css/bootstrap-tagsinput.css"> *}
		<link rel="stylesheet" href="{$image_url}theme/backend/dist/js/select2/css/select2.css">
		{block name=css}{/block}
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		
	</head>
	<body class="hold-transition is-layout2 skin-blue skin-white sidebar-mini sidebar-collapse">
		<div class="wrapper">
			<header class="main-header">
				<a class="logo" href="{$base_url}/backend">
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
									<img src="{$image_url}upload/user/{($admin.id%4000)}/{$admin.id}/thumbnail.jpg" onerror="this.src='{$image_url}theme/backend/dist/img/avatar5.png';" class="user-image" alt="User Image">
									<span class="hidden-xs">{$admin.prefix}{$admin.first_name} {$admin.last_name}</span>
								</a>
								<ul class="dropdown-menu">
									<li class="user-header">
										<img src="{$image_url}upload/user/{($admin.id%4000)}/{$admin.id}/thumbnail.jpg" onerror="this.src='{$image_url}theme/backend/dist/img/avatar5.png';" class="img-circle" alt="User Image">
										<p>
											{$admin.first_name} {$admin.last_name}
											<small>{$admin.role_name}</small>
										</p>
									</li>
									<li class="user-footer">
										<div class="row">
											<div class="col-sm-6">
												<a href="{$base_url}backend/user/edit_profile" class="btn btn-default btn-block">Profile</a>
											</div>
											<div class="col-sm-6">
												<a href="{$base_url}backend/user/logout" class="btn btn-default btn-block">Sign out</a>
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
						<li{if $authen->controller == 'home'} class="active"{/if}>
							<a href="{$base_url}backend">
								<i class="fa fa-th-large"></i> <span>Dashboard</span>
							</a>
						</li>
						{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['banner'] == 'M' || $authen->authen['banner'] == 'A' || $authen->authen['cover'] == 'M' || $authen->authen['cover'] == 'A')}
							<li class="treeview{if $authen->controller == 'banner'} active{/if}">
								<a href="#">
									<i class="fa fa-photo"></i> <span>Banner</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['banner'] == 'M' || $authen->authen['banner'] == 'A')}
										<li{if $authen->controller == 'banner'} class="active"{/if}><a href="{$base_url}backend/banner"><i class="fa fa-photo"></i> <span>Banner</span></a></li>
									{/if}
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['cover'] == 'M' || $authen->authen['cover'] == 'A')}
										<li{if $authen->controller == 'cover'} class="active"{/if}><a href="{$base_url}backend/cover"><i class="fa fa-photo"></i> <span>Cover</span></a></li>
									{/if}
								</ul>
							</li>
						{/if}
						{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['content'] == 'M' || $authen->authen['content'] == 'A')}
							<li class="treeview{if $authen->controller == 'content' || $authen->controller == 'faq_category' || $authen->controller == 'faq'} active{/if}">
								<a href="#">
									<i class="fa fa-file-text"></i> <span>Content</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['content'] == 'M' || $authen->authen['content'] == 'A')}
										<li{if $authen->controller == 'content'} class="active"{/if}><a href="{$base_url}backend/content"><i class="fa fa-file-text"></i> <span>Content</span></a></li>
									{/if}
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['news'] == 'M' || $authen->authen['news'] == 'A')}
										<li{if $authen->controller == 'news'} class="active"{/if}><a href="{$base_url}backend/news"><i class="fa fa-file-text"></i> <span>News</span></a></li>
									{/if}
								</ul>
							</li>
						{/if}
						{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['brand'] == 'M' || $authen->authen['brand'] == 'A' || $authen->authen['model'] == 'M' || $authen->authen['model'] == 'A' || $authen->authen['year'] == 'M' || $authen->authen['year'] == 'A' || $authen->authen['product'] == 'M' || $authen->authen['product'] == 'A')}
							<li class="treeview{if $authen->controller == 'product' || $authen->controller == 'faq_category' || $authen->controller == 'faq'} active{/if}">
								<a href="#">
									<i class="fa fa-cubes"></i> <span>Product</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['brand'] == 'M' || $authen->authen['brand'] == 'A')}
										<li{if $authen->controller == 'brand'} class="active"{/if}><a href="{$base_url}backend/brand"><i class="fa fa-th-list"></i> <span>Brand</span></a></li>
									{/if}	
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['model'] == 'M' || $authen->authen['model'] == 'A')}
										<li{if $authen->controller == 'model'} class="active"{/if}><a href="{$base_url}backend/model"><i class="fa fa-th-list"></i> <span>Model</span></a></li>
									{/if}
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['year'] == 'M' || $authen->authen['year'] == 'A')}
										<li{if $authen->controller == 'year'} class="active"{/if}><a href="{$base_url}backend/year"><i class="fa fa-th-list"></i> <span>Year</span></a></li>
									{/if}		
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['product'] == 'M' || $authen->authen['product'] == 'A')}
										<li{if $authen->controller == 'product'} class="active"{/if}><a href="{$base_url}backend/product"><i class="fa fa-th-list"></i> <span>Product</span></a></li>
									{/if}
								</ul>
							</li>
						{/if}
						{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['tax_rate'] == 'M' || $authen->authen['tax_rate'] == 'A') || ($authen->authen['setting'] == 'M' || $authen->authen['setting'] == 'A')}
							<li class="treeview{if $authen->controller == 'tax_rate' || $authen->controller == 'setting'} active{/if}">
								<a href="#">
									<i class="fa fa-tv"></i> <span>POS</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['setting'] == 'M' || $authen->authen['setting'] == 'A')}
										<li{if $authen->controller == 'setting'} class="active"{/if}><a href="{$base_url}backend/setting"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
									{/if}
								</ul>
							</li>
						{/if}
						{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['prefix'] == 'M' || $authen->authen['prefix'] == 'A') || ($authen->authen['company_type'] == 'M' || $authen->authen['company_type'] == 'A') || ($authen->authen['partner_type'] == 'M' || $authen->authen['partner_type'] == 'A') || ($authen->authen['charge_type'] == 'M' || $authen->authen['charge_type'] == 'A') || ($authen->authen['discount_type'] == 'M' || $authen->authen['discount_type'] == 'A') || ($authen->authen['payment_type'] == 'M' || $authen->authen['payment_type'] == 'A') || ($authen->authen['bank'] == 'M' || $authen->authen['bank'] == 'A') || ($authen->authen['shiping_type'] == 'M' || $authen->authen['shiping_type'] == 'A') }
							<li class="treeview{if $authen->controller == 'prefix' || $authen->controller == 'company_type' || $authen->controller == 'partner_type' || $authen->controller == 'charge_type' || $authen->controller == 'discount_type' || $authen->controller == 'payment_type' || $authen->controller == 'shiping_type' || $authen->controller == 'bank' || $authen->controller == 'peroid' || $authen->controller == 'installments' || $authen->controller == 'package_feature'} active{/if}">
								<a href="#">
									<i class="fa fa-database"></i> <span>Master Data</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['prefix'] == 'M' || $authen->authen['prefix'] == 'A')}
										<li{if $authen->controller == 'prefix'} class="active"{/if}><a href="{$base_url}backend/prefix"><i class="fa fa-th-list"></i> <span>Prefix</span></a></li>
									{/if}
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['bank'] == 'M' || $authen->authen['bank'] == 'A')}
										<li{if $authen->controller == 'bank'} class="active"{/if}><a href="{$base_url}backend/bank"><i class="fa fa-bank"></i> <span>Bank</span></a></li>
									{/if}
								</ul>
							</li>
						{/if}
						{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['region'] == 'M' || $authen->authen['region'] == 'A') || ($authen->authen['province'] == 'M' || $authen->authen['province'] == 'A') || ($authen->authen['district'] == 'M' || $authen->authen['district'] == 'A') || ($authen->authen['sub_district'] == 'M' || $authen->authen['sub_district'] == 'A')}
							<li class="treeview{if $authen->controller == 'region' || $authen->controller == 'province' || $authen->controller == 'district' || $authen->controller == 'sub_district'} active{/if}">
								<a href="#">
									<i class="fa fa-map-marker"></i> <span>Localization</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['region'] == 'M' || $authen->authen['region'] == 'A')}
										<li{if $authen->controller == 'region'} class="active"{/if}><a href="{$base_url}backend/region"><i class="fa fa-th-large"></i> <span>Region</span></a></li>
									{/if}
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['province'] == 'M' || $authen->authen['province'] == 'A')}
										<li{if $authen->controller == 'province'} class="active"{/if}><a href="{$base_url}backend/province"><i class="fa fa-th"></i> <span>Province</span></a></li>
									{/if}
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['district'] == 'M' || $authen->authen['district'] == 'A')}
										<li{if $authen->controller == 'district'} class="active"{/if}><a href="{$base_url}backend/district"><i class="fa fa-th-list"></i> <span>District</span></a></li>
									{/if}
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['sub_district'] == 'M' || $authen->authen['sub_district'] == 'A')}
										<li{if $authen->controller == 'sub_district'} class="active"{/if}><a href="{$base_url}backend/sub_district"><i class="fa fa-list"></i> <span>Sub District</span></a></li>
									{/if}
								</ul>
							</li>
						{/if}
						{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['user'] == 'M' || $authen->authen['user'] == 'A')}
							<li class="treeview{if $authen->controller == 'user' || $authen->controller == 'role'} active{/if}">
								<a href="#">
									<i class="fa fa-users"></i> <span>Users</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									{if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['user'] == 'M' || $authen->authen['user'] == 'A')}
										<li{if $authen->controller == 'user'} class="active"{/if}><a href="{$base_url}backend/user"><i class="fa fa-users"></i> <span>Users</span></a></li>
									{/if}
									{if $authen->is_developer == true || $authen->is_admin == true}
										<li{if $authen->controller == 'role'} class="active"{/if}><a href="{$base_url}backend/role"><i class="fa fa-shield"></i> <span>Role</span></a></li>
									{/if}
								</ul>
							</li>
						{/if}
						{if $authen->is_developer == true}
							<li class="treeview{if $authen->controller == 'section' || $authen->controller == 'menu' || $authen->controller == 'config' || $authen->controller == 'feature'} active{/if}">
								<a href="#">
									<i class="fa fa-gears"></i> <span>System</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li{if $authen->controller == 'section'} class="active"{/if}><a href="{$base_url}backend/section"><i class="fa fa-th-large"></i> <span>Section</span></a></li>
									<li{if $authen->controller == 'menu'} class="active"{/if}><a href="{$base_url}backend/menu"><i class="fa fa-th"></i> <span>Menu</span></a></li>
									<li{if $authen->controller == 'config'} class="active"{/if}><a href="{$base_url}backend/config"><i class="fa fa-gear"></i> <span>Configuration</span></a></li>
									{* <li{if $authen->controller == 'feature'} class="active"{/if}><a href="{$base_url}backend/feature"><i class="fa fa-sitemap"></i> <span>Feature</span></a></li> *}
								</ul>
							</li>
						{/if}

							<li class="treeview{if $authen->controller == 'message'} active{/if}">
								<a href="#">
									<i class="fa fa-users"></i> <span>messsage</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">

										<li{if $authen->controller == 'message'} class="active"{/if}><a href="{$base_url}backend/message"><i class="fa fa-users"></i> <span>message</span></a></li>


								</ul>
							</li>
						
					</ul>
				</section>
			</aside>	
			<div class="content-wrapper" id="{$authen->controller}-page">
				{block name=body}{/block}
			</div>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.0.0
				</div>
				<strong>Copyright &copy; 2020 {$company_name}</strong> All rights reserved.
			</footer>
		</div>

		<script src="{$image_url}theme/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="{$image_url}theme/backend/dist/js/jquery-ui.min.js?v=1.11.4"></script>
		<script src="{$image_url}theme/backend/dist/js/ckeditor.js?v=4.5.7"></script>
		<script src="{$image_url}theme/backend/bootstrap/js/bootstrap.min.js"></script>
		<script src="{$image_url}theme/backend/plugins/modal/modal.js"></script>
		<script src="{$image_url}theme/backend/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{$image_url}theme/backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="{$image_url}theme/backend/dist/js/raphael-min.js?v=2.1.0"></script>
		<!--<script src="{$image_url}theme/backend/plugins/morris/morris.min.js"></script>-->
		<script src="{$image_url}theme/backend/plugins/sparkline/jquery.sparkline.min.js"></script>
		<script src="{$image_url}theme/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="{$image_url}theme/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="{$image_url}theme/backend/plugins/knob/jquery.knob.js"></script>
		<script src="{$image_url}theme/backend/dist/js/moment.min.js?v=2.11.2"></script>
		<script src="{$image_url}theme/backend/plugins/daterangepicker/daterangepicker.js"></script>
		<script src="{$image_url}theme/backend/plugins/datepicker/bootstrap-datepicker.js"></script>
		{* <script src="{$image_url}theme/default/assets/js/bootstrap-tagsinput.min.js"></script> *}
		
		<script src="{$image_url}theme/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="{$image_url}theme/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<script src="{$image_url}theme/backend/plugins/fastclick/fastclick.js"></script>
		<script src="{$image_url}theme/backend/dist/js/app.min.js"></script>
		<!--<script src="{$image_url}theme/backend/dist/js/pages/dashboard.js"></script>-->
		<script src="{$image_url}theme/backend/dist/js/demo.js"></script>
		<script src="{$image_url}theme/backend/dist/js/fullcalendar.min.js?v=3.1.0"></script>
		<script src="{$image_url}theme/backend/dist/js/main.js?ver={$smarty.now}"></script>

		<script src="{$image_url}theme/backend/dist/js/select2/js/select2.min.js"></script>
		
		{block name=script}{/block}
	</body>
</html>