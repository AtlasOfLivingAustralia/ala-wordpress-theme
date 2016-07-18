// ALA custom functions
jQuery(document).ready(function($) {

	//  politely move ALA navbar down below Wordpress admin bar if present.
	if( $('#wpadminbar').length ) {
		 // wordpress admin bar is present
		 var wpadminheight = $('#wpadminbar').css('height');
		 $('#alatopnav').css({top: wpadminheight});
	} else {
		// wordpress admin bar is not present
		$('#alatopnav').css({top: 0});
	}

	// autocomplete for search inputs
	$(".autocomplete").autocomplete('http://bie.ala.org.au/search/auto.jsonp', {
		extraParams: {limit: 100},
		dataType: 'jsonp',
		parse: function(data) {
			var rows = new Array();
			data = data.autoCompleteList;
			for(var i=0; i<data.length; i++){
				rows[i] = {
					data: data[i],
					value: data[i].matchedNames[0],
					result: data[i].matchedNames[0]
				};
			}
			return rows;
		},
		matchSubset: false,
		formatItem: function(row, i, n) {
			return row.matchedNames[0];
		},
		cacheLength: 10,
		minChars: 3,
		scroll: false,
		max: 10,
		selectFirst: false
	});

	// fixed sidebar nav for help pages
	var headerHeight = $('.navbar-fixed-top').outerHeight(true) + $('.info-hub-banner').outerHeight(true) + $('.breadcrumb').outerHeight(true);
	var footerHeight = 0;
	$('footer').each(function() {
		footerHeight += $(this).outerHeight();
	});
	$('.profile-usermenu').affix({
		offset: {
			top: headerHeight,
			bottom: footerHeight
		}
	});
	$(window).scroll(function () {
		$('.profile-usermenu').width($('.sidebarCol').width());
	});
});
