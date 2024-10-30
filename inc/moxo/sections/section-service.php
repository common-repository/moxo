 <?php
 if ( ! function_exists( 'moxo_feature_plu' ) ) :
	function moxo_feature_plu() {
function moxo_get_feature_default() {
	return apply_filters(
		'moxo_get_feature_default', json_encode(
			 array(
				array(
					'title'           => esc_html__( 'Constant Speed', 'moxo-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 'moxo-pro' ),
					'text2'           => esc_html__( 'Read More', 'moxo-pro' ),
					"link" => "#",
						"image_url" => MOXO_PLUGIN_URL .'inc/moxo/images/service/img-1.png' ,
					'id'              => 'customizer_repeater_feature_001',
				),
				array(
					'title'           => esc_html__( 'File Management', 'moxo-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 'moxo-pro' ),
					'text2'           => esc_html__( 'Read More', 'moxo-pro' ),
					"link" => "#",
						"image_url" => MOXO_PLUGIN_URL .'inc/moxo/images/service/img-2.png' ,
					'id'              => 'customizer_repeater_feature_002',
				),
				array(
					'title'           => esc_html__( 'Best Support', 'moxo-pro' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 'moxo-pro' ),
					'text2'           => esc_html__( 'Read More', 'moxo-pro' ),
					"link" => "#",
						"image_url" => MOXO_PLUGIN_URL .'inc/moxo/images/service/img-3.png' ,
					'id'              => 'customizer_repeater_feature_003',
				),
			)
		)
	);
} 
 $default_content = null;
	if ( current_user_can( 'edit_theme_options' ) ) {
			$default_content = moxo_get_feature_default();
		}
?>

<?php 
		$hide_show_feature= get_theme_mod('hide_show_feature','1'); 
		$features_title= get_theme_mod('features_title','What is Software?');
		$features_description= get_theme_mod('features_description','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.');
		$feature_content= get_theme_mod('feature_content',$default_content);
		$feature_sec_cols = get_theme_mod('feature_sec_cols','4');
		 if($hide_show_feature == '1') { 
	?>
 <!-- Features -->
    <section class="feature-section home-feature p-50px-t p-90px-b md-p-50px-tb">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center m-40px-b sm-m-30px-b">
            <div class="section-title">
              <span class="theme-g-bg"></span>
			  <?php if ( ! empty( $features_title ) ) : ?>
				<h2><?php echo esc_html($features_title); ?></h2>
			  <?php endif; ?>
			  <?php if ( ! empty( $features_description ) ) : ?>
				<p><?php echo esc_html($features_description); ?></p>
			   <?php endif; ?>	
            </div>
          </div> <!-- col -->
        </div> <!-- row -->

        <div class="row feature-content">
		<?php
			if ( ! empty( $feature_content ) ) {
			$feature_content = json_decode( $feature_content );
			foreach ( $feature_content as $feature_item ) {
				$icon = ! empty( $feature_item->icon_value ) ? apply_filters( 'moxo_translate_single_string', $feature_item->icon_value, 'feature section' ) : '';
				$title = ! empty( $feature_item->title ) ? apply_filters( 'moxo_translate_single_string', $feature_item->title, 'feature section' ) : '';
				$text = ! empty( $feature_item->text ) ? apply_filters( 'moxo_translate_single_string', $feature_item->text, 'feature section' ) : '';
				$button = ! empty( $feature_item->text2) ? apply_filters( 'conceptly_translate_single_string', $feature_item->text2,'feature section' ) : 'Read More';
				$link = ! empty( $feature_item->link ) ? apply_filters( 'moxo_translate_single_string', $feature_item->link, 'feature section' ) : '';
				$image = ! empty( $feature_item->image_url ) ? apply_filters( 'moxo_translate_single_string', $feature_item->image_url, 'feature section' ) : '';
		?>
          <div class="col-md-<?php echo esc_attr($feature_sec_cols); ?> feature-single">
            <div class="feature-box mb-4">
              <div class="f-icon theme-bg">
					<?php if ( ! empty( $image )){ ?>
						<img  src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
					<?php } ?>	
				</div>
			  <?php if ( ! empty( $title ) ) : ?>
					<h4 class="m-25px-t"><?php echo esc_html($title); ?></h4>
			  <?php endif; ?>	
			  <?php if ( ! empty( $text ) ) : ?>
				<p><?php echo wp_kses_post($text); ?></p>
			  <?php endif; ?>	
			  <?php if ( ! empty( $button ) ) : ?>
				<a class="more" href="<?php echo esc_url($link); ?>"><?php echo wp_kses_post($button); ?> <i class="ti-arrow-right"></i></a>
			  <?php endif; ?>	
            </div>
          </div>
		  <?php }} ?>
        </div>
      </div> <!-- container -->
    </section>
    <!-- / -->
	<?php } }
endif;	
if ( function_exists( 'moxo_feature_plu' ) ) {
	$section_priority = apply_filters( 'moxo_section_priority', 12, 'moxo_feature_plu' );
	add_action( 'moxo_sections', 'moxo_feature_plu', absint( $section_priority ) );
} 
?>