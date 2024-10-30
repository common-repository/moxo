 <?php
 if ( ! function_exists( 'moxo_slider_plu' ) ) :
	function moxo_slider_plu() {
	$hide_show_slider			= get_theme_mod('hide_show_slider','1');
	$slider_title				= get_theme_mod('slider_title','Best Software');
	$slider_sbtitle				= get_theme_mod('slider_sbtitle','Marketing automation');
	$slide_animate_text			= get_theme_mod('slide_animate_text','<b class="is-show">Software</b><b>Developer</b><b>Designer</b>');
	$slider_desc				= get_theme_mod('slider_desc','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
	$Slide_btn_lbl				= get_theme_mod('Slide_btn_lbl','Sign Up For Beta');
	$Slide_btn_url				= get_theme_mod('Slide_btn_url','#');
	$moxo_background_setting	= get_theme_mod('moxo_background_setting',MOXO_PLUGIN_URL . 'inc/moxo/images/1200x800.jpg');
?>
<?php if($hide_show_slider == '1') { ?>
	 <!-- Home Banner -->
		<section id="home" class="home-banner particles-box theme-g-bg">
		  <div class="container">
			<div class="row justify-content-center">
			  <div class="col-md-12 col-lg-10 text-center slide-content">
				<?php if ( ! empty( $slider_title ) ) : ?>
					<span><?php echo esc_html($slider_title); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $slider_sbtitle ) ) : ?>
					<h1 class="ny-heading animate-1">
						<span><?php echo wp_kses_post($slider_sbtitle); ?></span><br>
						<span class="ny-text-wrapper">            	
							<?php echo wp_kses_post($slide_animate_text); ?>
						</span>
					</h1>
				<?php endif; ?>
				<?php if ( ! empty( $slider_desc ) ) : ?>
					<p><?php echo esc_html($slider_desc); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $Slide_btn_lbl ) ) : ?>
					<a class="m-btn btn-white btn-first" href="<?php echo esc_url($Slide_btn_url); ?>"><?php echo esc_html($Slide_btn_lbl); ?></a>
				<?php endif; ?>
			  </div>
			  <div class="col-md-8">
				<div class="hb-img">
					<?php if ( ! empty( $moxo_background_setting ) ) : ?>
						<img src="<?php echo esc_url($moxo_background_setting); ?>" title="" alt="">
					<?php endif; ?>
				</div>
			  </div>
			</div>
		  </div> <!-- container -->
		</div>
		</section>
	<!-- / -->
	<?php } }
endif;	
if ( function_exists( 'moxo_slider_plu' ) ) {
	$section_priority = apply_filters( 'moxo_section_priority', 10, 'moxo_slider_plu' );
	add_action( 'moxo_sections', 'moxo_slider_plu', absint( $section_priority ) );
} 
?>