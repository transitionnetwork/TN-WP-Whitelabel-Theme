<?php
$primary_colour = get_field('primary_colour', 'options');

function darken_color($rgb, $darker=2) {

    $hash = (strpos($rgb, '#') !== false) ? '#' : '';
    $rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
    if(strlen($rgb) != 6) return $hash.'000000';
    $darker = ($darker > 1) ? $darker : 1;

    list($R16,$G16,$B16) = str_split($rgb,2);

    $R = sprintf("%02X", floor(hexdec($R16)/$darker));
    $G = sprintf("%02X", floor(hexdec($G16)/$darker));
    $B = sprintf("%02X", floor(hexdec($B16)/$darker));

    return $hash.$R.$G.$B;
}

$darker = darken_color($primary_colour)
?>
<style>
a {
  color: <?php echo $primary_colour; ?>;
}
ul.navbar-nav li.nav-item a.nav-link:hover {
  background-color: <?php echo $primary_colour; ?>;
}
ul.social-list a {
  background-color: <?php echo $primary_colour; ?>;
}
.btn-primary,
input[type="submit"] {
  background-color: <?php echo $primary_colour; ?>;
}
.btn-secondary {
  border-color: <?php echo $primary_colour; ?>;
  color: <?php echo $primary_colour; ?>;
}
.btn-secondary svg {
  fill: <?php echo $primary_colour; ?>; }
.btn-secondary:hover {
  background-color: <?php echo $primary_colour; ?>;
  border-color: <?php echo $primary_colour; ?>;
}
.flexible-content .quote {
  border-left-color: <?php echo $primary_colour; ?>;
}
.flexible-content .callout {
  background-color: <?php echo $primary_colour; ?>;
}
.flexible-content .faq .card-header a {
  background-color: <?php echo $primary_colour; ?>;
}
.flexible-content .faq .card-header a:hover {
  background-color: <?php echo $primary_colour; ?>;
}

a:hover {
  color: <?php echo $darker; ?>;
}
.btn-primary:hover {
  background-color: <?php echo $darker; ?>;
}
ul.social-list a:hover {
  background-color: <?php echo $darker; ?>;
}
</style>
