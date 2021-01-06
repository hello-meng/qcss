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
								$('#value_req').hide();
								$('.has-error').removeClass('has-error');
								
								with(document.add_edit)
								{
									if(value.value=="")
									{
										$('#value_req').show();
										$('#value_req').parent('div').addClass('has-error');
										$('#value').focus();
										return false;
									}
								}
							}
						</script>
						<form role="form" class="form-horizontal" name="add_edit" method="post" onsubmit="return check_data();">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-3 control-label">Code <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="code" id="code" value="{$item.code}" readonly="readonly">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Name (TH) <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="name_th" id="name_th" value="{$item.name_th}" readonly="readonly">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Name (EN) <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="name_en" id="name_en" value="{$item.name_en}" readonly="readonly">
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