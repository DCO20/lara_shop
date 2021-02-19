@extends('adminlte::page')

@section('title', "Permissoẽs do perfil {$role->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('role.permissions', $role->id) }}" class="active">Permissoẽs</a></li>
    </ol>

    <h1>Permissoẽs do perfil <strong>{{ $role->name }}</strong></h1>


@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('role.permissionsSync', ['role' => $role->id ] )}}" method="post" class="mt-4" autocomplete="off">
                @csrf
                @method('PUT')

                @foreach( $permissions as $permission)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="{{ $permission->id }}" name="{{ $permission->id }}" {{ ($permission->can == '1' ? 'checked' : '') }}>
                        <label class="custom-control-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-block btn-success mt-4"><i class="fas fa-check"></i> Vincular</button>
            </form>
        </div>
        
    </div>
@stop
