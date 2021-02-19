@include('admin.includes.alerts')

<div class="form-group">
    <label> Imagem:</label>
    <input type="file" name="image" id="image" class="form-control">
</div>
<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Digite o nome" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>URL:</label>
    <input type="text" name="url" class="form-control" placeholder="Digite a url" value="{{ $product->url ?? old('url') }}">
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="Digite o preço" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <label>Sobre:</label>
    <input type="text" name="about" class="form-control" placeholder="Digite sobre o produto" value="{{ $product->about ?? old('about') }}">
</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text" name="description" class="form-control" placeholder="Digite a descrição " value="{{ $product->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Enviar</button>
</div>
