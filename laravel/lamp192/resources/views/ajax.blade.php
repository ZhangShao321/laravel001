<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ajax-post</title>
	<script src='/admins/js/jquery.min.js'></script>
</head>
<body>
	<button>点击发送ajax</button>

	<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});
	// alert($);
	$('button').click(function(){

		$.post('/ajax-post',{},function(data){

			console.log(data);
		})
	})
	</script>
</body>
</html>