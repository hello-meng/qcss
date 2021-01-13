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
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <!-- Line -->
                    <!-- <hr class="about-yellow-line" align="left"> -->
                    <div class="about-yellow-line"></div>

                    <div class="about-detail-h about-pad">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mattis augue. Morbi sem tortor,
                    </div>
                    <div class="about-detail-p">
                        <p>
                            Nunc suscipit ex et nisi porta vehicula. In ullamcorper pretium interdum. 
                            Nulla vestibulum imperdiet ipsum, in eleifend sem blandit at. 
                            Ut scelerisque ligula eget dui tincidunt, 
                            lobortis consect Nunc suscipit ex et nisi porta vehicula. 
                            In ullamcorper pretium interdum. Nulla vestibulum imperdiet ipsum, 
                            in eleifend sem blandit at. Ut scelerisque ligula eget dui tincidunt, 
                            lobortis consect Nunc suscipit ex et nisi porta vehicula. 
                            In ullamcorper pretium interdum. Nulla vestibulum imperdiet ipsum, 
                            in eleifend sem blandit at. Ut scelerisque ligula eget dui tincidunt, 
                            lobortis consect
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">                
                <div class="col-xs-12 col-sm-6">
                    <div class="about-detail">
                        <img src="{$image_url}theme/default/img/about/image-1.png" class="w-100">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="about-detail-h">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec 
                    </div>
                    <div class="about-detail-p">
                        <p>
                            Nunc suscipit ex et nisi porta vehicula. In ullamcorper pretium interdum. 
                            Nulla vestibulum imperdiet ipsum, in eleifend sem blandit at. 
                            Ut scelerisque ligula eget dui tincidunt, lobortis consect
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- END CONTANT -->
{/block}

{block name=script}{/block}