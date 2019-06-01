<?php
/**
 * The main template file
 *
 */
get_header(); ?>
<div class="main-wrapper">
<?php $header = get_field('first', 134);
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
                <a href="#vacancy" class="button yellow__button  circle down">
                    <img src="<?php echo get_template_directory_uri() ?>/images/arrow-min.webp" alt="arrow">
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section id="vacancy">
    <div class="container">
        <div class="row article__wrapper">
            <?php
           //$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
            $pagination = get_field('settings', 134);
            if( isset( $pagination) && !empty( $pagination ) ){
                    $select = $pagination['pagination']; 
                    if( $select && in_array('navigation', $select) ){
                        $posts_per_page = $pagination['nav_option'];
                    }
                    else if( $select && in_array('scroll', $select) ){
                        if( wp_is_mobile() ){
                            $posts_per_page = '3';
                        }
                        else{
                            $posts_per_page = '4';
                        }
                    }
                    else{
                        $posts_per_page = '';
                    }
            } 
            else{
                $posts_per_page = '';
            }
            $paged = (get_query_var('page_val') ? get_query_var('page_val') : 1);
            $custom_query_args = array(
                'posts_per_page' => $posts_per_page,  
                'paged' => $paged,
                'post_type' => 'vacancy'
            );
            $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            $custom_query = new WP_Query( $custom_query_args );
            $temp_query = $wp_query;
            $wp_query   = NULL;
            $wp_query   = $custom_query;
            while ( $wp_query->have_posts() ) : ?>
            <?php $custom_query->the_post(); ?>
            <article class="col-12 text-center one__vacancy scale">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="title"><?php the_title(); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 text-left part">
                        <p class="vacancy__once">
                            <?php echo __('Contract duration'); ?> <span><?php the_field('long'); ?></span>
                        </p>
                        <p class="vacancy__once">
                            <?php echo __('Salary'); ?> <span><?php the_field('salary'); ?></span>
                        </p>
                        <p class="vacancy__once">
                            <?php echo __('DWT'); ?> <span><?php the_field('dwt'); ?></span>
                        </p>
                        <p class="vacancy__once">
                            <?php echo __('Joing'); ?><span><?php the_field('joing'); ?></span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 part text-center">
                        <p class="vacancy__once">
                            <?php echo __('Additional requirements'); ?>
                        </p>
                        <p class="vacancy__once">
                            <span><?php the_field('additional'); ?></span>
                        </p>
                        <?php $file = get_field('file');
                        if( isset( $file ) && !empty( $file ) ) : ?>
                            <a href="<?php echo $file; ?>" class="button yellow__button scale fill" target="_blank">
                                <?php echo __('Fill in application >'); ?>
                            </a>
                        <?php endif; ?>
                        <?php if( empty($file) ) : ?>
                            <a href="#footer" class="button yellow__button down scale fill">
                                <?php echo __('Fill in application >'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <?php endwhile; ?>
        </div>
        <div class="row">
            <?php wp_reset_postdata(); ?>
             <div class="paginations"> 
            <?php   
                $big = 999999999;  
                $args = array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'  => '%#%',
                    'show_all'     => false, 
                    'end_size'     => 1,     
                    'mid_size'     => 1,    
                    'prev_next'    => true,  
                    'prev_text'    => __(''),
                    'next_text'    => __(''),
                    'add_args'     => false, 
                    'add_fragment' => '',     
                    'screen_reader_text' => __( '' ),
                );
            ?>
            <?php  the_posts_pagination($args); ?>
             </div> 
            <?php
                $wp_query = NULL;
                $wp_query = $temp_query;
            ?>
        </div>
    </div>
</section>
<section id="contact__seamen">
    <?php get_template_part("inc/contactform"); ?>
</section>
<?php if( is_paged() || is_home() ) : ?>
<script type="text/javascript">
    jQuery(document).ready(function($){
       $('.paginations .prev').attr('rel', 'prev'); 
       $('.paginations .next').attr('rel', 'next'); 
    });
</script>
<?php endif; ?>    
<?php get_footer(); ?>