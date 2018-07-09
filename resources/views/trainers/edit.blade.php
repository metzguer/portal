@extends('layout.layout')
@section('title', 'Editar')
@section('content')
<div class="row">
    <div class="col">
         <!-- El form toma la ruta de la url wen route web y el metodo del controlador -->
        <!-- El nombre del binding es el nombre especificado en la base de datos Form::label,text(nameColumBD) -->
        <img style="height:100px; width:100px; background-color:#EFEFEF" class="card-img-top mx-auto rounded-circle d-block m-4 " src="/images/{{ $trainer->avatar }}" alt="">
        {!! Form::model($trainer,['route'=>['trainers.update',$trainer],'method'=>'PUT','files'=>true]) !!}
        <div class="form-group mt-3">
                {!! Form::label('nombre','Nombre') !!}
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('avatar','Avatar') !!}
                    {!! Form::file('avatar') !!}
            </div>	
            <div class="form-group">
                {!! Form::label('descripcion','Descripcion') !!}
                {!! Form::text('descripcion','',['class'=>'form-control']) !!}
            </div>		
            <div class="form-group">
                {!! Form::label('slug','Slug') !!}
                {!! Form::text('slug',null,['class'=>'form-control']) !!}
            </div>		
            {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
<!--
        <form class="form-group mt-5" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $trainer->nombre }}">
                    
            </div>
            <img style="height:100px; width:100px; background-color:#EFEFEF" class="card-img-top mx-auto rounded-circle d-block m-4 " src="/images/{{ $trainer->avatar }}" alt="">
            <div class="form-group">
                    <label for="">Avatar nombre: {{ $trainer->avatar }}</label>
                    <input type="file" name="avatar" class="" value="/images/{{ $trainer->avatar }}">
                    <br/><br/>
                    <label for="">Descripcion del entrenador:</label>
                    <input type="text" class="form-control" name="desc" value="{{ $trainer->desc }}">
                    
                    <label for="">Slug:</label>
                    <input type="text" class="form-control" name="slug" value="{{ $trainer->slug }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
		
        </form>
    -->
   
    </div>
</div>
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<script>
	
	CKEDITOR.config.height = 400;
		CKEDITOR.config.width  = 'auto';
		CKEDITOR.replace('desc');
	
</script>
@endsection

