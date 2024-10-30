<?php
function moxo_testimonial_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Testimonial Section Panel
	=========================================*/
		$wp_customize->add_section(
			'testimonial_setting', array(
				'title' => esc_html__( 'Testimonial Section', 'moxo-pro' ),
				'panel' => 'moxo_frontpage_sections',
				'priority' => apply_filters( 'moxo_section_priority', 35, 'moxo_Testimonial' ),
			)
		);
	/*=========================================
	Testimonial Settings Section
	=========================================*/
	if ( class_exists( 'Moxo_Customizer_Toggle_Control' ) ) {
	$wp_customize->add_setting( 
		'hide_show_testimonial' , 
			array(
			'default' =>  esc_html__( '1', 'moxo-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Moxo_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_testimonial', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'moxo-pro' ),
			'section'     => 'testimonial_setting',
			'settings'    => 'hide_show_testimonial',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	}
	/*=========================================
	Testimonial Header Section
	=========================================*/	
	// testimonial header Title // 
	$wp_customize->add_setting(
    	'testimonial_header_title',
    	array(
	        'default'			=> __('What Client Say?','moxo-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_header_title',
		array(
		    'label'   => __('Title','moxo-pro'),
		    'section' => 'testimonial_setting',
			'settings'   	 => 'testimonial_header_title',
			'type'           => 'text',
		)  
	);
	
	// testimonial description // 
	$wp_customize->add_setting(
    	'testimonial_header_desc',
    	array(
	        'default'			=> __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.','moxo-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_header_desc',
		array(
		    'label'   => __('Description','moxo-pro'),
		    'section' => 'testimonial_setting',
			'settings'   	 => 'testimonial_header_desc',
			'type'           => 'textarea',
		)  
	);

	/**
	 * Customizer Repeater for add Testimonial
	 */
	 	if ( class_exists( 'Moxo_Repeater' ) ) {
		$wp_customize->add_setting( 'testimonial_contents', 
			array(
			 'sanitize_callback' => 'moxo_repeater_sanitize',
			    'default' => json_encode( 
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
			)
		);
		
		$wp_customize->add_control( 
			new Moxo_Repeater( $wp_customize, 
				'testimonial_contents', 
					array(
						'label'   => esc_html__('Testimonial','moxo-pro'),
						'section' => 'testimonial_setting',
						'add_field_label'                   => esc_html__( 'Add New Testimonial', 'moxo-pro' ),
						'item_name'                         => esc_html__( 'Testimonial', 'moxo-pro' ),
						'priority' => 1,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_designation_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
		}	
		
		//Pro feature
		class Moxo_testimonial__section_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<span class="customizer_testimonial_upgrade_section up-to-pro" href="https://www.nayrathemes.com/startkit-pro/" target="_blank" style="display: none;"><?php _e('More Testimonial Are Available in Pro Version','moxo'); ?></span>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'moxo_testimonial_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Moxo_testimonial__section_upgrade(
			$wp_customize,
			'moxo_testimonial_upgrade_to_pro',
				array(
					'section'				=> 'testimonial_setting',
					'settings'				=> 'moxo_testimonial_upgrade_to_pro',
				)
			)
		);
		
	// Background Image // 
    $wp_customize->add_setting( 
    	'testimonial_background_setting' , 
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'testimonial_background_setting',
		array(
			'label'          => __( 'Background Image', 'moxo-pro' ),
			'section'        => 'testimonial_setting',
			'settings'   	 => 'testimonial_background_setting',
		) 
	));
	

	
	$wp_customize->add_setting( 
		'testimonial_background_position' , 
			array(
			'default' => __( 'scroll', 'moxo-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_select',
		) 
	);
	
	$wp_customize->add_control(
		'testimonial_background_position' , 
			array(
				'label'          => __( 'Image Position', 'moxo-pro' ),
				'section'        => 'testimonial_setting',
				'settings'       => 'testimonial_background_position',
				'type'           => 'radio',
				'choices'        => 
				array(
					'fixed'=> __( 'Fixed', 'moxo-pro' ),
					'scroll' => __( 'Scroll', 'moxo-pro' )
			)  
		) 
	);
}
add_action( 'customize_register', 'moxo_testimonial_setting' );

// Testimonial selective refresh
function conceptly_home_testimonial_section_partials( $wp_customize ){
	// hide_show_testimonial
	$wp_customize->selective_refresh->add_partial(
		'hide_show_testimonial', array(
			'selector' => '.testimonial-section',
			'container_inclusive' => true,
			'render_callback' => 'testimonial_setting',
			'fallback_refresh' => true,
		)
	);
	
	// testimonial title
	$wp_customize->selective_refresh->add_partial( 'testimonial_header_title', array(
		'selector'            => '.testimonial-section .section-title h2',
		'settings'            => 'testimonial_header_title',
		'render_callback'  => 'moxo_testimonial_title_render_callback',
	) );
	// testimonial description
	$wp_customize->selective_refresh->add_partial( 'testimonial_header_desc', array(
		'selector'            => '.testimonial-section .section-title p',
		'settings'            => 'testimonial_header_desc',
		'render_callback'  => 'moxo_testimonial_header_desc_render_callback',
	) );
}
add_action( 'customize_register', 'conceptly_home_testimonial_section_partials' );

//testimonial_header_title
function moxo_testimonial_title_render_callback() {
	return get_theme_mod( 'testimonial_header_title' );
}
//testimonial_header_desc
function moxo_testimonial_header_desc_render_callback() {
	return get_theme_mod( 'testimonial_header_desc' );
}
