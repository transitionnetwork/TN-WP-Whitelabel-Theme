<?php $front_page_options = get_field('front_page_options', 'option'); ?>

<?php get_header(); ?>
  <?php if(!$front_page_options['hide_hero']) { ?>
    <?php get_template_part('templates/hero-area'); ?>
  <?php } ?>
  <?php if(!$front_page_options['hide_blogs']) { ?>
    <?php get_template_part('templates/latest-blogs'); ?>
  <?php } ?>
  <?php if(!$front_page_options['hide_events']) { ?>
    <?php get_template_part('templates/upcoming-events'); ?>
  <?php } ?>
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
