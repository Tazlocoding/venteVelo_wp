<?php 

//---------------FONCTIONNALITES DU THEME 

add_theme_support( 'title-tag');
add_theme_support ('custom-logo', array (
  'height' => 120,
  'width'  => 200,
));

add_theme_support('post-thumbnails');

//---------------------------EMPLACEMENT DU MENU

function custom_menus(){

  register_nav_menus(
    array(
      'primary' => 'Primary menu',
      'secondary' => 'Secondary menu',
      'tertiary' => 'Tertiary menu'
    )
  );
}

add_action( 'init', 'custom_menus' );

?>