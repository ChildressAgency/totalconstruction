<?php get_header(); ?>
  <section id="hp-hero" class="hero" style="background-image:url(<?php the_field('hero_background_image'); ?>); <?php the_field('hero_background_image_css'); ?>">
    <div class="container">
      <div class="hero-caption">
        <h1><?php the_field('hero_caption'); ?></h1>
        <div class="inline-btns">
          <?php 
            $button_one = get_field('button_one'); 
            $button_two = get_field('button_two');
            if($button_one): ?>
              <a href="<?php echo $button_one['url']; ?>" class="btn-main"><?php echo $button_one['title']; ?></a>
          <?php endif; if($button_two): ?>
            <a href="<?php echo $button_two['url']; ?>" class="btn-main"><?php echo $button_two['title']; ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="bg-overlay"></div>
  </section>

  <section id="hp-services">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="service-card">
            <img src="images/empty-warehouse.jpg" class="img-responsive center-block" alt="Empty Warehouse" />
            <div class="service-card-caption">
              <h2>Pre-Engineered Metal Buildings</h2>
              <p>Pre-Engineered Metal Buildings are a great solution for modern building projects. They are quick to install, durable, cost efficient and customizable.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="service-card">
            <img src="images/warehouse-outside.jpg" class="img-responsive center-block" alt="Front of building" />
            <div class="service-card-caption">
              <h2>General Contracting</h2>
              <p>Total Construction Services, Inc. is a full-service general contractor. Our organization and communication skills ensure that projects are completed on schedule and to your satisfaction.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="service-card">
            <img src="images/barn.jpg" class="img-responsive center-block" alt="Pole Barn" />
            <div class="service-card-caption">
              <h2>Pole Barns</h2>
              <p>Pole Barns are versatile buildings that are built using a technique called post-frame construction, which refers to highly engineered wood-framed buildings that can be built with a variety of exterior options and design flexibility.</p>
            </div>
          </div>
        </div>
      </div>
      <a href="#" class="btn-main">Our Services</a>
    </div>
  </section>

  <section id="hp-about" style="background-image:url(images/storage-building.jpg); background-position:center center;">
    <div class="container">
      <div class="hp-about">
        <p><span class="block-font">TOTAL CONSTRUCTION SERVICES, INC.</span> is a general contractor specializing in the design and construction of pre-engineered metal buildings. We are proud to be an authorized dealer/builder for American Buildings and Ceco Building Systems, two fo the leading metal building suppliers in the country.</p>
        <a href="#" class="btn-main btn-alt">About Us</a>
      </div>
    </div>
  </section>

  <section id="hp-guarantees">
    <div class="container">
      <article>
        <h2>Our Guarantees to get the Job Done Right</h2>
        <p>We pride ourselves on the values we apply everyday to every job to make sure we provide our customers with the highest quality product.</p>
      </article>
      <div class="row badges">
        <div class="col-sm-3">
          <div class="badge">
            <img src="images/ribbon-hex-icon.png" class="img-responsive center-block" alt="Quality Craftsmanship Badge" />
            <h3>Quality Craftsmanship</h3>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="badge">
            <img src="images/clock-hex-icon.png" class="img-responsive center-block" alt="On Schedule Badge" />
            <h3>On Schedule</h3>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="badge">
            <img src="images/checkmark-hex-icon.png" class="img-responsive center-block" alt="Honest & Reliable Badge" />
            <h3>Honest & Reliable</h3>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="badge">
            <img src="images/calculator-hex-icon.png" class="img-responsive center-block" alt="Great Value Badge" />
            <h3>Great Value</h3>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="hp-service-areas" style="background-image:url(images/unfinished-roof.jpg); background-position:center center;">
    <div class="container">
      <div class="service-areas">
        <img src="images/virginia.png" class="img-responsive center-block" alt="Virginia" />
        <div class="service-areas-caption">
          <h3>Our Service Areas</h3>
          <p>Happy to be serving Northern Virginia and the surrounding areas of Fredericksburg and Richmond.</p>
        </div>
      </div>
    </div>
    <div class="bg-overlay"></div>
  </section>
<?php get_footer(); ?>