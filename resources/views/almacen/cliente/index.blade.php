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
                                    <h3>Litado de CLientes <a href="{{route('clienteCrear')}}" class="btn btn-primary">Nuevo</a></h3>
                                </div>
                                <div class="col-md-8">
                                    @include('almacen.cliente.buscar')
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clientes as $cliente)
                                        <tr>
                                            <td>{{$cliente->name}}</td>
                                            <td>{{$cliente->type_document}}</td>
                                            <td>{{$cliente->num_document}}</td>
                                            <td>{{$cliente->address}}</td>
                                            <td>{{$cliente->phone}}</td>
                                            <td>{{$cliente->email}}</td>
                                            <td>
                                                <a  href="{{route('clienteActualizar',$cliente->id)}}" class="btn btn-warning">Modificar</a>
                                                <a  href="#" class="btn btn-primary">Eliminar</a>
                                            <!--a  href="" data-target="#modal_delete_{{$cliente->id}}" data-toggle="modal" class="btn btn-danger">Eliminar</a-->
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$clientes->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
