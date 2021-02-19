<div>
    <section class="breadcrumb mtop16">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detalhes do produto</li>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container details">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="{{ url(asset('assets/img/semimagem.png'))}}" width="300">
                </div>
                <div class="col-md-6 my-5">
                    <h1 class="text-center">{{$product->name}}</h1><br>
                    <p class="text-center">{{$product->about}}</p><br>
                    <div class="text-center price"> R$ {{ number_format($product->price, 2, ',', '.') }}</div><br>
                    <div class="btn_details text-center">
                        <a href=""><button class="btn"><i class="fas fa-shopping-cart"></i> Adicionar no carrinho</button></a>
                    </div>
                </div>
            </div>
        </div><hr>
    </section>
    
    <section>
        <div class="container details">
            <div class="row my-3">
                <div class="col-md-12">
                    <h1 class="mt-2">Descrição do produto</h1><br>
                    <p>{{$product->description}}</p>
                </div>
            </div>
        </div><hr>
    </section>
    <section>
        <div class="container details">
            <div class="row my-3">
                    <h1 class="mt-2">Ultímos produtos</h1><br>
                    @foreach ($products as $product)
                    <div class="col-md-4 text-center shadow mt-3">
                        <div class="home_product">
                            <ul class="list-unstyled mt-3 mb-4">
                                <a href="">
                                    <li>
                                        <img src="{{ url(asset('assets/img/semimagem.png'))}}" width="150">
                                    </li>
                                    <li>{{ $product->name}}</li>
    
                                    <div class="price">
                                        <li>R$ {{ number_format($product->price, 2, ',', '.') }}</li>
                                    </div>
                                    <div class="btn_details">
                                        <a href="{{ route('product.details',['url'=>$product->url]) }}"><button class="btn">Ver detalhes</button></a>
                                    </div>
                                </a>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                
            </div>
        </div>
    </section>
</div>
