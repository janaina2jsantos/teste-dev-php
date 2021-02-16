@extends("layouts.app_front")

@section('title')
    Listagem de Carros
@stop

<style type="text/css">
    .container {
        padding-top: 45px;
        padding-bottom: 50px;
    }
    .bt-novo {
        margin-bottom: 25px;
    }
    td.acoes {
        width: 12.5%;
    }
    .form-delete {
        float: right;
    }
</style>

@section('content')
    <div class="container">

        @if(Session::has('success'))
           <div class="row success-msg">
              <div class="col-md-8 alert alert-success alert-dismissible fade show" role="alert" id="close">
                 <strong><i class="fas fa-check-circle"></i></strong>{{ Session::get('success') }}
              </div>
           </div>
        @endif

        <h2 class="titulo-principal">Listagem de Carros</h2>
        <a href="{{ route('backoffice.carros.create') }}" class="btn btn-success bt-novo">Novo</a>
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Ano</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                @if($carros)
                    @foreach($carros as $carro)
                        <tr>
                            <td>{{ $carro->id }}</td>
                            <td>{{ $carro->marca->nome }}</td>
                            <td>{{ $carro->modelo }}</td>
                            <td>{{ $carro->ano }}</td>
                            <td nowrap class="acoes">
                                <a href="{{ route('backoffice.carro.edit', $carro->id) }}" class="btn btn-sm btn-light">
                                    Editar
                                </a>
                                <form action="{{route('backoffice.carro.delete', ['id' => $carro->id])}}" method="POST" class="form-delete">
                                    @csrf
                                    @method('DELETE') 
                                    <a>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirmDelete();">Deletar
                                        </button>
                                    </a>
                                </form>
                                <div class="clear" style="clear: both;"></div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">
                            Nenhuma registro encontrado.
                        </td>
                    </tr>
                @endif
              </tbody>
        </table>
        {{ $carros->links() }}
    </div>
@stop


<!-- Script JS -->
@section('scripts')

    <script type="text/javascript">
        // Funçao para confirmar deletar 
        function confirmDelete() {
            if (confirm("Deseja realmente excluir essa veículo? Essa ação é irreversível!")) {
                return true;
            } else {
                return false;
            }
        }
    </script>

@stop
