<!DOCTYPE html>
<html>
	<head>
	    <title>{block name=meta_title}{$page} - {$site_name} : {$company_name}{/block}</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
	    <link rel="stylesheet" href="{$image_url}theme/default/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="{$image_url}theme/default/plugins/datatables/dataTables.bootstrap.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="{$image_url}theme/default/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="{$image_url}theme/default/dist/css/skins/_all-skins.css">
		<link rel="stylesheet" href="{$image_url}theme/default/plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="{$image_url}theme/default/plugins/morris/morris.css">
		<link rel="stylesheet" href="{$image_url}theme/default/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="{$image_url}theme/default/plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="{$image_url}theme/default/plugins/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" href="{$image_url}theme/default/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css">
		<link rel="shortcut icon" href="{$image_url}theme/default/favicon.ico" type="image/x-icon" />
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	    <style>
	    	.main-content{
	    		padding: 0px !important;
	    		margin: 0px !important;
	    	}
	    	.panel-content{
	    		padding: 0px !important;
	    		margin: 0px !important;
	    	}
	    	.panel{
	    		padding: 0px !important;
	    		margin: 0px !important;
	    	}
	    	body{
	    		background-color: #FFFFFF !important;
	    	}
	    	.dataTables_wrapper {
			    max-width: 100%;
			}
			.dataTables_wrapper .row {
			    margin: 0px;
			}
	    </style>
	</head>
	<body>
		<div class="main-content">
		    {block name=body}{/block}
		</div><!-- Main Content -->
		<script src="{$image_url}theme/default/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
		<script src="{$image_url}theme/default/bootstrap/js/bootstrap.min.js"></script>
		<script src="{$image_url}theme/default/plugins/modal/modal.js"></script>
		<script src="{$image_url}theme/default/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{$image_url}theme/default/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<!--<script src="{$image_url}theme/default/plugins/morris/morris.min.js"></script>-->
		<script src="{$image_url}theme/default/plugins/sparkline/jquery.sparkline.min.js"></script>
		<script src="{$image_url}theme/default/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="{$image_url}theme/default/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="{$image_url}theme/default/plugins/knob/jquery.knob.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		<script src="{$image_url}theme/default/plugins/daterangepicker/daterangepicker.js"></script>
		<script src="{$image_url}theme/default/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script src="{$image_url}theme/default/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="{$image_url}theme/default/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<script src="{$image_url}theme/default/plugins/fastclick/fastclick.js"></script>
		<script src="{$image_url}theme/default/dist/js/app.min.js"></script>
		<!--<script src="{$image_url}theme/default/dist/js/pages/dashboard.js"></script>-->
		<script src="{$image_url}theme/default/dist/js/demo.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
		{block name=script}{/block}
	</body>
</html>