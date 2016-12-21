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
				{!!   Form::open( ['route'=>['ingresoStore'],'metohod'=>'POST', 'class'=>'form-horizontal']) !!} 
					{!!Form::token()!!}
					<div class="row">
					<div class="col-md-12">
					 <div class="form-group"> 
				      {!!Form::label('text', 'Proveedor', ['class' => 'control-label col-md-2']);!!}
				      <div class="col-sm-10"> 
				        {!!Form::select('proveedor_id', $proveedores,null,["id" =>"form_control_1" ,"class"=>"form-control selectpicker","data-live-search"=>"true"])!!}
				      </div>
				    </div>  
				    </div>

				    <div class="col-md-6">
				    <div class="form-group"> 
				      {!!Form::label('text', 'Documento', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10"> 
				        {!! Form::select('tipo_doc', array('boleta' => 'Boleta','factura' => 'Factura','tiket' => 'Tiket'),null,["id" =>"form_control_1" ,"class"=>"form-control"])!!}
				      </div>
				    </div> 
				    </div>					 
				    <div class="col-md-6">
				     <div class="form-group"> 
				      {!!Form::label('text', 'Serie', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10">  
				          {!!Form::text('serie_doc',null,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa la serie '])!!}
				      </div>
				    </div> 
				    </div>
				    <div class="col-md-6">
				    <div class="form-group"> 
				      {!!Form::label('text', 'Numero', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10"> 
				         {!!Form::text('num_doc',null,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa el Numero de documento '])!!}
				      </div>
				    </div> 
				    </div>
				    <div class="col-md-6">
				     <div class="form-group"> 
				      {!!Form::label('text', 'IGV', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10"> 
				         {!!Form::text('igv',null,['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa el IGV '])!!}
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
								        {!!Form::select('tarticulo_id', $articulos,null,["id" =>"tarticulo_id" ,"class"=>"form-control selectpicker","data-live-search"=>"true"])!!}					 </div> 
				    			</div>
				    			<div class="col-md-2">
				    				 <div class="form-group"> 
								      {!!Form::label('text', 'Cantidad', ['class' => 'control-label ']);!!}								       
								        {!!Form::number('tcantidad',null,['class'=>'form-control','id'=>'tcantidad','placeholder'=>'Ingresa la cantidad '])!!}					 </div> 
				    			</div>
				    			<div class="col-md-2">
				    				 <div class="form-group"> 
								      {!!Form::label('text', 'Precio Compra', ['class' => 'control-label ']);!!}								       
								       {!!Form::number('tprecio_comp',null,['class'=>'form-control','id'=>'tprecio_comp','placeholder'=>'Ingresa el P. Compra '])!!}
								        </div> 
				    			</div>
				    			<div class="col-md-2">
				    				 <div class="form-group"> 
								      {!!Form::label('text', 'Precio Venta', ['class' => 'control-label']);!!}								       
								       {!!Form::number('tprecio_vent',null,['class'=>'form-control','id'=>'tprecio_vent','placeholder'=>'Ingresa el P. Venta '])!!}					 </div> 
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
				    						<th>Precio Compra</th>
				    						<th>Precio Venta</th>
				    						<th>SubTotal</th>
				    					</thead>
				    					<tbody></tbody>
				    					<tfoot>
				    						<th>TOTAL</th>
				    						<th></th>
				    						<th></th>
				    						<th></th>
				    						<th></th>
				    						<th><h4 id="total">s/. 0.00</h4></th>
				    					</tfoot>
				    				</table>
				    			</div>			    			 
				    		</div>
				    	</div>
				    </div>
				    <div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10"> 
				        {!!Form::submit('guardar',['id'=>'btn_ingreso','class'=>'btn btn-primary'])!!}
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
	$('#btn_ingreso').hide();	

	$(document).ready(function(){
		$('#add').click(function(){
			agregar();
		});
	});
	function agregar(){
		idarticulo = $('#tarticulo_id').val();
		articulo = $('#tarticulo_id option:selected').text();
		cantidad = $('#tcantidad').val();
		compra = $('#tprecio_comp').val();
		venta = $('#tprecio_vent').val(); 
		 if(idarticulo!='' && cantidad>0 && compra>0 && venta>0){
		 	subtotal[cont]=(cantidad*compra);
		 	total = total+subtotal[cont];

		 	var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="compra[]" value="'+compra+'"></td><td><input type="number" name="venta[]" value="'+venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
		 	cont++;
		 	limpiar();
		 	$('#total').html('S/. '+total);
		 	evaluar();
		 	$('#detalles_ingreso').append(fila);
		 }else{
		 	console.log('error');
		 }

	}

	function limpiar(){
		$('#tcantidad').val('');
		$('#tprecio_comp').val('');
		$('#tprecio_vent').val('');
	}

	function evaluar(){
		if(total > 0)
			$('#btn_ingreso').show();
		else
			$('#btn_ingreso').hide();			
	}
	function eliminar(_id){
		total = total-subtotal[_id];
		$('#total').html('S/. '+total);
		$('#fila'+_id).remove();
		evaluar();
	}
</script>
@endsection