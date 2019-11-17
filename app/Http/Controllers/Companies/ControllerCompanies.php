<?php

namespace App\Http\Controllers\Companies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Session; //variable global


class ControllerCompanies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $companies = Company::get(); //es como si fuera un select para extraer los datos de la base de datos
      return view('company.index',["companies" => $companies]); //se envia una variable a la vista principal donde contiene los datos de la consulta a la base de datos
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;

        $company->name = $request->nombre;
        $company->businessRotation = $request->giroEmpresa;
        $company->rfc = $request->rfc;
        $company->description = $request->descripcion;
        $company->phone = $request->telefono;

        if($company->save()){
          Session::flash('message','Se ha realizado el registro con éxito');
          Session::flash('alert-class','alert-success');
          return redirect('/companias');
        }else{
          Session::flash('message','Se ha producido un inconveniente en la adición de una compañía');
          Session::flash('alert-class','alert-warning');
          return redirect('/companias');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        $company->name = $request->nombre;
        $company->businessRotation = $request->giroEmpresa;
        $company->rfc = $request->rfc;
        $company->description = $request->descripcion;
        $company->phone = $request->telefono;

        if($company->save()) {
          Session::flash('message','Modificación correcta');
          Session::flash('alert-class','alert-success');
          return redirect('/companias');
        } else {
          Session::flash('message','Se ha producido un error en la modificación');
          Session::flash('alert-class','alert-warning');
          return redirect('/companias');
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
        //
    }
}
