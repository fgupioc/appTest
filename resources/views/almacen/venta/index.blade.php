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
                                    <h3>Litado de Ventas  <a href="{{route('ventaCrear')}}" class="btn btn-primary">Nuevo</a></h3>
                                </div>
                                <div class="col-md-8">
                                    @include('almacen.venta.buscar')
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
                                        <th>Cliente</th>
                                        <th>Comprobante</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ventas as $venta)
                                        <tr>
                                            <td>{{$venta->date}}</td>
                                            <td>{{$venta->cliente}}</td>
                                            <td>{{$venta->type_document.' : '.$venta->serie_document.'-'.$venta->num_document }}</td>  
                                            <td>{{$venta->tatal_sale}}</td>
                                            <td>{{($venta->state==1)?'Activo':'Cancelado'}}</td>
                                            <td>
                                                <a  href="{{route('ventaMostrar',$venta->id)}}" class="btn btn-warning">Mostrar</a>
                                                <a  href="{{route('ventaDestroy',$venta->id)}}" class="btn btn-primary">Cancelar</a> 
                                            </td>
                                        </tr> 
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$ventas->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
