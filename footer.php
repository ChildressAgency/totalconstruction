<?php 
  $contact_page_id = totalconstruction_get_page_id_by_slug('contact');
  $phone = get_post_meta($contact_page_id, 'phone_number');
  $email = get_post_meta($contact_page_id, 'email');
  $street_address = get_post_meta($contact_page_id, 'street_address');
  $city_state_zip = get_post_meta($contact_page_id, 'city_state_zip');
  $facebook = get_post_meta($contact_page_id, 'facebook');
  $google_map = get_post_meta($contact_page_id, 'google_map');
?>
  <section class="contact">
    <div class="container-fluid container-sm-height">
      <div class="row row-sm-height">
        <div class="col-sm-6 col-sm-height icon-side">
          <div class="contact-card">
            <a href="mailto:<?php echo $email; ?>" class="email"><?php echo $email; ?></a>
          </div>
          <div class="contact-card">
            <a href="tel:<?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a>
          </div>
          <div class="contact-card">
            <a href="<?php echo $google_map; ?>" class="address"><?php echo $street_address . '<br />' . $city_state_zip; ?></a>
          </div>
        </div>
        <div class="col-sm-6 col-sm-height contact-form-side" style="background-image:url(<?php echo get_post_meta($contact_page_id, 'contact_form_background_image'); ?>); <?php echo get_post_meta($contact_page_id, 'contact_form_background_image_css'); ?>">
          <?php 
            $contact_form_shortcode = get_post_meta($contact_page_id, 'contact_form_shortcode');
            echo do_shortcode($contact_form_shortcode); ?>
          <div class="contact-side-overlay"></div>
        </div>
      </div>
    </div>
  </section>

  <?php if(is_page('contact')): ?>
    <section id="request-quote">
      <div class="container">
        <?php 
          $request_quote_form_shortcode = get_post_meta($contact_page_id, 'request_quote_form_shortcode');
          echo do_shortcode($request_quote_form_shortcode); ?>
      </div>
    </section>
  <?php endif; ?>

  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <?php
            $logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($logo_id, 'full');
            if(has_custom_logo()): ?>
              <img src="<?php echo esc_url($logo[0]); ?>" class="img-responsive" alt="<?php echo bloginfo('name'); ?> Logo" />
          <?php endif; ?>
        </div>
        <div class="col-sm-6">
          <?php 
            $footer_nav_args = array(
              'theme_location' => 'footer-nav',
              'menu' => '',
              'container' => 'nav',
              'container_id' => 'footer-nav',
              'container_class' => '',
              'menu_id' => '',
              'menu_class' => 'nav nav-justified',
              'echo' => true,
              'fallback_cb' => 'totalconstruction_footer_fallback_menu',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 1,
            );
            wp_nav_menu($footer_nav_args);
          ?>
        </div>
        <div class="col-sm-3">
          <div class="social">
            <?php if($facebook): ?>
              <a href="<?php echo $facebook; ?>" class="facebook text-hide">Facebook</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="copyright">
        <p>&copy; <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?></p>
        <p>website created by <a href="https://childressagency.com" target="_blank">The Childress Agency</a></p>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>

</html>