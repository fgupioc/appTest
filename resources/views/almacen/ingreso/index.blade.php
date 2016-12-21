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
                                    <h3>Litado de Ingresos  <a href="{{route('ingresoCrear')}}" class="btn btn-primary">Nuevo</a></h3>
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
                                        <th>Fecha</th>
                                        <th>Proveedor</th>
                                        <th>Comprobante</th>                                        
                                        <th>Igv</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ingresos as $ingreso)
                                        <tr>
                                            <td>{{$ingreso->date}}</td>
                                            <td>{{$ingreso->proveedor}}</td>
                                            <td>{{$ingreso->type_document.' : '.$ingreso->serie_document.'-'.$ingreso->num_document }}</td> 
                                            <td>{{$ingreso->tax}}</td>
                                            <td>{{$ingreso->total}}</td>
                                            <td>{{($ingreso->state==1)?'Activo':'Cancelado'}}</td>
                                            <td>
                                                <a  href="{{route('ingresoMostrar',$ingreso->id)}}" class="btn btn-warning">Mostrar</a>
                                                <a  href="{{route('ingresoDestroy',$ingreso->id)}}" class="btn btn-primary">Cancelar</a> 
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
