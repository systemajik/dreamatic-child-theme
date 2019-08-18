<?php

//benefits box shortcode
//--------------------------------------------------------------
function dr_fusion_benefits($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'title' =>'',
    'description' =>'',
    'img' =>'',
    'underline' => ''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>

<div class="dr-benefits-box">
  <div class="dr-box-icon"><img src="<?php echo $img; ?>"/></div>
  <div class="dr-benefits-text">
    <p class="dr-box-title-<?php echo $underline; ?>"><?php echo $title; ?></p>
    <p class="dr-box-description"><?php echo $description; ?></p>  
  </div>
</div>

  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('dr_fusion_benefits', 'dr_fusion_benefits');

//5. register shortcode with fusion builder


function dr_register_fusion_benefits() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Benefits Box', 'fusion-builder' ),
          'shortcode'       => 'dr_fusion_benefits',
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
                  'teal' => esc_attr__( 'Teal', 'fusion-builder' ),
                  'amethyst'   => esc_attr__( 'Amethyst', 'fusion-builder' ),
                  'amber'   => esc_attr__( 'Amber', 'fusion-builder' ),
                  'red'   => esc_attr__( 'Red', 'fusion-builder' ),
                  'blue'   => esc_attr__( 'Blue', 'fusion-builder' ),
                  'green'   => esc_attr__( 'Green', 'fusion-builder' ),
                ),
                'default'     => 'teal',
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
                'description' => esc_attr__( 'Attach an icon 50x50', 'fusion-builder' ),
                'param_name'  => 'img',
                'value'       => '',
               ),
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'dr_register_fusion_benefits' );


//--------------------------------------------------------------