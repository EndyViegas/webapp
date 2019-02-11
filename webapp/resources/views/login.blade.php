
@include('master')

<div class="box">
    <h3 class="text-white">My Cards</h3>
    <br>
    <form action="/usuarios/logar" method="post">

        <div class="form-group">
            @csrf
            <label for="nome" class="text-white">Nome</label><br>
            <input type="text" class="form-control col-md-12   {{$errors->has('nome') || isset($userError) ? 'is-invalid' : '' }}" id="nome" name="nome" maxlength="25">
            @if($errors->has('nome'))
                <div class="invalid-feedback">
                    {{ $errors->first('nome') }}
                </div>
            @elseif(isset($userError))
                <div class="invalid-feedback">
                    {{ $userError }}
                </div>
            @endif
    </div>
        <a href="javascript: $('#modalCadUsuario').modal('show');">Cadastre-se</a>
        <br>
        <input type="submit" class="btn btn-success" value="Entrar"/>
    </form>
</div>
</div>

<div id="modalCadUsuario" class="modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="formCadUsuario">
                    @csrf
                    <div class="form-group">
                        <label for="nome" >Nome</label><br>
                        <input type="text" class="form-control col-md-12 " id="nome" name="nome" maxlength="25">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="cadastrarUsuario();"class="btn btn-success">Cadastrar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>