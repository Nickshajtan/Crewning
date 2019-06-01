<?php get_header(); ?>
<div class="main-wrapper">
<section id="seamen__header" style="background-image:url('<?php echo get_template_directory_uri() ?>/images/seamen-min.png');max-height:150px;" class="d-flex justify-content-center"></section>
<section id="contact__seamen" style="padding-top:0;">
    <div class="container">
        <div class="row">
           <?php $error = get_field('404_page', 'options'); ?>
            <div class="col-12 text-center">
                 <div class="desc">
                     <?php echo $error['text']; ?>
                 </div>
                 <img src="<?php echo $error['image']; ?>" alt="Error 404">
            </div>
            <div class="col-12 text-center">
                  <a href="#" class="error__button" onclick="history.back(); return false;">
                     <?php echo __('BACK'); ?>
                  </a>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>