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
								$('#code_req').hide();
								$('#name_req').hide();
								$('#status_req').hide();
								$('.has-error').removeClass('has-error');
								
								with(document.add_edit)
								{
									if(code.value=="")
									{
										$('#code_req').show();
										$('#code_req').parent('div').addClass('has-error');
										$('#code').focus();
										return false;
									}
									else if(name.value=="")
									{
										$('#name_req').show();
										$('#name_req').parent('div').addClass('has-error');
										$('#name').focus();
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
									<label class="col-sm-3 control-label">Code <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="code" id="code">
										<label id="code_req" for="inputError" style="display: none;" class="control-label">Please input Code.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Name</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="name" id="name">
										<label id="name_req" for="inputError" style="display: none;" class="control-label">Please input Name (TH).</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Content</label>
									<div class="col-sm-9">
										<textarea class="form-control editor" name="content" id="content"></textarea>
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
		(function(){
			tinymce.init({
				selector: '.editor',
				height: 500,
				plugins: [
					'advlist autolink autosave link image lists charmap print preview hr anchor pagebreak',
					'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
					'table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern responsivefilemanager'
				],

				toolbar1: 'undo redo | styleselect formatselect',
				toolbar2: 'bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent blockquote | link unlink anchor responsivefilemanager media',
				toolbar3: 'table | hr removeformat | subscript superscript | charmap emoticons | code preview fullscreen',
				menubar: false,
				image_title: true,
				image_caption: true,
				toolbar_items_size: 'small',
				convert_urls: false,
				external_filemanager_path:'{$file_manager_url}', 
				filemanager_title:'Filemanager'
			});
		})();

		function responsive_filemanager_callback_editor(url, ext, alt_name, field_id)
		{
			html = '';
			for(var i = 0; i < url.length; i++)
			{
				if($.inArray(ext[i], ['jpg', 'jpeg', 'png', 'gif']) > -1)
				{
					html += '<img src="' + url[i] + '" alt="' + alt_name[i] + '" />';
				}
				else
				{
					html += '<a href="' + url[i] + '" title="' + alt_name[i] + '" target="_blank">' + alt_name[i] + '.' + ext[i] + '</a>';
				}
			}

			tinymce.activeEditor.selection.setContent(html);

			for(var i = 0; i < tinymce.editors.length; i++)
			{
				var ed = tinymce.editors[i];
				for(var j = 0; j < ed.windowManager.windows.length; j++)
				{
					ed.windowManager.windows[j].close();
				}
			}
		}

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