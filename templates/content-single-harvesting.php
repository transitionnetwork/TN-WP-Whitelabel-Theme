<?php
if( have_rows('geoloc') ):
  while ( have_rows('geoloc') ) : the_row();
    $lat = get_sub_field('lat');
    $lng = get_sub_field('lng');
  endwhile;
endif; ?>

<?php if($lat && $lng) : ?>
  <div id="map"></div>
  <main>
<?php else : ?>
  <main>
  <?php if(get_the_post_thumbnail()) : ?>
    <div id="lead-image">
      <div class="container">
        <?php the_post_thumbnail('post-lead'); ?>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>
  <div class="container text-center">
    <div class="post-header">
      <h1><?php echo \Tofino\Helpers\title(); ?></h1>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8">
        <?php get_template_part('templates/flexible-content'); ?>
      </div>
      <div class="col-12 col-md-4">
        <?php if (get_field('date') || get_field('ticket_link')) : ?>
          <div class="side-item">
            <h3>Event Details</h3>
            <ul>
              <?php if (get_field('date')) : ?>
                <li><?php echo get_field('date'); ?></li>
              <?php endif; ?>
              <?php if (get_field('time')) : ?>
                <li><?php echo get_field('time'); ?></li>
              <?php endif; ?>
              <?php if (get_field('ticket_link')) : ?>
                <li><a href="<?php echo get_field('ticket_link'); ?>" class="btn btn-secondary" target="_blank"><?php echo svg('arrow-right'); ?><?php echo get_field('book_button_text', 'options'); ?></a></li>
              <?php endif; ?>
            </ul>
          </div>
        <?php endif; ?>
        <?php if (get_field('address')) : ?>
          <div class="side-item">
            <h3>Address</h3>
            <?php echo get_field('address'); ?>
          </div>
        <?php endif; ?>
        <?php if (get_field('contact')) : ?>
          <div class="side-item">
            <h3>Contact</h3>
            <?php echo get_field('contact'); ?>
          </div>
        <?php endif; ?>
        <?php get_template_part('templates/sidebar-content'); ?>
      </div>
    </div>
  </div>
</main>

<?php generate_map($lat, $lng); ?>
