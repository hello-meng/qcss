(function(){

    function clearCacheImage()
    {
        for(var i = 0; i < $('img').length ; i++)
        {
            var src = $('img').eq(i).attr('src');
            $('img').eq(i).attr('src', src+'?ver='+Math.random());
        }
    }

    function setDefault()
    {
        if($(window).width() <= 991)
        {
            $('body').addClass('sidebar-collapse');
        }
        else
        {
            $('body').removeClass('sidebar-collapse');
        }
    }

    function setStep()
    {
        if($('.step').length > 0)
        {
            $('.step .body .head-mobile').remove();
            if($(window).width() <= 520)
            {
                for(var i = 0; i < $('.step .head .inner').length ; i++)
                {
                    var text = $('.step .head .inner').eq(i).find('.text').html();
                    $('.step .body .inner').eq(i).prepend('<div class="head-mobile">'+text+'</div>');
                }
            }
        }
    }

    clearCacheImage();
    setDefault();
    setStep();

    $(window).resize(function(){
        setDefault();
        setStep();
    });
   
})();