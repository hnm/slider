jQuery(document).ready(function($) {
if (typeof $.fn.owlCarousel !== 'function') return;
	
	function initOwl(jqElemSlider, options) {
		options = options || {};
		options = $.extend({
			nav: false, // Show next and prev buttons
			dots: false,
			autoplay: true,
			navSpeed : 600,
			dotsSpeed : 400,
			navRewind: true,
			navText: ['prev','next'],
			loop: true,
			items: 1,
			onInitialize: function (event) {
				if (jqElemSlider.children().length <= 1) {
					this.settings.loop = false;
					this.settings.mouseDrag = false;
					this.settings.nav = false;
					this.settings.dots = false;
				}
			}
		}, options);
	return jqElemSlider.owlCarousel(options);
	}
	
	(function() {
		var jqElemSlider = $(".owl-carousel");
		if (0 === jqElemSlider.length) return;
		
		initOwl(jqElemSlider);
	})();
});