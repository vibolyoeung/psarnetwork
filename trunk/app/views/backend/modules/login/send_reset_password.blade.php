<!DOCTYPE html>
<html>
	<head>
		<title>Psarnetwork-Reset Password</title>
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
	<div id="login-container">
		<div id="logo"><sup><i class="icon-cloud"></i></sup></div>
			<div id="login">
				<h3><span>Reset Password</span></h3>
				@if (Session::has('invalid'))
					<div class="alert alert-danger">{{Session::get('invalid')}}</div>
				@endif
					{{ Form::open(array('url' => 'admin/send-forget-password','class'=>'form'))}}
				<div class="form-group">
					{{Form::text('email',null, array('class' =>'form-control','placeholder'=>'Email'))}}
					<span class="class-error">{{$errors->first('email')}}</span>
				</div>
				<div class="form-group">
					{{Form::submit('Send',array('name'=>'btnSendResetPassword','class' => 'btn btn-success btn-block'))}}
				</div>
				<div class="form-group">
					<a href="{{URL::to('admin/')}}" class="btn btn-default">Back To Login</a>
				</div>
			{{Form::close()}}
		</div>
	</div>
	</body>
</html>
