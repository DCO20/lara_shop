<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ url(asset('assets/img/favicon.ico')) }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url(mix('assets/css/bootstrap.min.css')) }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url(mix('assets/css/all.min.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('assets/css/app.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('assets/css/auth.css')) }}">
    
    <title>LaraShop</title>

    <script src="https://kit.fontawesome.com/b0d8aefb17.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body>
    <div class="contact">
        <div class="container">
                    <div class="row ">
                        <div class="col-6 ">
                            <p>
                                <i class="fas fa-envelope-open"></i> larashop@larashop.com  |
                                <i class="fas fa-mobile-alt"> 4444-0000</i>
                            </p>
                        </div>
                        <div class="col-6 text-end mtop8">
                            <a href=""><i class="fab fa-facebook-square"></i></a>
                            <a href=""><i class="fab fa-instagram-square"></i></a>
                            <a href=""><i class="fab fa-twitter-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="nav mtop8 shadow">
        <div class="container">
            <div class="row">
                <div class="col-6 p-3">
                <a href="{{ route('index')}}"><img src="{{ url(asset('assets/img/logo.png'))}}" alt="LaraShop"></a>
                </div>
                <div class="col-6 p-3 text-end">
                    <a href="{{ route('index')}}">Home</a>
                    <a href="{{ route('about.index')}}">Sobre</a>
                    <a href="{{ route('shop.index')}}">Loja</a>
                    <a href="{{ route('contact.index')}}">Contato</a>

                    <button class=" dropdown btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i></button>
                        <ul class="dropdown-menu cart" aria-labelledby="dropdownMenuButton">
                            @if(Cart::count() > 0)
                            @foreach (Cart::content() as $item)
                            <li><p class="dropdown-item text-center" style="color: #114B5F"> {{$item->name}}</p></li>
                            <li><p class="dropdown-item text-center" style="color: #F45B69"> R$ {{ number_format($item->model->price, 2, ',', '.') }}</p></li><hr>
                            @endforeach	
                            <li class="text-center"><a href="{{ route('cart.index')}}"><button class="btn btn-success"><i class="fas fa-shopping-cart"></i> Ver carrinho</button></a></li>
                            @else
                            <li><p class="dropdown-item text-center" href="#"><i class="fas fa-shopping-cart"></i> Carrinho vazio</p></li>
                            @endif
                        </ul>
                        @if(Route::has('login'))
                        @auth
                            @if(Auth::user()->utype === 'admin')
                        <button class=" dropdown btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> Olá: {{Auth::user()->name}}</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{ route('home.index')}}"><button type="button" class="btn btn-secondary"><i class="fas fa-user-cog"></i> Painel</button></a>
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button type="button" class="btn btn-secondary"><i class="fas fa-sign-out-alt"></i> Sair</button></a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST">
                                @csrf
                            </form>
                        </ul>
                        @else
                        <button class=" dropdown btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i> Olá: {{Auth::user()->name}}</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="{{ route('home.index')}}"><button type="button" class="btn btn-secondary"><i class="fas fa-address-card"></i> Perfil</button></a>
                                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button type="button" class="btn btn-secondary"><i class="fas fa-sign-out-alt"></i> Sair</button></a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST">
                                    @csrf
                                </form>
                            </ul>
                            @endif
                            @else
                            <button class=" dropdown btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> conta</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{ route('login')}}"><button type="button" class="btn btn-secondary">Entrar</button></a>
                            <a href="{{ route('register')}}"><button type="button" class="btn btn-secondary">Cadastrar</button></a>
                        </ul>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <section>
            <div class="search shadow">
                <div class="container mtop8">
                    <div class="row">
                        <div class="col-12 text-center">
                            <form class="d-flex">
                                <input class="form-control" type="search" placeholder="Pesquise pelo produto" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{$slot}}

        <div class="footer mtop8">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-3 text-center">
                        <p> &copy; Todos os direitos reservados. <?= date('Y')?></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ url(mix('assets/js/bootstrap.bundle.min.js')) }}"></script>
        <script src="{{ url(mix('assets/js/app.js')) }}"></script>
        @livewireScripts
</body>
</html>



    