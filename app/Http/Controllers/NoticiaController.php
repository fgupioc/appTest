<?php

namespace appTest\Http\Controllers;

use Illuminate\Http\Request; 
use appTest\Http\Requests\NoticiaRequest;
use appTest\models\noticia;
use Laracasts\Flash\Flash;
use Storage;


class NoticiaController extends Controller
{
	public function index(){
		return view('home');
	}

    public function store(NoticiaRequest $request){  
    	$url =$this->subir_imagen($request->file('imagen'));
	  	noticia::create([ 
            'titulo' =>	$request['titulo'],
            'descripcion' =>  $request['descripcion'], 
            'urlImg'=>	$url,
            ]);  
	    Flash::success("Se ha registrado cone exito");
	    return redirect()->route('home') ;    	
    }

    public function lista(){
    	$noticias = noticia::all();
    	return view('noticia.listaNoticia',compact('noticias'));
    }

    public function modificar($id){
    	$noticia = noticia::find($id); 
    	$flag = true;
    	return view('home',compact('flag','noticia'));
    }

    public function update($id,Request $request){  
    	$obj=array();
        $noticia = noticia::find($id); 
        $url_img="";
    	if($request->file('imagen')==null){
    		if($request['imagen_up']!="")
    			$url_img=$request['imagen_up'];  
    	}else{
    		$url_img=$this->subir_imagen($request->file('imagen'));
    	}  

    	$obj['titulo'] = $request['titulo'];
        $obj['descripcion'] =  $request['descripcion'];
        $obj['urlImg'] =  $url_img;
        $noticia->fill($obj);
        $noticia->save();
    	Flash::success("Se edito con exito");
	    return redirect()->route('listaNoticia') ;  
    }

    public function subir_imagen($imagen){ 
    	$url = time()."_".$imagen->getClientOriginalName();
    	Storage::disk('imgNoticias')->put($url,file_get_contents($imagen->getRealPath()));   
    	return $url;
    }

    public function eliminar($id){
    	noticia::destroy($id);
    	Flash::success("se elimino correctamente");
    	return redirect()->route('listaNoticia') ; 
    }
}
