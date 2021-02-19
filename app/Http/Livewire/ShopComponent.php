<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShopComponent extends Component
{
    public $pagesize;

    public function mount()
    {
        $this->pagesize = 3;
    }

    public function render()
    {
        $products = Product::paginate($this->pagesize);
        return view('livewire.shop-component',
        ['products' => $products])->layout('layouts.master');
    }
}
