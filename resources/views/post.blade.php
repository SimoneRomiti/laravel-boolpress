@extends('layout.template')

@section('main')
	<div class="container my-5">
		<table class="table table-dark table-striped tabel-bordered">
			<thead>
				<th>TITOLO</th>
				<th>TESTO</th>
				<th>AUTORE</th>
				<th>POST STATUS</th>
				<th>COMMENT STATUS</th>
				<th>PUBBLICATO IL</th>
				<th>Autore Primo Commento:</th>
			</thead>

			<tbody>
				@foreach ($posts as $post)
					<tr>
						<td>{{ $post->title }}</td>
						<td>{{ substr($post->text, 0, 200). "..." }}</td>
						<td>{{ $post->author }}</td>
						<td>{{ $post->info->post_status }}</td>
						<td>{{ $post->info->comment_status }}</td>
						<td>{{ $post->published_at }}</td>
						<td>{{ $post->comments[0]->author }}</td>
						<td><a href="{{ route('detail', $post->slug) }}">Dettaglio</a></td>
						<td><a href="{{ route('edit', $post->slug) }}">Modifica</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<a class="btn btn-primary" href="{{ route('create') }}">Crea</a>
	</div>
@endsection
	