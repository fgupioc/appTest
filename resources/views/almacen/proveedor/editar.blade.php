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
                        {!!   Form::open( ['route'=>['proveedorUpdate',$proveedor->id],'metohod'=>'POST','class'=>'form-horizontal']) !!}
                        {!!Form::token()!!}
                        <div class="form-group">
                            {!!Form::label('text', 'Nombre', ['class' => 'control-label col-sm-2'])!!}
                            <div class="col-sm-10">
                                {!!Form::text('nombre',$proveedor->name,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa Nombre de Cienete '])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('text', 'Tipo Documento', ['class' => 'control-label col-sm-2'])!!}
                            <div class="col-sm-10">
                                {!! Form::select('tipo_doc', array('dni' => 'DNI', 'ruc' => 'RUC'),$proveedor->type_document,["id" =>"form_control_1" ,"class"=>"form-control"])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('text', 'Numero Documento', ['class' => 'control-label col-sm-2']) !!}
                            <div class="col-sm-10">
                                {!!Form::text('num_doc',$proveedor->num_document,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa Nuemro de Documento '])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('text', 'Direccion', ['class' => 'control-label col-sm-2']) !!}
                            <div class="col-sm-10">
                                {!!Form::text('direccion',$proveedor->address,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa la Direccion '])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('text', 'Telefono', ['class' => 'control-label col-sm-2']) !!}
                            <div class="col-sm-10">
                                {!!Form::text('telefono',$proveedor->phone,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa Telefono'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('text', 'Email', ['class' => 'control-label col-sm-2']) !!}
                            <div class="col-sm-10">
                                {!!Form::text('email',$proveedor->email,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa Email '])!!}
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
