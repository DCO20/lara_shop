<?php

namespace App\Http\Livewire;

use App\Models\Product;
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
