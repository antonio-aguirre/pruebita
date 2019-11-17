<?php

// CONTROLADOR DE TIPO RESOURCE

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategories; // para poder hacer uso de los mensajes que se añadieron para los errores
use App\Category; //para poder usar el modelo de Product y estese conecta a la base de datos por medio de la migración que se hace cuando se crea
use Session; //unica variable global

class ControllerCategories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Funcion principal que sirve para mostrar en lista de categorias y se vean de inmediatamnete
     * @return \view\Category\index.blade
     */
    public function index()
    {
      $categories = Category::get(); // es como si fura un select a los datos de la tabla de categorias de la base de datos
      return view('Category.index',["categories" => $categories]); //estamos enviando a la vista principal, una variable que contiene el objeto de la consulta de la base de datos
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
     * @param  \Illuminate\Http\StoreCategories  $request
     * @return \Illuminate\Http\Response
     */
    //probaré
    public function store(StoreCategories $request)
    {
      $category = new Category; // instancia al modelo Poduct para hacer la conexión a la base de datos

      $category->name = $request->nombre; // primer campo nombre de la base de datos, segundo nombre del formulario
      $category->description = $request->descripcion;

      if($category->save()) {
        Session::flash('message','Se ha realizado el registro con éxito'); //primer palabra es el nombre que tendra la variable y se usara para mostrar el mensaje en index.blade.php
        Session::flash('alert-class','alert-success');
        return redirect('/categorias');
      }else{
        Session::falsh('message','Se ha producido un inconveniente en la adición de una categoria');
        Session::flash('alert-class','alert-warning');
        return redirect('/categorias');
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
     * @param  \Illuminate\Http\StoreCategories  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategories $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->nombre;
        $category->description = $request->descripcion;

        if($category->save()) {
          Session::flash('message','Modificación correcta');
          Session::flash('alert-class','alert-success');
          return redirect('/categorias');
        } else {
          Session::flash('message','Se ha producido un error en la modificación');
          Session::flash('alert-class','alert-warning');
          return redirect('/categorias');
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
        if(Category::destroy($id))
        {
          Session::flash('message','Se ha eliminado correctamente la categoria');
          Session::flash('alert-class','alert-success');
          return redirect('/categorias');
        }
    }
}
