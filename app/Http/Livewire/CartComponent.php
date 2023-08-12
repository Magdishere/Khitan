<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{

    public function increaseQuantity($rowId){

        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);

    }

    public function decreaseQuantity($rowId){

        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function destroy($id){

        Cart::instance('cart')->remove($id);
        session()->flash('success_message', 'Item Has Been Removed');
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function clearAll(){

        Cart::instance('cart')->destroy();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
