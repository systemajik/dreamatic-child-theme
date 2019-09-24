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
    ?>
    <script>(function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm", b="https://embed.typeform.com/"; if(!gi.call(d,id)) { js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })()</script>
  <?php
  } 
 }

add_action( 'wp_enqueue_scripts', 'dr_enqueue' );