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
								$('#role_id_req').hide();
								$('#password_req').hide();
								$('#confirm_password_req').hide();
								$('#confirm_password_inc').hide();
								$('#prefix_id_req').hide();
								$('#first_name_req').hide();
								$('#last_name_req').hide();
								$('#email_req').hide();
								$('#status_req').hide();
								$('.has-error').removeClass('has-error');
								
								with(document.add_edit)
								{
									if(role_id.value=="")
									{
										$('#role_id_req').show();
										$('#role_id_req').parent('div').addClass('has-error');
										$('#role_id').focus();
										return false;
									}
									else if(password.value!="" && cpassword.value=="")
									{
										$('#confirm_password_req').show();
										$('#confirm_password_req').parent('div').addClass('has-error');
										$('#cpassword').focus();
										return false;
									}
									else if(password.value!="" && password.value!=cpassword.value)
									{
										$('#confirm_password_inc').show();
										$('#confirm_password_inc').parent('div').addClass('has-error');
										$('#cpassword').focus();
										return false;
									}
									else if(prefix_id.value=="")
									{
										$('#prefix_id_req').show();
										$('#prefix_id_req').parent('div').addClass('has-error');
										$('#prefix_id').focus();
										return false;
									}
									else if(first_name.value=="")
									{
										$('#first_name_req').show();
										$('#first_name_req').parent('div').addClass('has-error');
										$('#first_name').focus();
										return false;
									}
									else if(last_name.value=="")
									{
										$('#last_name_req').show();
										$('#last_name_req').parent('div').addClass('has-error');
										$('#last_name').focus();
										return false;
									}
									else if(email.value=="")
									{
										$('#email_req').show();
										$('#email_req').parent('div').addClass('has-error');
										$('#email').focus();
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
                                    <label class="col-sm-3 control-label">Thumbnail</label>
                                    <div class="col-sm-6">
                                        <img src="{$image_url}upload/user/{($item.id%4000)}/{$item.id}/thumbnail.jpg" onerror="this.src='{$image_url}theme/default/dist/img/avatar5.png';" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-6">
                                        <input class="form-control user-file" accept="image/x-png,image/gif,image/jpeg" type="file" name="thumbnail">
                                    </div>
                                </div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Role <font color="red">*</font></label>
									<div class="col-sm-6">
										<select class="form-control" id="role_id" name="role_id">
		                                    <option value="">[ Role ]</option>
		                                    {foreach $role as $role_item}
		                                        <option value="{$role_item.id}"{if $item.role_id == $role_item.id} selected="selected"{/if}>{$role_item.name}</option>
		                                    {/foreach}
		                                </select>
		                                <label id="role_id_req" for="inputError" style="display: none;" class="control-label">Please select Role.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Username</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" value="{$item.username}" disabled="disabled" readonly="readonly">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Password</label>
									<div class="col-sm-6">
										<input class="form-control" type="password" name="password" id="password">
										<label class="control-label">If don't want to change password, Leave blank.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Confirm password</label>
									<div class="col-sm-6">
										<input class="form-control" type="password" name="cpassword" id="cpassword">
										<label id="confirm_password_req" for="inputError" style="display: none;" class="control-label">Please Confirm Password.</label>
										<label id="confirm_password_inc" for="inputError" style="display: none;" class="control-label">Confirm Password Incorrect.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Prefix <font color="red">*</font></label>
									<div class="col-sm-6">
										<select class="form-control" id="prefix_id" name="prefix_id">
		                                    <option value="">[ Prefix ]</option>
		                                    {foreach $prefix as $prefix_item}
		                                        <option value="{$prefix_item.id}"{if $item.prefix_id == $prefix_item.id} selected="selected"{/if}>{$prefix_item.name}</option>
		                                    {/foreach}
		                                </select>
		                                <label id="prefix_id_req" for="inputError" style="display: none;" class="control-label">Please select Prefix.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">First Name <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="first_name" id="first_name" value="{$item.first_name}">
										<label id="first_name_req" for="inputError" style="display: none;" class="control-label">Please input First Name.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Last Name <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="last_name" id="last_name" value="{$item.last_name}">
										<label id="last_name_req" for="inputError" style="display: none;" class="control-label">Please input Last Name.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Email <font color="red">*</font></label>
									<div class="col-sm-6">
										<input class="form-control" type="email" name="email" id="email" value="{$item.email}">
										<label id="email_req" for="inputError" style="display: none;" class="control-label">Please input Email.</label>
										<label id="email_inc" for="inputError" style="display: none;" class="control-label">Please input Correct Email.</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Telephone</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="telephone" id="telephone" value="{$item.telephone}">
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