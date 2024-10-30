<?php
  if ( ! function_exists( 'moxo_testimonial_plu' ) ) :
	function moxo_testimonial_plu() {
function moxo_get_testimonial_default() {
	return apply_filters(
		'moxo_get_testimonial_default', json_encode(
		array(
			array(
					'title'           => esc_html__( 'Maria', 'moxo-pro' ),
					'designation'        => esc_html__( 'Owner', 'moxo-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s.', 'moxo-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/images/100x100.jpg',
					'id'              => 'customizer_repeater_testimonial_001',
				),
				array(
					'title'           => esc_html__( 'Maria', 'moxo-pro' ),
					'designation'        => esc_html__( 'Owner', 'moxo-pro' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s.', 'moxo-pro' ),
					'image_url'		  =>  get_template_directory_uri() . '/images/100x100.jpg',
					'id'              => 'customizer_repeater_testimonial_002',
				),
			)
		)
	);
}
 $default_content = null;
	if ( current_user_can( 'edit_theme_options' ) ) {
			$default_content = moxo_get_testimonial_default();
		}
?>

<?php 
	$hide_show_testimonial			= get_theme_mod('hide_show_testimonial','1'); 
	$testimonial_header_title		= get_theme_mod('testimonial_header_title','What Client Say?');
	$testimonial_header_desc		= get_theme_mod('testimonial_header_desc','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.');
	$testimonial_contents			= get_theme_mod('testimonial_contents',$default_content);
	$testimonial_background_setting = get_theme_mod('testimonial_background_setting');
	$testimonial_background_position= get_theme_mod('testimonial_background_position','scroll');
	if($hide_show_testimonial == '1') { 
?>
  <!-- Testimonial -->
	<?php if ( ! empty( $testimonial_background_setting ) ) { ?>	
		<section class="p-60px-tb sm-p-40px-tb testimonial-section" style="background: url('<?php echo esc_url($testimonial_background_setting); ?>') no-repeat center <?php echo esc_attr($testimonial_background_position); ?>/ 100% 100% ">
	<?php }else{ ?>	
		<section class="p-60px-tb sm-p-40px-tb testimonial-section">
	<?php } ?>
      <div class="container">
        <div class="row m-25px-b sm-m-15px-b">
          <div class="col-md-12 text-center">
            <div class="section-title">
				<span class="theme-g-bg"></span>
				<?php if ( ! empty( $testimonial_header_title ) ) : ?>
					<h2><?php echo esc_html($testimonial_header_title); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $testimonial_header_desc ) ) : ?>
				<p><?php echo esc_html($testimonial_header_desc); ?></p>
			   <?php endif; ?>	
            </div>
          </div> <!-- col -->
        </div>

        <div class="row justify-content-center">
          <div class="col-md-10">
              <div id="client-slider-single" class="owl-carousel">
				<?php
					if ( ! empty( $testimonial_contents ) ) {
					$testimonial_contents = json_decode( $testimonial_contents );
					foreach ( $testimonial_contents as $testimonial_item ) {
						
						$title = ! empty( $testimonial_item->title ) ? apply_filters( 'moxo_translate_single_string', $testimonial_item->title, 'testimonial section' ) : '';
						$designation = ! empty( $testimonial_item->designation ) ? apply_filters( 'moxo_translate_single_string', $testimonial_item->designation, 'testimonial section' ) : '';
						$text = ! empty( $testimonial_item->text ) ? apply_filters( 'moxo_translate_single_string', $testimonial_item->text, 'testimonial section' ) : '';
						$image = ! empty( $testimonial_item->image_url ) ? apply_filters( 'moxo_translate_single_string', $testimonial_item->image_url, 'testimonial section' ) : '';								
				?>
					<div class="testimonial-col">
					  <div class="d-flex">
						  <div class="img">
							<span>
							   <?php if ( ! empty( $image ) ) : ?>	
									<img src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
								<?php endif; ?>
							</span>
						  </div>
						  <div class="speac">
							<p><?php echo esc_html( $text ); ?></p>
							<h6><strong><?php echo esc_html( $title ); ?> - <span class="theme-color"><?php echo esc_html( $designation ); ?></span></strong></h6>
						  </div>
						</div>
					</div> <!-- col -->  
				<?php } }?>
              </div> <!-- owl -->
          </div> <!-- col -->
        </div> <!-- row -->
      </div> <!-- container -->
    </section>
    <!--  Testimonial End  -->

	<?php } } 
 endif;	
if ( function_exists( 'moxo_testimonial_plu' ) ) {
	$section_priority = apply_filters( 'moxo_section_priority', 14, 'moxo_testimonial_plu' );
	add_action( 'moxo_sections', 'moxo_testimonial_plu', absint( $section_priority ) );
} 
?>