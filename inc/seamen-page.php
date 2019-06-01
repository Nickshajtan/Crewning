<?php
/**
 * Template Name: Seamen page
 *
 */
get_header(); ?>
<div class="main-wrapper">
<?php $header = get_field('first');
      if( isset($header)  && !empty($header) ) : ?>
<section id="seamen__header" style="background-image:url('<?php echo $header['main_image']; ?>')" class="d-flex justify-content-center">
    <div class="container seamen__wrapper">
        <div class="row">
            <div class="col-12 text-center">
                <p class="title">
                    <?php echo $header['first_header']; ?>
                </p>
                <p class="subtitle">
                    <?php echo $header['first_desc']; ?>
                </p>
                <?php $menu = get_field('menu', 'options'); ?>
                <?php if( !empty($menu['link_four_name']) ) : ?>
                <a href="<?php echo $menu['link_four_option']; ?>" class="button yellow__button" target="_blank">
                    <?php echo __('View hot vacancies'); ?><img src="<?php echo get_template_directory_uri() ?>/images/arrow-min.webp" alt="arrow" class="right__arrow">
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $section = get_field('second');
      $cycle = $section['adv'];
      if( isset($section)  && !empty($section) ) : ?>
<section id="adv">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="title">
                    <?php echo $section['second_header']; ?>
                </p>
            </div>
        </div>
        <?php if( !empty( $cycle ) ): ?>
        <div class="row">
            <?php foreach($cycle as $cycl): ?>
            <div class="col-12 col-md-3  col-lg-3 text-center one__feature one__feature__see">
                <?php $image = $cycl['icon']; ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                <p class="title subtitle">
                        <?php echo $cycl['adv_desc']; ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<section id="contact__seamen">
   <div class="container">
       <div class="row">
           <div class="col-12 text-center">
               <p class="title">
                   <?php the_field('down_header'); ?>
               </p>
               <div class="desc">
                    <?php the_field('download'); ?>
               </div>
           </div>
       </div>
       <?php $column_two = get_field('file_column','options');
       if( isset($column_two) && !empty($column_two)) : ?>
       <div class="row">
          <?php $deck = $column_two['deck_file'];
                $engine = $column_two['engine_file'];
          ?>
           <div class="col-12 col-md-6 text-center download__wrapper download__left">
               <img src="<?php echo get_template_directory_uri() ?>/images/down-min.webp" alt="download">
               <?php if(isset($deck) && !empty($deck) ): ?> 
                               <a href="<?php echo $deck; ?>" target="_blank" class="button__icon button yellow__button scale"><?php echo __('Deck crew'); ?></a> 
                <?php endif; ?> 
           </div>
           <div class="col-12 col-md-6 text-center download__wrapper download__right">
               <img src="<?php echo get_template_directory_uri() ?>/images/down-min.webp" alt="download">
               <?php if( isset($engine) && !empty($engine) ): ?>
                               <a href="<?php echo $engine; ?>" target="_blank" class="button__icon button yellow__button scale"><?php echo __('Engine crew'); ?></a> 
               <?php endif; ?> 
           </div>
       </div>
       <?php endif; ?>
   </div>
    <?php get_template_part("inc/contactform"); ?>
</section>
<?php get_footer(); ?>