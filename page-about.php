<?php get_header(); ?>
  <?php $page_id = get_the_ID(); ?>
  <main id="main" class="about-us">
    <div class="container">
      <?php
        $about_section_content = get_post_meta($page_id, 'about_section_content');
        if($about_section_content): ?>
          <article>
            <div class="row">
              <div class="col-sm-7">
                <h2 class="block-font"><?php echo esc_html(get_post_meta($page_id, 'about_section_title')); ?></h2>
                <?php echo esc_html($about_section_content); ?>
              </div>
              <div class="col-sm-5">
                <?php $about_section_image = get_post_meta($page_id, 'about_section_image', true); ?>
                <img src="<?php echo $about_section_image['url']; ?>" class="img-responsive center-block" alt="<?php echo $about_section_image['title']; ?>" />
              </div>
            </div>
          </article>
      <?php endif; ?>

      <?php
        $mission_section_content = get_post_meta($page_id, 'mission_section_content');
        if($mission_section_content): ?>
          <article>
            <div class="row">
              <div class="col-sm-7">
                <h2><?php echo esc_html(get_post_meta($page_id, 'mission_section_title')); ?></h2>
                <?php echo esc_html($mission_section_content); ?>
              </div>
              <div class="col-sm-5">
                <?php $mission_section_image = get_post_meta($page_id, 'mission_section_image', true); ?>
                <img src="<?php echo $mission_section_image['url']; ?>" class="img-responsive center-block" alt="<?php echo $mission_section_image['title']; ?>" />
              </div>
            </div>
          </article>
      <?php endif; ?>

      <?php
        $background_section_content = get_post_meta($page_id, 'background_section_content');
        if($background_section_content): ?>
          <article>
            <div class="row">
              <div class="col-sm-7">
                <h2><?php echo esc_html(get_post_meta($page_id, 'background_section_title')); ?></h2>
                <?php echo esc_html($background_section_content); ?>
              </div>
              <div class="col-sm-5">
                <?php $background_section_image = get_post_meta($page_id, 'background_section_image'); ?>
                <img src="<?php echo $background_section_image ? $background_section_image['url'] : 'https://via.placeholder.com/410x500/e6e6e6?text=Photo+of+Keith+coming+later'; ?>" class="img-responsive center-block" alt="<?php echo $background_section_image['title']; ?>" />
              </div>
            </div>
          </article>
      <?php endif; ?>
    </div>
  </main>

  <?php get_template_part('includes/service-cards'); ?>

  <?php
    $awards = get_post_meta($page_id, 'awards');
    $partners = get_post_meta($page_id, 'partners');

    if($awards || $partners): ?>
      <section id="awards-partners">
        <div class="container">

          <?php if($awards): ?>
            <article class="awards">
              <h2 class="block-font">Awards</h2>
              <ul class="list-unstyled list-inline">
                <?php for($a = 0; $a < $awards; $a++): ?>
                  <li>
                    <?php $awards_image = get_post_meta($page_id, 'awards_' . $a . '_award_image', true); ?>
                    <img src="<?php echo $awards_image['url']; ?>" class="img-responsive center-block" alt="<?php echo $awards_image['title']; ?>" />
                    <p><?php echo esc_html(get_post_meta($page_id, 'awards_' . $a . '_award_description')); ?></p>
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
                    <a href="<?php echo esc_url(get_post_meta($page_id, 'partners_' . $p . '_partner_link')); ?>" target="_blank">
                      <?php $partner_image = get_post_meta($page_id, 'partners_' . $p . '_partner_image', true); ?>
                      <img src="<?php echo $partner_image['url']; ?>" class="img-responsive center-block" alt="<?php echo $partner_image['title']; ?>" />
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