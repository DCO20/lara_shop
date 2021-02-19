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
    <section>
        <div class="container cart">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Carrinho de compras</h1>
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
                            <td>TV</td>
                            <td>R$ 949,00</td>
                            <td>2</td>
                            <td style="color: red">R$ 1898,00</td>
                            <td><button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fas fa-trash"></i></button></td>
                          </tr>
                          <tr>
                            <th>
                                <img class="text-center" src="assets/img/product1.jpg" width="70">
                            </th>
                            <td>TV</td>
                            <td>R$ 949,00</td>
                            <td>2</td>
                            <td style="color: red">R$ 1898,00</td>
                            <td><button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fas fa-trash"></i></button></td>
                          </tr>
                        </tbody>
                      </table>
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
    </section>
</div>