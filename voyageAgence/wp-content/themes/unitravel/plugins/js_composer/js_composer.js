/* global jQuery:false */
/* global UNITRAVEL_STORAGE:false */

(function() {
	"use strict";

	jQuery(document).on('action.ready_unitravel', unitravel_js_composer_init);
	jQuery(document).on('action.init_shortcodes', unitravel_js_composer_init);
	jQuery(document).on('action.init_hidden_elements', unitravel_js_composer_init);
	
	function unitravel_js_composer_init(e, container) {
		if (arguments.length < 2) var container = jQuery('body');
		if (container===undefined || container.length === undefined || container.length == 0) return;
	
		container.find('.vc_message_box_closeable:not(.inited)').addClass('inited').on('click', function(e) {
			jQuery(this).fadeOut();
			e.preventDefault();
			return false;
		});
	}
})();