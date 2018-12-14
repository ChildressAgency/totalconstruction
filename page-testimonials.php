<?php get_header(); ?>
  <?php $page_id = get_the_ID(); ?>
  <main id="main">
    <div class="container">
      <?php
        if(have_posts()){
          while(have_posts()){
            the_post();
            $content = get_the_content();
            if($content){
              echo '<article>' . wp_kses_post(apply_filters('the_content', $content)) . '</article>';
            }
          }
        }
        else{
          echo '<article><p>Sorry, nothing was found.</p></article>';
        }
      ?>

      <?php
        $testimonials = get_post_meta($page_id, 'testimonials', true);
        if($testimonials):
          for($t = 0; $t < $testimonials; $t++): ?>
            <div class="row testimonial">
              <div class="col-xs-1 col-sm-2<?php echo ($t % 2 == 0) ? '' : ' col-sm-push-10'; ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quotes.png" class="img-responsive center-block" alt="" />
              </div>
              <div class="col-xs-11 col-sm-10<?php echo ($t % 2 == 0) ? '' : ' col-sm-pull-2'; ?>">
                <article>
                  <?php echo esc_html(get_post_meta($page_id, 'testimonials_' . $t . '_testimonial', true)); ?>
                  <footer>
                    <?php $testimonial_author_title = get_post_meta($page_id, 'testimonials_' . $t . '_testimonial_author_title', true); ?>
                    <p><?php echo esc_html(get_post_meta($page_id, 'testimonials_' . $t . '_testimonial_author', true)); ?><?php echo $testimonial_author_title ? '<span>' . esc_html($testimonial_author_title) . '</span>' : ''; ?></p>
                  </footer>
                </article>
              </div>
            </div>
      <?php endfor; endif; ?>
    </div>
  </main>
<?php get_footer(); ?>