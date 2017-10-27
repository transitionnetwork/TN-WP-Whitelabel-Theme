<?php
use \Tofino\ThemeOptions\Notifications as n;

if (get_theme_mod('footer_sticky') === 'enabled') : ?>
  </div>
<?php endif; ?>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-2 text-center">
        <a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php echo esc_attr(bloginfo('name')); ?>">
          <?php if (get_field('logo', 'option')) : ?>
            <?php $img = get_field('logo', 'option'); ?>
            <img src="<?php echo $img['url']; ?>" title="<?php echo esc_attr(bloginfo('name')); ?>">
          <?php else : ?>
            <?php echo bloginfo('name'); ?>
          <?php endif; ?>
        </a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<?php n\notification('bottom'); ?>
</body>
</html>
