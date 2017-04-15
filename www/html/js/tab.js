// jQuery_Auto 0.9
// Automatic functions for webpages (using the wonderful jQuery library)

// Copyright: (c) 2006, Michal Tatarynowicz (tatarynowicz@gmail.com)
// Licenced as Public Domain (http://creativecommons.org/licenses/publicdomain/)
// $Id: jquery_auto.js 426 2006-05-06 19:54:39Z Michał $

// customize: Takashi Hirasawa (http://css-happylife.com/)

// Initialization

$.auto = {
	init: function() {
		for (module in $.auto) {
			if ($.auto[module].init)
				$.auto[module].init();
		}
	}
};

$(document).ready($.auto.init);

// Switches tabs on click

$.auto.tabs = {

	init: function() {

		$('.tabContainer').each(function(){
			var f = $.auto.tabs.click;
			var group = this;
			$('.tabMenu li, li.tabMenu', group).each(function(){
				this.group = group;
				$(this).click(f);
				$('#'+this.id+'_area').hide();
			}).filter(':first').trigger('click');
		});

	},

	click: function() {
		var tab = $('#'+this.id+'_area').get(0);
		$('.tabMenu li, li.tabMenu', this.group).each(function(){
			$(this).removeClass('active');
			$('#'+this.id+'_area').hide();
		});

		$(this).addClass('active');
		$(tab).show();
		this.blur();

		return false;
	}

};
