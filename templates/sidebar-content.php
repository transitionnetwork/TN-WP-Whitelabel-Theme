<div class="sidebar">
  <?php if(get_field('sidebar_text')) : ?>
    <?php the_field('sidebar_text'); ?>
  <?php endif; ?>
  <?php if(get_field('sidebar_items')) : ?>
    <?php $posts = get_field('sidebar_items'); ?>
    <?php if( $posts ): ?>
      <div class="row">
      <?php foreach( $posts as $post ): 
      setup_postdata( $post ); ?>
        <div class="col-12">
          <?php get_template_part('templates/post-list'); ?>
        </div>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  <?php endif; ?>
</div>

