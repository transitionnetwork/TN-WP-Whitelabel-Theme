<?php
use \Tofino\ThemeOptions\Notifications as n;

if (get_theme_mod('footer_sticky') === 'enabled') : ?>
  </div>
<?php endif; ?>

<footer>
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-12 col-lg-6 text-center text-lg-left d-flex align-items-center justify-content-center justify-content-lg-start">
        <a class="footer-logo" href="<?php echo home_url(); ?>" title="<?php echo esc_attr(bloginfo('name')); ?>">
          <?php if (get_field('logo', 'option')) : ?>
            <?php $img = get_field('logo', 'option'); ?>
            <img src="<?php echo $img['url']; ?>" title="<?php echo esc_attr(bloginfo('name')); ?>">
          <?php else : ?>
            <?php echo bloginfo('name'); ?>
          <?php endif; ?>
        </a>
        
        <?php $footer_logos = get_field('footer_logo', 'options'); ?>
        <?php if($footer_logos && is_array($footer_logos)) { ?>
          <?php foreach($footer_logos as $logo) { ?>
            <a class="footer-logo" href="<?php echo $logo['link']; ?>"><img src="<?php echo $logo['image']['sizes']['medium']; ?>"></a>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="col-12 col-lg-6 text-center text-lg-right">
        <?php if(get_field('mailchimp_embed_active', 'option')) { ?>
          <?php get_template_part('/templates/partials/mailchimp-footer'); ?>
        <?php } ?>
      </div>
    </div>
    <div class="text-center pt-3">
      <p><small>Theme by <a href="https://www.transitionnetwork.org" target="_blank">transitionnetwork.org</a></small></p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<?php n\notification('bottom'); ?>
</body>
</html>
