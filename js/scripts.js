jQuery(document).ready(function($) {
    width = $(window).width();
    height = $(window).height();
    //Links
    $("body").on("click","a.down", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top - 60}, 1500);
	});
    //download img click
    $('.download__left img').on('click', function(){
       var href = $('.download__left').find('a').attr('href');
       //window.location.href = href;
       window.open(href, '_blank');
    });
    $('.download__right img').on('click', function(){
       var href = $('.download__right').find('a').attr('href');
       //window.location.href = href;
       window.open(href, '_blank');
    });
    //menu fixed
    var nav = $('header');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 336) {
			nav.addClass("f-nav");
            if (width >= 1200) {
                $('nav li.visible').addClass('fix');
                $('nav li.visible').removeClass('unvisible');
                $('nav li.visible').removeClass('visible');
            }
		} else {
			nav.removeClass("f-nav");
            if (width >= 1200) {
                $('nav li.fix').addClass('visible');
            }
		}
	});
    $(window).scroll(function () {
        if (width <= 1200) {
            if ($(this).scrollTop() > 336) {
                $('.logo__small.left').css({
                    position: 'fixed'
                });
                $('ul .logo__small').css({
                    display: 'none'
                });
            } else {
                $('.logo__small.left').css({
                    position: 'absolute'
                });
            }
        }
    });
    //Submenu
    $('.has__submenu').on('click', function(){
        $(this).find('.submenu').toggleClass('visible');
        if (width >= 1200) {
            $('nav li.visible').toggleClass('unvisible');
        }
    });
    $('.has__submenu a').not('ul.submenu a').on('click', function(e){
        e.preventDefault();
		/*$('ul.submenu a').on('click', function(e){
			var href = $(this).attr('href');
			window.location.href = href;
		});*/
    });
    if (width >= 1200) {
        $(window).scroll(function () {
            if ($(this).scrollTop() < 336) {
                if( $('ul.submenu').hasClass('visible') ){
                    $('nav li.visible').addClass('unvisible');
                }
            }
            if ($(this).scrollTop() >= 336) {
                $('nav li.visible').removeClass('unvisible');
                 if( $('ul.submenu').hasClass('visible') ){
                    $('nav li.visible').removeClass('unvisible');
                }
            }
        });
    }
    //toogle
    if (width <= 1200) {
        $('.toogle').on('click', function(){
            $(this).toggleClass('active');
            $('header nav>ul').toggleClass('d-none');
            $('header nav>ul').toggleClass('d-flex');
            $('header nav>ul').toggleClass('d-xl-flex');
            $('ul.submenu .container').removeClass('container');
            $('.logo__small.left').toggleClass('transparent');
           //$('.overlay').addClass('on');
            $('.overlay').toggleClass('one');
            $('header').toggleClass('open');
        });
        $(document).mouseup(function (e){ 
        var div = $('header.open');
            if (!div.is(e.target)&& div.has(e.target).length === 0) {
                $('.overlay').removeClass('on');
                $('.overlay').removeClass('one');
                $('.logo__small.left').removeClass('transparent');
                $('header nav>ul').removeClass('d-flex');
                $('header nav>ul').addClass('d-none');
                $('header nav>ul').addClass('d-xl-flex');
                $('.toogle').removeClass('active');
            }
        });
        $('.overlay.one').on('click', function(){
            //$('.overlay.one').toggleClass('one');
            //$('ul.menu').hide();
        });
        $('.overlay').on('click', function(){
           /* $('.toogle').removeClass('active');
            $(this).removeClass('on');
            $('.logo__small.left').removeClass('transparent');
            $('header nav>ul').removeClass('d-flex');
            $('header nav>ul').addClass('d-none');*/
        });
    }
    //modal
    $('span#close').css({display: 'none'});
    $('.overlay').on('click', function(){
        $(this).removeClass('on');
      /*  $('.contact__modal.show').hide();
        $('.contact__modal.show').removeClass('show');
        $('.contact__modal.show').css({
            display: 'none' 
        });*/
    });
    $('span#close').on('click', function(){
        $('.overlay').removeClass('on');
    }); 
    $(document).mouseup(function (e){ 
        var div = $('#modal__block');
            if (!div.is(e.target)&& div.has(e.target).length === 0) {
                $('#my__modal').css({display: 'none'});
                $('.overlay').removeClass('on');
            }
    });
});

