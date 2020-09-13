<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

<?php 
if (has_custom_logo()) {
  the_custom_logo();
} else {
  print '<a href="/">' . bloginfo('name') . '</a>';
}

wp_nav_menu(array(
  'theme_location' => 'primary'
));

?>
  