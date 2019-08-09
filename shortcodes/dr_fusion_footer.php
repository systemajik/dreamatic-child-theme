<?php

//dreamatic footer  shortcode
//--------------------------------------------------------------
function dr_fusion_footer($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'title' =>'',
    'subtitle' =>'',
    'cta' =>'',
    'link' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>

<div class="dr-footer">
  <img src="/wp-content/uploads/2019/08/wavy-footer.png" />
  <span class="dr-footer-cta"><?php echo $title; ?></span>
  <p><?php echo $subtitle; ?></p>
  <a class="fusion-button button-flat fusion-button-default-shape fusion-button-default-size button-default button-1 fusion-button-default-span fusion-button-default-type" href="<?php echo $link; ?>">
    <span class="fusion-button-text"><?php echo $cta; ?></span>
  </a>
</div>

  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('dr_fusion_footer', 'dr_fusion_footer');

//5. register shortcode with fusion builder

function dr_register_fusion_footer() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Dreamatic Footer', 'fusion-builder' ),
          'shortcode'       => 'dr_fusion_footer',
          'icon'       => 'fusiona-image',
          'allow_generator' => true,
          'params'          => array(
              array(
                  'type'        => 'textfield',
                  'heading'     => esc_attr__( 'Title', 'fusion-builder' ),
                  'description' => esc_attr__( 'Title text', 'fusion-builder' ),
                  'param_name'  => 'title',
                  'value'       => '',
              ),
              array(
                'type'        => 'textfield',
                'heading'     => esc_attr__( 'Subtitle', 'fusion-builder' ),
                'description' => esc_attr__( 'Subtitle text', 'fusion-builder' ),
                'param_name'  => 'subtitle',
                'value'       => '',
            ),
            array(
              'type'        => 'textfield',
              'heading'     => esc_attr__( 'Button Text', 'fusion-builder' ),
              'description' => esc_attr__( 'Button text', 'fusion-builder' ),
              'param_name'  => 'cta',
              'value'       => '',
          ),
          array(
            'type'        => 'textfield',
            'heading'     => esc_attr__( 'Button Link', 'fusion-builder' ),
            'description' => esc_attr__( 'URL', 'fusion-builder' ),
            'param_name'  => 'link',
            'value'       => '',
        ),
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'dr_register_fusion_footer' );


//--------------------------------------------------------------