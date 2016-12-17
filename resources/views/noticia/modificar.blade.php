
{!!Form::open( ['route'=>['updateNoticia',$noticia->id],'metohod'=>'POST','files' => true ,'class'=>'form-horizontal']) !!} 
	{!!Form::token()!!}  
{{ Form::hidden('imagen_up', (isset($noticia["urlImg"])) ? $noticia["urlImg"] : "") }}
    <div class="form-group"> 
      {!!Form::label('text', 'Titulo', ['class' => 'control-label col-sm-2']);!!}
      <div class="col-sm-10"> 
        {!!Form::text('titulo',(isset($noticia["titulo"])) ? $noticia["titulo"] : "",['class'=>'form-control','id'=>'form_control_1','placeholder'=>'Ingresa el Titulo '])!!}
      </div>
    </div> 
    <div class="form-group"> 
      {!!Form::label('text', 'Descripcion', ['class' => 'control-label col-sm-2']);!!}
      <div class="col-sm-10"> 
        {!! Form::textarea('descripcion',(isset($noticia["descripcion"])) ? $noticia["descripcion"] : "",['class'=>'form-control','id'=>'form_control_1','rows' => 2, 'cols' => 40,'placeholder'=>'Ingresa una dscripcion']) !!}
      </div>
    </div> 
    <div class="form-group"> 
      {!!Form::label('text', 'Imagen', ['class' => 'control-label col-sm-2']);!!}
      <div class="col-sm-10"> 
        {!!Form::file('imagen',null,['class'=>'form-control-file'])!!}
      </div>
    </div>  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10"> 
        {!!Form::submit('guardar',['class'=>'btn btn-primary'])!!}
      </div>
    </div> 
{!! Form::close() !!}
 