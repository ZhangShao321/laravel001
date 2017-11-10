<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
</head>
<body>
	<center>
		@include('homes.mem')

		@section('content')
		
		@show
	</center>
</body>
</html>