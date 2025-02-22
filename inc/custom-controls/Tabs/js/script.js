var Moxo_Customize_Control_Tabs = function ( $ ) {
    'use strict';

    $( function () {
        var customize = wp.customize;

        // Switch tab based on customizer partial edit links.
        customize.previewer.bind( 'tab-previewer-edit', function( data ) {
            $( data.selector ).trigger( 'click' );
        } );

        // Hide all controls
        $( '.moxo-tabs-control' ).each( function () {
            var customizerSection = $( this ).closest( '.accordion-section' );
            //Hide all controls in section.
            hideAllExceptCurrent( customizerSection );

            //Show controls under first radio button.
            var shownCtrls = $( this ).find( '.moxo-customizer-tab > input:checked' ).data( 'controls' );
            showControls( customizerSection, shownCtrls );
        } );

        $( '.moxo-customizer-tab > label' ).on( 'click', function () {
            var customizerSection = $( this ).closest( '.accordion-section' );
            var controls = $( this ).prev().data( 'controls' );

            //Hide all controls in section
            hideAllExceptCurrent( customizerSection );
            showControls( customizerSection, controls );
        } );
    } );
};

Moxo_Customize_Control_Tabs( jQuery );

/**
 * Handles showing the controls when the tab is clicked.
 * 
 * @param customizerSection
 * @param controlsToShowArray
 */
function showControls( customizerSection, controlsToShowArray ) {
    'use strict';
    jQuery.each( controlsToShowArray, function ( index, controlId ) {
        var parentSection = customizerSection[ 0 ];
        if ( controlId === 'widgets' ) {
            jQuery( parentSection ).children( 'li[class*="widget"]' ).css( 'display', 'list-item' );
            return true;
        }
        jQuery( '#customize-control-' + controlId ).css( 'display', 'list-item' );
    } );
}

/**
 * Utility function that hides all the controls in the panel except the tabs control.
 *
 * @param customizerSection
 * @param controlId
 */
function hideAllExceptCurrent( customizerSection ) {
    'use strict';
    jQuery( customizerSection ).children( 'li.customize-control' ).css( 'display', 'none' );
}