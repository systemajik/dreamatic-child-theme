<?php


//setup
define( 'DR_DEV_MODE', true );



//load shortcodes from individual files
require_once(__DIR__ . '/shortcodes/dr_fusion_image_rollover.php');
require_once(__DIR__ . '/shortcodes/dr_fusion_footer.php');
require_once(__DIR__ . '/shortcodes/dr_fusion_profile.php');
require_once(__DIR__ . '/shortcodes/dr_fusion_box.php');
require_once(__DIR__ . '/shortcodes/dr_fusion_number_box.php');
require_once(__DIR__ . '/shortcodes/dr_fusion_testimonial_box.php');
require_once(__DIR__ . '/shortcodes/dr_fusion_services_box.php');
require_once(__DIR__ . '/shortcodes/dr_fusion_benefits.php');





//register and enqueue additional styles and scripts

function dr_enqueue(){
  
  $uri = get_theme_file_uri();
  $ver = DR_DEV_MODE ? time() : false;

  wp_register_style( 'dr_styles', $uri . '/css/dreamatic.css', [], $ver );
  wp_register_script( 'dr_scripts', $uri . '/js/dreamatic.js', [], $ver, true );
  wp_register_script( 'dr_typeform', 'https://public-assets.typeform.com/confab/embed.js', [], $ver, true);

  wp_enqueue_style( 'dr_styles' );
  wp_enqueue_script( 'dr_scripts' );
  wp_enqueue_script( 'dr_typeform');
}

//hooks

add_action( 'wp_enqueue_scripts', 'dr_enqueue' );

//test