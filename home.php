<?php get_header(); ?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h1 class="page-title"><?php echo \Tofino\Helpers\title(); ?></h1>
        <?php get_template_part('templates/category-select'); ?>
      </div>
    </div>

    <?php
    $posts = get_posts(array(
      'posts_per_page'	=> -1,
      'post_type'			=> 'post'
    ));
    
    if( $posts ): ?>
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
</main>
<?php get_footer(); ?>
