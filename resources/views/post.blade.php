<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<ul class="text-center">
	
		@foreach ($posts as $post)
			<li class="my-5">
				<h1>{{ $post->title }}</h1>
				<p>{{ $post->text }}</p>
				<p>- {{ $post->author }}</p>
				<p><strong>Post Status</strong>  - {{ $post->info->post_status }}</p>
				<p><strong>Comment Status</strong> - {{ $post->info->comment_status }}</p>

			</li>
		@endforeach
	</ul>
</body>
</html>