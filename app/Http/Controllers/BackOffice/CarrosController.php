<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Requests\CarroRequest;
use App\Http\Controllers\Controller;
use App\Models\Carro;
use App\Models\Marca;
use Session;

class CarrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Carro::orderBy('id', 'DESC')->paginate('8');
        return view("carros.index", compact("carros"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::orderBy('id', 'ASC')->pluck('nome', 'id')->toArray();
        return view("carros.edit", compact("marcas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarroRequest $r)
    {
        $data  = $r->all();
        $carro = Carro::create($data);
        Session::flash('success', ' Veículo cadastrado com sucesso.');
        return redirect()->route('backoffice.carros.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $carro = Carro::findOrFail($id);
        $marcas = Marca::orderBy('id', 'ASC')->pluck('nome', 'id')->toArray();
        return view("carros.edit", compact("carro", "marcas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarroRequest $r, $id)
    {
        $carro = Carro::findOrFail($id);
        $data = $r->all();
        $carro->update($data);
        Session::flash('success', ' Veículo atualizado com sucesso.');
        return redirect()->route('backoffice.carros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carro = Carro::findOrFail($id);
        $carro->delete();
        Session::flash('success',' Veículo excluído com sucesso.');
        return redirect()->route('backoffice.carros.index');
    }
}
