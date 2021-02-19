@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Digite o nome:" value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>E-mail:</label>
    <input type="email" name="email" class="form-control" placeholder="Digite o email:" value="{{ $user->email ?? old('email') }}">
</div>
<div class="form-group">
    <label>Contato:</label>
    <input type="text" name="phone" class="form-control" placeholder="Digite o contato:" value="{{ $user->phone ?? old('phone') }}">
</div>
<div class="form-group">
    <label>Ultilizador:</label>
    <input type="text" name="utype" class="form-control" placeholder="Digite o ultilizador" value="{{ $user->utype ?? old('utype') }}">
    <span>Digite admin (administrador) ou usr (usuário comum).</span>
</div>
<div class="form-group">
    <label>Senha:</label>
    <input type="password" name="password" class="form-control" placeholder="Senha:">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Enviar</button>
</div>
