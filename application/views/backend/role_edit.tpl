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
								$('#name_req').hide();
								$('#status_req').hide();
								$('.has-error').removeClass('has-error');
								
								with(document.add_edit)
								{
									if(name.value=="")
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
						<form role="form" class="form-horizontal" name="add_edit" method="post" onsubmit="return check_data();">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-3 control-label">Name <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="name" id="name" value="{$item.name}">
										<label id="name_req" for="inputError" style="display: none;" class="control-label">Please input Name.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Priority</label>
									<div class="col-sm-6">
										<select class="form-control" id="priority" name="priority">
		                                    {section name=foo start=($authen->user_data['role_priority'] + 1) loop=31 step=1}
												<option value="{$smarty.section.foo.index}"{if $item.priority == $smarty.section.foo.index} selected="selected"{/if}>{$smarty.section.foo.index}</option>
											{/section}
		                                </select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Authen <font color="red">*</font></label>
									<div class="col-sm-6">
										<table class="table table-bordered table-striped">
											{foreach $section as $section_item}
												<tr>
													<th colspan="2">{$section_item.name}</th>
													<th>Manage</th>
													<th>Access</th>
													<th>Deny</th>
												</tr>
												{foreach $menu as $menu_item}
													{if $menu_item.section_id == $section_item.id}
														<tr>
															<th>&nbsp;</th>
															<th>{$menu_item.name}</th>
															<td>
																<input type="radio" name="menu_{$menu_item.id}" value="M"{if $menu_item.authen == 'M'} checked="checked"{/if}>
															</td>
															<td>
																<input type="radio" name="menu_{$menu_item.id}" value="A"{if $menu_item.authen == 'A'} checked="checked"{/if}>
															</td>
															<td>
																<input type="radio" name="menu_{$menu_item.id}" value="D"{if $menu_item.authen == 'D' || $menu_item.authen == ''} checked="checked"{/if}>
															</td>
														</tr>
													{/if}
												{/foreach}
											{/foreach}
										</table>
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