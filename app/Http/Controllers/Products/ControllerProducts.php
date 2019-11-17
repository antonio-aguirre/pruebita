<?php
// CONTROLADOR DE TIPO RESOURCE

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct; // para poder hacer uso de los mensajes que se añadieron para los errores
use App\Product; //para poder usar el modelo de Product y estese conecta a la base de datos por medio de la migración que se hace cuando se crea
use App\Category;
use Session; //unica variable global


class ControllerProducts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Funcion principal que sirve para mostrar en lista de productos y se vean de inmediatamnete
     * @return \view\product\index.blade
     */

    public function index()
    {
        //$products =  Product::get();  // es como si fura un select a los datos de la tabla de productos de la base de datos
        $categories = Category::get();
        $products = Product::get();
        //dd($products->category);
        return view('product.index',["products" => $products,
                                     "categories" => $categories]); //estamos enviando a la vista principal, una variable que contiene el objeto de la consulta de la base de datos
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreProduct  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        //$validated = $request->validated();
        $product = new Product; // instancia al modelo Poduct para hacer la conexión a la base de datos

        $product->name = $request->nombre; // primer campo nombre de la base de datos, segundo nombre del formulario
        $product->description = $request->descripcion;
        $product->price = $request->precio;
        $product->category_id = $request->category;

        if($product->save()) {
          Session::flash('message','Se ha realizado el registro con éxito'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
          Session::flash('alert-class','alert-success');
          return redirect('/productos');
        }else
        {
            Session::flash('message','Se ha producido un inconveniente en el registro'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
            Session::flash('alert-class','alert-warning');
            return redirect('/productos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreProduct  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        $product = Product::find($id); // instancia al modelo Product para hacer la conexión a la base de datos, es como un where

        $product->name = $request->nombre; // primer campo nombre de la base de datos, segundo nombre del formulario
        $product->description = $request->descripcion;
        $product->price = $request->precio;

        if($product->save()) {
          Session::flash('message','Se ha realizado la modificación con éxito');
          Session::flash('alert-class','alert-success');
          return redirect('/productos'); // se redirije para recargar la página de los productos
        }else
        {
          Session::flash('message','Se ha producido un inconveniente en la modificación');
          Session::flash('alert-class','alert-warning');
          return redirect('/productos');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Product::destroy($id)) {
          Session::flash('message','Se ha eliminado con éxito');
          Session::flash('alert-class','alert-success');
          return redirect('/productos');
        }else
        {
            Session::flash('message','Se ha produciodo un inconveniente en la eliminación');
            Session::flash('alert-class','alert-warning');
            return redirect('/productos');

        }
    }
}
