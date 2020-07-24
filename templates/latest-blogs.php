<?php
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 3
);

$posts = get_posts($args);

if($posts) { ?>
  <section id="latest-posts">
    <div class="container">
      <h2><?php _e('Latest Blog Posts', 'tofino'); ?></h2>
      <div class="row">
        <?php foreach($posts as $post) {
          setup_postdata( $post ); ?>
          <div class="col-12 col-sm-6 col-md-4 post-preview">
            <?php get_template_part('templates/post-list'); ?>
          </div>
        <?php } ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php } ?>
