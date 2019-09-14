<?php

//dreamatic footer  shortcode
//--------------------------------------------------------------
function dr_fusion_footer($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'title' =>'',
    'subtitle' =>'',
    'cta' =>'',
    'link' =>'',
    'footer' =>'',
    'footertext' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here )
  ob_start(); ?>

<div class="dr-footer">
  <div class="dr-footer-cta">
    <span class="dr-footer-title"><?php echo $title; ?></span>
    <p class="dr-footer-sub"><?php echo $subtitle; ?></p>
    <div class="dr-footer-button">
      <a class="fusion-button button-flat fusion-button-default-shape fusion-button-default-size button-default button-10 fusion-button-default-span fusion-button-default-type" href="<?php echo $link; ?>">
        <span class="fusion-button-text"><?php echo $cta; ?></span>
      </a>
    </div>
  </div>
  <?php if($footer === 'yes') : ?>
    <div class="dr-copyright"> 
      <p class="dr-copyright-text"><?php echo $footertext; ?></p>
      <div class="dr-privacy">
      <a href="/privacy-statement" class="dr-footer-link">Privacy |</a><a href="/cookie-statement" class="dr-footer-link"> Cookies </a>
      </div>
    
    </div>
    
  <?php endif ?>


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
              array(
                'type'        => 'radio_button_set',
                'heading'     => esc_attr__( 'Footer On', 'fusion-builder' ),
                'description' => esc_attr__( 'Add footer', 'fusion-builder' ),
                'param_name'  => 'footer',
                'value'       => array(
                  'yes'   => esc_attr__( 'Yes', 'fusion-builder' ),
                  'no' => esc_attr__( 'No', 'fusion-builder' ),
                ),
              ),
              array(
                'type'        => 'textfield',
                'heading'     => esc_attr__( 'Footer Text', 'fusion-builder' ),
                'description' => esc_attr__( 'Footer content', 'fusion-builder' ),
                'param_name'  => 'footertext',
                'value'       => '',
              ),
				    ),
          )
    );
  }

  add_action( 'fusion_builder_before_init', 'dr_register_fusion_footer' );


//--------------------------------------------------------------