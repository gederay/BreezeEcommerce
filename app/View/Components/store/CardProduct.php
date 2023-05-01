<?php

namespace App\View\Components\store;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardProduct extends Component
{
    public $productImage;
    public $productName;
    public $productRating;
    public $productPrice;
    public $productAddToCart;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $productImage,
        $productName,
        $productRating,
        $productPrice,
        $productAddToCart
    ) {
        $this->productImage = $productImage;
        $this->productName = $productName;
        $this->productRating = $productRating;
        $this->productPrice = $productPrice;
        $this->productAddToCart = $productAddToCart;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.store.card-product');
    }
}
