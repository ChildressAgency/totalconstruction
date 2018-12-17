<?php get_header(); ?>
<main id="main">
  <div class="container">
    <?php
      $services_id_query = new WP_Query(array(
        'post_type' => 'services',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'fields' => 'ids'
      ));

      if($services_id_query->have_posts()):
        $services_ids = $services_id_query->posts; ?>

        <div class="gallery-nav">
          <select id="gallery-nav" class="form-control">
            <option value="all">All</option>
            <?php 
              foreach($services_ids as $services_id){
                $service_title = get_the_title($services_id);
                echo '<option value="' . sanitize_title($service_title) . '">' . $service_title . '</option>';
              }
              reset($services_ids);
            ?>
          </select>
        </div>

        <div class="gallery-main">
          <?php
            foreach($services_ids as $services_id):
              $service_title = get_the_title($services_id);
              $gallery_images = totalconstruction_get_gallery_images($services_id); 
              if($gallery_images):
              foreach($gallery_images as $gallery_image): ?>
                
                <a href="<?php echo esc_url($gallery_image['image_url']); ?>" class="all <?php echo sanitize_title($service_title); ?>" data-lightbox="main-img" data-title="<?php echo esc_html($gallery_image['image_caption']); ?>">
                  <img src="<?php echo esc_url($gallery_image['image_url']); ?>" alt="<?php echo esc_html($gallery_image['image_alt']); ?>" />
                </a>

            <?php endforeach; endif; ?>
          <?php endforeach; reset($services_ids); ?>
        </div>

        <div class="gallery">
          <?php 
            foreach($services_ids as $services_id):
              $service_title = get_the_title($services_id);
              $gallery_images = totalconstruction_get_gallery_images($services_id);
              if($gallery_images):
              foreach($gallery_images as $gallery_image): ?>

                <div class="gallery-img all <?php echo sanitize_title($service_title); ?>">
                  <img src="<?php echo esc_url($gallery_image['image_url']); ?>" alt="<?php echo esc_html($gallery_image['image_alt']); ?>" />
                </div>

            <?php endforeach; endif; ?>
          <?php endforeach; ?>
        </div>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>