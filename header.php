<?php
use \Tofino\ThemeOptions\Menu as m;
use \Tofino\ThemeOptions\Notifications as n; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:image" content="<?php echo get_field('logo', 'option')['url']; ?>"/>
  <?php wp_head(); ?>


  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
   integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
   crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"
   integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log=="
   crossorigin=""></script>
  <?php if(get_field('primary_colour', 'options')) : ?>
    <?php get_template_part('templates/custom-css'); ?>
    <?php endif; ?>
</head>
<body <?php body_class(); ?>>
<?php n\notification('top'); ?>

<!--[if lte IE 9]>
  <div class="alert alert-danger browser-warning">
    <p><?php _e('You are using an <strong>outdated</strong> browser. <a href="http://browsehappy.com/">Update your browser</a> to improve your experience.', 'tofino'); ?></p>
  </div>
<![endif]-->
<nav class="navbar navbar-expand-md <?php echo m\menu_headroom(); ?> <?php echo m\menu_sticky(); ?> <?php echo m\menu_position(); ?>">
  <div class="container">
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="bar-wrapper">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </span>
      <span class="sr-only"><?php _e('Toggle Navigation Button', 'tofino'); ?></span>
    </button>
    <div class="row">
      <div class="col-12 col-lg-3 text-center">
        <a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php echo esc_attr(bloginfo('name')); ?>">
          <?php if (get_field('logo', 'option')) : ?>
            <?php $img = get_field('logo', 'option'); ?>
            <img src="<?php echo $img['url']; ?>" title="<?php echo esc_attr(bloginfo('name')); ?>">
          <?php else : ?>
            <?php echo bloginfo('name'); ?>
          <?php endif; ?>
        </a>
      </div>
      <div class="col-12 col-lg-9 d-flex flex-column justify-content-lg-around">
        <div class="row">
          <div class="col-12 d-flex justify-content-center justify-content-lg-end top-half">
            <?php if( have_rows('social_networks', 'options') ): ?>
              <ul class="social-list">
                <?php while ( have_rows('social_networks', 'options') ) : the_row(); ?>
                <li>
                  <a class="<?php the_sub_field('social_network'); ?>" href="<?php the_sub_field('url'); ?>" target="<?php the_sub_field('target_blank'); ?>">
                  <?php echo svg(get_sub_field('social_network')); ?>
                  </a>
                </li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?> 

            <?php if( have_rows('donate', 'options') ) : ?>
              <?php while ( have_rows('donate', 'options') ) : the_row(); ?>
                <?php if(get_sub_field('display')) : ?>
                  <a class="btn btn-primary btn-donate" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('text'); ?></a>
                <?php endif; ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="collapse navbar-collapse" id="main-menu">
              <?php
              if (has_nav_menu('primary_navigation')) :
                wp_nav_menu([
                  'menu'            => 'nav_menu',
                  'theme_location'  => 'primary_navigation',
                  'depth'           => 2,
                  'container'       => '',
                  'container_class' => '',
                  'container_id'    => '',
                  'menu_class'      => 'navbar-nav',
                  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'walker'          => new Tofino\Nav\NavWalker()
                ]);
              endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<?php if (get_theme_mod('footer_sticky') === 'enabled') : ?>
  <div class="wrapper">
<?php endif; ?>
