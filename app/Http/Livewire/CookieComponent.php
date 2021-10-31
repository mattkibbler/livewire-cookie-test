<?php

namespace App\Http\Livewire;

use App\Models\Basket;
use Livewire\Component;

class CookieComponent extends Component
{

    public function render()
    {

        $basket = Basket::findOrCreate();

        return view('livewire.cookie-component', [
            'basketId' => $basket->id,
        ]);
    }

    public function submit() {

        $basket = Basket::findOrCreate();

    }
}
