<?php
/**
 * Template Name: Main page
 *
 */
get_header(); ?>
<div class="main-wrapper">
<section id="main">
    <?php putRevSlider("main") ?>
    <div class="main-mobile d-flex d-xl-none"></div>
</section>
<section id="main__content">
   <div class="container">
       <?php $about = get_field('about_block');
        if( isset($about)  && !empty($about) ) : ?>
    <div id="about" class="block__wrapper about__block text-center">
        <main>
            <p class="title">
                <?php echo $about['header']; ?>
            </p>
            <div class="desc">
                <?php echo $about['text']; ?>
            </div>
        </main>
    </div>
    <?php endif; ?>
    <?php $feature = get_field('feature');
          $cycle = $feature['cycle']; 
        if( isset($feature)  && !empty($feature) ) : ?>
    <div class="block__wrapper block__features text-center">
        <p class="title">
            <?php echo $feature['header']; ?>
        </p>
        <?php if( !empty( $cycle ) ): ?>
           <div class="row">
            <?php foreach($cycle as $cycl): ?>
                <div class="col-12 col-md-6 col-lg-3 one__feature">
                   <?php $image = $cycl['cycle_image']; ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    <p class="title sub">
                        <?php echo $cycl['cycle_header']; ?>
                    </p>
                    <p class="title subtitle">
                        <?php echo $cycl['cycle_subheader']; ?>
                    </p>
                </div>
            <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <?php $slider = get_field('slider');
      if( isset($slider)  && !empty($slider) ) : ?> 
      <div class="block__wrapper block__carousel text-center">
            <p class="title" style="padding-bottom:0">
                <?php the_field('header_slider') ?>
            </p>
        <?php if( have_rows('slider') ): ?>
               <div id="slider">
               <?php while ( have_rows('slider') ) : the_row(); ?>
                   <img src="<?php the_sub_field('slide'); ?>" alt="" width="auto" height="300" class="modal_image">
               <?php endwhile; ?>
                <a href="#" id="prev"></a>
                <a href="#" id="next"></a>
               </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
   </div>
</section>
<section id="contact__home">
    <?php get_template_part("inc/contactform"); ?>
</section>
<?php  get_footer(); ?>