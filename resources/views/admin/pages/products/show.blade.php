@extends('adminlte::page')

@section('title', "Detalhes do usuário {$product->name}")

@section('content_header')
    <h1>Detalhes do usuário <b>{{ $product->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $product->name }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $product->url }}
                </li>
                <li>
                    <strong>Preço: </strong> {{ $product->price }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $product->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
@endsection
