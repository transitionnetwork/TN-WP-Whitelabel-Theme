<?php $object = get_queried_object();
if($object->taxonomy == 'harvesting-category') :
  $term_id = $object->term_id;
endif; ?>

<div id="map"></div>
<script>
  var map = L.map("map");
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);
  map.setView([0, 0,], 5);
  var fg = L.featureGroup().addTo(map);

  map.once('focus', function() { map.scrollWheelZoom.enable(); });
</script>

<main>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h1 class="page-title"><?php echo \Tofino\Helpers\title(); ?></h1>
        <?php $taxonomy = 'harvesting-category'; ?>
        <?php include(locate_template('templates/category-select.php')); ?>
      </div>
    </div>

    <?php
    if($object->taxonomy == 'harvesting-category') :
      $posts = get_posts(array(
        'posts_per_page'	=> -1,
        'post_type'			=> 'harvesting',
        'tax_query' => array(
          array(
            'taxonomy' => 'harvesting-category',
            'field' => 'term_id',
            'terms' => $term_id
          )
        )
      ));
    else :
        $posts = get_posts(array(
          'posts_per_page'	=> -1,
          'post_type'			=> 'harvesting'
        ));
    endif;
    
    if( $posts ): ?>
      <div class="row">
      <?php $count = count($posts); ?>
      <?php foreach( $posts as $post ): 
      setup_postdata( $post ); ?>
        <div class="col-12 col-sm-6 col-md-4">
          <?php get_template_part('templates/post-list'); ?>
        </div>
        <?php
        if( have_rows('geoloc') ):
          while ( have_rows('geoloc') ) : the_row();
            $lat = get_sub_field('lat');
            $lng = get_sub_field('lng');
          endwhile;
        endif; ?>
        <script>
          L.marker([<?php echo $lat; ?>, <?php echo $lng; ?>]).addTo(fg).bindPopup('<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>');
        </script>
      <?php endforeach; ?>
      <script>
        <?php if($count == 1) : ?>
            map.setView(new L.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>), 6);
        <?php else : ?>
          setTimeout(function () {
            map.fitBounds(fg.getBounds());
          }, 100);
        <?php endif; ?>
      </script>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</main>
