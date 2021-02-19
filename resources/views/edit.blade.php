@extends('layout.template')

@section('main')
	<div class="container">
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			
		@endif
		<form action="{{ route('update', $post->slug) }}" method="post">
			@csrf
			@method('PUT')

			<div class="form-group">
				<label for="title">Titolo</label>
				<input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
			</div>

			<div class="form-group">
				<label for="author">Autore</label>
				<input type="text" class="form-control" id="author" name="author" value="{{ $post->author }}">
			</div>

			<div class="form-group">
				<label for="image">Immagine</label>
				<textarea class="form-control" name="img" id="image" cols="30" rows="10">{{ $post->img }}</textarea>
			</div>
		
			<div class="form-group">
				<label for="text">Testo</label>
				<textarea class="form-control" name="text" id="text" cols="30" rows="10">{{ $post->text }}</textarea>
			</div>

			<div class="form-group">
				<label for="post_status">Post Status</label>
				<select class="form-control" name="post_status" id="post_status" name="post_status">
					<option {{ $post->info->post_status == 'public' ? 'selected' : '' }} value="public">public</option>
					<option {{ $post->info->post_status == 'draft' ? 'selected' : '' }} value="draft">draft</option>
					<option {{ $post->info->post_status == 'private' ? 'selected' : '' }} value="private">private</option>
				</select>
			</div>

			<div class="form-group">
				<label for="comment_status">Comment status</label>
				<select class="form-control" name="comment_status" id="comment_status">
					<option {{ $post->info->comment_status == 'open' ? 'selected' : '' }} value="open">open</option>
					<option {{ $post->info->comment_status == 'close' ? 'selected' : '' }} value="close">close</option>
					<option {{ $post->info->comment_status == 'private' ? 'selected' : '' }} value="private">private</option>
				</select>
			</div>

			<button class="btn btn-primary" type="submit">Modifica</button>
		</form>
	</div>
		
@endsection