@extends('adminlte::layouts.app')  
 <link href="{{ asset('/css/bootstrap-select.min.css') }}" rel="stylesheet">
@section('main-content') 
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default"> 
        <div class="panel-body"> 
        
					<div class="row form-horizontal">
					<div class="col-md-12 ">
					 <div class="form-group"> 
				      {!!Form::label('text', 'Proveedor', ['class' => 'control-label col-md-2']);!!}
				      <div class="col-sm-10"> 
				         {!!Form::text('proveedor',$ingreso->proveedor,['class'=>'form-control','id'=>'form_control_1'])!!}
				      </div>
				    </div>  
				    </div>

				    <div class="col-md-6">
				    <div class="form-group"> 
				      {!!Form::label('text', 'Documento', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10"> 
				         {!!Form::text('tipo_doc',$ingreso->type_document,['class'=>'form-control','id'=>'form_control_1'])!!}
				      </div>
				    </div> 
				    </div>					 
				    <div class="col-md-6">
				     <div class="form-group"> 
				      {!!Form::label('text', 'Serie', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10">  
				          {!!Form::text('serie_doc',$ingreso->serie_document,['class'=>'form-control','id'=>'form_control_1'])!!}
				      </div>
				    </div> 
				    </div>
				    <div class="col-md-6">
				    <div class="form-group"> 
				      {!!Form::label('text', 'Numero', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10"> 
				         {!!Form::text('num_doc',$ingreso->num_document,['class'=>'form-control','id'=>'form_control_1'])!!}
				      </div>
				    </div> 
				    </div>
				    <div class="col-md-6">
				     <div class="form-group"> 
				      {!!Form::label('text', 'IGV', ['class' => 'control-label col-sm-2']);!!}
				      <div class="col-sm-10"> 
				         {!!Form::text('igv',$ingreso->tax,['class'=>'form-control','id'=>'form_control_1'])!!}
				      </div>
				    </div> 
				    </div> 
				    </div>
				    <div class="row">
				    	<div class="panel panel-primary">
				    		<div class="panel-body">  
				    			<div class="col-sm-12">
				    				<table id="detalles_ingreso" class="table table-striped table-bordered table-condensed table-hover">
				    					<thead style="background-color:#a9d0f5">
				    						<th>#</th>
				    						<th>Articulo</th>
				    						<th>Cantidad</th>
				    						<th>Precio Compra</th>
				    						<th>Precio Venta</th>
				    						<th>SubTotal</th>
				    					</thead>
				    					<tbody>
				    					<?php $i=1;?>
				    					@foreach($detalles as $detalle)
				    						<tr>
				    							
				    							<td>{{$i++}}</td>
				    							<td>{{$detalle->articulo}}</td>
				    							<td>{{$detalle->quantity}}</td>
				    							<td>{{$detalle->price_buy}}</td>
				    							<td>{{$detalle->price_sale}}</td>
				    							<td>{{  $detalle->quantity*$detalle->price_buy}}</td>
				    							
				    						</tr>
				    						@endforeach
				    					</tbody>
				    					<tfoot>
				    						<th>TOTAL</th>
				    						<th></th>
				    						<th></th>
				    						<th></th>
				    						<th></th>
				    						<th><h4 id="total">s/. {{$ingreso->total}}</h4></th>
				    					</tfoot>
				    				</table>
				    			</div>			    			 
				    		</div>
				    	</div>
				    </div>
				    
        </div>
      </div>
    </div>
  </div>
@endsection
 