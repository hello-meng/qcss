{extends file="layout.tpl"}

{block name=body}

    <section>
        <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-img">
                    <img src="{$cover.image}" class="w-100">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-5 col-sm-push-7">
                <div class="contact">
                    {$content.content}
                </div>
            </div>                        
            <div class="col-sm-7 col-sm-pull-5">
                <div class="contact-form">

                    <script>

                        function check_data()
                        {
                            $('#name_req').hide();
                            $('#telephone_req').hide();
                            $('#email_req').hide();
                            $('#message_req').hide();
                            $('.has-error').removeClass('has-error');
                            
                            with(document.add_edit)
                            {
                                if(name_req.value=="")
                                {
                                    $('#name_req').show();
                                    $('#name_req').parent('div').addClass('has-error');
                                    $('#name').focus();
                                    return false;
                                }
                                else if(telephone_req.value=="")
                                {
                                    $('#telephone_req').show();
                                    $('#telephone_req').parent('div').addClass('has-error');
                                    $('#telephone').focus();
                                    return false;
                                }
                                else if(email_req.value=="")
                                {
                                    $('#email_req').show();
                                    $('#email_req').parent('div').addClass('has-error');
                                    $('#email').focus();
                                    return false;
                                }																											
                                else if(message_req.value=="")
                                {
                                    $('#message_req').show();
                                    $('#message_req').parent('div').addClass('has-error');
                                    $('#message').focus();
                                    return false;
                                }
                            }
                        }

                    </script>

                    <form role="form" class="form-horizontal" name="add_edit" method="post" onsubmit="return check_data();" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="contact-form-item">
                                    <input class="form-control form-rounded form-custom" type="text" placeholder="Name" name="name" id="name">
                                    <label id="name_req" for="inputError" style="display: none;" class="control-label">Please input Name.</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="contact-form-item">
                                    <input class="form-control form-rounded form-custom" type="text" placeholder="Telephone Number" name="telephone" id="telephone">
                                    <label id="telephone_req" for="inputError" style="display: none;" class="control-label">Please input email</label>
                                </div>
                            </div>                    
                            <div class="form-group">
                                <div class="contact-form-item">
                                    <input class="form-control form-rounded form-custom" type="email" placeholder="Email"  name="email" id="email">
                                    <label id="email_req" for="inputError" style="display: none;" class="control-label">Please input email</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="contact-form-item">
                                    <textarea rows="3" class="form-control form-rounded form-custom" placeholder="Massage"  name="message" id="message"></textarea>
                                    <label id="message_req" for="inputError" style="display: none;" class="control-label">Please input email</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="contact-form-button text-center">
                                    <button class="btn btn-custom" type="submit" name="save" id="save" value="save">Send<span class="btn-custom-svg"><img src="{$image_url}theme/default/img/icon/icon-right-2-b.svg"></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
{/block}

{block name=script}

{/block}