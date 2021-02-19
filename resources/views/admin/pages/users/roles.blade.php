@extends('adminlte::page')

@section('title', "Perfil do usuário {$user->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuário</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('user.rolesSync', $user->id) }}" class="active">Perfis</a></li>
    </ol>

    <h1>Perfil do usuário <strong>{{ $user->name }}</strong></h1>


@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.rolesSync', ['user' => $user->id ] )}}" method="post" class="mt-4" autocomplete="off">
                @csrf
                @method('PUT')

                @foreach( $roles as $role)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="{{ $role->id }}" name="{{ $role->id }}" {{ ($role->can == '1' ? 'checked' : '') }}>
                        <label class="custom-control-label" for="{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-block btn-success mt-4"><i class="fas fa-check"></i> Vincular</button>
            </form>
        </div>
        
    </div>
@stop
