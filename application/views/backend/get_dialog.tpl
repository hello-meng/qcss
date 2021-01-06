{if $authen.lang_code = 'th'}
	{assign var=month value=','|explode:',ม.ค.,ก.พ.,มี.ค.,เม.ษ.,พ.ค.,มิ.ย.,ก.ค.,ส.ค.,ก.ย.,ต.ค.,พ.ย.,ธ.ค.'}
{else}
	{assign var=month value=','|explode:',Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec'}
{/if}

{foreach $items as $item}
	{$is_today = 0}
	{assign var=arrDate value='-'|explode:$item.message_date}
	{if $smarty.now|date_format:"%Y-%m-%d" == $item.message_date}
		<div class="date">Today</div>
		{$is_today = 1}
	{else}

		<div class="date">{$arrDate[2]} {$month[$arrDate[1]|intval]} {$arrDate[0]}</div>
	{/if}
	{foreach $item.messages as $message}
		
		{if $message.message_from == 'member'}
			<div class="msg you">
				<div class="inner">
					<div class="img" style="background-image: url('{$message.avatar_url}')"></div>
					{if $message.type == 'I'}
						<div class="text is-img"><a href="{$message.file_url}" target="_blank"><img style="max-width:200px;" src="{$message.thumbnail_url}"></a></div>
					{elseif $message.type == 'F'}
						<div class="text is-img"><a href="{$message.file_url}" target="_blank">{$message.ext}</a></div>
					{else}
						<div class="text">{$message.message}</div>
					{/if}
					<div class="time">{$message.message_time}</div>
					
				</div>
			</div>
		{else}
			
			<div class="msg me" {if $message.status == 'R'}data-read="true"{else}data-read="false"{/if} id="dialog_{$message.id}">
				<div class="inner">
					{if $message.type == 'I'}
						<div class="text is-img"><a href="{$message.file_url}" target="_blank"><img style="max-width:200px;" src="{$message.thumbnail_url}"></a></div>
					{elseif $message.type == 'F'}
						<div class="text is-img"><a href="{$message.file_url}" target="_blank">{$message.ext}</a></div>
					{else}
						<div class="text">{$message.message}</div>
					{/if}
					<div class="time">{$message.message_time}</div>
					<div class="is-read">{if $message.status == 'R'}<i class="md md-check"></i>{/if}</div>
				</div>
			</div>
		{/if}
	{/foreach}
	{if $items|count == 0}
		<div class="empty">
			<img src="{$base_url}images/theme/default/assets/images/default-file.png">
			<p>ยังไม่มีข้อมูล</p>
		</div>
	{/if}
{/foreach}
<input type="hidden" id="is_today" value="{$is_today}">