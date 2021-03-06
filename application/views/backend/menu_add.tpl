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
								$('#section_id_req').hide();
								$('#name_req').hide();
								$('#controller_req').hide();
								$('#status_req').hide();
								$('.has-error').removeClass('has-error');
								
								with(document.add_edit)
								{
									if(section_id.value=="")
									{
										$('#section_id_req').show();
										$('#section_id_req').parent('div').addClass('has-error');
										$('#section_id').focus();
										return false;
									}
									else if(name.value=="")
									{
										$('#name_req').show();
										$('#name_req').parent('div').addClass('has-error');
										$('#name').focus();
										return false;
									}
									else if(controller.value=="")
									{
										$('#controller_req').show();
										$('#controller_req').parent('div').addClass('has-error');
										$('#controller').focus();
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
									<label class="col-sm-3 control-label">Section <font color="red">*</font></label>
									<div class="col-sm-6">
										<select class="form-control" id="section_id" name="section_id">
		                                    <option value="">[ Section ]</option>
		                                    {foreach $section as $section_item}
		                                    	<option value="{$section_item.id}">{$section_item.name}</option>
		                                    {/foreach}
		                                </select>
		                                <label id="section_id_req" for="inputError" style="display: none;" class="control-label">Please select Section.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Name <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="name" id="name">
										<label id="name_req" for="inputError" style="display: none;" class="control-label">Please input Name.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Controller <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="controller" id="controller">
										<label id="controller_req" for="inputError" style="display: none;" class="control-label">Please input Controller.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Order</label>
									<div class="col-sm-6">
										<select class="form-control" id="order_on" name="order_on">
		                                    {section name=foo start=1 loop=31 step=1}
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