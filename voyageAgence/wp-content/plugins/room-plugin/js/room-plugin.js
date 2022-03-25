/**
 Plugin Name: Room Plugin
 Plugin URI: http://themerex.net
 Description: Room Plugin - Premium plugin
 Author: ThemeREX
 Author URI: http://themerex.net
 Version: 1.0
 */

jQuery(document).ready(function(){

    swiper_slides();

    function swiper_slides() {
            var count = jQuery('.room-container.swiper-container').attr('data-slides');

            if (jQuery(document).width() < 740) {
                count = 2;
            }
            if (jQuery(document).width() < 470) {
                count = 1;
            }


            var swiper = new Swiper('.room-container.swiper-container', {
                slidesPerView: count,
                slidesPerColumn: 1,
                paginationClickable: true,
                spaceBetween: 30,
                scrollbarDraggable: true,
                autoplay: 5000,
                scrollbarHide: false,
                scrollbarSnapOnRelease: true,
                scrollbar: '.swiper-scrollbar',
                loop: true,
                autoheight: true
            });


    }



    jQuery(function() {
        jQuery( "#room-plugin-price" ).slider({
            range:true,
            min: 0,
            max: jQuery( "#room-plugin-price").attr('data-maxvalue'),
            values: [ (jQuery( "#room-plugin-price").attr('data-maxvalue') * 0.2), (jQuery( "#room-plugin-price").attr('data-maxvalue') * 0.7) ],
            slide: function( event, ui ) {
                jQuery( "#room-price-begin" ).val( ui.values[ 0 ]);
                jQuery( "#room-price-end" ).val( ui.values[ 1 ] );
                jQuery( "#room-plugin-price .ui-slider-range + .ui-slider-handle" ).attr('data-content', "$" + ui.values[ 0 ]);
                jQuery( "#room-plugin-price .ui-slider-handle + .ui-slider-handle" ).attr('data-content', "$" + ui.values[ 1 ]);
            }
        });
        jQuery( "#room-price-begin" ).val( jQuery( "#room-plugin-price" ).slider( "values", 0 ) );
        jQuery( "#room-plugin-price .ui-slider-range + .ui-slider-handle" ).attr('data-content', "$" + jQuery( "#room-plugin-price" ).slider( "values", 0 ) );
        jQuery( "#room-price-end" ).val( jQuery( "#room-plugin-price" ).slider( "values", 1 ) );
        jQuery( "#room-plugin-price .ui-slider-handle + .ui-slider-handle" ).attr('data-content', "$" +jQuery( "#room-plugin-price" ).slider( "values", 1 ));
    });

    jQuery('#room_start').datepicker({
        dateFormat : 'dd/mm/yy',
        minDate: 0,
        showButtonPanel: true,
        closeText: "Ok"
    });
    jQuery('#room_start').focus(function(){  	jQuery(this).blur()  })



});
