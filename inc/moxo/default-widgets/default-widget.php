<?php
$activate = array(
		'footer-widget-area' => array(
            'footer-widget-area',
            'recent-posts-1',
            'archives-1',
        ),
		'footer-widget-area' => array(
            'text-1',
        ),
    );
    /* the default titles will appear */
   update_option('widget_text', array(
        1 => array('title' => '',
        'text'=>'<p class="footer-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>'), 
		2 => array('title' => 'Recent Posts'),
		3 => array('title' => 'Categories'), 
        ));
		
    update_option('sidebars_widgets',  $activate);
	$MediaId = get_option('moxo_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );
?>