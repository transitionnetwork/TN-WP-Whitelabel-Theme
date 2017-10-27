<?php get_header(); ?>
  <?php get_template_part('templates/hero-area'); ?>
  <div class="container">
    <main>
      <?php get_template_part('templates/flexible-content'); ?>
    </main>
  </div>
  <section class="home-callouts">
    <div class="container">
      <?php $posts = get_field('related_posts'); ?>
      <?php if( $posts ): ?>
        <div class="row">
        <?php foreach( $posts as $post ): 
        setup_postdata( $post ); ?>
          <div class="col-12 col-sm-6 col-md-4">
            <?php get_template_part('templates/post-list'); ?>
          </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </section>
<?php get_footer(); ?>
