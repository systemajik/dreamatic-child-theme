<?php

//box shortcode
//--------------------------------------------------------------
function dr_fusion_testimonial_box($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'text' =>'',
    'title' =>'',
    'img' =>'',
    'mobile' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>

<div class="dr-testimonial-box">
<?php if($mobile === 'yes') : ?>
  <div class="dr-testimonial-img"><img src="<?php echo $img; ?>"/></div>
<?php endif ?>
<div class="dr-testimonial-box-text">
    <p><?php echo $text; ?></p>
    <p class="dr-testimonial-title"><?php echo $title; ?></p>
    <div class="dr-testimonial-speech"><img src="http://staging.dreamatic.digital/wp-content/uploads/2019/08/speech-marks.png"/></div>
  </div>
  <?php if($mobile === 'no') : ?>
  <div class="dr-testimonial-img"><img src="<?php echo $img; ?>"/></div>
  <?php endif ?>
</div>

  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('dr_fusion_testimonial_box', 'dr_fusion_testimonial_box');

//5. register shortcode with fusion builder


function dr_register_fusion_testmonial_box() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Testimonial Box', 'fusion-builder' ),
          'shortcode'       => 'dr_fusion_testimonial_box',
          'icon'       => 'fusiona-newspaper',
          'allow_generator' => true,
          'params'          => array(
              array(
                  'type'        => 'tinymce',
                  'heading'     => esc_attr__( 'Testimonial Content', 'fusion-builder' ),
                  'description' => esc_attr__( 'Testimonial text', 'fusion-builder' ),
                  'param_name'  => 'text',
                  'value'       => '',
              ),
              array(
                'type'        => 'textfield',
                'heading'     => esc_attr__( 'Title', 'fusion-builder' ),
                'description' => esc_attr__( 'Title of the person.', 'fusion-builder' ),
                'param_name'  => 'title',
                'value'       => '',
              ),
              array(
                'type'        => 'upload',
                'heading'     => esc_attr__( 'Person image', 'fusion-builder' ),
                'description' => esc_attr__( 'Attach an image 160px', 'fusion-builder' ),
                'param_name'  => 'img',
                'value'       => '',
              ),
              array(
                'type'        => 'radio_button_set',
                'heading'     => esc_attr__( 'Mobile View', 'fusion-builder' ),
                'description' => esc_attr__( 'Is this the mobile version?', 'fusion-builder' ),
                'param_name'  => 'mobile',
                'value'       => array(
                  'yes' => esc_attr__( 'Yes', 'fusion-builder' ),
                  'no'   => esc_attr__( 'No', 'fusion-builder' ),
                ),
                'default'     => 'no',
              ),
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'dr_register_fusion_testmonial_box' );


//--------------------------------------------------------------