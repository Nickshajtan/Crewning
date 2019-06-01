<?php get_header(); ?>
<div class="main-wrapper">
<section id="seamen__header" style="background-image:url('<?php echo get_template_directory_uri() ?>/seamen-min.png')" class="d-flex justify-content-center">
    <div class="container seamen__wrapper">
        <div class="row">
            <div class="col-12 text-center">
                <p class="title">
                    <?php the_title(); ?>
                </p>
            </div>
        </div>
    </div>
</section>
<section id="contact__seamen">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <p class="title">
                        <?php the_title(); ?>
                    </p>
               </div>
               <div class="col-12 desc">
                   <?php the_content(); ?>
               </div>
           </div>
       </div>
</section>
<?php get_footer(); ?>