{extends file="backend/layout.tpl"}
{block name=meta_title}Home - {$site_name} : {$company_name}{/block}
{block name=body}
    <section class="content-header">
        <h1>
            {$site_name}
            <small>{$company_name}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{$base_url}backend"><i class="fa fa-home"></i> {$site_name}</a></li>
            <li class="active">Home</li>
        </ol>
    </section>
    <section class="content">
        {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['banner'] == 'M' || $authen->authen['banner'] == 'A')}
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-photo"></i>&nbsp; Banner</h3>
                        </div>
                        <div class="box-body">
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['banner'] == 'M' || $authen->authen['banner'] == 'A')}
                                <a href="{$base_url}backend/banner" class="btn btn-app">
                                    <i class="fa fa-photo"></i> Banner
                                </a>
                            {/if}
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['cover'] == 'M' || $authen->authen['cover'] == 'A')}
                                <a href="{$base_url}backend/cover" class="btn btn-app">
                                    <i class="fa fa-photo"></i> Cover
                                </a>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        {/if}
        {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['content'] == 'M' || $authen->authen['content'] == 'A')}
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-file-text"></i>&nbsp; Content</h3>
                        </div>
                        <div class="box-body">
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['content'] == 'M' || $authen->authen['content'] == 'A')}
                                <a href="{$base_url}backend/content" class="btn btn-app">
                                    <i class="fa fa-file-text"></i> Content
                                </a>
                            {/if}
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['news'] == 'M' || $authen->authen['news'] == 'A')}
                                <a href="{$base_url}backend/news" class="btn btn-app">
                                    <i class="fa fa-file-text"></i> News
                                </a>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        {/if}
        {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['brand'] == 'M' || $authen->authen['brand'] == 'A' || $authen->authen['model'] == 'M' || $authen->authen['model'] == 'A' || $authen->authen['year'] == 'M' || $authen->authen['year'] == 'A' || $authen->authen['product'] == 'M' || $authen->authen['product'] == 'A')}
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-cubes"></i>&nbsp; Product</h3>
                        </div>
                        <div class="box-body">
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['brand'] == 'M' || $authen->authen['brand'] == 'A')}
                                <a href="{$base_url}backend/brand" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> Brand
                                </a>
                            {/if}
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['model'] == 'M' || $authen->authen['model'] == 'A')}
                                <a href="{$base_url}backend/model" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> Model
                                </a>
                            {/if}
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['year'] == 'M' || $authen->authen['year'] == 'A')}
                                <a href="{$base_url}backend/year" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> Year
                                </a>
                            {/if}
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['product'] == 'M' || $authen->authen['product'] == 'A')}
                                <a href="{$base_url}backend/product" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> Product
                                </a>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        {/if}
        {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['setting'] == 'M' || $authen->authen['setting'] == 'A') || ($authen->authen['tax_rate'] == 'M' || $authen->authen['tax_rate'] == 'A')}
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-tv"></i>&nbsp; POS</h3>
                        </div>
                        <div class="box-body">
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['setting'] == 'M' || $authen->authen['setting'] == 'A')}
                                <a href="{$base_url}backend/setting" class="btn btn-app">
                                    <i class="fa fa-gears"></i> Settings
                                </a>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        {/if}
        {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['prefix'] == 'M' || $authen->authen['prefix'] == 'A') || ($authen->authen['shiping_type'] == 'M' || $authen->authen['company_type'] == 'A') || ($authen->authen['partner_type'] == 'M' || $authen->authen['partner_type'] == 'A') || ($authen->authen['charge_type'] == 'M' || $authen->authen['charge_type'] == 'A') || ($authen->authen['discount_type'] == 'M' || $authen->authen['discount_type'] == 'A') || ($authen->authen['payment_type'] == 'M' || $authen->authen['payment_type'] == 'A') || ($authen->authen['bank'] == 'M' || $authen->authen['bank'] == 'A')}
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-database"></i>&nbsp; Master Data</h3>
                        </div>
                        <div class="box-body">
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['prefix'] == 'M' || $authen->authen['prefix'] == 'A')}
                                <a href="{$base_url}backend/prefix" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> Prefix
                                </a>
                            {/if}
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['bank'] == 'M' || $authen->authen['bank'] == 'A')}
                                <a href="{$base_url}backend/bank" class="btn btn-app">
                                    <i class="fa fa-bank"></i> Bank
                                </a>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        {/if}
        {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['region'] == 'M' || $authen->authen['region'] == 'A') || ($authen->authen['province'] == 'M' || $authen->authen['province'] == 'A') || ($authen->authen['district'] == 'M' || $authen->authen['district'] == 'A') || ($authen->authen['sub_district'] == 'M' || $authen->authen['sub_district'] == 'A')}
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-map-marker"></i>&nbsp; Localization</h3>
                        </div>
                        <div class="box-body">
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['region'] == 'M' || $authen->authen['region'] == 'A')}
                                <a href="{$base_url}backend/region" class="btn btn-app">
                                    <i class="fa fa-th-large"></i> Region
                                </a>
                            {/if}
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['province'] == 'M' || $authen->authen['province'] == 'A')}
                                <a href="{$base_url}backend/province" class="btn btn-app">
                                    <i class="fa fa-th"></i> Province
                                </a>
                            {/if}
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['district'] == 'M' || $authen->authen['district'] == 'A')}
                                <a href="{$base_url}backend/district" class="btn btn-app">
                                    <i class="fa fa-th-list"></i> District
                                </a>
                            {/if}
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['sub_district'] == 'M' || $authen->authen['sub_district'] == 'A')}
                                <a href="{$base_url}backend/sub_district" class="btn btn-app">
                                    <i class="fa fa-list"></i> Sub District
                                </a>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        {/if}
        {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['user'] == 'M' || $authen->authen['user'] == 'A')}
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-users"></i>&nbsp; Users</h3>
                        </div>
                        <div class="box-body">
                            {if $authen->is_developer == true || $authen->is_admin == true || ($authen->authen['user'] == 'M' || $authen->authen['user'] == 'A')}
                                <a href="{$base_url}backend/user" class="btn btn-app">
                                    <i class="fa fa-users"></i> Users
                                </a>
                            {/if}
                            {if $authen->is_developer == true || $authen->is_admin == true}
                                <a href="{$base_url}backend/role" class="btn btn-app">
                                    <i class="fa fa-shield"></i> Role
                                </a>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        {/if}
        {if $authen->is_developer == true}
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-gears"></i>&nbsp; System</h3>
                        </div>
                        <div class="box-body">
                            <a href="{$base_url}backend/section" class="btn btn-app">
                                <i class="fa fa-th-large"></i> Section
                            </a>
                            <a href="{$base_url}backend/menu" class="btn btn-app">
                                <i class="fa fa-th"></i> Menu
                            </a>
                            <a href="{$base_url}backend/config" class="btn btn-app">
                                <i class="fa fa-gear"></i> Configuration
                            </a>
                            <a href="{$base_url}backend/feature" class="btn btn-app">
                                <i class="fa fa-sitemap"></i> Feature
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        {/if}

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-tv"></i>&nbsp; messsage</h3>
                        </div>
                        <div class="box-body">
                                <a href="{$base_url}backend/message" class="btn btn-app">
                                    <i class="fa fa-gears"></i> message
                                </a>
                        </div>
                    </div>
                </div>
            </div>
     
    </section>
{/block}