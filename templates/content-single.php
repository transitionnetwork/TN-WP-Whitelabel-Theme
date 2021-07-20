<main>
  <div class="container text-center">
    <?php if(get_the_post_thumbnail()) : ?>
        <?php the_post_thumbnail('post-lead'); ?>
    <?php endif; ?>
    <div class="post-header">
      <h1><?php echo \Tofino\Helpers\title(); ?></h1>
      <div class="sub">in <?php the_category(','); ?></div>
    </div>
  </div>
  <?php if(get_field('sidebar_text') || get_field('sidebar_items')) : ?>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8">
          <?php get_template_part('templates/flexible-content'); ?>
        </div>
        <div class="col-12 col-md-4">
          <?php get_template_part('templates/sidebar-content'); ?>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="container">
      <?php get_template_part('templates/flexible-content'); ?>
    </div>
  <?php endif; ?>

  <div class="container mt-3">
    <?php get_template_part('comments'); ?>
  </div>
</main>
