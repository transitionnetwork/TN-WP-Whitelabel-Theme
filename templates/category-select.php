<?php if(!($taxonomy)) :
  $taxonomy = 'category';
endif; ?>
<section class="category-select">
  <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
  <?php $args = array(
      'show_option_all'    => 'All',
      'hide_empty'         => 0,
      'taxonomy'           => $taxonomy,
      'hide_if_empty'      => false,
      'value_field'        => 'slug',
      'show_count'         => 1,
      'selected' => get_queried_object()->slug
  ); ?>

  <?php wp_dropdown_categories( $args ); ?>
  <script type="text/javascript">
    var taxonomy = '<?php echo $taxonomy; ?>';
    var dropdown = document.getElementById("cat");
    function onCatChange() {
      if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
        if ( dropdown.options[dropdown.selectedIndex].value == 0 ) {
          if(taxonomy == 'category') {
            location.href = "<?php echo esc_url( home_url( '/blog/' ) ); ?>/";
          }
          if(taxonomy == 'harvesting-category') {
            location.href = "<?php echo esc_url( home_url( '/case-studies/' ) ); ?>/";
          }
        } else {
          location.href = "<?php echo esc_url( home_url( '/'.$taxonomy.'/' ) ); ?>/"+dropdown.options[dropdown.selectedIndex].value;
        }
      }
    }
    dropdown.onchange = onCatChange;
  </script>
</form>
</section>
