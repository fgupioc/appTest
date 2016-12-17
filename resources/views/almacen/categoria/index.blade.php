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
									<h3>Litado de Categorias <a href="{{route('categoriaCrear')}}" class="btn btn-primary">Nuevo</a></h3> 
								</div> 
 								<div class="col-md-8">
 									@include('almacen.categoria.buscar')	
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
						      <th>Descripcion</th>
						      <th>opciones</th>
						    </tr>
						  </thead>
						  <tbody>
						   @foreach($categorias as $categoria)
						    <tr> 
						    	<td>{{$categoria->id}}</td> 
						      	<td>{{$categoria->name}}</td>
						     	<td>{{$categoria->description}}</td>
							      <td>
							      	<a  href="{{route('categoriaActualizar',$categoria->id)}}" class="btn btn-warning">Modificar</a> 
							      	<a  href="{{route('categoriaDestroy',$categoria->id)}}" class="btn btn-primary">Aceptar</a>                        
	                            	<!--a  href="" data-target="#modal_delete_{{$categoria->id}}" data-toggle="modal" class="btn btn-danger">Eliminar</a-->
							      </td>
						    </tr>
						    @include('almacen.categoria.inc.modal')
						   @endforeach	 			    
						  </tbody>
						</table>
							</div>
						 	{{$categorias->render()}} 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

 
@endsection
