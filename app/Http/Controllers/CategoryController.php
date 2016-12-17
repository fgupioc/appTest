<?php

namespace appTest\Http\Controllers;

use Illuminate\Http\Request;
use appTest\models\Category;
use appTest\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
    	$query=trim($request['buscar']); 
    	$categorias=DB::table('categories')->where('name','like','%'.$query.'%')->where('condition','=','1')->orderBy('id','desc')->paginate(6); 
    	return view('almacen.categoria.index',compact('categorias','query')); 
    }

     
    public function create()
    {
        return view('almacen.categoria.crear');
    }

     
    public function store(CategoryRequest $request)
    { 
    	Category::create([ 
        'name' =>	$request['nombre'],
        'description' =>  $request['descripcion'],  
        ]);  
	    Flash::success("Se ha creado con exito");
	    return redirect()->route('categoriaHome') ;    
    }

     
    public function show($id)
    {
        $categoria = Category::find($id);
        return view('almacen.categoria.mostrar',compact('categoria'));
    }
 
    public function edit($id)
    {
       $categoria = Category::find($id);
        return view('almacen.categoria.editar',compact('categoria'));
    }
     
    public function update(CategoryRequest $request, $id)
    {
        $obj=array();
        $categoria = Category::find($id); 
        
    	$obj['name'] = $request['nombre'];
        $obj['description'] =  $request['descripcion'];
        $obj['condition'] =  $request['condicion'];
        $categoria->fill($obj);
        $categoria->save();
    	Flash::success("Se edito con exito");
	    return redirect()->route('categoriaHome') ;  
    }
    
    public function destroy($id)
    { 
        $obj=array();
        $categoria = Category::find($id);  
        $obj['condition'] = '0';
        $categoria->fill($obj);
        $categoria->save();
    	Flash::success("Se elimino con exito");
	    return redirect()->route('categoriaHome') ; 

    }

}
