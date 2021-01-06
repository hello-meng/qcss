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
		                                <label for="fRegion">Region : </label>
		                                <select class="form-control" id="fRegion" onchange="get_province(this.value);">
		                                    <option value="">[ Region ]</option>
		                                    {foreach $region as $region_item}
		                                    	<option value="{$region_item.id}">{$region_item.name_th}</option>
		                                    {/foreach}
		                                </select>
		                                &nbsp;&nbsp;&nbsp;
		                            </div>
		                        	<div class="form-group">
		                                <label for="fProvince">Province : </label>
		                                <select class="form-control" id="fProvince" onchange="get_district(this.value);">
		                                    <option value="">[ Province ]</option>
		                                </select>
		                                &nbsp;&nbsp;&nbsp;
		                            </div>
		                        	<div class="form-group">
		                                <label for="fDistrict">District : </label>
		                                <select class="form-control" id="fDistrict">
		                                    <option value="">[ District ]</option>
		                                </select>
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
										<th>Code</th>
										<th>Name (TH)</th>
										<th>Name (EN)</th>
										<th>Postal Code</th>
										<th>Region</th>
										<th>Province</th>
										<th>District</th>
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
	 	function get_province(region_id)
	 	{
	 		$.get('{$base_url}backend/{$page}/get_province/' + region_id, function(data) {
				$('#fProvince').html(data);
				$('#fDistrict').html('<option value="">[ District ]</option>');
			});
	 	}

	 	function get_district(province_id)
	 	{
	 		$.get('{$base_url}backend/{$page}/get_district/' + province_id, function(data) {
				$('#fDistrict').html(data);
			});
	 	}

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
                        'data': 'postcode',
                        'name': 'Postal Code',
                        'autoWidth': true
                    },
                    {
                        'data': 'region',
                        'name': 'Region',
                        'autoWidth': true
                    },
                    {
                        'data': 'province',
                        'name': 'Province',
                        'autoWidth': true
                    },
                    {
                        'data': 'district',
                        'name': 'District',
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
                oTable.columns(0).search($('#fRegion').val().trim());
                oTable.columns(1).search($('#fProvince').val().trim());
                oTable.columns(2).search($('#fDistrict').val().trim());
                oTable.columns(3).search($('#fName').val().trim());
                oTable.columns(4).search($('#fStatus').val().trim());
                oTable.draw();
            });

        });
    </script>
{/block}