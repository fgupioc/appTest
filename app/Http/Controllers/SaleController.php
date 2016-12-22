<?php

namespace appTest\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Storage;
use appTest\models\Customer;
use appTest\models\Sale;
use appTest\models\SaleDetails;
use appTest\Http\Requests\SaleRequest;

class SaleController extends Controller
{
    public function index(Request $request)
    { 
        $query = trim($request['buscar']);
        $ventas = DB::table('sales as s')
        ->join('customers as c','s.customer_id','=','c.id' )  
        ->select( 's.id','s.type_document','s.serie_document','s.num_document','s.date','s.tatal_sale','s.state','c.name as cliente')
        ->where('s.num_document', 'LIKE', '%' . $query . '%')
        ->orderBY('s.id', 'desc') 
        ->paginate(7);  
        return view('almacen.venta.index',compact('query','ventas'));
    }
 
    public function create()
    {  
        $clientes = Customer::where('type_person','=','Cliente')->pluck('name', 'id'); 
        $articulos = DB::table('articles as a') 
        ->join('entry_details as ed','a.id','=','ed.article_id')
        ->select(DB::raw('concat(a.code, " " ,a.name) as articulo'),'a.id','a.stock',DB::raw('avg(ed.price_sale) as precio_venta'))
        ->where('a.state','=','1')
        ->where('a.stock','>','0')
        ->groupBy('a.code','a.name','a.id','a.stock')
        ->get();  
        return view('almacen.venta.crear',compact('clientes','articulos'));
    }
 
    public function store(SaleRequest $request)
    {       
        try{ 
            $fecha = Carbon::now('America/Lima')->toDateTimeString();
            DB::beginTransaction();
            $objventa = Sale::create([
                'customer_id' => $request['cliente_id'],
                'user_id' => '1',
                'type_document' => $request['tipo_doc'],
                'serie_document' => $request['serie_doc'],
                'num_document' => $request['num_doc'],
                'date' =>  $fecha, 
                'tatal_sale'=>  $request['total_venta'],
                'state' =>'1',
            ]);

             $idarticulo = $request['idarticulo'];
             $cantidad = $request['cantidad'];
             $descuento = $request['descuento'];
             $venta = $request['venta'];
             $i =0;
             while ($i < count($idarticulo)){
                SaleDetails::create([
                    'sale_id' => $objventa->id,
                    'article_id' => $idarticulo[$i],
                    'quantity' => $cantidad[$i],
                    'price_sale' => $venta[$i], 
                    'discount' => $descuento[$i],  
                ]);
                 $i=$i+1;
             }
            Flash::success("Se ha creado con exito ");
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            Flash::success("Ocurrio un error en la venta de productos");     
        }
        return redirect()->route('ventaHome');
    }
 
    public function show($id)
    {
         $venta = DB::table('sales as s')
        ->join('customers as c','s.customer_id','=','c.id' )  
        ->select( 's.id','s.type_document','s.serie_document','s.num_document','s.date','s.tatal_sale','c.name as cliente')
        ->where('s.id','=',$id) 
        ->first();    

        $detalles = DB::table('sale_details as sd')
        ->join('articles as a','sd.article_id','=','a.id')
        ->select('a.name as articulo','sd.quantity','sd.price_sale','sd.discount')
        ->where('sd.sale_id','=',$id)
        ->paginate(10); 
       return view('almacen.venta.detalle',compact('venta','detalles'));
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
        $venta = Sale::find($id);
        $obj['state'] = '0';
        $venta->fill($obj);
        $venta->save();
        Flash::success("Se Cancelo con ccorrectamente");
        return redirect()->route('ventaHome');
    }
}
