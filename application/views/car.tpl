{extends file="layout.tpl"}

{block name=body}
    <!-- filter -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 text-center">
                    <div class="used-head-caption">
                        <h1>Find new cars and second hand cars</h1>
                    </div>
                </div>
            </div>
            {* <form class="row" role="form" method="post" action="{$base_url}{$page}/search/"> *}
            <form class="row" role="form" method="post" action="{$base_url}{$page}/">
                <div class="col-xs-12 col-sm-3">  
                    <!-- brand -->
                    <div class="custom-combobox">
                        <select id="fBrand" name="fBrand">
                            <option value="">[Select Brand]</option>
                            {foreach $brands as $brand}
                                <option value="{$brand.id}"{if $brand.id == $sBrand} selected="selected"{/if}>{$brand.name}</option>  
                            {/foreach}                            
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">                     
                    <!-- model -->
                    <div class="custom-combobox">
                        <select id="fModel" name="fModel">
                                <option value="">[Select Model]</option>
                            {foreach $models as $model}
                                <option value="{$model.id}"{if $model.id == $sModel} selected="selected"{/if}>{$model.name}</option>  
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3"> 
                    <!-- year -->
                    <div class="custom-combobox">
                        <select id="fYear" name="fYear">
                            <option value="">[Select Year]</option>
                            {foreach $years as $year}
                                <option value="{$year.id}"{if $year.id == $sYear} selected="selected"{/if}>{$year.name}</option> 
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3"> 
                    <!-- button -->
                    <div class="custom-combobox">
                        <button class="btn btn-custom usecar-btn" type="submit" name="fSearch" id="fSearch">Search now</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- list -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <!-- count item -->
                    <div class="used-item-count">
                        <p>{$car_count.count_rec|number_format:0:".":","} {if $car_count.count_rec > 1} cars {else} car {/if} available</p>
                    </div>
                </div>
            </div>

            <!-- card car -->
            <div class="">
                 
                {foreach $cars as $key => $car}
                {$img = $car.image|json_decode}  
                <div class=" usecar-card">
                    <div class="row">
                        <div class="col-xs-5 usecar-img">
                            <img src="{$img[0]}" class="w-100">
                        </div>
                        <div class="col-xs-7">
                            <div class="usecar-detail">
                                <div class="usecar-carname">
                                    <img src="{$car.brand_image}">
                                    <h2>{$car.model_name}</h2>
                                    <p>ปี : {$car.year_name}</p>
                                </div>                                
                                <h2>{$car.price|number_format:0:".":","} THB</h2>
                                <a class="btn btn-custom" href="{$base_url}car/detail/{$car.id}" role="button">View more<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></a>
                            </div>
                        </div>                      
                    </div>                 
                </div>
                {/foreach} 

            </div>
            <!-- end card car -->
            
        </div>
    </section>
    <!-- END CONTANT -->
{/block}

{block name=script}
	 <script>

    </script>    
{/block}