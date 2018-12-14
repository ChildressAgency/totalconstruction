<?php

add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'totalconstruction_scripts');
function totalconstruction_scripts(){
  wp_register_script(
    'bootstrap-script', 
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', 
    array('jquery'), 
    '', 
    true
  );

  wp_register_script(
    'slick-js',
    '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.9.0/slick/slick.min.js',
    array('jquery'),
    '',
    true
  );

  wp_register_script(
    'totalconstruction-scripts', 
    get_template_directory_uri() . '/js/totalconstruction-scripts.js',
    array('jquery'), 
    '', 
    true
  ); 
  
  wp_enqueue_script('bootstrap-script');
  if(is_page('gallery')){
    wp_enqueue_script('slick-js');
  }
  wp_enqueue_script('totalconstruction-scripts'); 
}

add_action('wp_enqueue_scripts', 'totalconstruction_styles');
function totalconstruction_styles(){
  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_register_style('slick-css', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.9.0/slick/slick.css');
  wp_register_style('totalconstruction', get_template_directory_uri() . '/style.css');
  
  wp_enqueue_style('bootstrap-css');
  wp_enqueue_style('slick-css');
  wp_enqueue_style('totalconstruction'); 
}

add_action('after_setup_theme', 'totalconstruction_setup');
function totalconstruction_setup(){
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');

  register_nav_menus(array(
    'header-nav' => 'Header Navigation',
    'footer-nav' => 'Footer Navigation'
  ));
}

require_once dirname(__FILE__) . '/includes/class-wp_bootstrap_navwalker.php';

function totalconstruction_header_fallback_menu(){ ?>
  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
      <li <?php if(is_front_page()){ echo ' class="active"'; } ?>><a href="<?php echo home_url(); ?>">Home</a></li>
      <li <?php if(is_page('about')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('about'); ?>">About</a></li>
      <li <?php if(is_page('services')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('services'); ?>">Services</a></li>
      <li <?php if(is_page('gallery')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('gallery'); ?>">Gallery</a></li>
      <li <?php if(is_page('testimonials')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('testimonials'); ?>">Testimonials</a></li>
      <li <?php if(is_page('contact')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('contact'); ?>">Contact</a></li>
    </ul>
  </div>
<?php
}

function totalconstruction_footer_fallback_menu(){ ?>
  <nav id="footer-nav">
    <ul class="nav nav-justified">
      <li><a href="<?php echo home_url(); ?>">Home</a></li>
      <li><a href="<?php echo home_url('about'); ?>">About</a></li>
      <li><a href="<?php echo home_url('services'); ?>">Services</a></li>
      <li><a href="<?php echo home_url('contact'); ?>">Contact</a></li>
    </ul>
  </nav>
<?php
}

function totalconstruction_get_page_id_by_slug($slug){
  $page = get_page_by_path($slug);
  if($page){
    return $page->ID;
  }
  else{
    return null;
  }
}

/*
  Returns acf background image url and css
  $field = acf field name
*/
function totalconstruction_get_bg_img_and_css($page_id, $field){
  $bg_img_and_css = [];
  $bg_img_id = get_post_meta($page_id, $field, true);
  $bg_img = wp_get_attachment_image_src($bg_img_id, 'full');
  $bg_img_and_css['image_url'] = $bg_img[0];

  $bg_img_css = get_post_meta($page_id, $field . '_css', true);
  $bg_img_and_css['image_css'] = $bg_img_css;

  return $bg_img_and_css;
}