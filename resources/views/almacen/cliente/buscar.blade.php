<div class="col-lg-6" style="float: right;">
    {!! Form::open(array('route'=>'clienteHome','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
    {!!Form::token()!!}
    <div class="input-group">
        <input type="text" name="buscar" class="form-control" placeholder="Buscar Cliente..." value="{{$query}}">
	      <span class="input-group-btn">
	         {!!Form::submit('Go',['class'=>'btn btn-default'])!!}
	      </span>
    </div>
    {!! Form::close() !!}
</div>