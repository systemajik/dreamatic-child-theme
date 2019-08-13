<?php

//profile shortcode
//--------------------------------------------------------------
function dr_fusion_profile($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'orientation' =>'',
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

    <div class="dr-profile-img<?php if($orientation === 'left') { echo "-left"; } ?>"><img src="<?php echo $img; ?>"/></div>

    <div class="dr-speech<?php if($orientation === 'left') { echo "-left"; } ?>"><img src="http://staging.dreamatic.digital/wp-content/uploads/2019/08/speech-marks.png"/></div>
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
              'type'        => 'radio_button_set',
              'heading'     => esc_attr__( 'Orientation', 'fusion-builder' ),
              'description' => esc_attr__( 'Choose left or right orientation.', 'fusion-builder' ),
              'param_name'  => 'orientation',
              'value'       => array(
                'left' => esc_attr__( 'Left', 'fusion-builder' ),
                'right'   => esc_attr__( 'Right', 'fusion-builder' ),
              ),
              'default'     => 'left',
            ),
              array(
                  'type'        => 'textfield',
                  'heading'     => esc_attr__( 'Name', 'fusion-builder' ),
                  'description' => esc_attr__( 'Full name of the person', 'fusion-builder' ),
                  'param_name'  => 'name',
                  'value'       => '',
              ),
              array(
                'type'        => 'textfield',
                'heading'     => esc_attr__( 'Role', 'fusion-builder' ),
                'description' => esc_attr__( 'Role', 'fusion-builder' ),
                'param_name'  => 'role',
                'value'       => '',
              ),
              array(
                'type'        => 'tinymce',
                'heading'     => esc_attr__( 'Description', 'fusion-builder' ),
                'description' => esc_attr__( 'Short profile description', 'fusion-builder' ),
                'param_name'  => 'description',
                'value'       => '',
               ),
              array(
                'type'        => 'upload',
                'heading'     => esc_attr__( 'Profile Image', 'fusion-builder' ),
                'description' => esc_attr__( 'Max 400x400', 'fusion-builder' ),
                'param_name'  => 'img',
                'value'       => '',
              ), 
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'dr_register_fusion_profile' );


//--------------------------------------------------------------