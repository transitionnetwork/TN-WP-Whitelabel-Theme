<?php get_header(); ?>
<?php $category = get_the_category()[0]; ?>
<?php //var_dump($category); ?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h1 class="page-title">Blog: <?php echo $category->name; ?></h1>
        <?php get_template_part('templates/category-select'); ?>
      </div>
    </div>

    <?php
    $posts = get_posts(array(
      'posts_per_page' => -1,
      'post_type' => 'post',
      'category'  => $category->term_id
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
