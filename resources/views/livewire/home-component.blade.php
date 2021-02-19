<div>
    <section>
        <div class="cate_slider mtop8">
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
                    <div class="col-9">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/img/slider1.png" class="d-block w-100" alt="Slide1">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/slider2.png" class="d-block w-100" alt="Slide2">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/slider3.png" class="d-block w-100" alt="Slide3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="latest_products">
        <div class="container mtop8">
            <div class="row">
                <div class="col-12 text-center mtop8">
                    <h5>Produtos Recentes</h5>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4 text-center mtop8 shadow">
                    <div class="home_product">
                        <ul class="list-unstyled mt-3 mb-4">
                            <a href="">
                                <li>
                                    <img src="assets/img/semimagem.png" width="150">
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
    </div>
</section>
<section class="optin">
       <div class="optin_content">
        <header>
            <h1>
                O Azul Friday vem aí! Mas, as surpresas começam muuuito antes do que você imagina. Quer ficar por dentro de tudo? Conta seu e-mail pra gente 🙂
            </h1>
            <div class="col-md-12 mtop8">
                <form class="d-flex">
                    <input class="form-control" type="search" placeholder="Digite seu email" aria-label="Search">
                    <button class="btn" type="submit">Cadastrar</button>
                </form>
            </div>
        </header>
       </div>
</section>
</div>
