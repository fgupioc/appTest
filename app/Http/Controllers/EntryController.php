<?php

namespace appTest\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use appTest\models\Entry;
use appTest\models\EntryDetails;
use appTest\models\Customer;
use appTest\models\Article;
use appTest\Http\Requests\EntryRequest;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
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
        try{ 
            $fecha = Carbon::now('America/Lima')->toDateTimeString();
            DB::beginTransaction();
            $ingreso = Entry::create([
                'customer_id' => $request['proveedor_id'],
                'type_document' => $request['tipo_doc'],
                'serie_document' => $request['serie_doc'],
                'num_document' => $request['num_doc'],
                'date' =>  $fecha,
                'tax' => $request['igv'],
                'state' =>'1',
            ]);

             $idarticulo = $request['idarticulo'];
             $cantidad = $request['cantidad'];
             $compra = $request['compra'];
             $venta = $request['venta'];
             $i =0;

             while ($i < count($idarticulo)){
                EntryDetails::create([
                    'entry_id' => $ingreso->id,
                    'article_id' => $idarticulo[$i],
                    'quantity' => $cantidad[$i],
                    'price_buy' => $compra[$i], 
                    'price_sale' => $venta[$i], 
                ]);
                 $i=$i+1;
             }
            Flash::success("Se ha creado con exito ");
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            Flash::success("Ocurrio un error en el ingreso de productos");     
        }
        return redirect()->route('ingresoHome');
    }
 
    public function show($id)
    {
         $ingreso = DB::table('entries as e')
        ->join('customers as c', 'e.customer_id', '=', 'c.id')
        ->join('entry_details as ed', 'e.id','=','ed.entry_id')
        ->select('e.id','e.date','c.name as proveedor','e.type_document','e.serie_document','e.num_document','e.tax','e.state',DB::raw('sum(ed.quantity*ed.price_buy) as total'))
        ->where('e.id','=',$id)
        ->groupBy('e.id','e.date','c.name','e.type_document','e.serie_document','e.num_document','e.tax','e.state')
        ->first();       
        $detalles = DB::table('entry_details as ed')
        ->join('articles as a','ed.article_id','=','a.id')
        ->select('a.name as articulo','ed.quantity','ed.price_buy','ed.price_sale')
        ->where('ed.entry_id','=',$id)
        ->paginate(10);
       return view('almacen.ingreso.detalle',compact('ingreso','detalles'));
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
         $obj = array();
        $ingreso = Entry::find($id);
        $obj['state'] = '0';
        $ingreso->fill($obj);
        $ingreso->save();
        Flash::success("Se Cancelo con ccorrectamente");
        return redirect()->route('ingresoHome');
    }
}
