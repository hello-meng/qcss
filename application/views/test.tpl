{extends file="layout.tpl"}

{block name=body}
    <div class="container">
        <br/><br/>
        <div class="text-right">
            <a href="{$base_url}test/add" class="btn btn-primary">+ Add</a>
        </div>
        <br/>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="50">ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th width="150">Edit</th>
                    <th width="150">Delete</th>
                </tr>
            </thead>
            <tbody>
                {foreach $items as $item}
                <tr>
                    <td>{$item.id}</td>
                    <td>{$item.title}</td>
                    <td>{$item.description}</td>
                    <td>
                        {if $item.status == 'Y'}
                            <span class="label label-success">Yes</span>
                        {else}
                            <span class="label label-default">No</span>
                        {/if}
                    </td>
                    <td>
                        <a href="{$base_url}test/edit/{$item.id}">Edit</a>
                    </td>
                    <td>
                        <a href="{$base_url}test/delete/{$item.id}" onclick="return confirm('Are you sure ?')">Delete</a>
                    </td>
                </tr>
                {/foreach}

                {if $items|@count == 0}
                <tr>
                    <td colspan="6" align="center" bgcolor="#f1f1f1">No Data</td>
                </tr>
                {/if}
            </tbody>
        </table>
    </div>
{/block}

{block name=script}{/block}