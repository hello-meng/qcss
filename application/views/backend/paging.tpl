<div class="col-md-6 text-left">
	<div class="pagination">
		Total : {$total|number_format:0:".":","} Records
	</div>
</div>
<div class="col-md-6 text-right">
	{if $total_page > 1}
	<div class="pagination">
		{if $current_page > 1}
		<a href="{$back_page}" class="btn btn-default btn-xs"><< prev</a>
		{/if}
		{if $total_page <= 11}
			{section name=foo start=1 loop=($total_page+1) step=1}
			  {if $smarty.section.foo.index != $current_page}
			  <a href="{$url}{$smarty.section.foo.index}{$get}" class="btn btn-default btn-xs">{$smarty.section.foo.index}</a>
			  {else}
			  <span class="disabled btn btn-primary btn-xs">{$smarty.section.foo.index}</span>
			  {/if}
			{/section}
		{elseif $total_page > 11 && $current_page<=6}
			{section name=foo start=1 loop=(($current_page+(5+(6-$current_page)))+1) step=1}
			  {if $smarty.section.foo.index != $current_page}
			  <a href="{$url}{$smarty.section.foo.index}{$get}" class="btn btn-default btn-xs">{$smarty.section.foo.index}</a>
			  {else}
			  <span class="disabled btn btn-primary btn-xs">{$smarty.section.foo.index}</span>
			  {/if}
			{/section}
		{elseif $total_page > 11 && ($total_page-$current_page)<5}
			{section name=foo start=(($current_page-5)-(5-($total_page-$current_page))) loop=($total_page+1) step=1}
			  {if $smarty.section.foo.index != $current_page}
			  <a href="{$url}{$smarty.section.foo.index}{$get}" class="btn btn-default btn-xs">{$smarty.section.foo.index}</a>
			  {else}
			  <span class="disabled btn btn-primary btn-xs">{$smarty.section.foo.index}</span>
			  {/if}
			{/section}
		{elseif $total_page > 11 && ($total_page-$current_page)>=5}
			{section name=foo start=($current_page-5) loop=($current_page+6) step=1}
			  {if $smarty.section.foo.index != $current_page}
			  <a href="{$url}{$smarty.section.foo.index}{$get}" class="btn btn-default btn-xs">{$smarty.section.foo.index}</a>
			  {else}
			  <span class="disabled btn btn-primary btn-xs">{$smarty.section.foo.index}</span>
			  {/if}
			{/section}
		{/if}
		{if $current_page < $total_page}
		<a href="{$next_page}" class="btn btn-default btn-xs">next >></a>
		{/if}
	</div>
	{/if}
</div>