<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<title>
		@section('title')
		@show
	</title>
	<meta name="keywords" content="" />
	<meta name="author" content="Kyle Gawryluk" />
	<meta name="description" content="" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/datatables.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/datepicker3.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.4.1/select2.min.css" type="text/css"/>
	<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

	@section('styles')
	@show

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">
		<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">


	</head>
	<body>

		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{URL::to('account')}}"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="logo" ></a>
				</div>
				<div class="collapse navbar-collapse">
					<form class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search" id="table-search">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			@yield('content')
		</div>
		<div class="modal-container modal fade"></div>
	</body>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets/js/datatables.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/moment.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/select2/3.4.1/select2.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.3.1/jquery.maskedinput.min.js"></script>

	@yield('scripts')

	<script type="text/javascript">
	</script>

	<script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>

	</html>
