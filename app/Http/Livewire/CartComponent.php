<?php

namespace App\Http\Livewire;

use Cart;
use Livewire\Component;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }

    public function destroyAll()
    {
        Cart::destroy();
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message', 'Produto excluído com sucesso!');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.master');
    }
}
