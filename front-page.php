<?php get_header(); ?>
  <?php get_template_part('templates/hero-area'); ?>
  <?php get_template_part('templates/latest-blogs'); ?>
  <?php get_template_part('templates/upcoming-events'); ?>
  <div class="container">
    <main>
      <?php get_template_part('templates/flexible-content'); ?>
    </main>
  </div>
  <?php $posts = get_field('related_posts'); ?>
  <?php if( $posts ): ?>
    <section id="home-callouts">
      <div class="container">
        <h2><?php _e('Recommended'); ?></h2>
        <div class="row">
        <?php foreach( $posts as $post ): 
        setup_postdata( $post ); ?>
          <div class="col-12 col-sm-6 col-md-4 post-preview">
            <?php get_template_part('templates/post-list'); ?>
          </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </section>
  <?php endif; ?>
<?php get_footer(); ?>
