<!DOCTYPE html>
<html>
	<head>
		<title>Psarnetwork-Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<!-- Bootstrap CSS -->
				{{HTML::style('backend/css/bootstrap.css')}}
				<!-- Main CSS -->
				{{HTML::style('backend/css/main.css')}}
				{{HTML::style('backend/css/login.css')}}

				<!-- Font Awesome CSS -->
				{{HTML::style('backend/fonts/font-awesome.css')}}
				{{HTML::style('backend/css/custom.css')}}
				<!--[if IE 7]>
					{{HTML::style('backend/fonts/font-awesome.css')}}
				<![endif]-->
			<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
				<!--[if lt IE 9]>
					{{HTML::script('backend/js/html5shiv.js')}}
					{{HTML::script('backend/js/respond.min.js')}}
				<![endif]-->
			<script type="text/javascript">
					var _gaq = _gaq || [];
						gaq.push(['_setAccount', 'UA-46527722-1']);
						_gaq.push(['_trackPageview']);

					(function() {
							var ga = document.createElement('script');
							ga.type = 'text/javascript';
							ga.async = true;
							ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
							var s = document.getElementsByTagName('script')[0];
							s.parentNode.insertBefore(ga, s);
					})();

			</script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
	<div 
		id="login-container"
		style="border:2px solid #ddd; padding:10px; border-radius:5px;" 
	>
				<h3><span>Administrator</span></h3>
				<h5>Please sign in to get access.</h5>
				@if (Session::has('invalid'))
					<div class="alert alert-danger">{{Session::get('invalid')}}</div>
				@endif
			<form action="{{URL::to('admin/login')}}" method="post" class='form'>
				<div class="form-group">
					<input type="text" name="email" value="<?php echo @$_COOKIE['remember_username']; ?>" class="form-control" placeholder="Email"/>
					<span class="class-error">{{$errors->first('email')}}</span>
				</div>
				<div class="form-group">
					<input type="password" name="password" value="<?php echo @$_COOKIE['remember_password']; ?>" class="form-control" placeholder="Password"/>
					<span class="class-error">{{$errors->first('password')}}</span>
				</div>
				<div class="form-group">
					<input type="submit" name="btnLogin" value="Login" class="btn btn-primary btn-block" />
				</div>
				<div class="form-group">
					<input name="remember_me" type="checkbox" <?php echo isset($_COOKIE['remember_username'])?"checked":"";?> /> Remembered me
				</div>
			</form>
	</div>
	</body>
</html>
