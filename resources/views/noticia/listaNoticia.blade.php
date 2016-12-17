@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">                  
                  @include('flash::message')
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>titulo</th>
                        <th>descripcion</th>
                        <th>imagen</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>                       
                       @foreach($noticias as $noticia)
                       <tr>
                        <th scope="row">1</th>
                        <td>{{$noticia->titulo}}</td>
                        <td>{{$noticia->descripcion}}</td>
                        <td><img style=" height: 53px; width: 50px;" src="imgNoticias/{{$noticia->urlImg}}" class="img-responsive" alt="responsive image"></td>
                        <td>
                            <a  href="{{ route('modificarNoticia',$noticia->id)}}" class="btn btn-warning">Modificar</a>                         
                            <a  href="{{ route('eliminarNoticia',$noticia->id)}}" class="btn btn-danger">Eliminar</a>
                        </td>

                      </tr>
                       @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
     <script type="text/javascript">
  $(document).ready(function () {
      $('.alert').hide(5000); 
  });
</script>
@stop

