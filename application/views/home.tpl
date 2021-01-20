{extends file="layout.tpl"}

{block name=body}
		<!-- slide -->
		<section id="slide-head">

			<!-- Carousel
			================================================== -->
			<div id="myCarousel" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner" role="listbox">
					{* 
					<div class="item active">
						<img class="first-slide w-100" src="{$image_url}theme/default/img/slide/image-1.png" alt="First slide" />
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-6 carousel-caption caption-slide">
									<h1>Service Appointment</h1>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mattis augue. 
										Morbi sem tortor, malesuada vitae diam eget, 
										ornare posuere nisl. Mauris pretium id ligula a tempor. 
									</p>
									<a class="btn btn-custom" href="#" role="button">Book now<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<img class="first-slide w-100" src="{$image_url}theme/default/img/slide/image-1.png" alt="First slide" class="w-100">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-6 carousel-caption caption-slide">
									<h1>Example headline.</h1>
									<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
									<a class="btn btn-custom" href="#" role="button">Sing up<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></a>
								</div>
							</div>
						</div>
					</div> 
					*}

					{foreach $dt_banners as $key => $banner}		
					<div class="item {if $key == 0}active{/if}">
						<img class="first-slide w-100" src="{$image_url}theme/default/img/slide/image-1.png" alt="First slide" />
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-6 carousel-caption caption-slide">
									<h1>{$banner.name}</h1>
									<p>
										{$banner.description} 
									</p>
									<a class="btn btn-custom" href="{$banner.url}" role="button">Book now<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></a>
								</div>
							</div>
						</div>
					</div>
					{/foreach}

				</div> 

				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<img src="{$image_url}theme/default/img/icon/slide-left.svg" class="icon-slide">
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<img src="{$image_url}theme/default/img/icon/slide-right.svg" class="icon-slide">
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!-- /.carousel -->	

		</section>


		<!-- CONTENT -->
		<section id="news">

			<!-- Our news -->
			<div class="home-ournews">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-sm-12 text-center">
							<h2>Our News</h2>
						</div>
					</div>
					<div class="row">
						{*
						<div class="col-xs-12 col-sm-6">
							<div class="ournew-card">
								<a href="#">									
									<img src="{$image_url}theme/default/img/home/our-news/image-1.png" class="w-100">										
									<h3 class="ournew-heads"><span class="new-yellow">NEW</span>Niche Cars Group reveals McLaren 570S in Silica White</h3>
									<p class="ournew-date">24 Jan 2019</p>
									<p class="ournew-detail">Niche Cars Group, a sole authorized dealer of McLaren, led by President Seree Chinabarramee (2nd left), Managing Director Vittawat Chinabarramee...</p>									
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="ournew-card">
								<a href="#">									
									<img src="{$image_url}theme/default/img/home/our-news/image-2.png" class="w-100">
									<h3 class="ournew-heads">Niche Cars Group นำ Lamborghini และ McLaren ร่วมงานมอเตอร์โชว์ 2559</h3>
									<p class="ournew-date">24 Jan 2019</p>
									<p class="ournew-detail">บริษัท นิช คาร์ กรุ๊ป จำกัด ผู้นำเข้ารถยนต์ระดับซุปเปอร์คาร์ สปอร์ตคาร์ และไฮเปอร์คาร์ อย่างเป็นทางการในประเทศไทย ส่งซุปเปอร์คาร์สุดหรูตัวท้อปร่วมอวดโฉม ...</p>									
								</a>
							</div>
						</div>
						*}
						{foreach $dt_news as $key => $news}
						{$img = $news.image|json_decode}  {*รูป เนื่องจากอยู่ในรูปแบบ array จึงต้องใช้ json_decode ออกมา*}
						<div class="col-xs-12 col-sm-6">
							<div class="ournew-card">
								<a href="{$base_url}news/detail/{$news.id}">									
									<img src="{$img[0]}" class="w-100">										
									<h3 class="ournew-heads">
										{if $news.day_create < -7}<span class="new-yellow">NEW</span>{/if}
										{$news.name}
									</h3>
									<p class="ournew-date">{$news.created_on|date_format:"%e %B %Y"}</p>
									{* <p class="news-detail-text">{$news.description}</p> *}
									<div class="new-desc">
										{$news.description}
									</div>
								</a>
							</div>
						</div>							
						{/foreach}
					</div>

					<div class="row home-pad">
						<div class="col-xs-6 col-sm-12 text-center">
							<!-- <a class="btn btn-custom" href="#" role="button"><p>Discover more</p><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></a> -->							
							<a class="btn btn-custom-home" href="{$base_url}news/" role="button">Discover more<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></a>
						</div>
					</div>
				</div>
			</div>

		</section>
		<!-- END CONTANT -->

		<section id="product">
			<!-- Car recommend -->
			<div class="home-carsreccom">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 text-center">
							<h2>Car Recommend</h2>
						</div>
					</div>
					<div class="row">
						<div class="home-slider">
							{*
							<div class="col-xs-12 col-sm-4">
								<!-- card -->
								<div class="car-recom-card">
									<a href="cardetail.html">
										<img src="{$image_url}theme/default/img/home/car/image-1.png" class="w-100">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<h3 class="ournew-heads"><span class="new-yellow">NEW</span>New Midi Cooper S</h3>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6">
												<p class="car-recom-det">โฉม : 2014-2018</p>
											</div>
											<div class="col-xs-6 col-sm-6">												
												<p class="car-recom-det">ปี : 2017</p>
											</div>										
										</div>
										<div class="car-recom-line"></div>
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<h3 class="ournew-heads">7,000,000 THB</h3>
											</div>
										</div>
									</a>
								</div>
								<!-- end card -->
							</div>
							<div class="col-xs-12 col-sm-4">
								<!-- card -->
								<div class="car-recom-card">
									<a href="cardetail.html">
										<img src="{$image_url}theme/default/img/home/car/image-2.png" class="w-100">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<h3 class="ournew-heads"><span class="new-yellow">NEW</span>Mclaren Mp4</h3>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6">	
												<p class="car-recom-det">โฉม : 2014-2018</p>
											</div>
											<div class="col-xs-6 col-sm-6">													
												<p class="car-recom-det">ปี : 2017</p>
											</div>										
										</div>
										<div class="car-recom-line"></div>
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<h3 class="ournew-heads">31,000,000 THB</h3>
											</div>
										</div>
									</a>
								</div>
								<!-- end card -->
							</div>
							<div class="col-xs-12 col-sm-4">
								<!-- card -->
								<div class="car-recom-card">
									<a href="cardetail.html">
										<img src="{$image_url}theme/default/img/home/car/image-3.png" class="w-100">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<h3 class="ournew-heads">Porsche 718 Boxster Racing Yellow</h3>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6">	
												<p class="car-recom-det">โฉม : 2014-2018</p>
											</div>
											<div class="col-xs-6 col-sm-6">													
												<p class="car-recom-det">ปี : 2017</p>
											</div>										
										</div>
										<div class="car-recom-line"></div>
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<h3 class="ournew-heads">31,000,000 THB</h3>
											</div>
										</div>
									</a>
								</div>
								<!-- end card -->
							</div>
							<div class="col-xs-12 col-sm-4">
								<!-- card -->
								<div class="car-recom-card">
									<a href="cardetail.html">
										<img src="{$image_url}theme/default/img/home/car/image-2.png" class="w-100">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<h3 class="ournew-heads"><span class="new-yellow">NEW</span>Mclaren Mp4</h3>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6">	
												<p class="car-recom-det">โฉม : 2014-2018</p>
											</div>
											<div class="col-xs-6 col-sm-6">													
												<p class="car-recom-det">ปี : 2017</p>
											</div>										
										</div>
										<div class="car-recom-line"></div>
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<h3 class="ournew-heads">31,000,000 THB</h3>
											</div>
										</div>
									</a>
								</div>
								<!-- end card -->
							</div>
							*}

							{foreach $dt_products as $key => $product}
							{$img = $product.image|json_decode}  {*รูป เนื่องจากอยู่ในรูปแบบ array จึงต้องใช้ json_decode ออกมา*}
							<div class="col-xs-12 col-sm-4">
								<!-- card -->
								<div class="car-recom-card">
									<a href="{$base_url}car/detail/{$product.id}">
										<img src="{$img[0]}" class="w-100">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<h3 class="ournew-heads">
													{if $product.day_create < -7}<span class="new-yellow">NEW</span>{/if}
													{$product.model}												
												</h3>
											</div>
										</div>
										<div class="row">
											{* <div class="col-xs-6 col-sm-6">	
												<p class="car-recom-det">โฉม : 2014-2018</p>
											</div> *}
											<div class="col-xs-6 col-sm-6">													
												<p class="car-recom-det">ปี : {$product.year}</p>
											</div>										
										</div>
										<div class="car-recom-line"></div>
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<h3 class="ournew-heads">{$product.price|number_format:0:".":","} THB</h3>
											</div>
										</div>
									</a>
								</div>
								<!-- end card -->
							</div>
							{/foreach}

						</div>
					</div>
					<div class="row home-pad">
						<div class="col-xs-12 col-sm-12 text-center">
							<!-- <a class="btn btn-custom" href="#" role="button">Discover more&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></a> -->
							<a class="btn btn-custom" href="{$base_url}car/" role="button">Discover more<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></a>
						</div>
					</div>
				</div>
			</div>
		</section>

{/block}

{block name=script}
		<script type="text/javascript">
			$(document).ready(function() {
				
				var $slickElement = $('.home-slider');

				$('.home-slider').slick({
					slidesToShow: 3,
  					slidesToScroll: 1,
					infinite: true,
					autoplay: true,
					dots: true,
					autoplaySpeed: 2000,
					//prevArrow: '<button type="button" class="">Previous</button>', 
					//nextArrow: '<button type="button" class="">Next</button>',
					prevArrow: '<span class="arw-prev"><img src="{$image_url}theme/default/img/icon/slide-left.svg"></span>', 
					nextArrow: '<span class="arw-next"><img src="{$image_url}theme/default/img/icon/slide-right.svg"></span>',

				});

			});
		</script>
{/block}