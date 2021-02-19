<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public $pagesize;

    public function mount()
    {
        $this->pagesize = 3;
    }

    public function render()
    {
        $products = Product::paginate($this->pagesize);
        return view('livewire.home-component',
        ['products' => $products])->layout('layouts.master');
    }
}
