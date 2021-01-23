{extends file="layout.tpl"}

{block name=body}
		<!-- CONTENT -->
		<section>
			<div class="container">
				<!-- HEAD -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-lg-12 text-center">
						<div class="new-head-caption">
							<h1>News</h1>
						</div>
					</div>
				</div>
				<!-- DETAIL -->
				<div class="row">
					{foreach $items as $key => $item}	
					{$img = $item.image|json_decode}  {*รูป เนื่องจากอยู่ในรูปแบบ array จึงต้องใช้ json_decode ออกมา*}				
					<div class="col-xs-12 col-sm-6 col-lg-4">
						<a href="{$base_url}news/detail/{$item.id}">
							<img src="{$img[0]}" class="w-100">
							<h2 class="news-name">
								{if $item.day_create <= 7}<span class="new-yellow">NEW</span>{/if}
								{$item.name}
							</h2>
							<p class="news-date">Updated date: {$item.created_on|date_format:"%A, %B %e, %Y"}</p>
						</a>
					</div>
					{/foreach}
				</div>
			</div>
		</section>
		<!-- END CONTANT -->
{/block}

{block name=script}{/block}