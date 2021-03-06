@extends('layout.template')

@section('main')

	<div class="container">

		@if (session('message'))
			<div class="alert alert-success">
				{{ session('message') }}
			</div>
		@endif

		<div class="card" style="width: 40%; margin:auto; background-color: #e6f7ff">
			<img src="{{ $post->img }}" class="card-img-top" alt="...">

			<div class="card-body">
				<h2 class="card-title">{{ $post->title }}</h2>

				<div class="text-center">
					@foreach ($post->tags as $tag)
						<span class="badge badge-info">{{ $tag->name }}</span>
					@endforeach
				</div>

				<p class="card-text">{{ $post->text }}</p>
				
				{{-- Slider slick JQuery --}}
				<div class="slick-carousel">
					@foreach ($post->images as $image)
						<div>
							<img src="{{ asset('images/'.$image->link) }}" style="width: 80%; margin: auto">
						</div>
					@endforeach
				</div>
				{{-- Slider slick JQuery --}}
				
				<p class="card-text text-center">- {{ $post->author }}</p>
				<p class="card-text">Pubblicato il: <strong>{{ $post->published_at }}</strong></p>
				<p class="card-text"><strong>Post Status</strong>
						- {{ $post->info->post_status }}</p>
				<p class="card-text"><strong>Comment Status</strong>
						- {{ $post->info->comment_status }}</p>
				
				<a href="{{ route('post') }}" class="btn btn-primary">Torna all'indice</a>
		</div>
	</div>
	
	

	
	<div class="container bg-dark text-white mt-3" style="border-radius: 5px; padding:20px">
		<h3 class="text-center">Commenti</h3>
		@foreach ($post->comments as $comment)
			
			<div class="my-1">- <strong>{{ $comment->author }}</strong></div>
			<div>{{ $comment->text }}</div>
			<div class="mt-2 mb-4">Commento pubblicato: <strong>{{ $comment->published_at->diffForHumans() }}</strong></div>
			
		@endforeach

	
		@if($post->info->comment_status == 'open')
			<h2>Inserisci un commento</h2>
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
		@elseif($post->info->comment_status == 'private')
			<h2>Non puoi commentare, i commenti di questo post sono privati</h2>
		@else
			<h2>La sezione commenti per questo post è stata chiusa</h2>	
		@endif
		<a href="{{ route('post') }}" class="btn btn-primary mt-3">Torna all'indice</a>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
@endsection
	