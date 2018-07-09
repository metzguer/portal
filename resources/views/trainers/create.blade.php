 @extends('layout.layout')
 @section('title', 'Create')
 @section('content')

 <form class="form-group mt-5" method="POST" action="/trainers" enctype="multipart/form-data">
	@csrf
   <div class="form-group">
		   <label>Nombre</label>
		   <input type="text" name="nombre" class="form-control">
   </div>

   <div class="form-group">
		   <label for="">Avatar</label>
		   <input type="file" name="avatar" class="">
		   <br/><br/>
		   <label for="">Descripcion del entrenador:</label>
		  <textarea name="descripcion" id="descripcion" rows="155" required></textarea>

		   <label for="">Slug:</label>
		   <input type="text" class="form-control" name="slug">
   </div>

   <button type="submit" class="btn btn-primary">Enviar</button>
   
</form>


<!-- Mostrar los errores -->
@if($errors->any())
<div class="alert alert-danger mt-4">
	<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
	</ul>
</div>
@endif
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'descripcion' );
</script>
<!--
 	<form class="form-group mt-5" method="POST" action="/trainers" enctype="multipart/form-data">
 		@csrf
		<div class="form-group">
				<label>Nombre</label>
				<input type="text" name="nombre" class="form-control">
		</div>

		<div class="form-group">
				<label for="">Avatar</label>
				<input type="file" name="avatar" class="">
				<br/><br/>
				<label for="">Descripcion del entrenador:</label>
				<input type="text" class="form-control" name="descripcion">

				<label for="">Slug:</label>
				<input type="text" class="form-control" name="slug">
		</div>

		<button type="submit" class="btn btn-primary">Enviar</button>
		
	</form>
-->

@endsection