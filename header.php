<?php if (substr_count($_SERVER[‘HTTP_ACCEPT_ENCODING’], ‘gzip’)) ob_start(«ob_gzhandler»); else ob_start(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,user-scalable=0">
    <meta name="keywords" content=""><!--link(rel="shortcut icon" type="image/x-png" href="<?php echo get_template_directory_uri() ?>/img/svg/logo.png")  -->
    <?php wp_head(); ?>
    <?php if( is_front_page() ) : ?>
    <script type="text/javascript">
	/*function ready() {
		let wrapper = document.getElementById('rev_slider_1_1_wrapper');
		wrapper.style.height = '100vh';
		wrapper.style.maxHeight = '100vh';
		let slider = document.getElementById('rev_slider_1_1');
		slider.style.height = '100vh';
		slider.style.maxHeight = '100vh';
		alert(slider.height);
		alert(wrapper.height);
		alert('ura');
	}
	document.addEventListener("DOMContentLoaded", ready);
		*/
    $.noConflict();
    jQuery(document).ready(function($){
        var slider = $('section#main');
        slider.find('.button').css({'font-family': 'helveticaneuecyrmedium'});
        slider.find('.slider__subtitle').css({'font-family': 'helveticaneuecyrmedium'});
        slider.find('.main__title').css({'font-family': 'museo_sans_cyrl700'});
    });
    </script>
    <?php endif; ?>
  </head>
<body>
<header>
   <div class="container">
   <?php $menu = get_field('menu', 'options'); ?>
   <?php $cycle = $menu['link_links']; ?>
   <?php if( isset($menu) && !empty($menu)) : ?>
    <nav class="text-center justify-content-center">
      <?php if( !empty($menu['logo']) ) : ?>
        <li class="logo__small left">
            <a href="<?php echo home_url(); ?>/" class="logo">
                <img src="<?php echo $menu['logo']; ?>" alt="LOGO">
            </a>
        </li>
        <?php endif; ?>
       <ul class="menu text-center justify-content-center d-none d-xl-flex">
        <?php if( !empty($menu['logo']) ) : ?>
        <li class="logo__small">
            <a href="<?php echo home_url(); ?>/" class="logo">
                <img src="<?php echo $menu['logo']; ?>" alt="LOGO">
            </a>
        </li>
        <?php endif; ?>
           <?php if( !empty($menu['link_one_name']) ) : ?>
        <li>
            <a href="<?php if( is_front_page() ) : ?>#about<?php else : ?><?php echo home_url(); ?>/<?php endif; ?>" <?php if( is_front_page() ) : ?>class="down"<?php endif; ?>>
                <?php echo $menu['link_one_name']; ?>
            </a>
        </li>
        <?php endif; ?>
        <?php if( !empty($menu['link_two_name']) ) : ?>
        <li>
            <a id="owner__link" href="<?php echo home_url(); ?>/<?php echo $menu['link_two_option']; ?>" <?php if( is_page('167') ) : ?>class="active"<?php endif; ?>>
                <?php echo $menu['link_two_name']; ?>
            </a>
        </li>
        <?php endif; ?>
        <?php if( !empty($menu['link_three_name']) ) : ?>
        <li>
            <a id="seaman__link" href="<?php echo home_url(); ?>/<?php echo $menu['link_three_option']; ?>" <?php if( is_page('108') ) : ?>class="active"<?php endif; ?>>
                <?php echo $menu['link_three_name']; ?>
            </a>
        </li>
        <?php endif; ?>
        <?php if( !empty($menu['logo']) ) : ?>
        <li class="logo">
            <a href="<?php echo home_url(); ?>/" class="logo">
                <img src="<?php echo $menu['logo']; ?>" alt="LOGO">
            </a>
        </li>
        <?php endif; ?>
        <?php if( !empty($menu['link_four_name']) ) : ?>
        <li class="visible">
            <a href="<?php echo home_url(); ?>/<?php echo $menu['link_four_option']; ?>" <?php if( is_page('134') || ( is_home() ) ) : ?>class="active"<?php endif; ?>>
                <?php echo $menu['link_four_name']; ?>
            </a>
        </li>
        <?php endif; ?>
        <?php if( !empty($menu['link_five_name']) ) : ?>
        <li class="has__submenu visible">
            <a href="#">
                <?php echo $menu['link_five_name']; ?>
            </a>
            <?php if( !empty( $cycle ) ): ?>
            <ul class="submenu">
                <li class="container">
                    <span class="col-12 col-lg-4">
                        <span class="close">
                            <i id="left"></i>
                            <i id="right"></i>
                        </span>
                        <?php foreach($cycle as $cycl): ?>
                                    <a href="<?php echo $cycl['link']; ?>" target="_blank">
                                        <?php echo $cycl['name']; ?>
                                    </a>
                        <?php endforeach; ?>
                    </span>
                </li>
            </ul>
            <?php endif; ?>
        </li>
        <?php endif; ?>
        <?php if( !empty($menu['link_six_name']) ) : ?>
        <li class="visible">
            <a href="<?php if( is_page('167')) : ?>#footer<?php else : ?>#form__wrapper<?php endif; ?>" class="down">
                <?php echo $menu['link_six_name']; ?>
            </a>
        </li>
        <?php endif; ?>
       </ul>
       <div class="toogle">
           <span></span>
           <span></span>
           <span></span>
       </div>
    </nav>  
    <?php endif; ?> 
   </div> 
</header>