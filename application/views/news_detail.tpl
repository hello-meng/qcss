{extends file="layout.tpl"}

{block name=body}
    <!-- CONTENT -->
    <section>   
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <!-- <img src="{$image_url}theme/default/img/news/image-slide.png" class="w-100 news-detail-img"> -->
                    
                    <div class="my-slide-wrap">
                        <div class="my-slider news-detail-img">
                            {$img = $item.image|json_decode}
                            {foreach $img as $key => $value}
                            <div class="slide-item"><img src="{$value}" class="w-100" alt=""></div>
                            {{/foreach}}
                        </div>       
                        <span class="paging-info"></span>
                        <span class="verticalx">|</span>               
                    </div>

                </div>            
            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-12 news-detail">   
                    <h2 class="news-title">{$item.name} </h2>
                    <p class="news-date">Updated date: {$item.created_on|date_format:"%A, %B %e, %Y"}</p>
                    <div class="news-detail-text">
                        {$item.description} 
                    </div>
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