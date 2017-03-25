$(document).ready(function() {
	// validators functions
	function validateEmail(email) {
		var filter = /^([\w\.]+)@([\w\.]+)\.(\w+)$/;
		if (filter.test(email)) {
			return true;
		}
		else {
			return false;
		}
	}
	function validatePasswd(pwd) {
		var filter = /^(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/;
		if (filter.test(pwd)) {
			return true;
		}
		else {
			return false;
		}
	}
	function validatePhone(tel) {
		var filter = /^[0-9]+$/;
		if (filter.test(tel)) {
			return true;
		}
		else {
			return false;
		}
	}

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

	// login form client side validation
	$("#login_btn").click(function(event) {
		var email = $("#email").val().trim();
		var pwd = $("#pwd").val();
		var error_free=true;
		if (email.length === 0) {
			$("#email").css("border", "2px solid red");
			$("#email").attr("placeholder", "This field is required");
			error_free=false;
			event.preventDefault();
		}
		else if (!validateEmail(email)) {
			$("#email").css("border", "2px solid red");
			$("#email").val("");
			$("#email").attr("placeholder", "Enter Valid Email");
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


	// signup form client side validation
	$("#signup_btn").click(function(event) {
		var name = $("#name").val().trim();
		var clg = $("#clg").val().trim();
		var city = $("#city").val().trim();
		var tel = $("#tel").val().trim();
		var email = $("#email").val().trim();
		var pwd = $("#pwd").val();
		var cpwd = $("#cpwd").val();
		var gender = $('input[name=gender]').attr("value");
		var error_free=true;

		// name field
		if (name.length === 0) {
			$("#name").css("border", "2px solid red");
			$("#name").val("");
			$("#name").attr("placeholder", "This field is required");
			error_free=false;
			event.preventDefault();
		}
		else {
			$("#name").css("border", "2px solid green");
		}

		// clg field
		if (clg.length === 0) {
			$("#clg").css("border", "2px solid red");
			$("#clg").val("");
			$("#clg").attr("placeholder", "This field is required");
			error_free=false;
			event.preventDefault();
		}
		else {
			$("#clg").css("border", "2px solid green");
		}

		// city field
		if (city.length === 0) {
			$("#city").css("border", "2px solid red");
			$("#city").val("");
			$("#city").attr("placeholder", "This field is required");
			error_free=false;
			event.preventDefault();
		}
		else {
			$("#city").css("border", "2px solid green");
		}

		// tel field
		if (tel.length === 0) {
			$("#tel").css("border", "2px solid red");
			$("#tel").val("");
			$("#tel").attr("placeholder", "This field is required");
			error_free=false;
			event.preventDefault();
		}
		else if (!validatePhone(tel)) {
			$("#tel").css("border", "2px solid red");
			$("#tel").val("");
			$("#tel").attr("placeholder", "Enter only digits");
			error_free=false;
			event.preventDefault();
		}
		else {
			$("#tel").css("border", "2px solid green");
		}

		// email field
		if (email.length === 0) {
			$("#email").css("border", "2px solid red");
			$("#email").val("");
			$("#email").attr("placeholder", "This field is required");
			error_free=false;
			event.preventDefault();
		}
		else if (!validateEmail(email)) {
			$("#email").css("border", "2px solid red");
			$("#email").val("");
			$("#email").attr("placeholder", "Enter Valid Email");
			error_free=false;
			event.preventDefault();
		}
		else {
			$("#email").css("border", "2px solid green");
		}

		// passwd field
		if (pwd.length === 0) {
			$("#pwd").css("border", "2px solid red");
			$("#pwd").attr("placeholder", "This field is required");
			error_free=false;
			event.preventDefault();
		}
		else if (!validatePasswd(pwd)) {
			$("#pwd").css("border", "2px solid red");
			$("#pwd").val("");
			$("#pwd").attr("placeholder", "Password must have at least 1 small, 1 capital letter, 1 number and 8 character length");
			error_free=false;
			event.preventDefault();
		}
		else {
			$("#pwd").css("border", "2px solid green");
		}

		// confirm passwd field
		if (cpwd.length === 0) {
			$("#cpwd").css("border", "2px solid red");
			$("#cpwd").attr("placeholder", "This field is required");
			error_free=false;
			event.preventDefault();
		}
		else if (pwd !== cpwd) {
			$("#cpwd").css("border", "2px solid red");
			$("#cpwd").val("");
			$("#cpwd").attr("placeholder", "Password mismatch");
			error_free=false;
			event.preventDefault();
		}
		else {
			$("#cpwd").css("border", "2px solid green");
		}

		// gender field
		if (!$('input[name=gender]:checked').val()) {
			$("#gender_error").text("This field is required");
			error_free=false;
			event.preventDefault();
		}
		else {
			$("#gender_error").text("");
		}

		if (error_free) {
			$.ajax({
				method: "POST",
				url: "signup.php",
				data: {name: name, clg: clg, city: city, tel: tel,email: email, pwd: pwd, cpwd: cpwd, gender: gender}
			})
			.done(function( msg ) {
				if (msg)
					alert(msg);
				else
					location.replace("login.php");
			})
			.fail(function( jqXHR, textStatus, errorThrown) {
				console.log( "Request failed: " + textStatus + " " + errorThrown + " " + jqXHR.status);
			});
		}
	});

});
