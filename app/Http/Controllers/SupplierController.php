<?php

namespace appTest\Http\Controllers;

use Illuminate\Http\Request;
use appTest\Http\Requests\CustomerRequest;
use appTest\models\Customer;
use Laracasts\Flash\Flash;
use Storage;

class SupplierController extends Controller
{ 
    public function index(Request $request)
    {
        $query = trim($request['buscar']);
        $proveedores = Customer::where('type_person','=','Proveedor')->where('name', 'LIKE', '%' . $query . '%')->orderBy('id', 'desc')->paginate(7);
        return view('almacen.proveedor.index', compact('query', 'proveedores'));
    }

    public function create()
    {
        return view('almacen.proveedor.crear');
    }

    public function store(CustomerRequest $request)
    {
        Customer::create([
            'type_person' => 'Proveedor',
            'name' => $request['nombre'],
            'type_document' => $request['tipo_doc'],
            'num_document' => $request['num_doc'],
            'address' => $request['direccion'],
            'phone' =>  $request['telefono'],
            'email' =>  $request['email'],
        ]);
        Flash::success("Se ha creado con exito");
        return redirect()->route('proveedorHome');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $proveedor = Customer::find($id);
        return view('almacen.proveedor.editar', compact('proveedor'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $cliente = Customer::find($id);
        $obj['name'] = $request['nombre'];
        $obj['type_document'] = $request['tipo_doc'];
        $obj['num_document'] = $request['num_doc'];
        $obj['address'] = $request['direccion'];
        $obj['phone'] = $request['telefono'];
        $obj['email'] = $request['email'];
        $cliente->fill($obj);
        $cliente->save();
        Flash::success("Se edito con exito");
        return redirect()->route('proveedorHome');
    }

    public function destroy($id)
    {
        //
    }
}
