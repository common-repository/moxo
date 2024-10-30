<?php 
// Customizer tabs for copyright_content
function moxo_copyright_customize_register( $wp_customize ) {
	if ( class_exists( 'Moxo_Customize_Control_Tabs' ) ) {

		// Pricing Tables Tabs
		$wp_customize->add_setting(
			'moxo_copyrights_tabs', array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			new Moxo_Customize_Control_Tabs(
				$wp_customize, 'moxo_copyrights_tabs', array(
					'section' => 'footer_copyright',
					'tabs' => array(
						'general' => array(
							'nicename' => esc_html__( 'Settings', 'moxo' ),
							'icon' => 'cogs',
							'controls' => array(
								'hide_show_copyright',
							),
						),
						'first' => array(
							'nicename' => esc_html__( 'Content', 'moxo' ),
							'icon' => 'table',
							'controls' => array(
								'copyright_content',
							),
						),	
					),
				)
			)
		);
	}
}

add_action( 'customize_register', 'moxo_copyright_customize_register' );

// Customizer tabs for service
function moxo_feature_customize_register( $wp_customize ) {
	if ( class_exists( 'Moxo_Customize_Control_Tabs' ) ) {

		// Pricing Tables Tabs
		$wp_customize->add_setting(
			'moxo_feature_tabs', array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			new Moxo_Customize_Control_Tabs(
				$wp_customize, 'moxo_feature_tabs', array(
					'section' => 'features_setting',
					'tabs' => array(
						'general' => array(
							'nicename' => esc_html__( 'Setting', 'moxo-pro' ),
							'icon' => 'cogs',
							'controls' => array(
								'hide_show_feature',
							),
						),
						'first' => array(
							'nicename' => esc_html__( 'Header', 'moxo-pro' ),
							'icon' => 'header',
							'controls' => array(
								'features_title',
								'features_description',
							),
						),
						'second' => array(
							'nicename' => esc_html__( 'Content', 'moxo-pro' ),
							'icon' => 'info',
							'controls' => array(
								'feature_content',
								'moxo_feature_upgrade_to_pro',
							),
						),
					),
				)
			)
		);
	}
}

add_action( 'customize_register', 'moxo_feature_customize_register' );

// Customizer tabs for slider
function moxo_slider_manager_customize_register( $wp_customize ) {
	if ( class_exists( 'Moxo_Customize_Control_Tabs' ) ) {

		// Pricing Tables Tabs
		$wp_customize->add_setting(
			'moxo_slider_tabs', array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			new Moxo_Customize_Control_Tabs(
				$wp_customize, 'moxo_slider_tabs', array(
					'section' => 'slider_setting',
					'tabs' => array(
						'general' => array(
							'nicename' => esc_html__( 'setting', 'moxo-pro' ),
							'icon' => 'cogs',
							'controls' => array(
								'hide_show_slider',
								'hide_show_canvas',
							),
						),
						'Content' => array(
							'nicename' => esc_html__( 'Default', 'moxo-pro' ),
							'icon' => 'table',
							'controls' => array(
								'slider_title',
								'slider_sbtitle',
								'slide_animate_text',
								'slider_desc',
								'Slide_btn_lbl',
								'Slide_btn_url',
								'moxo_background_setting',
							),
						),
					),
					
				)
			)
		);
	}
}
add_action( 'customize_register', 'moxo_slider_manager_customize_register' );

// Customizer tabs for testimonial

function moxo_testimonial_customize_register( $wp_customize ) {
	if ( class_exists( 'Moxo_Customize_Control_Tabs' ) ) {

		// Testimonial Tabs
		$wp_customize->add_setting(
			'moxo_testimonial_tabs', array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new Moxo_Customize_Control_Tabs(
				$wp_customize, 'moxo_testimonial_tabs', array(
					'section' => 'testimonial_setting',
					'tabs' => array(
						'general' => array(
							'nicename' => esc_html__( 'Setting', 'moxo-pro' ),
							'icon' => 'cogs',
							'controls' => array(
								'hide_show_testimonial',
							),
						),
						'first' => array(
							'nicename' => esc_html__( 'Header', 'moxo-pro' ),
							'icon' => 'header',
							'controls' => array(
								'testimonial_header_title',
								'testimonial_header_desc',
							),
						),
						'second' => array(
							'nicename' => esc_html__( 'Content', 'moxo-pro' ),
							'icon' => 'info',
							'controls' => array(
								'testimonial_contents',
								'moxo_testimonial_upgrade_to_pro',
							),
						),
						'third' => array(
							'nicename' => esc_html__( 'BG', 'moxo-pro' ),
							'icon' => 'info',
							'controls' => array(
								'testimonial_background_setting',
								'testimonial_background_position',
							),
						),
					),
				)
			)
		);
	}
}

add_action( 'customize_register', 'moxo_testimonial_customize_register' );

?>