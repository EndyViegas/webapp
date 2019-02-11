<!DOCTYPE html>
@include('master')

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" ><img src="{{ asset('images/icon-post.png') }}" style="width: 25px;height: 25px;margin-right: 10px;margin-top: -5px;">My Cards</a>
                </li>
            </ul>
            <a href="/logout">Logout</a>
        </div>
    </nav>
    <div class="container">
        <br>
        <div style="margin: auto;width: 50%;">
            <form id="formCard" action="/cards" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-8" >
                        <input type="text" class="form-control {{ isset($arrErrors) && array_key_exists('nome',$arrErrors) ? 'is-invalid' : '' }}" id="nome" name="nome" placeholder="Digite um nome para criar o card..." autocomplete="off">
                            @if(isset($arrErrors) && array_key_exists('nome',$arrErrors))
                                <div id="errorNome" class="invalid-feedback">
                                    {{ $arrErrors['nome'] }}
                                </div>
                            @endif
                        <textarea class="form-control {{ isset($arrErrors) && array_key_exists('descricao',$arrErrors) ? 'is-invalid' : '' }}" id="descricao" name="descricao"  placeholder="Digite a descrição do card..."></textarea>
                        @if(isset($arrErrors) && array_key_exists('descricao',$arrErrors))
                            <div id="errorDescricao" class="invalid-feedback">
                                {{ $arrErrors['descricao'] }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-2" style="margin-left: -20px;">
                        <button type="submit" class="btn btn-success">+</button>
                    </div>

                </div>
            </form>
        </div>
        <div style="clear:both;"></div>
        <br>
        <h3 class="text-white">Cards recentes </h3>

        <div id="divCards"></div>

    </div>