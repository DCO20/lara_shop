<div>
    <section class="breadcrumb mtop16">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Loja</li>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="categories mtop8">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-md-push-9">
                        <div class="sidebar-navigation">
                            <div class="title">Categorias do Produto<i class="fa fa-angle-down"></i></div>
                            <div class="list">
                                <a class="entry" href=""><span><i class="fa fa-angle-right"> Tvs</i></span></a>
                                <a class="entry" href=""><span><i class="fa fa-angle-right"> Informática</i></span></a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    @foreach ($products as $product)       
                    <div class="col-md-3 text-center mtop8 shadow">
                        <div class="home_product">
                            <ul class="list-unstyled mt-3 mb-4">
                                <a href="">
                                    <li>
                                        <img src="assets/img/semimagem.png" width="150">
                                    </li>
                                    <li>{{ $product->name}}</li>
    
                                    <div class="price">
                                        <li> R$ {{ number_format($product->price, 2, ',', '.') }}</li>
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
        </div>
    </section>
</div>
