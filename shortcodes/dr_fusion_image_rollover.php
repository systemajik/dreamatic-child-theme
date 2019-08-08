<?php

//image rollover shortcode
//--------------------------------------------------------------
function dr_fusion_image_rollover($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'image1' =>'',
    'image2' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>

<div class="dr-roll-container" style="background-image:url(<?php echo $image1; ?>);">
  <img class="dr-roll-top" src="<?php echo $image2; ?>" />
</div>




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
          'icon'       => 'fusiona-image',
          'allow_generator' => true,
          'params'          => array(
              array(
                  'type'        => 'upload',
                  'heading'     => esc_attr__( 'Images', 'fusion-builder' ),
                  'description' => esc_attr__( 'Front image', 'fusion-builder' ),
                  'param_name'  => 'image1',
                  'value'       => '',
              ),
              array(
                'type'        => 'upload',
                'heading'     => esc_attr__( 'Images', 'fusion-builder' ),
                'description' => esc_attr__( 'Front image', 'fusion-builder' ),
                'param_name'  => 'image2',
                'value'       => '',
            ),
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'dr_register_fusion_image_rollover' );


//--------------------------------------------------------------