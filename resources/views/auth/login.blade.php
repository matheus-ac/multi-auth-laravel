
<form method="POST" action="/login">
    {!! csrf_field() !!}

    <h3 class="title">Painel de Controle - Login</h3>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif



    <div class="form-group">
        <label class="control-label" for="username">Usuário</label>

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            <input type="text" class="form-control" name="email" id="email">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label" for="password">Senha</label>

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input type="password" class="form-control" name="password" id="password">
        </div>
    </div>

    <div class="form-group margin-bottom-0">
        <button type="submit" class="btn btn-primary btn-block">Entrar...</button>
    </div>
</form>
