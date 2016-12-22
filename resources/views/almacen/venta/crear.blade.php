@extends('adminlte::layouts.app')  
 <link href="{{ asset('/css/bootstrap-select.min.css') }}" rel="stylesheet">
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
				{!!   Form::open( ['route'=>['ventaStore'],'metohod'=>'POST', 'class'=>'form-horizontal']) !!} 
					{!!Form::token()!!}
					<div class="row">
					<div class="col-md-12">
					 <div class="form-group"> 
				      {!!Form::label('text', 'Cliente', ['class' => 'control-label col-md-2']);!!}
				      <div class="col-sm-10"> 
				        {!!Form::select('cliente_id', $clientes,null,["id" =>"form_control_1" ,"class"=>"form-control selectpicker","data-live-search"=>"true"])!!}
				      </div>
				    </div>  
				    </div>

				    <div class="col-md-4">
				    <div class="form-group"> 
				      {!!Form::label('text', 'Documento', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10"> 
				        {!! Form::select('tipo_doc', array('boleta' => 'Boleta','factura' => 'Factura','tiket' => 'Tiket'),null,["id" =>"form_control_1" ,"class"=>"form-control"])!!}
				      </div>
				    </div> 
				    </div>					 
				    <div class="col-md-4">
				     <div class="form-group"> 
				      {!!Form::label('text', 'Serie', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10">  
				          {!!Form::text('serie_doc',null,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa la serie '])!!}
				      </div>
				    </div> 
				    </div>
				    <div class="col-md-4">
				    <div class="form-group"> 
				      {!!Form::label('text', 'Numero', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10"> 
				         {!!Form::text('num_doc',null,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa el Numero de documento '])!!}
				      </div>
				    </div> 
				    </div>				    
				    </div>
				    <div class="row">
				    	<div class="panel panel-primary">
				    		<div class="panel-body">
				    			<div class="col-md-3">
				    				 <div class="form-group"> 
								      {!!Form::label('text', 'Articulo', ['class' => 'control-label ']);!!}		 
								        <select id="tarticulo_id" name="tarticulo_id" class="form-control selectpicker" data-live-search="true">
								        	@foreach($articulos as $articulo) 
								        		<option value="{{$articulo->id}}_{{$articulo->stock}}_{{$articulo->precio_venta}}">{{$articulo->articulo}}</option>
								        	@endforeach	
								        </select>		

								        </div> 
				    			</div>
				    			<div class="col-md-2">
				    				 <div class="form-group"> 
								      {!!Form::label('text', 'Stock', ['class' => 'control-label ']);!!}								       
								        {!!Form::number('tstock',null,['class'=>'form-control','id'=>'tstock','disabled'])!!}					 </div> 
				    			</div>
				    			<div class="col-md-2">
				    				 <div class="form-group"> 
								      {!!Form::label('text', 'Precio Venta', ['class' => 'control-label']);!!}        
								       {!!Form::number('tprecio_vent',null,['class'=>'form-control','id'=>'tprecio_vent','disabled'])!!}			
								       </div> 
				    			</div>
				    			<div class="col-md-2">
				    				 <div class="form-group"> 
								      {!!Form::label('text', 'Cantidad', ['class' => 'control-label ']);!!}								       
								        {!!Form::number('tcantidad',null,['class'=>'form-control','id'=>'tcantidad','placeholder'=>'Ingresa la cantidad'])!!}					 </div> 
				    			</div>				    			
				    			<div class="col-md-2">
				    				 <div class="form-group"> 
								      {!!Form::label('text', 'Descuento', ['class' => 'control-label ']);!!}								       
								       {!!Form::number('tdescuento',null,['class'=>'form-control','id'=>'tdescuento','placeholder'=>'Ingresa el descuento'])!!}
								        </div> 
				    			</div>
				    			
				    			<div class="col-md-2">
				    				 <div class="form-group"> 
				    				  
				    				  <a  type="submit" class="btn btn-primary" id="add" value="add"> add
								      </a> 
								      </div>
				    			</div>	
				    			<div class="col-sm-12">
				    				<table id="detalles_ingreso" class="table table-striped table-bordered table-condensed table-hover">
				    					<thead style="background-color:#a9d0f5">
				    						<th>Opcion</th>
				    						<th>Articulo</th>
				    						<th>Cantidad</th>
				    						<th>Precio venta</th>
				    						<th>Descuento</th>
				    						<th>SubTotal</th>
				    					</thead>
				    					<tbody></tbody>
				    					<tfoot>
				    						<th>TOTAL</th>
				    						<th></th>
				    						<th></th>
				    						<th></th>
				    						<th></th>
				    						<th><h4 id="total">s/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
				    					</tfoot>
				    				</table>
				    			</div>			    			 
				    		</div>
				    	</div>
				    </div>
				    <div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10"> 
				        {!!Form::submit('guardar',['id'=>'btn_venta','class'=>'btn btn-primary'])!!}
				      </div>
				    </div> 
				  
				{!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript">
var total = 0;
	var cont = 0;
	var subtotal = [];
	$(document).ready(function(){
		evaluar();
		$('#add').click(function(){
			agregar();
		});
	});
	
	$('#btn_ingreso').hide();	
	$('#tarticulo_id').change(mostrarValores);

	function mostrarValores(){
		var datosArticulo = document.getElementById('tarticulo_id').value.split('_');
		$('#tstock').val(datosArticulo[1]);
		$('#tprecio_vent').val(datosArticulo[2]);
	}

	function agregar(){
		var datosArticulo = document.getElementById('tarticulo_id').value.split('_');
		idarticulo = datosArticulo[0];
		articulo = $('#tarticulo_id option:selected').text();
		cantidad = $('#tcantidad').val();
		venta = $('#tprecio_vent').val(); 
		descuento = ($('#tdescuento').val()>0)? $('#tdescuento').val() : 0;
		stock = $('#tstock').val();
		
		 if(idarticulo!='' && cantidad>0  && venta>0 ){
		 	if(stock >= cantidad){
			 	subtotal[cont]=((cantidad*venta)-descuento);
			 	total = total+subtotal[cont];

			 	var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="venta[]" value="'+venta+'"></td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
			 	cont++;
			 	limpiar();
			 	$('#total').html('S/. '+total);
			 	$('#total_venta').val(total);
			 	evaluar();
			 	$('#detalles_ingreso').append(fila);
		 	}else{
		 		alert("la cantidad supera al stock")
		 	}
		 	
		 }else{
		 	console.log('error');
		 }

	}

	function limpiar(){
		$('#tcantidad').val('');
		$('#tdescuento').val('');
		$('#tprecio_vent').val('');
		$('#tstock').val('');
	}

	function evaluar(){
		if(total > 0)
			$('#btn_venta').show();
		else
			$('#btn_venta').hide();			
	}
	function eliminar(_id){
		total = total-subtotal[_id];
		$('#total').html('S/. '+total);
		$('#total_venta').val(total);
		$('#fila'+_id).remove();
		evaluar();
	}
</script>
@endsection