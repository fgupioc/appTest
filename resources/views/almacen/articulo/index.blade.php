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
									<h3>Litado de Articulos <a href="{{route('articuloCrear')}}" class="btn btn-primary">Nuevo</a></h3> 
								</div> 
 								<div class="col-md-8">
 									 @include('almacen.articulo.buscar')
 								 </div>	
							</div> 
						</div>
						<div class="salto"> </div>
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered table-inverse">
						  <thead>
						    <tr> 
						      <th>id</th>
						      <th>Nombre</th>
						      <th>codigo</th>
						      <th>stock</th>
						      <th>categoria</th> 
						      <th>opciones</th>
						    </tr>
						  </thead>
						  <tbody>
						   @foreach($articulos as $articulo)
						    <tr> 
						    	<td>{{$articulo->id}}</td> 
						      	<td>{{$articulo->name}}</td>
						     	<td>{{$articulo->code}}</td>
						     	<td>{{$articulo->stock}}</td> 
						      	<td>{{$articulo->categoria}}</td> 
							      <td>
							      	<a  href="{{route('articuloActualizar',$articulo->id)}}" class="btn btn-warning">Modificar</a> 
							      	<a  href="{{route('articuloDestroy',$articulo->id)}}" class="btn btn-danger">Eliminar</a>                        
	                            	<!--a  href="" data-target="#modal_delete_{{$articulo->id}}" data-toggle="modal" class="btn btn-danger">Eliminar</a-->
							      </td>
						    </tr>						    
						   @endforeach	 			    
						  </tbody>
						</table>
							</div>
						 	{{$articulos->render()}} 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

 
@endsection
