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
            <form class="row">

                <!-- combo box --> 
                    <div class="col-xs-12 col-sm-3">  
                        <!-- brand -->
                        <div class="custom-combobox">
                            <select id="a1">
                                <option value="" disabled selected>Select Brand</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">                     
                        <!-- model -->
                        <div class="custom-combobox">
                            <select id="a2">
                                <option value="" disabled selected>Select Model</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3"> 
                        <!-- year -->
                        <div class="custom-combobox">
                            <select id="a3">
                                <option value="" disabled selected>Select Year</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3"> 
                        <!-- button -->
                        <div class="custom-combobox">
                            <button type="submit" class="btn btn-custom usecar-btn">Search now</button>
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
                        <p>4 Porsche available</p>
                    </div>
                </div>
            </div>

            <!-- card car -->
            <div class="">
                <!-- card -->
                <div class=" usecar-card">
                    <div class="row">
                        <div class="col-xs-5 usecar-img">
                            <img src="{$image_url}theme/default/img/car/image-1.png" class="w-100">
                        </div>
                        <div class="col-xs-7">
                            <div class="usecar-detail">
                                <div class="usecar-carname">
                                    <img src="{$image_url}theme/default/img/car/logo.svg">
                                    <h2>911 Turbo S Exclusive Series</h2>
                                    <p>ปี : 2017</p>
                                </div>                                
                                <h2>33,900,000 THB</h2>
                                <a class="btn btn-custom" href="{$base_url}car/detail" role="button">View more<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></a>
                            </div>
                        </div>                      
                    </div>                 
                </div>
                <!-- card -->
                <div class="usecar-card">
                    <div class="row">
                        <div class="col-xs-5 usecar-img">
                            <img src="{$image_url}theme/default/img/car/image-2.png" class="w-100">
                        </div>
                        <div class="col-xs-7">
                            <div class="usecar-detail">
                                <div class="usecar-carname">
                                    <img src="{$image_url}theme/default/img/car/logo.svg">
                                    <h2>911 Turbo S Exclusive Series</h2>
                                    <p>ปี : 2017</p>
                                </div>                                
                                <h2>33,900,000 THB</h2>
                                <a class="btn btn-custom" href="{$base_url}car/detail" role="button">View more<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></a>
                            </div>
                        </div>                      
                    </div>                 
                </div>
                <!-- card -->
                <div class="usecar-card">
                    <div class="row">
                        <div class="col-xs-5 usecar-img">
                            <img src="{$image_url}theme/default/img/car/image-3.png" class="w-100">
                        </div>
                        <div class="col-xs-7">
                            <div class="usecar-detail">
                                <div class="usecar-carname">
                                    <img src="{$image_url}theme/default/img/car/logo.svg">
                                    <h2>911 Turbo S Exclusive Series</h2>
                                    <p>ปี : 2017</p>
                                </div>                                
                                <h2>33,900,000 THB</h2>
                                <a class="btn btn-custom" href="{$base_url}car/detail" role="button">View more<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></a>
                            </div>
                        </div>                      
                    </div>                 
                </div>
                <!-- card -->
                <div class="usecar-card">
                    <div class="row">
                        <div class="col-xs-5 usecar-img">
                            <img src="{$image_url}theme/default/img/car/image-4.png" class="w-100">
                        </div>
                        <div class="col-xs-7">
                            <div class="usecar-detail">
                                <div class="usecar-carname">
                                    <img src="{$image_url}theme/default/img/car/logo.svg">
                                    <h2>911 Turbo S Exclusive Series</h2>
                                    <p>ปี : 2017</p>
                                </div>                                
                                <h2>33,900,000 THB</h2>
                                <a class="btn btn-custom" href="{$base_url}car/detail" role="button">View more<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></a>
                            </div>
                        </div>                      
                    </div>                 
                </div>
            </div>
            <!-- end card car -->

            
        </div>
    </section>
    <!-- END CONTANT -->
{/block}

{block name=script}{/block}