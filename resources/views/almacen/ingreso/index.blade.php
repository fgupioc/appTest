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
                                    <h3>Litado de CLientes <a href="{{route('ingresoCrear')}}" class="btn btn-primary">Nuevo</a></h3>
                                </div>
                                <div class="col-md-8">
                                    @include('almacen.ingreso.buscar')
                                </div>
                            </div>
                        </div>
                        <div class="salto"> </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-inverse">
                                    <thead>
                                    <tr>
                                        <th>Proveedo</th>
                                        <th>Doc</th>
                                        <th>Serie</th>
                                        <th>Num</th>
                                        <th>Fecha</th>
                                        <th>Igv</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ingresos as $ingreso)
                                        <tr>
                                            <td>{{$ingreso->proveedor}}</td>
                                            <td>{{$ingreso->type_document}}</td>
                                            <td>{{$ingreso->serie_document}}</td>
                                            <td>{{$ingreso->num_document}}</td>
                                            <td>{{$ingreso->date}}</td>
                                            <td>{{$ingreso->tax}}</td>
                                            <td>{{$ingreso->total}}</td>
                                            <td>{{($ingreso->state==1)?'Activo':'Cancelado'}}</td>
                                            <td>
                                                <a  href="{{route('ingresoActualizar',$ingreso->id)}}" class="btn btn-warning">Modificar</a>
                                                <a  href="#" class="btn btn-primary">Cancelar</a> 
                                            </td>
                                        </tr> 
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$ingresos->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
