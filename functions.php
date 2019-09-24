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
  wp_enqueue_style( 'dr_styles' );
}

 function dr_register_conditional() {

  if ( is_page( 'contact-us' ) ) {

    wp_register_script( 'dr_typeform', 'https://embed.typeform.com/embed.js' , '', '', true );
    wp_enqueue_script( 'dr_typeform' );
  } 
 }

add_action( 'wp_enqueue_scripts', 'dr_register_conditional');
add_action( 'wp_enqueue_scripts', 'dr_enqueue' );