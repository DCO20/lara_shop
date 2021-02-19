@extends('adminlte::page')

@section('title', 'Permissão')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active">permissions</a></li>
    </ol>

    <h1>Permissão <a href="{{ route('permissions.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a></h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="permission" class="form form-inline">
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
                        <th width="120">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('permissions.edit', $permission->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('permissions.show', $permission->id) }}"data-toggle="tooltip" data-placement="top" title="Ver" class="btn btn-light"><i class="fas fa-lock"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>
@stop