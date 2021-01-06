<option value="">[ Province ]</option>
{foreach $province as $province_item}
	<option value="{$province_item.id}"{if $province_item.id == $province_id} selected="selected"{/if}>{$province_item.name_th}</option>
{/foreach}