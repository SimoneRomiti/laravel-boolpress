@extends('layout.template')

@section('main')
	<div class="container my-5">
		@if (session('message'))
			<div class="alert alert-success">
					{{ session('message') }}
			</div>
		@endif

		@if (session('messageError'))
			<div class="alert alert-danger">
					{{ session('messageError') }}
			</div>
		@endif
		<table class="table table-dark table-striped tabel-bordered">
			<thead>
				<th>TITOLO</th>
				<th>TESTO</th>
				<th>AUTORE</th>
				<th>POST STATUS</th>
				<th>COMMENT STATUS</th>
				<th>PUBBLICATO IL</th>
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
						<td><a class="btn btn-primary" href="{{ route('detail', $post->slug) }}">Dettaglio</a></td>
						<td><a class="btn btn-primary" href="{{ route('edit', $post->slug) }}">Modifica</a></td>
						<td>
							<form action="{{ route('delete', $post->id) }}" method="post" onsubmit="return confirm('Sei sicuro?')">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit">Elimina</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<a class="btn btn-primary" href="{{ route('create') }}">Crea</a>
	</div>
@endsection
	