<?php get_header(); ?>
  <?php $page_id = get_the_ID(); ?>
  <?php
    $hero_bg_img_and_css = totalconstruction_get_bg_img_and_css($page_id, 'hero_settings_background_image');
  ?>
  <section id="hp-hero" class="hero" style="background-image:url(<?php echo esc_url($hero_bg_img_and_css['image_url']); ?>); <?php echo esc_html($hero_bg_img_and_css['image_css']); ?>">
    <div class="container">
      <div class="hero-caption">
        <h1><?php echo get_post_meta($page_id, 'hero_settings_caption', true) ?></h1>
        <div class="inline-btns">
          <?php 
            $button_one = get_post_meta($page_id, 'hero_settings_button_one', true);
            $button_two = get_post_meta($page_id, 'hero_settings_button_two', true);
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

  <?php get_template_part('includes/service-cards'); ?>

  <?php 
    $about_text = get_post_meta($page_id, 'about_section_settings_content', true);
    if($about_text): ?>
      <?php $about_section_bg_img_and_css = totalconstruction_get_bg_img_and_css($page_id, 'about_section_settings_background_image'); ?>
      <section id="hp-about" style="background-image:url(<?php echo esc_url($about_section_bg_img_and_css['image_url']); ?>); <?php echo esc_html($about_section_bg_img_and_css['image_css']); ?>">
        <div class="container">
          <div class="hp-about">
            <?php echo $about_text; ?>
            <a href="<?php echo home_url('about'); ?>" class="btn-main btn-alt">About Us</a>
          </div>
        </div>
      </section>
  <?php endif; ?>

  <?php
    $guarantees_section_title = get_post_meta($page_id, 'guarantees_section_settings_title', true);
    $guarantees = get_post_meta($page_id, 'guarantees_section_settings_guarantees', true);
    if($guarantees || $guarantees_section_title): ?>
      <section id="hp-guarantees">
        <div class="container">
          <article>
            <h2><?php echo $guarantees_section_title; ?></h2>
            <?php echo get_post_meta($page_id, 'guarantees_section_settings_content', true); ?>
          </article>

          <?php 
            if($guarantees): ?>
              <div class="row badges">
                <?php for($b = 0; $b < $guarantees; $b++): ?>
                  <div class="col-sm-3">
                    <div class="badge">
                      <?php 
                        $guarantee_image_id = get_post_meta($page_id, 'guarantees_section_settings_guarantees_' . $b . '_icon', true); 
                        $guarantee_image = wp_get_attachment_image_src($guarantee_image_id, 'full');
                      ?>
                      <img src="<?php echo $guarantee_image[0]; ?>" class="img-responsive center-block" alt="" />
                      <h3><?php echo get_post_meta($page_id, 'guarantees_section_settings_guarantees_' . $b . '_title', true); ?></h3>
                    </div>
                  </div>
                <?php endfor; ?>
              </div>
          <?php endif; ?>
        </div>
      </section>
  <?php endif; ?>

  <?php $service_areas_section_bg_img_and_css = totalconstruction_get_bg_img_and_css($page_id, 'service_areas_section_settings_background_image'); ?>
  <section id="hp-service-areas" style="background-image:url(<?php echo esc_url($service_areas_section_bg_img_and_css['image_url']); ?>); <?php echo esc_html($service_areas_section_bg_img_and_css['image_css']); ?>">
    <div class="container">
      <div class="service-areas">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/virginia.png" class="img-responsive center-block" alt="Virginia" />
        <div class="service-areas-caption">
          <h3>Our Service Areas</h3>
          <?php echo get_post_meta($page_id, 'service_areas_section_settings_content', true); ?>
        </div>
      </div>
    </div>
    <div class="bg-overlay"></div>
  </section>
<?php get_footer(); ?>