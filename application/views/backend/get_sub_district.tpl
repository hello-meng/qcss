<option value="">[ Sub District ]</option>
{foreach $sub_district as $sub_district_item}
	<option value="{$sub_district_item.id}"{if $sub_district_item.id == $sub_district_id} selected="selected"{/if}>{$sub_district_item.name_th}</option>
{/foreach}