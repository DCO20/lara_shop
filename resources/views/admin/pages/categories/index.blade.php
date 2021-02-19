@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}" class="active">categories</a></li>
    </ol>

    <h1>categoria <a href="{{ route('categories.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a></h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" method="category" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="120">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('categories.edit', $category->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('categories.show', $category->id) }}"data-toggle="tooltip" data-placement="top" title="Ver" class="btn btn-warning"><i class="fas fa-layer-group"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
        </div>
    </div>
@stop