$(document).ready(function() {
	// function category(ctgry) {
	// 	$.ajax({
	// 		method: "POST",
	// 		url: "category.php",
	// 		data: {category: ctgry}
	// 	})
	// 	.done(function( msg ) {
	// 		$("#item").html(msg);
	// 	})
	// 	.fail(function( jqXHR, textStatus, errorThrown) {
	// 		console.log( "Request failed: " + textStatus + " " + errorThrown + " " + jqXHR.status);
	// 	});
	// }
	// $("#Electronic").click(function() {
	// 	category("Electronic");
	// });
	// $("#Clothing").click(function() {
	// 	category("Clothing");
	// });
	// $("#Stationary").click(function() {
	// 	category("Stationary");
	// });
	// $("#Sports").click(function() {
	// 	category("Sports");
	// });
	// $("#Furniture").click(function() {
	// 	category("Furniture");
	// });
	// $("#Vehicle").click(function() {
	// 	category("Vehicle");
	// });
	// $("#Miscellaneous").click(function() {
	// 	category("Miscellaneous");
	// });

	$.ajax({
		method: "POST",
		url: "featured.php",
	})
	.done(function( msg ) {
		$("#item").html(msg);
	})
	.fail(function( jqXHR, textStatus, errorThrown) {
		console.log( "Request failed: " + textStatus + " " + errorThrown + " " + jqXHR.status);
	});
});

