@extends('layout.layout')
@section ('title','Trainers')

@section('content')
<br/>
<p >Listado de trainers</p>

<div class="row">
	@foreach($trainers as $trainer)

	<div class="col-sm">
			<div class="card text-center" style="width: 18rem; margin-top:20px;">
			<img style="height:100px; width:100px; background-color:#EFEFEF" class="card-img-top mx-auto rounded-circle d-block m-5 " src="images/{{ $trainer->avatar }}" alt="">
		    	<div class="card-body">
			   <h5 class="card-title">{{ $trainer->nombre }}</h5>
			    <p class="card-text" style="">Para consultar mas informacion, presiona el siguiente link</p>
				<a href="trainers/{{ $trainer->slug }}" class="btn btn-primary">Ver mas..</a>
			    </div>
			</div>  
	</div>
	
	@endforeach
</div>
	


@endsection