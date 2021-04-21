<?php
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
    'label'  => 'Tutors',
    'supports' => array('title','thumbnail')
  );
  register_post_type( 'tutors', $args );

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
