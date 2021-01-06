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
						<h3 class="box-title">Add {$page_name}</h3>
						<script>
							function check_data()
							{
								$('#region_id_req').hide();
								$('#province_id_req').hide();
								$('#code_req').hide();
								$('#name_th_req').hide();
								$('#name_en_req').hide();
								$('#status_req').hide();
								$('.has-error').removeClass('has-error');
								
								with(document.add_edit)
								{
									if(region_id.value=="")
									{
										$('#region_id_req').show();
										$('#region_id_req').parent('div').addClass('has-error');
										$('#region_id').focus();
										return false;
									}
									else if(province_id.value=="")
									{
										$('#province_id_req').show();
										$('#province_id_req').parent('div').addClass('has-error');
										$('#province_id').focus();
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
									else if(status[0].checked==false && status[1].checked==false)
									{
										$('#status_req').show();
										$('#status_req').parent('div').addClass('has-error');
										return false;
									}
								}
							}

							function get_province(region_id)
						 	{
						 		$.get('{$base_url}backend/{$page}/get_province/' + region_id, function(data) {
									$('#province_id').html(data);
								});
						 	}
						</script>
						<form role="form" class="form-horizontal" name="add_edit" method="post" onsubmit="return check_data();">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-3 control-label">Region <font color="red">*</font></label>
									<div class="col-sm-6">
										<select class="form-control" id="region_id" name="region_id" onchange="get_province(this.value);">
		                                    <option value="">[ Region ]</option>
		                                    {foreach $region as $region_item}
		                                    	<option value="{$region_item.id}">{$region_item.name_th}</option>
		                                    {/foreach}
		                                </select>
		                                <label id="region_id_req" for="inputError" style="display: none;" class="control-label">Please select Region.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Province <font color="red">*</font></label>
									<div class="col-sm-6">
										<select class="form-control" id="province_id" name="province_id">
		                                    <option value="">[ Province ]</option>
		                                </select>
		                                <label id="province_id_req" for="inputError" style="display: none;" class="control-label">Please select Province.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Code <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="code" id="code">
										<label id="code_req" for="inputError" style="display: none;" class="control-label">Please input Code.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Name (TH) <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="name_th" id="name_th">
										<label id="name_th_req" for="inputError" style="display: none;" class="control-label">Please input Name (TH).</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Name (EN) <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="name_en" id="name_en">
										<label id="name_en_req" for="inputError" style="display: none;" class="control-label">Please input Name (EN).</label>
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