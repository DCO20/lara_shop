@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
    </ol>

    <h1>Home</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$totalUsers}}</h3>

              <p>Usuários</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
                <a href="{{route('users.index')}}" class="small-box-footer"> Mais Informação <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$totalProducts}}<sup style="font-size: 20px"></sup></h3>

              <p>Produtos</p>
            </div>
            <div class="icon">
              <i class="fas fa-boxes"></i>
            </div>
            <a href="{{route('products.index')}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$totalRoles}}</h3>

              <p>Perfis</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-shield"></i>
            </div>
            <a href="{{route('roles.index')}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$totalCategories}}</h3>

              <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="fas fa-layer-group"></i>
            </div>
            <a href="{{route('categories.index')}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>
@stop