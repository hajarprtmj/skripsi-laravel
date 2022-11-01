
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('template-login') }}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template-login') }}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template-login') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template-login') }}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template-login') }}/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template-login') }}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template-login') }}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template-login') }}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template-login') }}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template-login') }}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('template-login') }}/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
					<span class="login100-form-title p-b-43">
						Register
					</span>
                    @csrf

                    <div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="name" id="name">
						<span class="focus-input100"></span>
						<span class="label-input100">Name</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" id="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
						<span class="focus-input100"></span>
						<span class="label-input100">Confirm Password</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							{{ __('Register') }}
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							<a href="{{ route('login') }}">Klik disini jika memiliki akun</a>
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('{{ asset('picture') }}/home.png');">
				</div>
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="{{ asset('template-login') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template-login') }}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template-login') }}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('template-login') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template-login') }}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template-login') }}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ asset('template-login') }}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template-login') }}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template-login') }}/js/main.js"></script>

</body>
</html>
