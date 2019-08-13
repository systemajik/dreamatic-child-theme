<?php

//box shortcode
//--------------------------------------------------------------
function dr_fusion_box($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'title' =>'',
    'description' =>'',
    'img' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>

<div class="dr-box">
  <div class="dr-box-icon"><img src="<?php echo $img; ?>"/></div>
  <p class="dr-box-title"><?php echo $title; ?></p>
  <p class="dr-box-description"><?php echo $description; ?></p>  
</div>


  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('dr_fusion_box', 'dr_fusion_box');

//5. register shortcode with fusion builder


function dr_register_fusion_box() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Value Box', 'fusion-builder' ),
          'shortcode'       => 'dr_fusion_box',
          'icon'       => 'fusiona-newspaper',
          'allow_generator' => true,
          'params'          => array(
              array(
                  'type'        => 'textfield',
                  'heading'     => esc_attr__( 'Title', 'fusion-builder' ),
                  'description' => esc_attr__( 'Title', 'fusion-builder' ),
                  'param_name'  => 'title',
                  'value'       => '',
              ),
              array(
                'type'        => 'textfield',
                'heading'     => esc_attr__( 'Description', 'fusion-builder' ),
                'description' => esc_attr__( 'Description', 'fusion-builder' ),
                'param_name'  => 'description',
                'value'       => '',
              ),
              array(
                'type'        => 'upload',
                'heading'     => esc_attr__( 'Icon', 'fusion-builder' ),
                'description' => esc_attr__( 'Attach an icon 200x200', 'fusion-builder' ),
                'param_name'  => 'img',
                'value'       => '',
               ),
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'dr_register_fusion_box' );


//--------------------------------------------------------------