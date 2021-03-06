@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
    </ol>

    <h1>Produtos <a href="{{ route('products.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a></h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="100">Imagem</th>
                        <th>Nome</th>
                        <th>url</th>
                        <th>Preço</th>
                        <th width="170">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}" style="max-width: 90px;">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->url }}</td>
                            <td>{{ $product->price }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('products.edit', $product->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-info"><i class="fas fa-edit"></i> </a>
                                <a href="{{ route('products.show', $product->id) }}" data-toggle="tooltip" data-placement="top" title="Ver" class="btn btn-success"><i class="fas fa-boxes"></i></a>
                                <a href="{{ route('products.categories', $product->id) }}" data-toggle="tooltip" data-placement="top" title="Categorias" class="btn btn-warning"><i class="fas fa-layer-group"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
            @endif
        </div>
    </div>
@stop