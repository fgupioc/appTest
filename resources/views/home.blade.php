@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body"> 
                @if(count($errors)> 0)
                 <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                    @foreach($errors->all() as $error)
                   
                     <li><strong>Success!</strong> {{$error}}</li> 
                    
                    @endforeach
                    </ul>
                     </div>
                @endif
                @include('flash::message')
                @if(isset($flag))
                    @include('noticia.modificar')
                @else
                    @include('noticia.formulario')
                @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
