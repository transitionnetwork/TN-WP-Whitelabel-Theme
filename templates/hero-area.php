
<section class="hero<?php echo (get_field('hero_contain_image')) ? ' contain' : ' cover'; ?>">
  <img src="<?php echo get_field('hero_image')['url']; ?>">
  <?php if(get_field('hero_overlay')) { ?>
    <div class="overlay" style="background-color: rgba(255, 255, 255, <?php echo get_field('hero_overlay') / 100; ?>);"></div>
  <?php } ?>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8 col-xl-6">
          <h1><?php echo get_field('hero_text'); ?></h1>
          <?php if(get_field('hero_button_text')) : ?>
            <a class="btn btn-lg btn-secondary" href="<?php echo get_field('hero_button_link'); ?>"><?php echo svg('arrow-right'); ?><?php echo get_field('hero_button_text'); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
