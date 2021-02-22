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
		<form action="{{ route('store') }}" method="post">
			@csrf
			@method('Post')

			<div class="form-group">
				<label for="title">Titolo</label>
				<input type="text" class="form-control" id="title" name="title">
			</div>

			<div class="form-group">
				<label for="author">Autore</label>
				<input type="text" class="form-control" id="author" name="author">
			</div>

			<div class="form-group">
				<label for="image">Immagine</label>
				<textarea class="form-control" name="img" id="image" cols="30" rows="10"></textarea>
			</div>
		
			<div class="form-group">
				<label for="text">Testo</label>
				<textarea class="form-control" name="text" id="text" cols="30" rows="10"></textarea>
			</div>

			<div class="form-group">
				<label for="post_status">Post Status</label>
				<select class="form-control" name="post_status" id="post_status" name="post_status">
					<option value="public">public</option>
					<option value="draft">draft</option>
					<option value="private">private</option>
				</select>
			</div>

			<div class="form-group">
				<label for="comment_status">Comment status</label>
				<select class="form-control" name="comment_status" id="comment_status">
					<option value="open">open</option>
					<option value="close">close</option>
					<option value="private">private</option>
				</select>
			</div>

			<div class="form-group">
				<label for="comment_status">TAGS</label>
				@foreach ($tags as $tag)
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" id="{{ $tag->name }}" name="tags[]" value="{{ $tag->id }}">
						<label class="custom-control-label" for="{{ $tag->name }}">{{ $tag->name }}</label>
					</div>
				@endforeach
			</div>


			<button class="btn btn-primary" type="submit">INVIA</button>
		</form>
	</div>
		
@endsection