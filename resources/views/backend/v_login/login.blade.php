
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('backend/azzara/assets/img/icon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('backend/azzara/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{asset("backend/azzara/assets/css/fonts.css")}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('backend/azzara/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('backend/azzara/assets/css/azzara.min.css')}}">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Admin Studio Heira</h3>
			<div class="login-form">
            <form action="/login" method="post">
            @csrf

            @if(Session::has('pesanerror'))
                <div class="alert alert-danger">{{Session::get('pesanerror')}}</div>
            @endif
				<div class="form-group form-floating-label">
                <input type="email" name="email" id="" value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror">
					<label for="username" class="placeholder">Username</label>
                    @error('email')
                    <span class="invalid-feedback alert-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
				</div>
				<div class="form-group form-floating-label">
                <input type="password" name="password" id="" value="{{ old('password') }}" class="form-control form-control-lg @error('password') is-invalid @enderror">
                @error('password')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
				<div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="rememberme">
						<label class="custom-control-label" for="rememberme">Remember Me</label>
					</div>
					
				</div>
				<div class="form-action mb-3">
					<button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
				</div>
				<div class="login-account">
					<span class="msg">Studio Photo Heira &copy; 2024 <br> Made with ❤️ by Amanda Lee</span>
				</div>
			</div>
            </form>
		</div>
	</div>
	<script src="{{asset('backend/azzara/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('backend/azzara/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('backend/azzara/assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('backend/azzara/assets/js/core/bootstrap.min.js')}}"></script>
	<script src="{{asset('backend/azzara/assets/js/ready.js')}}"></script>
</body>
</html>