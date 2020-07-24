<?php
$date_today = date('Ymd');
$args = array(
  'post_type' => 'events-trainings',
  'posts_per_page' => 3,
  'meta_query' => array(
    array (
      'key' => 'date',
      'compare' => '>=',
      'value' => $date_today
    )
  ),
  'orderby' => 'meta_value_num',
  'order' => 'asc'
);

$posts = get_posts($args);

if($posts) { ?>
  <section id="upcoming-events">
    <div class="container">
      <h2><?php _e('Upcoming Events', 'tofino'); ?></h2>
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
