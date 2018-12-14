<?php get_header(); ?>
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
  </div>
</main>
<?php get_footer(); ?>