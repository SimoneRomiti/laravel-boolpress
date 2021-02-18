<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body class="bg-dark text-white">
	<div class="container">
		<ul>	
			<li class="my-5 list-unstyled">
				<h1 class="text-center">{{ $post->title }}</h1>
				<p>{{ $post->text }}</p>
				<p class="text-center">- {{ $post->author }}</p>
				<p>Pubblicato il: <strong>{{ $post->published_at }}</strong></p>
				<p>
					<strong>Post Status</strong>
					- {{ $post->info->post_status }}
				</p>
				<p>
					<strong>Comment Status</strong>
					- {{ $post->info->comment_status }}
				</p>
				<h3 class="text-center">Commenti</h3>
				@foreach ($post->comments as $comment)
					
					<div>- <strong>{{ $comment->author }}</strong></div>
					<div>{{ $comment->text }}</div>
					<div class="mt-2 mb-4">Commento pubblicato il: {{ $comment->published_at }}</div>
					
				@endforeach
		
				
			</li>
		</ul>
	</div>
	
</body>
</html>