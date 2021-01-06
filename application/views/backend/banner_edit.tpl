{extends file="backend/layout.tpl"}
{block name=meta_title}{$page_name} Management - {$site_name}{/block}
{block name=body}
	<script src="{$image_url}tinymce/tinymce.min.js"></script>
	<section class="content-header">
		<h1>
			{$page_name}
			<small>{$site_name}</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{$base_url}backend"><i class="fa fa-home"></i> {$site_name}</a></li>
			<li class="active">{$page_name}</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Edit {$page_name}</h3>
						<script>
							function check_data()
							{
								$('#name_req').hide();
								$('#image_req').hide();
								$('#url_req').hide();
								$('#status_req').hide();
								$('.has-error').removeClass('has-error');
								
								with(document.add_edit)
								{
									if(image.value=="")
									{
										$('#image_req').show();
										$('#image_req').parent('div').addClass('has-error');
										$('#image').focus();
										return false;
									}
									else if(status[0].checked==false && status[1].checked==false)
									{
										$('#status_req').show();
										$('#status_req').parent('div').addClass('has-error');
										return false;
									}
								}
							}
						</script>
						<form role="form" class="form-horizontal" name="add_edit" method="post" onsubmit="return check_data();" enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-3 control-label">Name</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="name" id="name" value="{$item.name|escape}">
										<label id="name_req" for="inputError" style="display: none;" class="control-label">Please input Name.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Description </label>
									<div class="col-sm-6">
										<textarea class="form-control" name="description" id="description">{$item.description}</textarea>
									</div>
								</div>
								<div class="form-group" id="image_display_block"{if $item.image == ""} style="display: none;"{/if}>
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-6">
										<img id="image_display" src="{$item.image}" class="img-responsive" style="width: 550px;" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Image (Size 1465 x 500) <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="image" id="image" value="{$item.image}" readonly="readonly">
										<label id="image_req" for="inputError" style="display: none;" class="control-label">Please select Image (TH).</label>
									</div>
									<div class="col-sm-3" style="vertical-align: bottom;">
										<button class="btn btn-default" type="button" onclick="open_file_manager('image')">Select Image</button>
										<script>
											function responsive_filemanager_callback_image(url, ext, alt_name, field_id)
											{
												window['win_' + field_id].close();

												if($.inArray(ext[0], ['jpg', 'jpeg', 'png', 'gif']) > -1)
												{
													$('#image_display').attr('src', url[0]);
													$('#image_display_block').show();
													$('#image').val(url[0]);
												}
											}
										</script>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">URL</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="url" id="url" value="{$item.url}">
										<label id="url_req" for="inputError" style="display: none;" class="control-label">Please input URL.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Order</label>
									<div class="col-sm-6">
										<select class="form-control" id="order_on" name="order_on">
		                                    {section name=foo start=1 loop=51 step=1}
												<option value="{$smarty.section.foo.index}"{if $item.order_on == $smarty.section.foo.index} selected="selected"{/if}>{$smarty.section.foo.index}</option>
											{/section}
		                                </select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Status <font color="red">*</font></label>
									<div class="col-sm-6">
										<label class="radio-inline">
											<input type="radio" value="Y" id="status" name="status"{if $item.status == 'Y'} checked="checked"{/if}> Open
										</label>
										<label class="radio-inline">
											<input type="radio" value="N" id="status" name="status"{if $item.status == 'N'} checked="checked"{/if}> Close
										</label>
										<br />
										<label id="status_req" for="inputError" style="display: none;" class="control-label">Please select Status.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-6">
										<button class="btn btn-success" type="submit" name="save" id="save" value="save">Save</button>
										<a href="javascript:history.back();" class="btn btn-default">Cancel</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
{/block}
{block name="script"}
	<script>
		function open_file_manager(field_id)
		{
			var width = 860;
			var height = 450;
			var x = parseInt(screen.width / 2.0) - (width / 2.0);
			var y = parseInt(screen.height / 2.0) - (height / 2.0);
			var isMSIE = (navigator.appName == "Microsoft Internet Explorer");
			if (isMSIE) {
				// Pesky MSIE + XP SP2
				width += 15;
				height += 35;
			}

			window['win_' + field_id] = window.open("{$file_manager_url}dialog.php?type=" + ((field_id == 'pdf_th' || field_id == 'doc_th' || field_id == 'pdf_en' || field_id == 'doc_en') ? '4' : '1') + "&popup=1&field_id=" + field_id + "&descending=false&lang=undefined&akey=key", "FileManager", "top=" + y + ",left=" + x + ",scrollbars=no,width=" + width + ",height=" + height + ",resizable=yes");
			if (window['win_' + field_id] == null) {
				alert('You will need to disable popup blocking on this site.');
				return;
			}

			try {
				window['win_' + field_id].focus();
			} catch (e) {
			}
		}
	</script>
{/block}