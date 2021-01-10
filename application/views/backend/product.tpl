{extends file="backend/layout.tpl"}
{block name=meta_title}{$page_name} Management - {$site_name}{/block}
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
		            	<a href="{$base_url}backend/{$page}/add{$get_params}" class="btn btn-success">Add New {$page_name}</a>
		            </div>
		            <div class="box-body">
		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="form-inline">
		                        	<div class="form-group">
		                                <label for="fBrand">Brand : </label>
		                                <select class="form-control" id="fBrand">
		                                    <option value="">[ Brand ]</option>
		                                    {foreach $brand as $brand_item}
		                                    	<option value="{$brand_item.id}">{$brand_item.name}</option>
		                                    {/foreach}
		                                </select>
		                                &nbsp;&nbsp;&nbsp;
		                            </div>
		                        	<div class="form-group">
		                                <label for="fModel">Model : </label>
		                                <select class="form-control" id="fModel">
		                                    <option value="">[ Model ]</option>
		                                    {foreach $model as $model_item}
		                                    	<option value="{$model_item.id}">{$model_item.name}</option>
		                                    {/foreach}
		                                </select>
		                                &nbsp;&nbsp;&nbsp;
		                            </div>
		                        	<div class="form-group">
		                                <label for="fYear">Year : </label>
		                                <select class="form-control" id="fYear">
		                                    <option value="">[ Year ]</option>
		                                    {foreach $year as $year_item}
		                                    	<option value="{$year_item.id}">{$year_item.name}</option>
		                                    {/foreach}
		                                </select>
		                                &nbsp;&nbsp;&nbsp;
		                            </div>                                                                                                        
		                            <div class="form-group">
		                                <label for="fName">Keyword : </label>
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
										<th>Brand</th>
                                        <th>Model</th>
                                        <th>Year</th>
                                        <th>Image</th>                                        
										<th>Price</th>
										<th>Status</th>
										<th>Edit / Delete</th>
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
                "order": [[4, "asc"]],
                "lengthMenu": [[20, 50, 100, 200], [20, 50, 100, 200]],
                "pageLength": 20,
                columnDefs: [
                    { orderable: false, targets: -1 }
                ],
                'processing': true,
                'serverSide': true,
                'orderMulti': false,
                'dom': '<"top"i>rt<"bottom"lp><"clear">',
                'ajax': {
                    'url': '{$base_url}backend/{$page}/load_data{$get_params}',
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
                        'data': 'brand',
                        'name': 'Brand',
                        'autoWidth': true
                    },
                    {
                        'data': 'model',
                        'name': 'Model',
                        'autoWidth': true
                    },
                    {
                        'data': 'year',
                        'name': 'Year',
                        'autoWidth': true
                    },
                    {
                        'data': 'image',
                        'name': 'Image',
                        'autoWidth': true,
                        'render': function (data, type, full, meta) {
                            return '<img src="' + data + '" onerror="this.src=\'{$image_url}theme/default/no_img.png\';" style="max-width: 250px; max-height: 150px;" />';
                        }
                    },
                    {
                        'data': 'price',
                        'name': 'Price',
                        'autoWidth': true
                    },
                    {
                        'data': 'status',
                        'name': 'Status',
                        'autoWidth': true,
                        'render': function (data, type, full, meta) {
                            return ((data == 'Y') ? '<span class="label label-success">Open</span>' : '<span class="label label-warning">Close</span>');
                        }
                    },
                    {
                        'data': 'id',
                        'name': 'Edit / Delete',
                        'autoWidth': true,
                        'render': function (data, type, full, meta) {
                            return '<a href="{$base_url}backend/{$page}/edit/' + data + '{$get_params}"><i class="fa fa-edit"></i></a> / <a href="{$base_url}backend/{$page}/delete/' + data + '{$get_params}" onclick="return confirm(\'Do you want to delete data ?\');"><i class="fa fa-trash"></i></a>';
                        }
                    }
                ]
            });

            oTable = $('#data-tables').DataTable();

            $('#fSearch').click(function () {
                oTable.columns(0).search($('#fName').val().trim());
                oTable.columns(1).search($('#fStatus').val().trim());
                oTable.draw();
            });

        });
    </script>
{/block}