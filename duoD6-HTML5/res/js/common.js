/*
 * search.js
 */

/* Search box behavior */

$(document).ready(function() {

	/* Sets initial state if there is content in the search box. */
	if (jQuery.trim($('#search-box')[0].value).length != 0) {
		$('.search-label').addClass('hidden');
	}

	/* Hide the label when the input gets focus */

	$('#search-box').focus(function() {
		$('.search-label').addClass('hidden');
	});

	/* Show the label when the input loses focus if it's empty */
	$('#search-box').blur(function() {
		if ($.trim(this.value).length == 0) {
			$('.search-label').removeClass('hidden');
		}
	});

});



