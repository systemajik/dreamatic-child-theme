<?php

//load shortcodes from individual files
require_once(__DIR__ . '/shortcodes/dr_fusion_image_rollover.php');

//register and enqueue additional styles and scripts

function dr_enqueue(){
  
  $uri = get_theme_file_uri();

  wp_register_style( 'dr_styles' ), $uri . '/css/dreamatic.css' );
  wp_register_script( 'dr_scripts' ), $uri . '/js/dreamatic.js', [], false, true );

  wp_enqueue_style( 'dr_styles' );
  wp_enqueue_script( 'dr_scripts' );
}



