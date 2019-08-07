<?php

//image rollover shortcode
//--------------------------------------------------------------
function dr_fusion_image_rollover($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
		'text' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>

  <p><?php echo $text; ?></p>






  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('dr_fusion_image_rollover', 'dr_fusion_image_rollover');

//5. register shortcode with fusion builder


function dr_register_fusion_image_rollover() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Image Rollover', 'fusion-builder' ),
          'shortcode'       => 'dr_fusion_image_rollover',
          'icon'            => 'fusiona-font',
          'allow_generator' => true,
          'params'          => array(
              array(
                  'type'        => 'textfield',
                  'heading'     => esc_attr__( 'Text Content', 'fusion-builder' ),
                  'description' => esc_attr__( 'Enter some content for this text box.', 'fusion-builder' ),
                  'param_name'  => 'text',
                  'value'       => '',
              ),
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'dr_register_fusion_image_rollover' );


//--------------------------------------------------------------