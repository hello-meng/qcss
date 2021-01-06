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
						<h3 class="box-title">Add {$page_name}</h3>
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
										<input class="form-control" type="text" name="name" id="name">
										<label id="name_req" for="inputError" style="display: none;" class="control-label">Please input Name.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Description </label>
									<div class="col-sm-6">
										<textarea class="form-control" name="description" id="description"></textarea>
									</div>
								</div>
								<div class="form-group" id="image_display_block" style="display: none;">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-6">
										<img id="image_display" src="" class="img-responsive" style="width: 550px;" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Image (Size 1465 x 500)<font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="image" id="image" readonly="readonly" multiple>
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
										<input class="form-control" type="text" name="url" id="url">
										<label id="url_req" for="inputError" style="display: none;" class="control-label">Please input URL.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Order</label>
									<div class="col-sm-6">
										<select class="form-control" id="order_on" name="order_on">
		                                    {section name=foo start=1 loop=51 step=1}
												<option value="{$smarty.section.foo.index}">{$smarty.section.foo.index}</option>
											{/section}
		                                </select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Status <font color="red">*</font></label>
									<div class="col-sm-6">
										<label class="radio-inline">
											<input type="radio" value="Y" id="status" name="status"> Open
										</label>
										<label class="radio-inline">
											<input type="radio" value="N" id="status" name="status"> Close
										</label>
										<br />
										<label id="status_req" for="inputError" style="display: none;" class="control-label">Please select Status.</label>
									</div>
								</div>
								{*
								<hr/>
								<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-6">
										<table id="gallery" class="table table-bordered" width="100%">
											<tr>
												<th class="text-center">Image</th>
												<th class="text-center">Remove</th>
											</tr>
										</table>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Gallery</label>
									<div class="col-sm-6">
										<button class="btn btn-default" type="button" onclick="open_file_manager('gallery')">Select Image</button>
										<script>
											function responsive_filemanager_callback_gallery(url, ext, alt_name, field_id)
											{
												window['win_' + field_id].close();

												html = '';
												for(var i = 0; i < url.length; i++)
												{
													if($.inArray(ext[i], ['jpg', 'jpeg', 'png', 'gif']) > -1)
													{
														var html = '';
														html += '<tr>';
														html += '<td><img src="' + url[i] + '" onerror="this.src=\'{$image_url}theme/default/no_img.png\';" style="max-height: 100px;" /><input type="hidden" name="gallery[]" value="' + url[i] + '" /></td>';
														html += '<td class="text-center"><a href="javascript:void(0);" onclick="$(this).parent().parent().remove();"><i class="fa fa-remove text-danger"></i></a></td>';
														html += '</tr>';
														$('#gallery').append(html);
													}
												}
											}
										</script>
									</div>
								</div>
								*}
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