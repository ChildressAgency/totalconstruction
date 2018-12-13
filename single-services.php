<?php get_header(); ?>
<?php $service_id = get_the_ID(); ?>
<main id="main">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-md-3">
        <?php
          $service_ids = new WP_Query(array(
            'post_type' => 'services',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'fields' => 'ids'
          ));

          if($service_ids->have_posts()): ?>
            <nav class="services-nav hidden-xs">
              <ul class="list-unstyled">
                <?php while($service_ids->have_posts()): $service_ids->the_post(); ?>
                  <li <?php echo get_the_ID() == $service_id ? ' class="active"' : ''; ?>>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </li>
                <?php endwhile; ?>
              </ul>
            </nav>
        <?php endif; wp_reset_postdata(); ?>
        <h2 class="service-title visible-xs-block"><?php get_the_title($service_id); ?></h2>
      </div>
      <div class="col-sm-8 col-md-9">
        <?php if(have_posts()): ?>
          <article class="service">
            <?php while(have_posts()): the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; ?>
          </article>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>

<?php 
  $building_types = get_post_meta($service_id, 'buildings_types', true);
  if($building_types): ?>
    <section class="types-of-buildings">
      <div class="container">
        <h2>Types of <?php echo get_the_title($service_id); ?></h2>
        <div class="row">
          <?php for($i = 0; $i < $building_types; $i++): ?>
            <?php if($i % 3 == 0){ echo '<div class="clearfix"></div>'; } ?>
            <div class="col-sm-4">
              <article class="building-type-card">
                <?php $building_type_image = get_post_meta($service_id, 'building_types_' . $i . '_building_type_image'); ?>
                <img src="<?php echo $building_type_image['url']; ?>" class="img-responsive center-block" alt="<?php echo $building_type_image['title']; ?>" />
                <h3><?php echo esc_html(get_post_meta($service_id, 'building_types_' . $i . '_building_type_title')); ?></h3>
                <p><?php echo esc_html(get_post_meta($service_id, 'building_types_' . $i . '_building_type_description')); ?></p>
              </article>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>