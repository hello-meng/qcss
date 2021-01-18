{extends file="layout.tpl"}

{block name=body}
    <!-- CONTENT -->
    <section>
        <!-- img Begin -->
        <div class="about-bg" style="background-image : linear-gradient( rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65) ), url('{$cover.image}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="about-text-head">
                            <h2>{$cover.name}</h2>
                            <p>{$cover.description}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- img End -->       

        <div class="container">
            {$content.content}
        </div>
    </section>
    
    <!-- END CONTANT -->
{/block}

{block name=script}{/block}