@extends('adminlte::layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

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
                    {!!   Form::open( ['route'=>['categoriaStore'],'metohod'=>'POST','class'=>'form-horizontal']) !!}
                    {!!Form::token()!!}

                    <div class="form-group">
                        {!!Form::label('text', 'Titulo', ['class' => 'control-label col-sm-2']);!!}
                        <div class="col-sm-10">
                            {!!Form::text('nombre',null,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa Nombre de Categoria '])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('text', 'Descripcion', ['class' => 'control-label col-sm-2']);!!}
                        <div class="col-sm-10">
                            {!! Form::textarea('descripcion',null,['class'=>'form-control','id'=>'form_control_1','rows' => 2, 'cols' => 40,'placeholder'=>'Ingresa una dscripcion']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {!!Form::submit('guardar',['class'=>'btn btn-primary'])!!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
