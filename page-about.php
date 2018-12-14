<?php get_header(); ?>
  <?php $page_id = get_the_ID(); ?>
  <main id="main" class="about-us">
    <div class="container">
      <?php
        $about_section_content = get_post_meta($page_id, 'about_section_settings_content', true);
        if($about_section_content): ?>
          <article>
            <div class="row">
              <div class="col-sm-7">
                <h2 class="block-font"><?php echo esc_html(get_post_meta($page_id, 'about_section_settings_title', true)); ?></h2>
                <?php echo wp_kses_post(apply_filters('the_content', $about_section_content)); ?>
              </div>
              <div class="col-sm-5">
                <?php 
                  $about_section_image_id = get_post_meta($page_id, 'about_section_settings_image', true); 
                  $about_section_image = wp_get_attachment_image_src($about_section_image_id, 'full');
                  $about_section_image_alt = get_post_meta($about_section_image_id, '_wp_attachment_image_alt', true);
                ?>
                <img src="<?php echo esc_url($about_section_image[0]); ?>" class="img-responsive center-block" alt="<?php echo esc_html($about_section_image_alt); ?>" />
              </div>
            </div>
          </article>
      <?php endif; ?>

      <?php
        $mission_section_content = get_post_meta($page_id, 'mission_section_settings_content', true);
        if($mission_section_content): ?>
          <article>
            <div class="row">
              <div class="col-sm-7">
                <h2><?php echo esc_html(get_post_meta($page_id, 'mission_section_settings_title', true)); ?></h2>
                <?php echo wp_kses_post(apply_filters('the_content', $mission_section_content)); ?>
              </div>
              <div class="col-sm-5">
                <?php 
                  $mission_section_image_id = get_post_meta($page_id, 'mission_section_settings_image', true); 
                  $mission_section_image = wp_get_attachment_image_src($mission_section_image_id, 'full');
                  $mission_section_image_alt = get_post_meta($mission_section_image_id, '_wp_attachment_image_alt', true);
                ?>
                <img src="<?php echo esc_url($mission_section_image[0]); ?>" class="img-responsive center-block" alt="<?php echo esc_attr($mission_section_image_alt); ?>" />
              </div>
            </div>
          </article>
      <?php endif; ?>

      <?php
        $background_section_content = get_post_meta($page_id, 'background_section_settings_content', true);
        if($background_section_content): ?>
          <article>
            <div class="row">
              <div class="col-sm-7">
                <h2><?php echo esc_html(get_post_meta($page_id, 'background_section_settings_title', true)); ?></h2>
                <?php echo wp_kses_post(apply_filters('the_content', $background_section_content)); ?>
              </div>
              <div class="col-sm-5">
                <?php 
                  $background_section_image_id = get_post_meta($page_id, 'background_section_settings_image', true); 
                  $background_section_image = wp_get_attachment_image_src($background_section_image_id, 'full');
                  $background_section_image_alt = get_post_meta($background_section_image_id, '_wp_attachment_image_alt', true);
                ?>
                <img src="<?php echo $background_section_image ? esc_url($background_section_image[0]) : 'https://via.placeholder.com/410x500/e6e6e6?text=Photo+of+Keith+coming+later'; ?>" class="img-responsive center-block" alt="<?php echo esc_attr($background_section_image_alt); ?>" />
              </div>
            </div>
          </article>
      <?php endif; ?>
    </div>
  </main>

  <?php get_template_part('includes/service-cards'); ?>

  <?php
    $awards = get_post_meta($page_id, 'awards', true);
    $partners = get_post_meta($page_id, 'partners', true);

    if($awards || $partners): ?>
      <section id="awards-partners">
        <div class="container">

          <?php if($awards): ?>
            <article class="awards">
              <h2 class="block-font">Awards</h2>
              <ul class="list-unstyled list-inline">
                <?php for($a = 0; $a < $awards; $a++): ?>
                  <li>
                    <?php 
                      $awards_image_id = get_post_meta($page_id, 'awards_' . $a . '_award_image', true); 
                      $awards_image = wp_get_attachment_image_src($awards_image_id, 'full');
                      $awards_image_alt = get_post_meta($awards_image_id, '_wp_attachment_image_alt', true);
                    ?>
                    <img src="<?php echo esc_url($awards_image[0]); ?>" class="img-responsive center-block" alt="<?php echo esc_attr($awards_image_alt); ?>" />
                    <p><?php echo esc_html(get_post_meta($page_id, 'awards_' . $a . '_award_description', true)); ?></p>
                  </li>
                <?php endfor; ?>
              </ul>
            </article>
          <?php endif; ?>

          <?php if($partners): ?>
            <article class="partners">
              <h2 class="block-font">Our Partners</h2>
              <ul class="list-unstyled list-inline">
                <?php for($p = 0; $p < $partners; $p++): ?>
                  <li>
                    <a href="<?php echo esc_url(get_post_meta($page_id, 'partners_' . $p . '_partner_link', true)); ?>" target="_blank">
                      <?php 
                        $partner_image_id = get_post_meta($page_id, 'partners_' . $p . '_partner_image', true); 
                        $partner_image = wp_get_attachment_image_src($partner_image_id, 'full');
                        $partner_image_alt = get_post_meta($partner_image_id, '_wp_attachment_image_alt', true);
                      ?>
                      <img src="<?php echo esc_url($partner_image[0]); ?>" class="img-responsive center-block" alt="<?php echo esc_attr($partner_image); ?>" />
                    </a>
                  </li>
                <?php endfor; ?>
              </ul>
            </article>
          <?php endif; ?>

        </div>
      </section>
  <?php endif; ?>

<?php get_footer(); ?>