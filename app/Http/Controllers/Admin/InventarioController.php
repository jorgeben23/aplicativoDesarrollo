<?php

namespace App\Http\Controllers\Admin; // namespace agregado para identificar el controlador 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Producto;



class InventarioController extends Controller
{
   

	public function index () {

		return view('admin.Inventario.index');

	}


	public function crear ( Request $Request ) {

		
		if (!$Request->ajax()) {

			$nombreProduct = $Request->nombreProduct;
			$StockProduct = $Request->StockProduct;
			$PrecioProduct = $Request->PrecioProduct;
			$categoriaProduct = $Request->categoriaProduct;


			// --- isersion 

			$producto = new Producto();

			$producto->nombre = $nombreProduct;
			$producto->stock = $StockProduct;
			$producto->precio = $PrecioProduct;
			$producto->categoria = $categoriaProduct;

			if ( $producto->save() ) {
				
				return 1;
			}else {
				return 0;
			}
			
			// return Response()->json($Request->all());
		}else {
			return 'ajax';
		}



	}



	public function listar () {

		$lista_productos = Producto::all();

		return $lista_productos;
	}



	public function edit ( Request $Request ) {

		
		if (!$Request->ajax()) {

			$id = $Request->id;

			$producto = Producto::where('id','=',$id)->get()[0];

			return $producto;

			// return Response()->json($Request->all());
		}else {
			return 'ajax';
		}

	}


	public function editar ( Request $Request ) {

		
		if (!$Request->ajax()) {

			$idProduct = $Request->idProduct;
			$nombreProduct = $Request->nombreProduct;
			$StockProduct = $Request->StockProduct;
			$PrecioProduct = $Request->PrecioProduct;


			$update = Producto::where('id', '=', $idProduct )->update([

				'nombre' => $nombreProduct,
				'stock'  => $StockProduct,
				'precio'  => $PrecioProduct

			]);


			if ( $update ) {
				
				return 1;
			}else {

				return 0;
			}


			// return Response()->json($Request->all());
		}else {
			return 'ajax';
		}

	}






}
