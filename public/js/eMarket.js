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

	$("#login_btn").click(function(event) {
		var email = $("#email").val();
		var pwd = $("#pwd").val();
		var error_free=true;
		if (email.length === 0) {
			$("#email").css("border", "2px solid red");
			$("#email").attr("placeholder", "This field is required");
			error_free=false;
			event.preventDefault();
		}
		else {
			$("#email").css("border", "2px solid green");
		}
		if (pwd.length === 0) {
			$("#pwd").css("border", "2px solid red");
			$("#pwd").attr("placeholder", "This field is required");
			error_free=false;
			event.preventDefault();
		}
		else {
			$("#pwd").css("border", "2px solid green");
		}
		if (error_free) {
			$.ajax({
				method: "POST",
				url: "login.php",
				data: {email: email, pwd: pwd}
			})
			.done(function( msg ) {
				if (msg)
					alert(msg);
				else
					location.replace("index.php");
			})
			.fail(function( jqXHR, textStatus, errorThrown) {
				console.log( "Request failed: " + textStatus + " " + errorThrown + " " + jqXHR.status);
			});
		}
	});
});

