        <footer id="footer">
            <div class="container">
                <div class="row">
                    <?php $column_one = get_field('links_column','options');
                          $column_two = get_field('file_column','options');
                          $column_three = get_field('contact_column','options');
                    ?>                
                    <div class="column col-12 col-md-4">
                        <?php if( isset($column_one) && !empty($column_one)) : ?>
                            <nav>
                                <ul>
                                   <?php if( !empty($column_one['link_one_name']) ) : ?>
                                    <li><a href="#about">
                                        <?php echo $column_one['link_one_name']; ?>
                                    </a></li>
                                    <?php endif; ?>
                                    <?php if( !empty($column_one['link_two_name']) ) : ?>
                                    <li><a href="<?php echo home_url(); ?>/<?php echo $column_one['link_two_option']; ?>">
                                        <?php echo $column_one['link_two_name']; ?>
                                    </a></li>
                                    <?php endif; ?>
                                    <?php if( !empty($column_one['link_three_name']) ) : ?>
                                    <li><a href="<?php echo home_url(); ?>/<?php echo $column_one['link_three_option']; ?>">
                                        <?php echo $column_one['link_three_name']; ?>
                                    </a></li>
                                    <?php endif; ?>
                                    <?php if( !empty($column_one['link_four_name']) ) : ?>
                                    <li><a href="<?php echo home_url(); ?>/<?php echo $column_one['link_four_option']; ?>">
                                        <?php echo $column_one['link_four_name']; ?>
                                    </a></li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        <?php endif; ?>
                    </div>
                    <div class="column col-12 col-md-4 text-center align-items-center">
                       <?php if( isset($column_two) && !empty($column_two)) : ?>
                           <h4>
                               <?php echo __('DOWNLOAD APPLICATION'); ?>
                           </h4>
                           <?php $deck = $column_two['deck_file'];
                                 $engine = $column_two['engine_file'];
                           ?>
                           <?php if(isset($deck) && !empty($deck) ): ?> 
                               <a href="<?php echo $deck; ?>" target="_blank" class="button"><?php echo __('Deck crew'); ?></a> 
                            <?php endif; ?> 
                            <?php if( isset($engine) && !empty($engine) ): ?>
                               <a href="<?php echo $engine; ?>" target="_blank" class="button"><?php echo __('Engine crew'); ?></a> 
                            <?php endif; ?> 
                       <?php endif; ?>
                        <p>
                            <?php echo __('Select the appropriate application and send it to our email address'); ?>
                        </p>
                    </div>
                    <div class="column col-12 col-md-4 text-right">
                        <?php if( isset($column_three) && !empty($column_three)) : ?>
                            <?php $cycle = $column_three['mail_cycle']; ?>
                            <?php if( !empty( $cycle ) ): ?>
                                <?php foreach($cycle as $cycl): ?>
                                    <a href="mailto:<?php echo $cycl['e-mail']; ?>" class="email"><?php echo $cycl['e-mail']; ?></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
						    <?php $cycle = $column_three['skype']; ?>
							<?php if( !empty( $cycle ) ): ?>
							<div class="skype-wrapper">
								<?php foreach($cycle as $cycl): ?>
									<a href="skype:<?php echo $cycl['one_skype']; ?>" class="email">Skype:&nbsp&nbsp&nbsp<?php echo $cycl['one_skype']; ?></a>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
                            <?php $cycle = $column_three['phone_cycle']; ?>
                            <?php if( !empty( $cycle ) ): ?>
                                <div class="phone-wrapper">
                                <?php foreach($cycle as $cycl): ?>
                                    <a href="tel:<?php echo $cycl['phone_href']; ?>" class="phone"><?php echo $cycl['phone']; ?></a>
                                <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php echo $column_three['address']; ?>
                        <?php endif; ?>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-12 copyright text-right">
                        created by HCC
                    </div>    
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
        <?php if( is_page('167') ) : ?>
            <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/owner.js"></script>
        <?php endif; ?>
        <?php if( is_front_page() ) : ?>
        <script type="text/javascript">
        {
        if (screen.width >= 1024 ) document.write ('<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.waterwheelCarousel.min.js"" ></sc' + 'ript>');
        }
        </script>
        <script type="text/javascript">
          //  $.noConflict();
            jQuery(document).ready(function($){
              if (screen.width >= 1024 ){
                var carousel = $("#slider").waterwheelCarousel({
                    startingItem:1,
                    opacityMultiplier:1,
                    flankingItems:3,
                    linkHandling:1,
                    keyboardNav:true,
                    imageNav:false,
                });
                  $('.block__carousel #prev').on('click', function () {
                    carousel.prev();
                    return false;
                  });

                  $('.block__carousel #next').on('click', function () {
                    carousel.next();
                    return false;
                  });
                  $('#slider img').on('click', function () {
                      var locale = $(this).attr('src');
                      $('.overlay').addClass('on');
                      $('span#close').css({
                         display: 'block' 
                      });
                  });
              }
            });
        </script>
        <style type="text/css">
            @media screen and ( min-width: 1024px ){
                  #slider {
                    width:100%;
                    height: 370px;
                    display: relative;
                    margin-bottom: 80px;
                  }
                  #slider img {
                    display: hidden; /* hide images until carousel prepares them */
                    cursor: pointer; /* not needed if you wrap carousel items in links */
                    box-shadow: 5px 5px 15px rgba(0,0,0,0.6);
                    opacity: 1;
                  }   
            }
        </style>
        <script type="text/javascript">
            jQuery(document).ready(function($){
            //Link for button 
                $('section#main #left').on('click', function(){
                   var seaman = $('a#seaman__link').attr('href');
                   window.location.href = seaman;
                });
                $('section#main #right').on('click', function(){
                   var owner = $('a#owner__link').attr('href');
                   window.location.href = owner;
                });
            });
        </script>
                <script type="text/javascript">
                {
                    if (screen.width < 1024 ){
                        document.write ('<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/slick.js"" ></sc' + 'ript>');
                        document.write ('<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style/slick.css">');
                        document.write ('<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style/slick-theme.css">');
                    }
                }
                </script>
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                       if ((screen.width < 1024) && (screen.width >= 700)){
                           $('#slider').slick({
                                prevArrow:"<button type='button' class='slick-prev pull-left'><img src='<?php echo get_template_directory_uri() ?>/images/a-left-min.webp'></button>",
                                nextArrow:"<button type='button' class='slick-next pull-right'><img src='<?php echo get_template_directory_uri() ?>/images/a-right-min.webp'></button>",
                                slidesToShow: 2,
                            });
                       }
                       if(screen.width < 700){
                                $('#slider').slick({
                                    prevArrow:"<button type='button' class='slick-prev pull-left'><img src='<?php echo get_template_directory_uri() ?>/images/a-left-min.webp'></button>",
                                    nextArrow:"<button type='button' class='slick-next pull-right'><img src='<?php echo get_template_directory_uri() ?>/images/a-right-min.webp'></button>",
                                    slidesToShow: 1,
                                });
                        }   
                        if (screen.width < 1024 ){
                            $('.block__carousel #prev').css({display:'none'});
                            $('.block__carousel #next').css({display:'none'});
                        }
                    });
                </script>
             <style>
                    @media screen and ( max-width: 1023px ){
                        .slick-next{
                            position: absolute;
                            right: 0;
                            z-index: 70;
                        }
                        .slick-prev{
                            position: absolute;
                            left: 0;
                            z-index: 70;
                        }
                        #slider{
                            margin-bottom: 50px;
                        }
                        #slider.slick-slider img{
                            max-width: 250px;
                        }
                        button:focus{
                            outline: none;
                        }
                    }
                </style>
        <?php endif; ?>
        </div>
        <div class="overlay"></div>
<?php if( is_page('167') ) : ?>
<?php $option = get_field('positions'); ?>
<?php if( !empty( $option ) ): ?>
<?php $cycle_second = $option['deck_officers'];
      $cycle_third = $option['deck_ratings'];
      $cycle_fourth = $option['engine_officers'];
      $cycle_one = $option['engine_ratings']; ?>
      <script type="text/javascript">
          jQuery(document).ready(function($){
              $('.progress').on('click', function(){
                  var checkLeft =  $('.progress.left').attr('data-check');
                  var checkRight = $('.progress.right').attr('data-check');
                  var position = $('.id__position');
                  if( (checkLeft === 'deck') && (checkRight === 'ratings') ){
                      position.find('.child').html('<?php if( !empty( $cycle_third ) ): ?><?php $count = 0; ?><?php foreach($cycle_third as $cycl): ?><span class="meta <?php if( $count == 0 ): ?><?php echo 'active'; ?><?php endif; ?>" data-value="<?php echo $cycl['position']; ?>">' +
                    '<?php echo $cycl['position']; ?></span><?php $count++; ?><?php endforeach; ?><?php endif; ?>');
                  }
                  if( (checkLeft === 'deck') && (checkRight === 'officers') ){
                      position.find('.child').html('<?php if( !empty( $cycle_second ) ): ?><?php $count = 0; ?><?php foreach($cycle_second as $cycl): ?><span class="meta <?php if( $count == 0 ): ?><?php echo 'active'; ?><?php endif; ?>" data-value="<?php echo $cycl['position']; ?>">'+
                    '<?php echo $cycl['position']; ?></span><?php $count++; ?><?php endforeach; ?><?php endif; ?>');
                  }
                  if( (checkLeft === 'engine') && (checkRight === 'ratings') ){
                      position.find('.child').html('<?php if( !empty( $cycle_one ) ): ?><?php $count = 0; ?><?php foreach($cycle_one as $cycl): ?><span class="meta <?php if( $count == 0 ): ?><?php echo 'active'; ?><?php endif; ?>" data-value="<?php echo $cycl['position']; ?>">'+
                    '<?php echo $cycl['position']; ?></span><?php $count++; ?><?php endforeach; ?><?php endif; ?>');
                  }
                  if( (checkLeft === 'engine') && (checkRight === 'officers') ){
                      position.find('.child').html('<?php if( !empty( $cycle_fourth ) ): ?><?php $count = 0; ?><?php foreach($cycle_fourth as $cycl): ?><span class="meta <?php if( $count == 0 ): ?><?php echo 'active'; ?><?php endif; ?>" data-value="<?php echo $cycl['position']; ?>">'+
                    '<?php echo $cycl['position']; ?></span><?php $count++; ?><?php endforeach; ?><?php endif; ?>');
                  }
                  var newValue = position.find('.meta.active').attr('data-value');
                  var children = position.find('.child');
                  $(children).on('click', function(){
                      var span = $(this).find('.meta');
                      span.on('click', function(){
                          span.not(this).removeClass('active');
                          $(this).addClass('active');
                      });
                  });
                  position.attr('data-value', newValue);
                  position.find('.value').text(newValue);
                  position.find('.value.arrow').removeClass('arrow');
              });
              
              
             
          });
      </script>
      <?php endif; ?>
      <?php endif; ?>
<?php if( is_home() || is_paged() ) : ?>
<?php $pagination = get_field('settings', 134);
    if( isset( $pagination) && !empty( $pagination ) ){
        $select = $pagination['pagination']; 
        if( $select && in_array('scroll', $select) ) : ?>
        <script type="text/javascript">
        jQuery(document).ready(function($) { 
            var ias = jQuery.ias( {
              container: ".article__wrapper",
              item: ".one__vacancy",
              pagination: ".page-numbers",
              next: ".next.page-numbers",
            } );

            ias.extension( new IASTriggerExtension( { offset: 2 } ) );
            ias.extension( new IASSpinnerExtension() );
            ias.extension( new IASNoneLeftExtension() );
        });
       </script>    
        <?php endif;  
    } ?>
<?php endif; ?>    
<?php if( is_front_page() ) : ?>
<script type="text/javascript">
        {
        if (screen.width >= 1024 ) document.write ('<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/certificates.js">" ></sc' + 'ript>');
        }
</script>
<div id="my__modal" class="my__modal">
		<span class="close" id="close">X</span>
		<div class="modal__block" id="modal__block">
			<img id="modal__content" class="modal__content" alt="">
		</div>
</div>
<?php endif; ?>  
<?php $form = get_field('form', 'options'); ?>
<div class="contact__modal modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <p class="title modal-title">Thanks!</p>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="text-center">
                   <?php $menu = get_field('menu', 'options'); ?>
                   <?php if( !empty($menu['logo']) ) : ?>
                    <ul>
                        <li class="logo__small">
                            <a href="<?php echo home_url(); ?>/" class="logo">
                                <img src="<?php echo $menu['logo']; ?>" alt="LOGO">
                            </a>
                        </li>
                    </ul>
                    <?php endif; ?>
               </div>
                <div class="text-center thank"><?php echo $form['form_text']; ?></div>
            </div>
        </div>
    </div>
</div>   
<div id="loader" style="display:none;"></div>
    </body>
</html>