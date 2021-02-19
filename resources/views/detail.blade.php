@extends('layout.template')

@section('main')
	<div class="container bg-dark text-white py-2">
		<ul>	
			<li class="my-5 list-unstyled">
				<h1 class="text-center">{{ $post->title }}</h1>
				<div class="text-center">
					<img src="{{ $post->img }}" alt="">
				</div>
				
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
					
					<div class="my-1">- <strong>{{ $comment->author }}</strong></div>
					<div>{{ $comment->text }}</div>
					<div class="mt-2 mb-4">Commento pubblicato il: {{ $comment->published_at }}</div>
					
				@endforeach

			</li>
		</ul>

		<form action="{{ route('newComment', $post->id) }}" method="post">
			@csrf
			@method('POST')

			<div class="form-group">
				<label for="author">Autore</label>
				<input type="text" class="form-control" id="author" name="author">
			</div>

			<div class="form-group">
				<label for="text">Commento</label>
				<textarea class="form-control" name="text" id="text" cols="30" rows="10"></textarea>
			</div>

			<button class="btn btn-primary" type="submit">INVIA</button>
		</form>
	</div>
@endsection
	