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
                    {!!   Form::open( ['route'=>['articuloUpdate',$articulo->id],'metohod'=>'POST','files' => true ,'class'=>'form-horizontal']) !!}
                    {!!Form::token()!!}
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('text', 'Codigo', ['class' => 'control-label col-sm-2'])!!}
                            <div class="col-sm-10">
                                {!!Form::text('codigo',(isset($articulo->code))? $articulo->code : '',['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa el codigo '])!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('text', 'Articulo', ['class' => 'control-label col-sm-2'])!!}
                            <div class="col-sm-10">
                                {!!Form::text('nombre',(isset($articulo->name))? $articulo->name : '',['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa el Nombre '])!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('text', 'Categoria', ['class' => 'control-label col-sm-2'])!!}
                            <div class="col-sm-10">
                                {!!Form::select('categoria_id', $categorias,$articulo->category_id,["id" =>"form_control_1" ,"class"=>"form-control"])!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('text', 'Stock', ['class' => 'control-label col-sm-2'])!!}
                            <div class="col-sm-10">
                                {!!Form::text('stock',(isset($articulo->stock))? $articulo->stock : '',['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa el Stock Inicial '])!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('text', 'Descripcion', ['class' => 'control-label col-sm-2'])!!}
                            <div class="col-sm-10">
                                {!! Form::textarea('descripcion',(isset($articulo->description))? $articulo->description : '',['class'=>'form-control','id'=>'form_control_1','rows' => 4, 'cols' => 40,'placeholder'=>'Ingresa una dscripcion']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('text', 'Imagen', ['class' => 'control-label col-sm-2'])!!}
                            <div class="col-sm-10">
                                <div class="col-md-12" style="margin:0px;padding: 0 0 20px 0">
                                    <img style=" height: 53px; width: 50px;"
                                         src="/imgArticulos/{{($articulo->image != '')? $articulo->image : 'default.png'}}"
                                         class="img-responsive" alt="responsive image">
                                </div>
                                <div class="col-md-12 " style="margin:0px;padding: 0px">
                                    {!!Form::file('imagen',null,['class'=>'form-control-file'])!!}
                                    {{ Form::hidden('imagen_up', (isset($articulo->image)? $articulo->image : '')) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('text', 'Condicion', ['class' => 'control-label col-sm-2']);!!}
                            <div class="col-sm-10">
                                <input type="checkbox" name="condicion" id="condicion" autocomplete="off"/>
                                <div class="[ btn-group ]">
                                    <label for="condicion" class="[ btn btn-success ]" style="height: 33px;">
                                        <span class="[ glyphicon glyphicon-ok ]"></span>
                                        <span> </span>
                                    </label>
                                    <label for="condicion" id="name_state" class="[ btn btn-default active ]">
                                        Activo
                                    </label>
                                </div>
                                <input name="estado" id="estado" value="{{$articulo->state}}" hidden>
                            </div>
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
<style type="text/css">
    .form-group input[type="checkbox"] {
        display: none;
    }
    .form-group input[type="checkbox"] + .btn-group > label span {
        width: 20px;
    }
    .form-group input[type="checkbox"] + .btn-group > label span:first-child {
        display: none;
    }
    .form-group input[type="checkbox"] + .btn-group > label span:last-child {
        display: inline-block;
    }
    .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
        display: inline-block;
    }
    .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
        display: none;
    }
</style>
@section('script')
    <script>
        $(document).ready(function () {
            if ($("#estado").val() == '1') {
                $('#name_state').text("Activo");
                $("#condicion").attr('checked', true);
            } else {
                $('#name_state').text("Inactivo");
                $("#condicion").attr('checked', false);
            }
            $("#condicion").click(function () {
                if ($("#condicion").is(':checked')) {
                    $('#name_state').text("Activo");
                    $('#estado').val('1');
                } else {
                    $('#name_state').text("Inactivo");
                    $('#estado').val('0');
                }
            });
        });
    </script>
@endsection