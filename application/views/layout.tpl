<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable = no"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="description" content="บอกเกี่ยวกับรายละเอียอดอะไรก็ได้ เช่น QSC คือบริษัทนำเข้า bbbbbbbbb">
		<meta name="keywords" content="สำหรับ SEO ให้ google searchengine เช่น aaaaaaa">
		<title>QCS Meng</title>

		<!-- Font -->		
		<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;600&family=Pragati+Narrow:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{$image_url}theme/default/img/favicon.ico">
		
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{$image_url}theme/default/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="{$image_url}theme/default/css/carousel.css">
		<!-- css slide -->
		<link rel="stylesheet" type="text/css" href="{$image_url}theme/default/css/slick.css">
		<link rel="stylesheet" type="text/css" href="{$image_url}theme/default/css/slick-theme.css">

		<link rel="stylesheet" type="text/css" href="{$image_url}theme/default/css/style.css">
		<link rel="stylesheet" type="text/css" href="{$image_url}theme/default/css/custom.css">
		<link rel="stylesheet" type="text/css" href="{$image_url}theme/default/css/responsive.css">		

	</head>

    <body>

		<!-- HEADER -->
		<header>
			<div class="header-nav">
				<!-- for mobile -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- <a class="navbar-brand" href="#">Brand</a> -->
				</div>

				<a href="{$base_url}"><img src="{$image_url}theme/default/img/logo.png"></a>
			</div>
			<nav class="navbar navbar-default">
			    <div class="container-fluid">
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="{if $page == 'about'}active{/if}"><a href="{$base_url}about">About us</a></li>
							<li class="{if $page == 'car'}active{/if}"><a href="{$base_url}car">Used car</a></li>
							<li class="{if $page == 'news'}active{/if}"><a href="{$base_url}news">News</a></li>
							<li class="{if $page == 'contact'}active{/if}"><a href="{$base_url}contact">Contact us</a></li>
						</ul>
				    </div><!-- /.navbar-collapse -->
			    </div><!-- /.container-fluid -->
			</nav>
		</header>
		<!-- END HEADER -->

        {block name=body}{/block}

		<!-- FOOTER -->
		<footer>
			© 2019 QCS CO., LTD
		</footer>
		<!-- END FOOTER -->

		<!-- JS -->
		<script src="{$image_url}theme/default/js/jquery-351.min.js"></script> 
		<script type="text/javascript" src="{$image_url}theme/default/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{$image_url}theme/default/js/slick.min.js"></script>
        {block name=script}{/block}
    </body>
</html>