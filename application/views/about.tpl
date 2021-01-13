{extends file="layout.tpl"}

{block name=body}
    <!-- CONTENT -->
    <section>
        <!-- img Begin -->
        <div class="about-bg" style="background-image : linear-gradient( rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65) ), url('{$image_url}theme/default/img/about/bg-about.png');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="about-text-head">
                            <h2>About us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mattis augue. 
                                Morbi sem tortor, malesuada vitae diam eget, 
                                ornare posuere nisl. Mauris pretium id ligula a tempor. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- img End -->       

        <div class="container">
            {$item.content}
        </div>
    </section>
    
    <!-- END CONTANT -->
{/block}

{block name=script}{/block}