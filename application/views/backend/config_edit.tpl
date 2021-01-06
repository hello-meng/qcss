{extends file="backend/layout.tpl"}
{block name=meta_title}{$page_name} Management - {$site_name} : {$company_name}{/block}
{block name=body}
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
								$('#type_req').hide();
								$('#code_req').hide();
								$('#name_th_req').hide();
								$('#name_en_req').hide();
								$('#value_req').hide();
								$('#status_req').hide();
								$('.has-error').removeClass('has-error');
								
								with(document.add_edit)
								{
									if(type[0].checked==false && type[1].checked==false)
									{
										$('#type_req').show();
										$('#type_req').parent('div').addClass('has-error');
										return false;
									}
									else if(code.value=="")
									{
										$('#code_req').show();
										$('#code_req').parent('div').addClass('has-error');
										$('#code').focus();
										return false;
									}
									else if(name_th.value=="")
									{
										$('#name_th_req').show();
										$('#name_th_req').parent('div').addClass('has-error');
										$('#name_th').focus();
										return false;
									}
									else if(name_en.value=="")
									{
										$('#name_en_req').show();
										$('#name_en_req').parent('div').addClass('has-error');
										$('#name_en').focus();
										return false;
									}
									else if(value.value=="")
									{
										$('#value_req').show();
										$('#value_req').parent('div').addClass('has-error');
										$('#value').focus();
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
						<form role="form" class="form-horizontal" name="add_edit" method="post" onsubmit="return check_data();">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-3 control-label">Type <font color="red">*</font></label>
									<div class="col-sm-6">
										<label class="radio-inline">
											<input type="radio" value="T" id="type" name="type"{if $item.type == 'T'} checked="checked"{/if}> Tax
										</label>
										<label class="radio-inline">
											<input type="radio" value="S" id="type" name="type"{if $item.type == 'S'} checked="checked"{/if}> Setting
										</label>
										<br />
										<label id="type_req" for="inputError" style="display: none;" class="control-label">Please select Type.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Code <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="code" id="code" value="{$item.code}">
										<label id="code_req" for="inputError" style="display: none;" class="control-label">Please input Code.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Name (TH) <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="name_th" id="name_th" value="{$item.name_th}">
										<label id="name_th_req" for="inputError" style="display: none;" class="control-label">Please input Name (TH).</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Name (EN) <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="name_en" id="name_en" value="{$item.name_en}">
										<label id="name_en_req" for="inputError" style="display: none;" class="control-label">Please input Name (EN).</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Value <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="value" id="value" value="{$item.value}">
										<label id="value_req" for="inputError" style="display: none;" class="control-label">Please input Value.</label>
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