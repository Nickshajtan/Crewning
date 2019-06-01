jQuery(document).ready(function($) {
    $(document).ready(function(){
        $('.custom-select-my').each(function(){
            var description = $(this).find('.value').attr('data-value');
            $(this).find('.value').text(description);     
        });
    });
    $('.custom-select-my').on('click', function(){
         $(this).toggleClass('active');
         $('.custom-select-my').not(this).find('.child').addClass('d-none');
         $(this).find('.child').toggleClass('d-none');
         var value = $(this).find('.meta.active').attr('data-value');
         $(this).find('.value').text(value);
         $('.custom-select-my').not(this).find('.value.arrow').removeClass('arrow');
         $(this).find('.value').toggleClass('arrow');
    });
    $('span.meta').on('click', function(){
            $('.meta.active').removeClass('active');
            $(this).addClass('active');
    });
    $(document).mouseup(function (e){ 
        var div = $('.custom-select-my');
        div.each(function(){
            var child = $(this).find('.child');
            if (!div.is(e.target)&& div.has(e.target).length === 0) {
                child.addClass('d-none');
                $(this).find('.value.arrow').removeClass('arrow');
            }
        });
    });
    $('.progress').on('click', function(){
        $(this).toggleClass('rotate');
    });
    $('.progress.left').on('click', function(){
        var check = $(this).attr('data-check');
        if( check == 'deck' ){
            $(this).attr('data-check', 'engine');
        }
        if( check == 'engine' ){
            $(this).attr('data-check', 'deck');
        }
    });
    $('.progress.right').on('click', function(){
        var check = $(this).attr('data-check');
        if( check == 'officers' ){
            $(this).attr('data-check', 'ratings');
        }
        if( check == 'ratings' ){
            $(this).attr('data-check', 'officers');
        }
    });
});