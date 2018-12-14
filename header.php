<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title><?php echo bloginfo('name'); ?></title>

  <?php wp_head(); ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>
  <section id="header">
    <div class="masthead">
      <div class="container-fluid">
        <div class="phone-email">
          <?php 
            $contact_page_id = totalconstruction_get_page_id_by_slug('contact');
            $phone = get_post_meta($contact_page_id, 'phone_number', true);
            $email = get_post_meta($contact_page_id, 'email', true);
            $facebook = get_post_meta($contact_page_id, 'facebook', true);
          ?>
          <a href="tel:<?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a>
          <br class="visible-xs" />
          <a href="mailto:<?php echo $email; ?>" class="email"><?php echo $email; ?></a>
        </div>
        <div class="social-quote">
          <?php if($facebook): ?>
            <a href="<?php echo esc_url($facebook); ?>" class="facebook text-hide">Facebook</a>
        <?php endif; ?>
          <a href="<?php echo home_url('contact'); ?>" class="request-quote">Request a Quote</a>
        </div>
      </div>
    </div>

    <nav id="header-nav">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo home_url(); ?>" class="header-logo">
            <?php
              $logo_id = get_theme_mod('custom_logo');
              $logo = wp_get_attachment_image_src($logo_id, 'full');
              if(has_custom_logo()): ?>
                <img src="<?php echo esc_url($logo[0]); ?>" class="img-responsive" alt="<?php echo bloginfo('name'); ?> Logo" />
            <?php endif; ?>
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <?php 
          $header_nav_args = array(
            'theme_location' => 'header-nav', 
            'menu' => '',
            'container' => 'div',
            'container_id' => 'navbar',
            'container_class' => 'navbar-collapse collapse',
            'menu_id' => '',
            'menu_class' => 'nav navbar-nav navbar-right',
            'echo' => true,
            'fallback_cb' => 'totalconstruction_header_fallback_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new wp_bootstrap_navwalker()
          );
          wp_nav_menu($header_nav_args);
        ?>
      </div>
    </nav>
  </section>

  <div id="quick-link-tab">
    <a href="<?php echo home_url('contact'); ?>" class="quick-link-item quick-link-quote">Request a Quote</a>
    <a href="mailto:<?php echo $email; ?>" class="quick-link-item quick-link-email">Email Us</a>
    <a href="tel:<?php echo $phone; ?>" class="quick-link-item quick-link-call">Call Us</a>
  </div>

  <?php if(!is_front_page()): ?>
    <header class="page-title">
      <div class="container">
        <?php
          if(is_singular('services')){
            echo '<h1>Services</h1>';
          }
          else{
            echo '<h1>' . get_the_title() . '</h1>';
          }
        ?>
      </div>
    </header>
  <?php endif; ?>