<?php


//setup
define( 'DR_DEV_MODE', true );



//load shortcodes from individual files
require_once(__DIR__ . '/shortcodes/dr_fusion_image_rollover.php');

//register and enqueue additional styles and scripts

function dr_enqueue(){
  
  $uri = get_theme_file_uri();
  $ver = DR_DEV_MODE ? time() : false;

  wp_register_style( 'dr_styles', $uri . '/css/dreamatic.css', [], $ver );
  wp_register_script( 'dr_scripts', $uri . '/js/dreamatic.js', [ 'jquery' ], $ver, true );
  wp_register_script( 'jquery_latest', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', [ 'jquery' ], $ver, true);

  wp_enqueue_style( 'dr_styles' );
  wp_enqueue_script( 'dr_scripts' );
  wp_enqueue_script('jquery_latest');
}

//hooks

add_action( 'wp_enqueue_scripts', 'dr_enqueue' );

//test