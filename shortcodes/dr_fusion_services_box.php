<?php

//services box shortcode
//--------------------------------------------------------------
function dr_fusion_services_box($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'title' =>'',
    'subtitle' => '',
    'description' =>'',
    'img' =>'',
    'underline' => ''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>

<div class="dr-services-box">
  <div class="dr-services-box-icon"><img src="<?php echo $img; ?>"/></div>
  <p class="dr-box-title <?php echo $underline; ?>"><?php echo $title; ?></p>
  <p class="dr-services-box-subtitle"><?php echo $subtitle; ?></p>
  <p class="dr-services-box-description"><?php echo $description; ?></p>  

</div>


  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('dr_fusion_services_box', 'dr_fusion_services_box');

//5. register shortcode with fusion builder


function dr_register_fusion_services_box() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Services Box', 'fusion-builder' ),
          'shortcode'       => 'dr_fusion_services_box',
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
                'type'        => 'radio_button_set',
                'heading'     => esc_attr__( 'Underline colour', 'fusion-builder' ),
                'description' => esc_attr__( 'Select underline colour.', 'fusion-builder' ),
                'param_name'  => 'underline',
                'value'       => array(
                  'dr-teal' => esc_attr__( 'Teal', 'fusion-builder' ),
                  'dr-amethyst'   => esc_attr__( 'Amethyst', 'fusion-builder' ),
                  'dr-amber'   => esc_attr__( 'Amber', 'fusion-builder' ),
                  'dr-red'   => esc_attr__( 'Red', 'fusion-builder' ),
                  'dr-blue'   => esc_attr__( 'Blue', 'fusion-builder' ),
                  'dr-green'   => esc_attr__( 'Green', 'fusion-builder' ),
                ),
                'default'     => 'teal',
              ),
              array(
                'type'        => 'textfield',
                'heading'     => esc_attr__( 'Subtitle', 'fusion-builder' ),
                'description' => esc_attr__( 'Subtitle', 'fusion-builder' ),
                'param_name'  => 'subtitle',
                'value'       => '',
              ),
              array(
                'type'        => 'tinymce',
                'heading'     => esc_attr__( 'Description', 'fusion-builder' ),
                'description' => esc_attr__( 'Description', 'fusion-builder' ),
                'param_name'  => 'description',
                'value'       => '',
                'placeholder' => true,
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
  add_action( 'fusion_builder_before_init', 'dr_register_fusion_services_box' );



//--------------------------------------------------------------