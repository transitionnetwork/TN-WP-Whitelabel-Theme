<?php

/**
 * Config array
 */
$svg_url       = get_template_directory_uri() . '/dist/svg/sprite.symbol.svg';
$svg_file_path = get_template_directory() . '/dist/svg/sprite.symbol.svg';

$theme_config = [
  'svg' => ['sprite_file' => $svg_url . '?v=' . filemtime($svg_file_path)]
];


/**
 * Tofino includes
 *
 * The $tofino_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed.
 *
 * Missing files will produce a fatal error.
 *
 */
$tofino_includes = [
  'src/data-tables/contact-form-data.php',
  "src/forms/contact-form.php",
  "src/lib/nav-walker.php",
  "src/lib/init.php",
  "src/lib/assets.php",
  "src/lib/helpers.php",
  "src/lib/pagination.php",
  "src/shortcodes/copyright.php",
  "src/shortcodes/social-icons.php",
  "src/shortcodes/svg.php",
  "src/shortcodes/theme-option.php",
  "src/theme-options/admin.php",
  "src/theme-options/advanced.php",
  "src/theme-options/client-data.php",
  "src/theme-options/footer.php",
  "src/theme-options/google-analytics.php",
  "src/theme-options/google-recaptcha.php",
  "src/theme-options/init.php",
  "src/theme-options/maintenance-mode.php",
  "src/theme-options/menu.php",
  "src/theme-options/notifications.php",
  "src/theme-options/social-networks.php",
  "src/theme-options/theme-tracker.php",
  "src/theme-options/dashboard-widget.php",
];

foreach ($tofino_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'tofino'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);


/**
 * Composer dependencies
 *
 * External dependencies are defined in the composer.json and autoloaded.
 * Use 'composer dump-autoload -o' after adding new files.
 *
 */
if (file_exists(get_template_directory() . '/vendor/autoload.php')) { // Check composer autoload file exists. Result is cached by PHP.
  require_once 'vendor/autoload.php';
} else {
  if (is_admin()) {
    add_action('admin_notices', 'composer_error_notice');
  } else {
    wp_die(composer_error_notice(), __('An error occured.', 'tofino'));
  }
}

// Check for missing dist directory. Result is cached by PHP.
if (!is_dir(get_template_directory() . '/dist')) {
  if (is_admin()) {
    add_action('admin_notices', 'missing_dist_error_notice');
  } else {
    wp_die(missing_dist_error_notice(), __('An error occured.', 'tofino'));
  }
}

// Admin notice for missing composer autoload.
function composer_error_notice() {
?><div class="error notice">
    <p><?php _e('Composer autoload file not found. Run composer install on the command line.', 'tofino'); ?></p>
  </div><?php
}

// Admin notice for missing dist directory.
function missing_dist_error_notice() {
?><div class="error notice">
    <p><?php _e('/dist directory not found. You probably want to run npm install and gulp on the command line.', 'tofino'); ?></p>
  </div><?php
}

function custom_post_types() {
  $args = array(
    'public' => true,
    'label'  => 'Harvesting',
    'supports' => array('title','thumbnail')
  );
  register_post_type( 'harvesting', $args );
  
  $args = array(
    'public' => true,
    'label'  => 'Pilots',
    'supports' => array('title','thumbnail')
  );
  register_post_type( 'pilots', $args );
  
  $args = array(
    'public' => true,
    'label'  => 'The Pioneers',
    'supports' => array('title','thumbnail')
  );
  register_post_type( 'pioneers', $args );

  $args = array(
    'public' => true,
    'label'  => 'Events/Trainings',
    'supports' => array('title','thumbnail')
  );
  register_post_type( 'events-trainings', $args );

  $args = array(
    'public' => true,
    'label'  => 'Custom Sidebar Boxes',
    'supports' => array('title','thumbnail', 'editor')
  );
  register_post_type( 'boxes', $args );
}
add_action( 'init', 'custom_post_types' );


function custom_taxonomies() {
  register_taxonomy(
    'harvesting-category',
    'harvesting',
    array(
      'label' => __( 'Harvesting Categories' ),
      'rewrite' => array( 'slug' => 'harvesting-category' ),
      'hierarchical' => true,
    )
  );
}
add_action( 'init', 'custom_taxonomies' );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Municipalities Options');
}

add_action( 'after_setup_theme', 'image_sizes' );
function image_sizes() {
    add_image_size( 'post-preview', 400, 200, true );
    add_image_size( 'post-lead', 1500, 500, true );
}


// Get words
function get_words($sentence, $count = 10) {
  $sentence = strip_tags($sentence);
  $sentence = implode(' ', array_slice(explode(' ', $sentence), 0, $count));
  return $sentence.'...';
}

function generate_map($lat, $lng) { ?>
  <script>
  var map = L.map('map', {
    center: [<?php echo $lat; ?>, <?php echo $lng; ?>],
    zoom: 5,
    scrollWheelZoom: false
  });
  
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);
  
  L.marker([<?php echo $lat; ?>, <?php echo $lng; ?>]).addTo(map)
      .bindPopup('<?php echo get_the_title(); ?>')
      .openPopup();

  map.once('focus', function() { map.scrollWheelZoom.enable(); });
</script>
<?php }


function click_taxonomy_dropdown($taxonomy) { ?>
	<form action="/" method="get">
	<select name="cat" id="cat" class="postform">
	<option value="-1">Choose one...</option>
	<?php
	$terms = get_terms($taxonomy);
	foreach ($terms as $term) {
		printf( '<option class="level-0" value="%s">%s</option>', $term->slug, $term->name );
	}
	echo '</select></form>';
	?>
<?php }


function display_mailchimp_form() {
  ob_start();
  get_template_part('/templates/partials/mailchimp-footer');
  return ob_get_clean();
}

function register_shortcodes(){
  add_shortcode('mailchimp-widget', 'display_mailchimp_form');
}
add_action( 'init', 'register_shortcodes');


function km_add_unfiltered_html_capability_to_editors( $caps, $cap, $user_id ) {
  if ( 'unfiltered_html' === $cap && user_can( $user_id, 'administrator' ) ) {
    $caps = array( 'unfiltered_html' );
  }
 
  return $caps;
 }
 add_filter( 'map_meta_cap', 'km_add_unfiltered_html_capability_to_editors', 1, 3 );
