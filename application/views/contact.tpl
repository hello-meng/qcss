{extends file="layout.tpl"}

{block name=body}
    <!-- CONTENT -->
    <section>
        <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-img">
                    <img src="{$image_url}theme/default/img/contact/bg-contact.png" class="w-100">
                </div>
            </div>
        </div>
        <!-- DETAIL -->
        <div class="row">
            <div class="col-sm-5 col-sm-push-7">
                <div class="contact">
                    <div class="contact-comp">QCS.CO.,LTD.</div> 
                    
                    <div class="contact-desc">
                        <img src="{$image_url}theme/default/img/icon/icon-pin.svg">
                        <span class="contact-comp-ico">Cecilia Chapman 711-2880 Nulla St. Mankato Mississippi 96522</span>
                    </div>
                    <div class="contact-desc">
                        <img src="{$image_url}theme/default/img/icon/icon-email.svg">
                        <span class="contact-comp-ico">Email@email.com</span>
                    </div>
                    <div class="contact-desc">
                        <img src="{$image_url}theme/default/img/icon/icon-phone.svg">
                        <span class="contact-comp-ico">+66 987 9809, +66 987 9809</span>
                    </div>
                </div>
            </div>                        
            <div class="col-sm-7 col-sm-pull-5">
                <div class="contact-form">
                    <form action="#">
                        <div class="contact-form-item">
                            <!-- <p>Name:</p> -->
                            <input class="form-control form-rounded form-custom" type="text" placeholder="Name">
                        </div>
                        <div class="contact-form-item">
                            <!-- <p>Email:</p> -->
                            <input class="form-control form-rounded form-custom" type="text" placeholder="Telephone Number">
                        </div>
                        <div class="contact-form-item">
                            <!-- <p>Email:</p> -->
                            <input class="form-control form-rounded form-custom" type="email" placeholder="Email">
                        </div>
                        <div class="contact-form-item">
                            <!-- <p>Message:</p> -->
                            <textarea rows="3" class="form-control form-rounded form-custom" placeholder="Massage"></textarea>
                        </div>
                        <div class="contact-form-button text-center">
                            <!-- <button type="button" class="btn btn-warning">Send</button> -->
                            <!-- <button type="button" class="btn-custom">Send&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>></button> -->
                            <button type="button" class="btn btn-custom">Send<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!-- END CONTANT -->
{/block}

{block name=script}{/block}