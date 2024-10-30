<?php
function moxo_pro_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
		$wp_customize->add_section(
			'slider_setting', array(
				'title' => esc_html__( 'Slider Section', 'moxo-pro' ),
				'panel' => 'moxo_frontpage_sections',
				'priority' => apply_filters( 'moxo_section_priority', 1, 'slider_setting' ),
			)
		);
	
	
	// Slider Hide/ Show Setting // 
	if ( class_exists( 'Moxo_Customizer_Toggle_Control' ) ) {
	$wp_customize->add_setting( 
		'hide_show_slider' , 
			array(
			'default' => esc_html__( '1', 'moxo-pro' ),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Moxo_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_slider', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'moxo-pro' ),
			'section'     => 'slider_setting',
			'settings'    => 'hide_show_slider',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	}
	// Canvas Hide/ Show Setting // 
	if ( class_exists( 'Moxo_Customizer_Toggle_Control' ) ) {
	$wp_customize->add_setting( 
		'hide_show_canvas' , 
			array(
			'default' => esc_html__( '1', 'moxo-pro' ),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	
	$wp_customize->add_control( new Moxo_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_canvas', 
		array(
			'label'	      => esc_html__( 'Hide / Show Canvas', 'moxo-pro' ),
			'section'     => 'slider_setting',
			'settings'    => 'hide_show_canvas',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	}
	// Slider Title // 
	$wp_customize->add_setting(
    	'slider_title',
    	array(
	        'default'			=> __('Best Software','moxo-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'slider_title',
		array(
		    'label'   => __('Title','moxo-pro'),
		    'section' => 'slider_setting',
			'settings'   	 => 'slider_title',
			'type'           => 'text',
		)  
	);
	
	// SLider Subtitle // 
	$wp_customize->add_setting(
    	'slider_sbtitle',
    	array(
	        'default'			=> __('Marketing automation','moxo-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'slider_sbtitle',
		array(
		    'label'   => __('Subtitle','moxo-pro'),
		    'section' => 'slider_setting',
			'settings'   	 => 'slider_sbtitle',
			'type'           => 'text',
		)  
	);
	// Animate text // 
	$wp_customize->add_setting(
    	'slide_animate_text',
    	array(
	        'default'			=> __('<b class="is-show">Software</b><b>Developer</b><b>Designer</b>','moxo-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'slide_animate_text',
		array(
		    'label'   => __('Animate Text','moxo-pro'),
		    'section' => 'slider_setting',
			'settings'   	 => 'slide_animate_text',
			'type'           => 'textarea',
		)  
	);
	
	// SLider Description // 
	$wp_customize->add_setting(
    	'slider_desc',
    	array(
	        'default'			=> __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.','moxo-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'slider_desc',
		array(
		    'label'   => __('Description','moxo-pro'),
		    'section' => 'slider_setting',
			'settings'   	 => 'slider_desc',
			'type'           => 'textarea',
		)  
	);
	// Button Label // 
	$wp_customize->add_setting(
    	'Slide_btn_lbl',
    	array(
	        'default'			=> __('Sign Up For Beta','moxo-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'Slide_btn_lbl',
		array(
		    'label'   => __('Button Label','moxo-pro'),
		    'section' => 'slider_setting',
			'settings'   	 => 'Slide_btn_lbl',
			'type'           => 'text',
		)  
	);
	
	// Button Link // 
	$wp_customize->add_setting(
    	'Slide_btn_url',
    	array(
	        'default'			=> __('#','moxo-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_url',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'Slide_btn_url',
		array(
		    'label'   => __('Button Url','moxo-pro'),
		    'section' => 'slider_setting',
			'settings'   	 => 'Slide_btn_url',
			'type'           => 'text',
		)  
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'moxo_background_setting' , 
    	array(
			'default' 			=> MOXO_PLUGIN_URL . 'inc/moxo/images/1200x800.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'moxo_background_setting' ,
		array(
			'label'          => __( 'Background Image', 'moxo-pro' ),
			'section'        => 'slider_setting',
			'settings'   	 => 'moxo_background_setting',
		) 
	));
}

add_action( 'customize_register', 'moxo_pro_slider_setting' );

// Slider selective refresh
function moxo_home_slider_section_partials( $wp_customize ){

	// hide show Slider
	$wp_customize->selective_refresh->add_partial(
		'hide_show_slider', array(
			'selector' => '#home',
			'container_inclusive' => true,
			'render_callback' => 'slider_setting',
			'fallback_refresh' => true,
		)
	);
	
	// slider_title
	$wp_customize->selective_refresh->add_partial( 'slider_title', array(
		'selector'            => '#home .slide-content span ',
		'settings'            => 'slider_title',
		'render_callback'  => 'moxo_slider_title_render_callback',
	) );
	
	// slider_sbtitle
	$wp_customize->selective_refresh->add_partial( 'slider_sbtitle', array(
		'selector'            => '#home .slide-content h1',
		'settings'            => 'slider_sbtitle',
		'render_callback'  => 'moxo_slider_sbtitle_render_callback',
	) );
	
	// slider_desc
	$wp_customize->selective_refresh->add_partial( 'slider_desc', array(
		'selector'            => '#home .slide-content p',
		'settings'            => 'slider_desc',
		'render_callback'  => 'moxo_slider_desc_render_callback',
	) );
	
	// Slide_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'Slide_btn_lbl', array(
		'selector'            => '#home .btn-first',
		'settings'            => 'Slide_btn_lbl',
		'render_callback'  => 'moxo_Slide_btn_lbl_render_callback',
	) );
	
	// slide_animate_text
	$wp_customize->selective_refresh->add_partial( 'slide_animate_text', array(
		'selector'            => '#home .ny-text-wrapper',
		'settings'            => 'slide_animate_text',
		'render_callback'  => 'moxo_slide_animate_text_render_callback',
	) );
	}
add_action( 'customize_register', 'moxo_home_slider_section_partials' );

// slider_title
function moxo_slider_title_render_callback() {
	return get_theme_mod( 'slider_title' );
}

// slider_sbtitle
function moxo_slider_sbtitle_render_callback() {
	return get_theme_mod( 'slider_sbtitle' );
}

// slider_desc
function moxo_slider_desc_render_callback() {
	return get_theme_mod( 'slider_desc' );
}

// Slide_btn_lbl
function moxo_Slide_btn_lbl_render_callback() {
	return get_theme_mod( 'Slide_btn_lbl' );
}

// slide_animate_text
function moxo_slide_animate_text_render_callback() {
	return get_theme_mod( 'slide_animate_text' );
}
?>