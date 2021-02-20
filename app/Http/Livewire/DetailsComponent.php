<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;
    public $pagesize;

    public function mount($url)
    {
        $this->url = $url;
        $this->pagesize = 3;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Produto adicionado no carrinho com sucesso!');
        return redirect()->route('cart.index');
    }

    public function render()
    {
        $products = Product::paginate($this->pagesize);
        $product = Product::where('url',$this->url)->first();
        return view('livewire.details-component',
        ['product' => $product,
        'products'  => $products
        ])->layout('layouts.master');
    }
}
