<div>
    <section class="breadcrumb mtop16">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Carrinho</li>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    @if(Session::has('success_message'))
		<div class="alert alert-success">
		    {{ Session::get('success_message') }}
		</div>
	@endif
    <section>
        <div class="container cart ">
            <div class="row">
                <div class="col-md-12">
                    @if(Cart::count() > 0)
                    <h1 class="text-center">Carrinho de compras</h1>
                    @foreach (Cart::content() as $item)
                    <table class="table mt-4">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Qtd</th>
                            <th>Total</th>
                            <th width="70"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>
                                <img class="text-center" src="assets/img/product1.jpg" width="70">
                            </th>
                            <td>{{ $item->name}}</td>
                            <td>R$ {{ number_format($item->model->price, 2, ',', '.') }}</td>
                            <td> <form action="">
                                <div class="custom-quantity-input" data-max="120" pattern="[0-9]*">
                                    <input type="text" name="product-quatity" value="{{$item->qty}}">
                                    <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')">+</a>
                                    <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-</a>
                                </div>
                            </form>
                            <td style="color: #F45B69">R$ {{ number_format($item->subtotal, 2, ',', '.') }}</td>
                            <td><a href="" wire:click.prevent="destroy('{{$item->rowId}}')"><button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fas fa-trash"></i></button></a></td>
                          </tr>
                        </tbody>
                      </table>
                      @endforeach                      
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container subtotal">
            <div class="row">
                <div class="col-md-12  text-end">
                    <p><span class="title">TOTAL =</span><b class="index"> R$ {{Cart::subtotal()}}</b></p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12  text-end">
                    <a href="" wire:click.prevent="destroyAll()"><button class="btn btn-danger"> Limpar o carrinho</button></a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5 discount">
            <div class="row">
                <div class="col-md-4">
                   <div>
                      <h1>Código de desconto:</h1>
                   </div>
                   <div class="input-group mt-2">
                    <input type="text" class="form-control" placeholder="Digite o código do desconto" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-success" type="button" id="button-addon2">Ok</button>
                  </div>
                </div>
                <div class="col-md-4">
                    <div>
                       <h1>CEP:</h1>
                    </div>
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" placeholder="Digite o CEP" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-success" type="button" id="button-addon2">Ok</button>
                      </div>
                 </div>
                 <div class="col-md-4 text-end">
                    <div>
                        <h1>Ir para o pagamento:</h1>
                     </div>
                    <a href=""><button class="btn btn-outline-primary mt-2" type="button" id="button-addon2">Continuar</button></a>
                 </div>
            </div>
        </div>
        @else
			<p style="color: red">Sem itens no carrinho</p>
	    @endif
    </section>
</div>