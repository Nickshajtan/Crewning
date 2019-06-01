jQuery(document).ready(function($) {
$('.contact__modal').find('.close').on('click', function(){
    $('.contact__modal').hide();
    $('.overlay').removeClass('on');
});
var url = wnm_custom.template_url;
var uri = wnm_custom.admin_url;
var home_url = wnm_custom.url
var ajaxurl = home_url + '/wp-admin/admin-ajax.php';

    $("#form__wrapper").submit(function (e){
        e.preventDefault();
        var name = $(this).find('input[type=text]').val();
        var phone =   $(this).find('input[type=tel]').val();
        var email =   $(this).find('input[type=email]').val();
        var message = $(this).find('textarea[name=question]').val();
        var spamFirst = $(this).find('textarea[name=comment]').val();
        var spamSecond = $(this).find('textarea[name=message]').val();
        $.ajax({
                type: "POST",
                url: ajaxurl,
                data: {
                    action: 'ajax_order',
                    name: name,
                    phone: phone,
                    email: email,
                    message: message,
                    spamFirst: spamFirst,
                    spamSecond: spamSecond
                },
                error: (function() {
                    $('.modal-title').val('Error!');
                    $('.modal .thank').val('Please check the fields')
                }),
                beforeSend: (function (){
                    $('#loader').css({
                        display: 'block'
                    })
                    $('.overlay').addClass('on')
                }),
                complete: (function (){
                    $('#loader').css({
                        display: 'none'
                    })
                })
            }).done(function (data) {
                $('input[type=text]').val('')
                $('input[type=tel]').val('');
                $('input[type=email]').val('');
                $('textarea[name=question]').val('');
                $('.overlay').addClass('on');
                $('.contact__modal').fadeIn( 100 ).addClass('show');
                $(document).mouseup(function (e){ 
                        var div = $('.contact__modal.show .modal-dialog');
                        if (!div.is(e.target)&& div.has(e.target).length === 0) {
                            $('.overlay').removeClass('on');
                            $('.contact__modal').hide();
                        }
                });    
        });
        return false;
    });
    $("#owner__contact").submit(function (e){
         e.preventDefault();
         var position = $(this).find('#position').text();
         var vessel = $(this).find('#vessel').text();
         var dwt = $(this).find('#dwt').text();
         var contact = $(this).find('input#contact').val();
         var salary = $(this).find('#salary').val();
         var message = $(this).find('textarea[name=question]').val();
         $.ajax({
                type: "POST",
                url: ajaxurl,
                data: {
                    action: 'ajax_owner',
                    position: position,
                    vessel: vessel,
                    dwt: dwt,
                    contact: contact,
                    salary: salary,
                    message: message
                },
                error: (function() {
                    $('.modal-title').val('Error!');
                    $('.modal .thank').val('Please check the fields')
                }),
                beforeSend: (function (){
                    $('#loader').css({
                        display: 'block'
                    })
                    $('.overlay').addClass('on')
                }),
                complete: (function (){
                    $('#loader').css({
                        display: 'none'
                    })
                })
            }).done(function (data) {
                $('#position').text('Position');
                $('.id__position .child').children().remove();
                $('#vessel').text('Vessel type');
                $('#dwt').text('DWT');
                $('input#contact').val('');
                $('#salary').val('');
                $('textarea[name=question]').val('');
                $('.overlay').addClass('on');
                $('.contact__modal').fadeIn( 100 ).addClass('show');
                $(document).mouseup(function (e){ 
                        var div = $('.contact__modal.show .modal-dialog');
                        if (!div.is(e.target)&& div.has(e.target).length === 0) {
                            $('.overlay').removeClass('on');
                            $('.contact__modal').hide();
                        }
                });    
        });
        return false;
    });
});