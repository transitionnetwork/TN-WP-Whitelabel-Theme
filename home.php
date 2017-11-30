<?php get_header(); ?>

<?php if(get_field('hero_image', get_option('page_for_posts'))['url']) : ?>
  <section class="hero" style="background-image: url(<?php echo get_field('hero_image', get_option('page_for_posts'))['url']; ?>">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8 col-xl-6">
          <h1><?php echo get_field('hero_text', get_option('page_for_posts')); ?></h1>
          <?php if(get_field('hero_button_text', get_option('page_for_posts'))) : ?>
            <a class="btn btn-lg btn-secondary" href="<?php echo get_field('hero_button_link', get_option('page_for_posts')); ?>"><?php echo svg('arrow-right'); ?><?php echo get_field('hero_button_text', get_option('page_for_posts')); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

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
