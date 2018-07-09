@extends('layout.layout')

@section('title','Perfil')

@section('content')
       
    <div class="row">
        <div class="col text-center">
                <img style="height:100px; width:100px; background-color:#EFEFEF" class="card-img-top mx-auto rounded-circle d-block m-4 " src="/images/{{ $trainer->avatar }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{  $trainer->nombre }}</h5>
                    <p class="card-text">{!! $trainer->desc !!}</p>
                    <a href="/trainers" class="btn btn-primary">Volver</a>
                    <a href="/trainers/{{ $trainer->slug }}/edit" class="btn btn-primary">Editar</a>

                    {!! Form::open(['route'=>['trainers.destroy',$trainer->slug],'method'=>'DELETE']) !!}
                    {!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
        </div>
    </div>

@endsection