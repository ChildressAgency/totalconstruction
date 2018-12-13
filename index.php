<?php get_header(); ?>
<main id="main">
  <div class="container">
    <article>
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; else: ?>
        <p>Sorry, nothing was found.</p>
      <?php endif; ?>
    </article>
  </div>
</main>
<?php get_footer(); ?>