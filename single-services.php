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
  $building_types = get_post_meta($service_id, 'types_of_buildings', true);
  if($building_types): ?>
    <section class="types-of-buildings">
      <div class="container">
        <h2>Types of <?php echo esc_html(get_the_title($service_id)); ?></h2>
        <div class="row">
          <?php for($i = 0; $i < $building_types; $i++): ?>
            <?php if($i % 3 == 0){ echo '<div class="clearfix"></div>'; } ?>
            <div class="col-sm-4">
              <article class="building-type-card">
                <?php 
                  $building_type_image_id = get_post_meta($service_id, 'types_of_buildings_' . $i . '_building_image', true); 
                  $building_type_image = wp_get_attachment_image_src($building_type_image_id, 'full');
                  $building_type_image_alt = get_post_meta($building_type_image_id, '_wp_attachment_image_alt', true);
                ?>
                <img src="<?php echo esc_url($building_type_image[0]); ?>" class="img-responsive center-block" alt="<?php echo esc_attr($building_type_image); ?>" />
                <h3><?php echo esc_html(get_post_meta($service_id, 'types_of_buildings_' . $i . '_building_name', true)); ?></h3>
                <p><?php echo esc_html(get_post_meta($service_id, 'types_of_buildings_' . $i . '_building_desctription', true)); ?></p>
              </article>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>