// JavaScript Validation For Registration Page

$('document').ready(function () {

	// name validation
	var nameregex = /^[a-zA-Z ]+$/;

	$.validator.addMethod("validname", function (value, element) {
		return this.optional(element) || nameregex.test(value);
	});

	// valid email pattern
	var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	$.validator.addMethod("validemail", function (value, element) {
		return this.optional(element) || eregex.test(value);
	});

	$("#register-form").validate({

		rules:
		{
			name: {
				required: true,
				validname: true,
				minlength: 4
			},
			email: {
				required: true,
				validemail: true,
				remote: {
					url: "check-email.php",
					type: "post",
					data: {
						email: function () {
							return $("#email").val();
						}
					}
				}
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 15
			},
			cpassword: {
				required: true,
				equalTo: '#password'
			},
		},
		messages:
		{
			name: {
				required: "Name is required",
				validname: "Name must contain only alphabets and space",
				minlength: "Your name is too short"
			},
			email: {
				required: "Email is required",
				validemail: "Please enter valid email address",
				remote: "Email already exists"
			},
			password: {
				required: "Password is required",
				minlength: "Password at least have 6 characters"
			},
			cpassword: {
				required: "Retype your password",
				equalTo: "Password did not match !"
			}
		},
		errorPlacement: function (error, element) {
			$(element).closest('.form-group').find('.help-block').html(error.html());
		},
		highlight: function (element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).closest('.form-group').find('.help-block').html('');
		},
		submitHandler: submitForm
	});

	function submitForm() {

		$.ajax({
			url: '../querys/ajax-signup.php',
			type: 'POST',
			data: $('#register-form').serialize(),
			dataType: 'json'
		})
		.done(function (data) {

			$('#btn-signup').html('<img src="../assets/img/ajax-loader.gif" /> &nbsp; signing up...').prop('disabled', true);
			$('input[type=text],input[type=email],input[type=password]').prop('disabled', true);

			setTimeout(function () {

				if (data.status === 'success') {
					$('#errorDiv').slideDown('fast', function () {
						$('#errorDiv').html('<div class="alert-success form-control mb-3"><div class="text-center"><span>' + data.message + '</span></div></div>');
						$("#register-form").trigger('reset');
						$('input[type=text],input[type=email],input[type=password]').prop('disabled', false);
						$('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign Up').prop('disabled', false);
					}).delay(3000).slideUp('fast');

				} else {

					$('#errorDiv').slideDown('fast', function () {
						$('#errorDiv').html('<div class="alert alert-danger">' + data.message + '</div>');
						$("#register-form").trigger('reset');
						$('input[type=text],input[type=email],input[type=password]').prop('disabled', false);
						$('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign Up').prop('disabled', false);
					}).delay(3000).slideUp('fast');
				}
			}, 3000);
		})
		.fail(function () {
			$("#register-form").trigger('reset');
			alert('An unknown error occoured, Please try again Later...');
			alert(xhr.responseText);
		});
	}
});