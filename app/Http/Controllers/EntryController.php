<?php

namespace appTest\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use appTest\models\Entry;
use appTest\models\Customer;
use appTest\models\Article;
use appTest\Http\Requests\EntryRequest;
use Laracasts\Flash\Flash;
use Storage;

class EntryController extends Controller
{
     
    public function index(Request $request)
    {
        $query = trim($request['buscar']);
        $ingresos = DB::table('entries as e')
        ->join('customers as c', 'e.customer_id', '=', 'c.id')
        ->join('entry_details as ed', 'e.id','=','ed.entry_id')
        ->select('e.id','e.date','c.name as proveedor','e.type_document','e.serie_document','e.num_document','e.tax','e.state',DB::raw('sum(ed.quantity*ed.price_buy) as total'))
        ->where('e.num_document', 'LIKE', '%' . $query . '%')
        ->orderBY('e.id', 'desc')
        ->groupBy('e.id','e.date','c.name','e.type_document','e.serie_document','e.num_document','e.tax','e.state')
        ->paginate(7); 
        return view('almacen.ingreso.index',compact('query','ingresos'));
    }
 
    public function create()
    {
        $articulos = array();
        $proveedores = Customer::where('type_person','=','Proveedor')->pluck('name', 'id');
        //$articulos = Article::where('state','=','1')->pluck('name','id');
        $obj = DB::table('articles as a')
        ->select(DB::raw('concat(a.code, " " ,a.name) as articulo'),'a.id')
        ->where('a.state','=','1')
        ->get(); 
        foreach ($obj as $key => $value) {
            $articulos[$value->id]=$value->articulo;
        } 
        return view('almacen.ingreso.crear',compact('proveedores','articulos'));
    }
 
    public function store(Request $request)
    {
        //
    }
 
    public function show($id)
    {
        //
    }
 
    public function edit($id)
    {
        //
    }
 
    public function update(Request $request, $id)
    {
        //
    }
 
    public function destroy($id)
    {
        //
    }
}
