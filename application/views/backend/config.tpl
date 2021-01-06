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
				{if $success_msg != ""}
				<div class="alert alert-success">
					{$success_msg}
				</div>
				{/if}
				{if $error_msg != ""}
				<div class="alert alert-danger">
					{$error_msg}
				</div>
				{/if}
				<div class="box">
		            <div class="box-header">
		              {if $authen->can_manage == true}
		              	<a href="{$base_url}backend/{$page}/add" class="btn btn-success">Add New {$page_name}</a>
					  {/if}
		            </div>
		            <div class="box-body">
		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="form-inline">
		                            <div class="form-group">
		                                <label for="fType">Type : </label>
		                                <select class="form-control" id="fType">
		                                    <option value="">[ Type ]</option>
		                                    <option value="T">Tax</option>
		                                    <option value="S">SKU Code</option>
		                                </select>
		                                &nbsp;&nbsp;&nbsp;
		                            </div>
		                            <div class="form-group">
		                                <label for="fCode">Code : </label>
		                                <input class="form-control" id="fCode" type="text" size="10" />
		                                &nbsp;&nbsp;&nbsp;
		                            </div>
		                            <div class="form-group">
		                                <label for="fName">Name : </label>
		                                <input class="form-control" id="fName" type="text" size="10" />
		                                &nbsp;&nbsp;&nbsp;
		                            </div>
		                            <div class="form-group">
		                                <label for="fStatus">Status : </label>
		                                <select class="form-control" id="fStatus">
		                                    <option value="">[ Status ]</option>
		                                    <option value="Y">Open</option>
		                                    <option value="N">Close</option>
		                                </select>
		                                &nbsp;&nbsp;&nbsp;
		                            </div>
		                            <div class="form-group">
		                                <input class="btn btn-default" type="button" value="Search" id="fSearch" />
		                            </div>
		                        </div>
		                    </div>
		                </div>
						<div class="table-responsive">
							<table id="data-tables" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Type</th>
										<th>Code</th>
										<th>Name (TH)</th>
										<th>Name (EN)</th>
										<th>Value</th>
										<th>Status</th>
										{if $authen->can_manage == true}
											<th>Edit / Delete</th>
										{/if}
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
{/block}
{block name="script"}
	 <script>
        $(document).ready(function () {

            $('#data-tables').DataTable({
                "order": [[0, "asc"]],
                "lengthMenu": [[20, 50, 100, 200], [20, 50, 100, 200]],
                "pageLength": 20,
                columnDefs: [
                	{if $authen->can_manage == true}
                    	{ orderable: false, targets: -1 }
                    {/if}
                ],
                'processing': true,
                'serverSide': true,
                'orderMulti': false,
                'dom': '<"top"i>rt<"bottom"lp><"clear">',
                'ajax': {
                    'url': '{$base_url}backend/{$page}/load_data',
                    'type': 'POST',
                    'dataType': 'json'
                },
                'columns': [
                    {
                        'data': 'id',
                        'name': 'ID',
                        'autoWidth': true
                    },
                    {
                        'data': 'type',
                        'name': 'Type',
                        'autoWidth': true,
                        'render': function (data, type, full, meta) {
                            return ((data == 'T') ? 'Tax' : 'Setting');
                        }
                    },
                    {
                        'data': 'code',
                        'name': 'Code',
                        'autoWidth': true
                    },
                    {
                        'data': 'name_th',
                        'name': 'Name (TH)',
                        'autoWidth': true
                    },
                    {
                        'data': 'name_en',
                        'name': 'Name (EN)',
                        'autoWidth': true
                    },
                    {
                        'data': 'value',
                        'name': 'Value',
                        'autoWidth': true
                    },
                    {
                        'data': 'status',
                        'name': 'Status',
                        'autoWidth': true,
                        'render': function (data, type, full, meta) {
                            return ((data == 'Y') ? '<span class="label label-success">Open</span>' : '<span class="label label-warning">Close</span>');
                        }
                    }
                    {if $authen->can_manage == true}
                    ,
                    {
                        'data': 'id',
                        'name': 'Edit / Delete',
                        'autoWidth': true,
                        'render': function (data, type, full, meta) {
                            return '<a href="{$base_url}backend/{$page}/edit/' + data + '"><i class="fa fa-edit"></i></a> / <a href="{$base_url}backend/{$page}/delete/' + data + '" onclick="return confirm(\'Do you want to delete data ?\');"><i class="fa fa-trash"></i></a>';
                        }
                    }
                    {/if}
                ]
            });

            oTable = $('#data-tables').DataTable();

            $('#fSearch').click(function () {
                oTable.columns(0).search($('#fType').val().trim());
                oTable.columns(1).search($('#fCode').val().trim());
                oTable.columns(2).search($('#fName').val().trim());
                oTable.columns(3).search($('#fStatus').val().trim());
                oTable.draw();
            });

        });
    </script>
{/block}