@extends('adminlte::layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('flash::message')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3>Litado de CLientes <a href="{{route('proveedorCrear')}}" class="btn btn-primary">Nuevo</a></h3>
                                </div>
                                <div class="col-md-8">
                                    @include('almacen.proveedor.buscar')
                                </div>
                            </div>
                        </div>
                        <div class="salto"> </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-inverse">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>Numero</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proveedores as $proveedor)
                                        <tr>
                                            <td>{{$proveedor->name}}</td>
                                            <td>{{$proveedor->type_document}}</td>
                                            <td>{{$proveedor->num_document}}</td>
                                            <td>{{$proveedor->address}}</td>
                                            <td>{{$proveedor->phone}}</td>
                                            <td>{{$proveedor->email}}</td>
                                            <td>
                                                <a  href="{{route('proveedorActualizar',$proveedor->id)}}" class="btn btn-warning">Modificar</a>
                                                <a  href="#" class="btn btn-primary">Eliminar</a>

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$proveedores->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
