/**
 *
 *
 * @package Moxo kit
 *
 */
var moxokit_customize_tabs_focus = function ( $ ) {
    'use strict';
    $( function () {
        var customize = wp.customize;
		//live changed with on
        $( '.customize-partial-edit-shortcut' ).on( 'DOMNodeInserted', function () {
            $( this ).on( 'click', function() {
                var controlId = $( this ).attr( 'class' );
                var tabToActivate = '';

                if ( controlId.indexOf( 'widget' ) !== -1 ) {
                    tabToActivate = $( '.moxo-customizer-tab>.widgets' );
                } else {
                    var controlFinalId = controlId.split( ' ' ).pop().split( '-' ).pop();
                    tabToActivate = $( '.moxo-customizer-tab>.' + controlFinalId );
                }

                customize.preview.send( 'tab-previewer-edit', tabToActivate );
            } );
        } );
    } );
};

moxokit_customize_tabs_focus( jQuery );