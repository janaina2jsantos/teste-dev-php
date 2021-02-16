<?php

namespace App\Http\Controllers\Api;

use App\Models\Carro;
use Illuminate\Http\Request;
use App\Http\Requests\CarroRequest;
use App\Http\Controllers\Controller;


class CarrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Carro::with('marca')->paginate('8');

        if(count($carros) > 0) {
            return response()->json($carros, 200);
        }
        else {
            return response()->json(['msg' => 'Nenhum registro encontrado.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarroRequest $r)
    {
        $data = $r->all();

        try {

            $carro = Carro::create($data);
            return response()->json(['msg' => 'Veículo cadastrado com sucesso.'], 200);

        } 
        catch(Exception $e) {
            return response()->json($e->getMessage(), 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $carro = Carro::with('marca')->findOrFail($id);
            return response()->json($carro, 200);
            
        } 
        catch(Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarroRequest $r, $id)
    {
        $data = $r->all();
        $carro = Carro::findOrFail($id);

        try {

            $carro->update($data);
            return response()->json(['msg'=>'Veículo atualizado com sucesso.'], 200);
        } 
        catch(Exception $e) {
            return response()->json($message->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carro = Carro::findOrFail($id);

        try {

            $carro->delete();
            return response()->json(['msg'=>'Veículo excluído com sucesso.'], 200);
        } 
        catch(Exception $e) {
            return response()->json($message->getMessage());
        }
    }
}
