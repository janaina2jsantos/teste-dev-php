@extends("layouts.app_front")

@section('title')
    Criar Carro
@stop

<style type="text/css">
    .container {
        padding-top: 45px;
        padding-bottom: 50px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .titulo-principal {
        margin-bottom: 25px;
    }
</style>

@section('content')
    <div class="container">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @isset($carro)
            <h2 class="titulo-principal">Editar Carro</h2>
        @else
            <h2 class="titulo-principal">Criar Novo Carro</h2>
        @endif
        
        <div class="col-md-12">
            {{ Form::open([
                "route" => (isset($carro) ? ['backoffice.carro.update', $carro->id] : 'backoffice.carros.store'), 
                "method" => (isset($carro) ? "PUT" : "POST"), 
                "autocomplete" => "off"
                ]) 
            }}

            <div class="row">
                <div class="form-group col-md-12">
                    <label>Marca<small> ( Obrigatório )</small></label>
                    {{ Form::select("id_marca", ["" => "Selecione"]+$marcas, (!empty($carro) ? $carro->id_marca : ''), ["class" => "form-control"]) }}
                </div>
                <div class="form-group col-md-12">
                    <label>Modelo<small> ( Obrigatório )</small></label>
                    {{ Form::text('modelo', (!empty($carro) ? $carro->modelo : ''), ["class" => "form-control"]) }}
                </div>
                <div class="form-group col-md-12">
                    <label>Ano<small> ( Obrigatório )</small></label>
                    {{ Form::text('ano', (!empty($carro) ? $carro->ano : ''), ["class" => "form-control"]) }}
                </div>
                <div class="bt-submit">
                    <button type="submit" class="btn btn-primary">{{ empty($carro) ? 'Cadastrar' : 'Salvar' }}</button>
                    <a href="{{route('backoffice.carros.index')}}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
@stop

