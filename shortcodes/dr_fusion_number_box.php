<?php

//box shortcode
//--------------------------------------------------------------
function dr_fusion_number_box($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'text' =>'',
    'img' =>'',
    'margin' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>

<div class="dr-number-box" style="margin-left:<?php echo $margin; ?>;">
  <div class="dr-number-img"><img src="<?php echo $img; ?>"/></div>
  <div class="dr-number-box-text">
    <p><?php echo $text; ?></p>  
  </div>
</div>

  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('dr_fusion_number_box', 'dr_fusion_number_box');

//5. register shortcode with fusion builder


function dr_register_fusion_number_box() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Numbered Box', 'fusion-builder' ),
          'shortcode'       => 'dr_fusion_number_box',
          'icon'       => 'fusiona-newspaper',
          'allow_generator' => true,
          'params'          => array(
              array(
                  'type'        => 'tinymce',
                  'heading'     => esc_attr__( 'Content', 'fusion-builder' ),
                  'description' => esc_attr__( 'Box content', 'fusion-builder' ),
                  'param_name'  => 'text',
                  'value'       => '',
              ),
              array(
                'type'        => 'textfield',
                'heading'     => esc_attr__( 'Left Margin', 'fusion-builder' ),
                'description' => esc_attr__( 'Left margin size in px or %', 'fusion-builder' ),
                'param_name'  => 'margin',
                'value'       => '',
              ),
              array(
                'type'        => 'upload',
                'heading'     => esc_attr__( 'Number image', 'fusion-builder' ),
                'description' => esc_attr__( 'Attach a number image.', 'fusion-builder' ),
                'param_name'  => 'img',
                'value'       => '',
              ),
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'dr_register_fusion_number_box' );


//--------------------------------------------------------------