/*
 * Show and Hide event for index.php
 */


$(document).ready(function () {

	// remove the href from only anchors also shows the cursor pointer
	$("a").removeAttr("href").css("cursor", "pointer");
	var query = window.location.search.substring(1);

	if (query == "setuppassword") {
		$("#login").slideUp("slow", function () {
			$("#Create").slideDown("slow");
		});
	}

	$("#setup").click(function () {
		$('#login').hide('scale', {}, 1000);
		$('#Create').show('scale', {
			percent: 100
		}, 500);
	});

	$("#signin").click(function () {
		$('#Create').hide('scale', {}, 1000);
		$('#login').show('scale', {
			percent: 100
		}, 500);
	});
});
