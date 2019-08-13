<?php

//profile shortcode
//--------------------------------------------------------------
function dr_fusion_profile($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'name' =>'',
    'role' =>'',
    'description' =>'',
    'img' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>

<div class="dr-profile">

      <p class="dr-profile-title"><?php echo $name; ?></p>
      <p class="dr-profile-subtitle"><?php echo $role; ?></p>

      <p><?php echo $description; ?></p>

    <div class="dr-profile-img"><img src="<?php echo $img; ?>"/></div>

    <div class="dr-speech"><img src="http://staging.dreamatic.digital/wp-content/uploads/2019/08/speech-marks.png"/></div>
</div>

  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('dr_fusion_profile', 'dr_fusion_profile');

//5. register shortcode with fusion builder


function dr_register_fusion_profile() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Profile ', 'fusion-builder' ),
          'shortcode'       => 'dr_fusion_profile',
          'icon'       => 'fusiona-newspaper',
          'allow_generator' => true,
          'params'          => array(
              array(
                  'type'        => 'text',
                  'heading'     => esc_attr__( 'Images', 'fusion-builder' ),
                  'description' => esc_attr__( 'Front image', 'fusion-builder' ),
                  'param_name'  => 'image1',
                  'value'       => '',
              ),
              array(
                'type'        => 'text',
                'heading'     => esc_attr__( 'Images', 'fusion-builder' ),
                'description' => esc_attr__( 'Front image', 'fusion-builder' ),
                'param_name'  => 'image2',
                'value'       => '',
              ),
              array(
                'type'        => 'text',
                'heading'     => esc_attr__( 'Images', 'fusion-builder' ),
                'description' => esc_attr__( 'Front image', 'fusion-builder' ),
                'param_name'  => 'image2',
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
  add_action( 'fusion_builder_before_init', 'dr_register_fusion_profile' );


//--------------------------------------------------------------