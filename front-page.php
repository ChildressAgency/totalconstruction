<?php get_header(); ?>
  <?php $page_id = get_the_ID(); ?>
  <section id="hp-hero" class="hero" style="background-image:url(<?php echo get_post_meta($page_id, 'hero_background_image'); ?>); <?php echo get_post_meta($page_id, 'hero_background_image_css'); ?>">
    <div class="container">
      <div class="hero-caption">
        <h1><?php echo get_post_meta($page_id, 'hero_caption') ?></h1>
        <div class="inline-btns">
          <?php 
            $button_one = get_post_meta($post_id, 'button_one', true);
            $button_two = get_post_meta($post_id, 'button_two', true);
            if($button_one): ?>
              <a href="<?php echo $button_one['url']; ?>" class="btn-main"><?php echo $button_one['title']; ?></a>
          <?php endif; if($button_two): ?>
            <a href="<?php echo $button_two['url']; ?>" class="btn-main"><?php echo $button_two['title']; ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="bg-overlay"></div>
  </section>

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
            <?php endwhile; ?>
          </div>
          <a href="<?php echo home_url('services'); ?>" class="btn-main">Our Services</a>
        </div>
      </section>
  <?php endif; wp_reset_postdata(); ?>

  <?php 
    $about_text = get_post_meta($page_id, 'about_section_text');
    if($about_text): ?>
      <section id="hp-about" style="background-image:url(<?php echo get_post_meta($page_id, 'about_section_background_image'); ?>); <?php echo get_post_meta($page_id, 'about_section_background_image_css'); ?>">
        <div class="container">
          <div class="hp-about">
            <?php echo $about_text; ?>
            <a href="<?php echo home_url('about'); ?>" class="btn-main btn-alt">About Us</a>
          </div>
        </div>
      </section>
  <?php endif; ?>

  <section id="hp-guarantees">
    <div class="container">
      <article>
        <h2><?php echo get_post_meta($page_id, 'guarantees_section_title'); ?></h2>
        <?php echo get_post_meta($page_id, 'guaranteed_section_content'); ?>
      </article>

      <?php 
        $badges = get_post_meta($page_id, 'guarantees', true);
        if($badges): ?>
          <div class="row badges">
            <?php for($b = 0; $b < $badges; $b++;): ?>
              <div class="col-sm-3">
                <div class="badge">
                  <?php $badge_image = get_post_meta($page_id, 'guarantees_' . $b . '_guarantee_icon', true); ?>
                  <img src="<?php echo $badge_image['url']; ?>" class="img-responsive center-block" alt="<?php echo $badge_image['title']; ?>" />
                  <h3><?php echo get_post_meta($page_id, 'guarantees_' . $b . '_guarantee_title'); ?></h3>
                </div>
              </div>
            <?php endfor; ?>
          </div>
      <?php endif; ?>
    </div>
  </section>

  <section id="hp-service-areas" style="background-image:url(<?php echo get_post_meta($page_id, 'service_areas_section_background_image'); ?>); <?php echo get_post_meta($page_id, 'service_areas_section_background_image_css'); ?>">
    <div class="container">
      <div class="service-areas">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/virginia.png" class="img-responsive center-block" alt="Virginia" />
        <div class="service-areas-caption">
          <h3>Our Service Areas</h3>
          <?php echo get_post_meta($page_id, 'service_areas_section_content'); ?>
        </div>
      </div>
    </div>
    <div class="bg-overlay"></div>
  </section>
<?php get_footer(); ?>