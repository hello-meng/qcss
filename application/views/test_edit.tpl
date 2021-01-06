{extends file="layout.tpl"}

{block name=body}
    <div class="container">
        <script>
            function check_data()
            {
                $('#title_req').hide();
                $('#description_req').hide();
                $('#order_on_req').hide();
                $('#status_req').hide();
                $('.has-error').removeClass('has-error');

                with(document.add_edit)
                {
                    if(title.value=="")
                    {
                        $('#title_req').show();
                        $('#title_req').parent('div').addClass('has-error');
                        $('#title').focus();
                        return false;
                    }
                    else if(description.value=="")
                    {
                        $('#description_req').show();
                        $('#description_req').parent('div').addClass('has-error');
                        $('#description').focus();
                        return false;
                    }
                    else if(order_on.value=="")
                    {
                        $('#order_on_req').show();
                        $('#order_on_req').parent('div').addClass('has-error');
                        $('#order_on').focus();
                        return false;
                    }
                    else if(status.value=="")
                    {
                        $('#status_req').show();
                        $('#status_req').parent('div').addClass('has-error');
                        $('#status').focus();
                        return false;
                    }
                }
            }
        </script>
        <form action="" method="post" name="add_edit" enctype="multipart/form-data" onsubmit="return check_data();">
            <br/><br/>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Data</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input name="title" id="title" type="text" class="form-control" value="{$item.title}">
                        <p style="display: none;" id="title_req">* Please input data.</p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5">{$item.description}</textarea>
                        <p style="display: none;" id="description_req">* Please input data.</p>
                    </div>
                    <div class="form-group">
                        <label>Order on</label>
                        <input name="order_on" id="order_on" type="number" class="form-control" value="{$item.order_on}">
                        <p style="display: none;" id="order_on_req">* Please input data.</p>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Y" {if $item.status == 'Y'}selected{/if}>Yes</option>
                            <option value="N" {if $item.status == 'N'}selected{/if}>No</option>
                        </select>
                        <p style="display: none;" id="status_req">* Please select data.</p>
                    </div>
                    <br/>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success" id="save" value="save" name="save">SAVE</button>
                        <button type="button" class="btn btn-default" onclick="window.history.back()">CANCEL</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
{/block}

{block name=script}{/block}