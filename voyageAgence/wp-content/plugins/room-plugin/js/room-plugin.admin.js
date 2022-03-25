/**
 Plugin Name: Room Plugin
 Plugin URI: http://themerex.net
 Description: Room Plugin - Premium plugin
 Author: ThemeREX
 Author URI: http://themerex.net
 Version: 1.0
 */

jQuery(document).ready(function(){

    jQuery('#room_start').datepicker({
        dateFormat : 'dd/mm/yy',
        minDate: 0,
        onSelect: function(dateText, inst){
            jQuery("#room_end").datepicker("option","minDate", jQuery("#room_start").datepicker("getDate"));
        }
    });

    jQuery('#room_end').datepicker({
        dateFormat : 'dd/mm/yy'
    });

    jQuery("#room_end").datepicker("option","minDate", jQuery("#room_start").datepicker("getDate"));

});
