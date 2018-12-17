<?php
  $services = new WP_Query(array(
    'post_type' => 'services',
    'posts_per_page' => -1,
    'post_status' => 'publish'
  ));

  if($services->have_posts()): ?>
    <section id="hp-services">
      <div class="container">
        <div class="row">
          <?php $s = 0; while($services->have_posts()): $services->the_post(); ?>
            <?php if($s % 3 == 0){ echo '<div class="clearfix"></div>'; } ?>
            <?php $service_id = get_the_ID(); ?>
            <div class="col-sm-4">
              <div class="service-card">
                <?php
                  if(has_post_thumbnail()){
                    the_post_thumbnail('full', array('class' => 'img-responsive center-block'));
                  }
                ?>
                <div class="service-card-caption">
                  <h2><?php the_title(); ?></h2>
                  <?php the_excerpt(); ?>
                </div>
              </div>
            </div>
          <?php $s++; endwhile; ?>
        </div>
        <a href="<?php echo esc_url(home_url('services')); ?>" class="btn-main">Our Services</a>
      </div>
    </section>
<?php endif; wp_reset_postdata(); ?>
