<option value="">[ District ]</option>
{foreach $district as $district_item}
	<option value="{$district_item.id}"{if $district_item.id == $district_id} selected="selected"{/if}>{$district_item.name_th}</option>
{/foreach}