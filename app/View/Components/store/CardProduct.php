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

    /**
     * Create a new component instance.
     */
    public function __construct(
        $productImage,
        $productName,
        $productRating,
        $productPrice
    ) {
        $this->productImage = $productImage;
        $this->productName = $productName;
        $this->productRating = $productRating;
        $this->productPrice = $productPrice;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.store.card-product');
    }
}
