<?php $post_type = (get_post_type()); ?>
<div class="post-item">
  <?php if(get_the_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(null, 'post-preview'); ?>" title="<?php echo get_the_title(); ?>"></a>
  <?php endif; ?>
  <div class="content">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php if($post_type == 'post') : ?>
      <?php if(get_the_date()) : ?>
        <div class="date"><?php the_date(); ?></div>
      <?php endif; ?>
      <div class="sub">in <?php the_category(','); ?></div>
    <?php elseif($post_type == 'events-trainings') : ?>
      <div class="sub">
        <?php echo (get_field('date')) ? get_field('date') : ''; ?>
        <?php echo (get_field('time')) ? '<br/>at '.get_field('time') : ''; ?>
      </div>
    <?php elseif($post_type == 'harvesting') : ?>
      <div class="sub">
        <?php echo get_the_term_list( $post->ID, 'harvesting-category', 'In ', ', ', '' ); ?> 
      </div>
    <?php endif; ?>
    <?php
    if( have_rows('flexible_content') ):
      while ( have_rows('flexible_content') ) : the_row();
        if( get_row_layout() == 'text' ): ?>
          <p><?php echo get_words(get_sub_field('text')); ?></p>
        <?php break;
        endif;
      endwhile;
    endif; ?>
    <?php if($post_type == 'boxes') : ?>
      <?php the_content(); ?>
    <?php endif; ?>
    <a href="<?php the_permalink(); ?>">Read More</a>
  </div>
</div>
