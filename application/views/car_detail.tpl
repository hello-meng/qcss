{extends file="layout.tpl"}

{block name=body}
        <!-- CONTENT -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <!-- image -->
                        <div class="my-slide-wrap">
                            {* <div class="my-slider news-detail-img">
                                <div class="slide-item"><img src="{$image_url}theme/default/img/car/bg-image.png" class="w-100" alt=""></div>
                                <div class="slide-item"><img src="{$image_url}theme/default/img/car/bg-image.png" class="w-100" alt=""></div>
                                <div class="slide-item"><img src="{$image_url}theme/default/img/car/bg-image.png" class="w-100" alt=""></div>
                                <div class="slide-item"><img src="{$image_url}theme/default/img/car/bg-image.png" class="w-100" alt=""></div>
                                <div class="slide-item"><img src="{$image_url}theme/default/img/car/bg-image.png" class="w-100" alt=""></div>
                                <div class="slide-item"><img src="{$image_url}theme/default/img/car/bg-image.png" class="w-100" alt=""></div>
                                <div class="slide-item"><img src="{$image_url}theme/default/img/car/bg-image.png" class="w-100" alt=""></div>
                                <div class="slide-item"><img src="{$image_url}theme/default/img/car/bg-image.png" class="w-100" alt=""></div>
                                <div class="slide-item"><img src="{$image_url}theme/default/img/car/bg-image.png" class="w-100" alt=""></div>
                                <div class="slide-item"><img src="{$image_url}theme/default/img/car/bg-image.png" class="w-100" alt=""></div>
                            </div>  *}
                            <div class="my-slider news-detail-img">
                                {$img = $car.image|json_decode}
                                {foreach $img as $value}
                                    <div class="slide-item"><img src="{$value}" class="w-100" alt=""></div>
                                {/foreach}
                            </div>                                   
                            <span class="paging-info"></span>
                            <span class="verticalx">|</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="cardet-carname">
                            {* <img src="{$image_url}theme/default/img/car/logo.svg">
                            <h2>911 Carrera 4 GTS</h2>
                            <p>ปี : 2017</p> *}
                            <img src="{$car.brand_image}">
                            <h2>{$car.model_name}</h2>
                            <p>ปี : {$car.year_name}</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="cardet-price text-right">
                            <h2>{$car.price|number_format:0:".":","} THB</h2>
                            <div>
                                <span>Contact Seller</span>
                                <img src="{$image_url}theme/default/img/icon/phone-circle.svg">
                                <img src="{$image_url}theme/default/img/icon/line-circle.svg">
                                <img src="{$image_url}theme/default/img/icon/facebook-circle.svg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="cardet-detail">
                        {$car.description} 
                    </div>
                </div>
            </div>
        </section>
        <!-- END CONTANT -->
{/block}

{block name=script}
        <script type="text/javascript">
            $(document).ready(function(){

                var $status = $('.paging-info');
                var $slickElement = $('.my-slider');

                $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
                //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
                var i = (currentSlide ? currentSlide : 0) + 1;
                $status.text(i + '/' + slick.slideCount);
                });


                $('.my-slider').slick({
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    //prevArrow: '<button type="button" class="">Previous</button>', 
                    //nextArrow: '<button type="button" class="">Next</button>',
                    prevArrow: '<span class="arw-prev"><img src="{$image_url}theme/default/img/icon/slide-left.svg"></span>', 
                    nextArrow: '<span class="arw-next"><img src="{$image_url}theme/default/img/icon/slide-right.svg"></span>',

                });

            });

        </script>
{/block}