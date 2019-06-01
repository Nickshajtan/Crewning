<?php
/**
 * Template Name: Owner page
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
                <?php $cycle = $header['icons']; ?>
                <?php if( !empty( $cycle ) ): ?>
                    <div class="row">
                        <div class="col-12">
                           <?php foreach($cycle as $cycl): ?>
                                <?php $image = $cycl['one_icon']; ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="50" height="60" class="other__logo">
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <p class="title">
                    <?php echo $header['first_header']; ?>
                </p>
                <p class="subtitle">
                    <?php echo $header['first_desc']; ?>
                </p>
                <a href="#content" class="button yellow__button circle down">
                    <img src="<?php echo get_template_directory_uri() ?>/images/arrow-min.webp" alt="arrow">
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section id="content" class="owner">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="title">
                    <?php the_field('header'); ?>
                </p>
                <div class="desc">
                    <?php the_field('about'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="owner__contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <form action="">
                    <?php echo '<style>textarea[name="comment"],textarea[name="message"]{display:none}</style>'; ?>
                    <textarea name="comment"></textarea>
                    <textarea name="message"></textarea>
                    <div class="row">
                      <div class="col-12">
                         <div class="row">
                             <div class="desc col-6 text-left d-none d-lg-block">
                                    Deck/Engine room
                             </div>
                             <div class="desc col-6 text-right d-none d-lg-block">
                                    Officers/Ratings
                             </div>
                         </div>
                          <div class="row">
                              <div class="col-12 col-md-3">
                                  <div class="desc col-12 text-center d-block d-lg-none">
                                    Deck/Engine room
                                  </div>
                                  <div class="progress left" data-check="deck">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="2" style="width: 50%"></div>
                                  </div>
                              </div>
                              <div class="col-12 col-md-6">
                                  <div class="form-group justify-content-center">
                                          <label class="sr-only" for="position">Position</label>
                                          <div class="custom-select-my custom-select id__position">
                                               <div class="mr-sm-2 value" id="position" data-value="Position"></div>
                                               <div class="d-none child">
                                              </div>

                                          </div>
                                   </div>
                              </div>
                              <div class="col-12 col-md-3">
                                    <div class="desc col-12 text-center d-block d-lg-none">
                                        Officers/Ratings
                                    </div>
                                  <div class="progress right" data-check="ratings">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="2" style="width: 50%"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <?php $form = get_field('form_option');
                            $cycle = $form['vessel']; ?>
                       <div class="col-12 col-lg-6">
                          <?php if( !empty( $cycle ) ): ?>
                           <div class="form-group">
                                  <label class="sr-only" for="vessel">Vessel type</label>
                                  <div class="custom-select-my custom-select">
                                      <div class="mr-sm-2 value" id="vessel" data-value="Vessel type"></div>
                                           <div class="d-none child">
                                        <?php foreach($cycle as $cycl): ?>
                                            <span class="meta" data-value="<?php echo $cycl['sheep']; ?>"><?php echo $cycl['sheep']; ?></span>
                                        <?php endforeach; ?>
                                          </div>
                                  </div>
                           </div>
                           <?php endif; ?>
                           <?php $cycle = $form['dwt_cycle']; ?>
                           <?php if( !empty( $cycle ) ): ?>
                           <div class="form-group">
                                  <label class="sr-only" for="dwt">DWT</label>
                                    <div class="custom-select-my custom-select">
                                        <div class="mr-sm-2 value" id="dwt" data-value="DWT"></div>
                                        <div class="d-none child">
                                        <?php foreach($cycle as $cycl): ?>
                                            <span class="meta" data-value="<?php echo $cycl['dwt_type']; ?>"><?php echo $cycl['dwt_type']; ?></span>
                                        <?php endforeach; ?>
                                      </div>
                                  </div>
                               </div>
                           <?php endif; ?>
                       </div>
                       <div class="col-12 col-lg-6">
                           <div class="form-group">
                                <label for="contact" class="sr-only">Contact duration</label>
                                <input type="text" class="form-control" id="contact" aria-describedby="contact" placeholder="Contract duration">
                           </div>
                           <div class="form-group">
                                <label for="salary" class="sr-only">Salary</label>
                                <input type="text" class="form-control" id="salary" aria-describedby="salary" placeholder="Salary">
                           </div>
                       </div>
                        <div class="col-12">
                            <div class="form-group">
                                 <label for="question" class="sr-only">Your question</label>
                                 <textarea name="question" id="question" cols="30" rows="6" placeholder="Additional information" class="form-control"></textarea>   
                             </div>        
                        </div>
                        <div class="col-12 text-center">
                            <input type="submit" value="Request a CV">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="owner">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center desc">
                <p>
                    <?php the_field('contact_about'); ?>
                </p>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>