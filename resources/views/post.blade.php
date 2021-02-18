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
						<td><a href="{{ route('posts.show', $post->id) }}">Dettaglio</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
</body>
</html>