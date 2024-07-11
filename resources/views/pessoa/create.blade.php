<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DR VICTOR ROCHA</title>
    <link rel="shortcut icon" type="svg" href="{{ asset('image/layer-group-solid.svg') }}" style="color: #4a88eb">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.0/r-2.2.9/rr-1.2.8/datatables.min.css"/>
    <link href="{{asset('select2-4.1.0/dist/css/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('select2-bootstrap/dist/select2-bootstrap.css')}}"/>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>

    <style>
        .error{
              color:red
        }
    </style>
</head>
<body>
    <div class="main d-flex justify-content-center w-100">
        <nav class="navbar navbar-expand-md shadow-sm" style="background-color: #293042">
            <div class="container">
                <a class="sidebar-brand" href="{{ url('/') }}">
                    <div class="max-width">
                        <div class="imageContainer">
                            <span class="align-middle mr-3" style="font-size: .999rem;">DR VICTOR ROCHA</span>
                        </div>
                    </div>
                </a>
            </div>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <button type="button" class="btn btn-primary btn-lg">Login</button>
                    </a>
                </li>
            </ul>
        </nav>
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                <div class="row h-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">
                            <div class="text-center mt-4">
                                <h1 class="h2">
                                    Cadastrar-se
                                </h1>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="m-sm-4">
                                        <form action="{{ route('pessoa.store') }}" method="POST" id="form" class="form_prevent_multiple_submits">
                                            @csrf
                                            @method('POST')
                                            @include('errors.alerts')

                                            <div class="m-sm-8">
                                                <div class="mb-3">
                                                    <label class="form-label">*Nome</label>
                                                    <input class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" id="nome" placeholder="Informe seu nome" value="{{ old('nome') }}">
                                                    @error('nome')
                                                        <div class="invalid-feedback">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cep">CEP</label>
                                                    <input type="text" name="cep" id="cep" class="form-control @error('cep') is-invalid @enderror" placeholder="Informe o CEP" value="{{ old('cep') }}">
                                                    @error('cep')
                                                        <div class="invalid-feedback">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="endereco">Endereço (Rua/Avenida)</label>
                                                    <input type="text" name="endereco" id="endereco" class="form-control @error('endereco') is-invalid @enderror" placeholder="Informe o endereço" value="{{ old('endereco') }}">
                                                    @error('endereco')
                                                        <div class="invalid-feedback">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="numero">Número</label>
                                                    <input type="text" name="numero" id="numero" class="form-control @error('numero') is-invalid @enderror" placeholder="Informe o número" value="{{ old('numero') }}">
                                                    @error('numero')
                                                        <div class="invalid-feedback">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="bairro">Bairro</label>
                                                    <input type="text" name="bairro" id="bairro" class="form-control @error('bairro') is-invalid @enderror" placeholder="Informe o bairro" value="{{ old('bairro') }}">
                                                    @error('bairro')
                                                        <div class="invalid-feedback">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Celular/Telefone</label>
                                                    <input class="telefone form-control @error('telefone') is-invalid @enderror" type="text" name="telefone" value="{{ old('telefone')}}">
                                                    @error('telefone')
                                                        <div class="invalid-feedback">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">*Cadastrador</label>
                                                    <select name="id_cadastrador" id="id_cadastrador" class="form-control select2 @error('id_cadastrador') is-invalid @enderror">
                                                        <option value="" selected disabled>--Selecione--</option>
                                                        @foreach ($cadastradores as $cadastrador)
                                                            <option value="{{ $cadastrador->id }}">{{ $cadastrador->nome }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_cadastrador')
                                                        <div class="invalid-feedback">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="reuniao">Realizar reunião</label>
                                                    <select class="form-control @error('reuniao') is-invalid @enderror" name="reuniao">
                                                        <option value="" selected disabled>--Selecione--</option>
                                                        <option value="1" {{ old('reuniao') == '1' ? 'selected' : '' }}>Sim</option>
                                                        <option value="0" {{ old('reuniao') == '0' ? 'selected' : '' }}>Não</option>
                                                    </select>
                                                    @error('reuniao')
                                                        <div class="invalid-feedback">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Observação</label>
                                                    <textarea name="observacao" class="form-control">{{ old('observacao') }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-lg btn-primary" style="width: 100%">Cadastrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-12 text-right">
                        <p class="mb-0">
                            © <?php echo date('Y'); ?> - <a href="http://agile.inf.br" class="text-muted" target="__blank">Agile Tecnologia</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('jquery-mask/dist/jquery.mask.min.js')}}"></script>
<script src="{{ url('js/fontawesome.js') }}"></script>
<script src="{{ url('js/bootstrap.js') }}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{ url('js/functions.js') }}"></script>
<script src="{{ url('js/prevent_multiple_submits.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.0/r-2.2.9/rr-1.2.8/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/inputmask.js" integrity="sha512-XvlcvEjR+D9tC5f13RZvNMvRrbKLyie+LRLlYz1TvTUwR1ff19aIQ0+JwK4E6DCbXm715DQiGbpNSkAAPGpd5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('select2-4.1.0/dist/js/select2.min.js')}}"></script>
@yield('scripts')
<script>
    $('#cep').mask('00.000-000');

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

    $('#cep').on('change', function(){
        var cep = $(this).val().replace(/[.-]/g,"");
        // console.log('CEP: ', cep);
        // console.log('Quantidade de caracteres: ', cep.length);
        if (cep.length != 8){
            $("#endereco").val('');
            $("#complemento").val('');
            $("#bairro").val('');
            // $("#cidade").val('');
            // $("#uf").val('');
            alert('CEP INVÁLIDO!');
        }
        else{
            $.ajax({
                //O campo URL diz o caminho de onde virá os dados
                //É importante concatenar o valor digitado no CEP
                url: 'https://viacep.com.br/ws/'+cep+'/json/',
                //Aqui você deve preencher o tipo de dados que será lido,
                //no caso, estamos lendo JSON.
                dataType: 'json',
                //SUCESS é referente a função que será executada caso
                //ele consiga ler a fonte de dados com sucesso.
                //O parâmetro dentro da função se refere ao nome da variável
                //que você vai dar para ler esse objeto.
                success: function(resposta){
                    //Agora basta definir os valores que você deseja preencher
                    //automaticamente nos campos acima.
                    $("#endereco").val(resposta.logradouro);
                    $("#complemento").val(resposta.complemento);
                    $("#bairro").val(resposta.bairro);
                    // $("#cidade").val(resposta.localidade);
                    // $("#uf").val(resposta.uf);
                    //Vamos incluir para que o Número seja focado automaticamente
                    //melhorando a experiência do usuário
                    if (resposta.logradouro != null && resposta.logradouro != ""){
                        $("#numero").focus();
                    }
                    else{
                        $("#endereco").focus();
                    }
                },
                error: function(resposta){
                    //Agora basta definir os valores que você deseja preencher
                    //automaticamente nos campos acima.
                    alert("Erro, CEP inválido");
                    $("#endereco").val('');
                    $("#complemento").val('');
                    $("#bairro").val('');
                    // $("#cidade").val('');
                    // $("#uf").val('');
                    //Vamos incluir para que o Número seja focado automaticamente
                    //melhorando a experiência do usuário
                    $("#cep").focus();
                },
            });
        }
    });

    $(document).ready(function() {

        $('.select2').select2({
            language: {
                noResults: function() {
                    return "Nenhum resultado encontrado";
                }
            },
            closeOnSelect: true,
            width: '100%',
        });
    });
</script>
</body>
</html>




