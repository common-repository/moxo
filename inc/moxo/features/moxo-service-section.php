<?php
$repeater_path = trailingslashit( get_template_directory() ) . '/inc/customizer-repeater/functions.php';
if ( file_exists( $repeater_path ) ) {
require_once( $repeater_path );
}
function moxo_features_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Features Section Panel
	=========================================*/
		$wp_customize->add_section(
			'features_setting', array(
				'title' => esc_html__( 'Feature Section', 'moxo-pro' ),
				'panel' => 'moxo_frontpage_sections',
				'priority' => apply_filters( 'moxo_section_priority',25 , 'moxo_feature' ),
			)
		);
	// Feature Hide/ Show Setting // 
	if ( class_exists( 'Moxo_Customizer_Toggle_Control' ) ) {
	$wp_customize->add_setting( 
		'hide_show_feature' , 
			array(
			'default' => esc_html__( '1', 'moxo-pro' ),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Moxo_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_feature', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'moxo-pro' ),
			'section'     => 'features_setting',
			'settings'    => 'hide_show_feature',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	}
	
	// Features Header Section // 
	// feature Title // 
	$wp_customize->add_setting(
    	'features_title',
    	array(
	        'default'			=> __('What is Software?','moxo-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'features_title',
		array(
		    'label'   => __('Title','moxo-pro'),
		    'section' => 'features_setting',
			'settings'   	 => 'features_title',
			'type'           => 'text',
		)  
	);
	
	// feature Description // 
	$wp_customize->add_setting(
    	'features_description',
    	array(
	        'default'			=> __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.','moxo-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'moxo_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'features_description',
		array(
		    'label'   => __('Description','moxo-pro'),
		    'section' => 'features_setting',
			'settings'   	 => 'features_description',
			'type'           => 'textarea',
		)  
	);
	
	// Features content Section // 
	/**
	 * Customizer Repeater for add features
	 */
	 	if ( class_exists( 'Moxo_Repeater' ) ) {
		$wp_customize->add_setting( 'feature_content', 
			array(
			 'sanitize_callback' => 'moxo_repeater_sanitize',
			  'default' => json_encode( 
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
			)
		);
		
		$wp_customize->add_control( 
			new Moxo_Repeater( $wp_customize, 
				'feature_content', 
					array(
						'label'   => esc_html__('Features','moxo-pro'),
						'section' => 'features_setting',
						'add_field_label'                   => esc_html__( 'Add New Feature', 'moxo-pro' ),
						'item_name'                         => esc_html__( 'Feature', 'moxo-pro' ),
						'priority' => 1,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_image_control' => true,
					) 
				) 
			);
		}
		
		//Pro feature
		class Moxo_feature__section_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<span class="customizer_feature_upgrade_section up-to-pro" style="display: none;"><?php _e('More Features Are Available in Pro Version','moxo'); ?></span>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'moxo_feature_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Moxo_feature__section_upgrade(
			$wp_customize,
			'moxo_feature_upgrade_to_pro',
				array(
					'section'				=> 'features_setting',
					'settings'				=> 'moxo_feature_upgrade_to_pro',
				)
			)
		);
}

add_action( 'customize_register', 'moxo_features_setting' );
?>
<?php
// feature selective refresh
function moxo_home_feature_section_partials( $wp_customize ){

	// hide show feature
	$wp_customize->selective_refresh->add_partial(
		'hide_show_feature', array(
			'selector' => '.home-feature',
			'container_inclusive' => true,
			'render_callback' => 'features_setting',
			'fallback_refresh' => true,
		)
	);
	//title
	$wp_customize->selective_refresh->add_partial( 'features_title', array(
		'selector'            => '.home-feature .section-title h2',
		'settings'            => 'features_title',
		'render_callback'  => 'moxo_feature_section_title_render_callback',
	
	) );
	// description
	$wp_customize->selective_refresh->add_partial( 'features_description', array(
		'selector'            => '.home-feature .section-title p',
		'settings'            => 'features_description',
		'render_callback'  => 'moxo_feature_section_desc_render_callback',
	
	) );
	
	// feature content
	$wp_customize->selective_refresh->add_partial( 'feature_content', array(
		'selector'            => '.home-feature .feature-content'
	
	) );
	}

add_action( 'customize_register', 'moxo_home_feature_section_partials' );

// feature title
function moxo_feature_section_title_render_callback() {
	return get_theme_mod( 'features_title' );
}
// feature description
function moxo_feature_section_desc_render_callback() {
	return get_theme_mod( 'features_description' );
}