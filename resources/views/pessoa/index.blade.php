@extends('layout.main')

@section('content')

@include('errors.alerts')

<div class="container-fluid p-0">
    <div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Listagem</h3>
                    <hr class="my-4">
                </div>

                <div class="card-body">
                    @if (Count($pessoas) == 0)
                        <div>
                            <h1 class="alert-info px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Não há cadastros no sistema.</h1>
                        </div>
                    @else
                        <div class="table-responsive" style="width: 100%;">
                            <table class="table table-bordered text-center" style="width: 100%" id="datatables-reponsive">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" scope="col">Nome</th>
                                        <th class="text-center" scope="col">Telefone</th>
                                        <th class="text-center" scope="col">CEP</th>
                                        <th class="text-center" scope="col">Rua</th>
                                        <th class="text-center" scope="col">Bairro</th>
                                        <th class="text-center" scope="col">Número</th>
                                        <th class="text-center" scope="col">Cadastrador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pessoas as $pessoa)
                                        <tr id="{{ $pessoa->id }}">
                                            <td class="text-center">{{ $pessoa->nome != null ? $pessoa->nome : null }}</td>
                                            <td class="text-center telefone">{{ $pessoa->telefone != null ? $pessoa->telefone : null }}</td>
                                            <td class="text-center cep">{{ $pessoa->cep != null ? $pessoa->cep : null }}</td>
                                            <td class="text-center">{{ $pessoa->endereco != null ? $pessoa->endereco : null }}</td>
                                            <td class="text-center">{{ $pessoa->bairro != null ? $pessoa->bairro : null }}</td>
                                            <td class="text-center">{{ $pessoa->numero != null ? $pessoa->numero : null }}</td>
                                            <td class="text-center">{{ $pessoa->id_cadastrador != null ? $pessoa->cadastrador->nome : null }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $pessoas->links() }}
                        </div>
                    @endif

                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-success">Cadastrar nova pessoa</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{ asset('site/jquery.mask.js') }}"></script>
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/inputmask.js" integrity="sha512-XvlcvEjR+D9tC5f13RZvNMvRrbKLyie+LRLlYz1TvTUwR1ff19aIQ0+JwK4E6DCbXm715DQiGbpNSkAAPGpd5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('jquery-mask/dist/jquery.mask.min.js')}}"></script>

<script>
     $('.cep').mask('00.000-000');

    function maskInputs() {
        var input = document.getElementsByClassName('telefone')
        var im = new Inputmask(
            {
                mask: ['(99)9999-9999', '(99)99999-9999'],  keepStatic: true
            }
        )
        im.mask(input)
    }
    maskInputs();
</script>
@endsection




