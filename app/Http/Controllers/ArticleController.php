<?php

namespace appTest\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use appTest\Http\Requests\ArticleRequest;
use appTest\models\Article;
use appTest\models\Category;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Storage;


class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request['buscar']);
        $articulos = DB::table('articles as a')->join('categories as c', 'a.category_id', '=', 'c.id')
        ->select('a.id', 'c.id as categoria_id', 'a.code', 'a.name', 'a.stock', 'a.description', 'a.image', 'a.state', 'c.name as categoria')
        ->where('a.name', 'LIKE', '%' . $query . '%')->orderBY('a.id', 'desc')->paginate(7);
        return view('almacen.articulo.index', compact('query', 'articulos'));
    }

    public function create()
    {
        //$categorias = DB::table('categories')->where('condition','=','1')->get(); 
        $categorias = Category::where('condition', '=', '1')->pluck('name', 'id');
        return view('almacen.articulo.crear', compact('categorias'));
    }

    public function store(ArticleRequest $request)
    {
        $url_img = "";
        if ($request->file('imagen') != null)
            $url_img = $this->subir_imagen($request->file('imagen'));
        Article::create([
            'category_id' => $request['categoria_id'],
            'code' => $request['codigo'],
            'name' => $request['nombre'],
            'stock' => $request['stock'],
            'description' => $request['descripcion'],
            'image' => $url_img,
        ]);
        Flash::success("Se ha creado con exito");
        return redirect()->route('articuloHome');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $articulo = Article::find($id);
        $categorias = Category::where('condition', '=', '1')->pluck('name', 'id');

        return view('almacen.articulo.editar', compact('articulo', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $articulo = Article::find($id);
        $url_img = "";
        if ($request->file('imagen') == null) {
            if ($request['imagen_up'] != "")
                $url_img = $request['imagen_up'];
        } else {
            $url_img = $this->subir_imagen($request->file('imagen'));
        }
        $obj['category_id'] = $request['categoria_id'];
        $obj['code'] = $request['codigo'];
        $obj['name'] = $request['nombre'];
        $obj['stock'] = $request['stock'];
        $obj['description'] = $request['descripcion'];
        $obj['image'] = $url_img;
        $obj['state'] = $request['estado'];
        $articulo->fill($obj);
        $articulo->save();
        Flash::success("Se edito con exito");
        return redirect()->route('articuloHome');
    }

    public function destroy($id)
    {
        $obj = array();
        $articulo = Article::find($id);
        $obj['state'] = '0';
        $articulo->fill($obj);
        $articulo->save();
        Flash::success("Se elimino con exito");
        return redirect()->route('articuloHome');
    }

    public function subir_imagen($imagen)
    {
        $url = str_replace(" ", "_", time() . "_" . $imagen->getClientOriginalName());
        Storage::disk('imgArticulos')->put($url, file_get_contents($imagen->getRealPath()));
        return $url;
    }
}