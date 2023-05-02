<x-store-layout>
    <!-- product component -->
    <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto pt-20 grid gap-10 sm:grid-cols-3 grid-cols-2">
        @foreach ($products as $product)
        <div x-data="productItem({{ json_encode([
            'id' => $product->id,
            'slug' => $product->slug,
            'image' => $product->image,
            'title' => $product->title,
            'price' => $product->price,
            'addToCartUrl' => route('cart.add', $product)
        ])}})">
            <x-store.card-product productImage="{{ asset('storage/products/' . $product->image) }}"
                productName="{{ $product->title }}" productRating='5.0' productPrice="{{ $product->price }}"
                productAddToCart="{{ route('cart.add', $product->slug) }}" />
        </div>
        @endforeach
    </div>
    <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto my-10 pb-12">
        {{$products->links()}}
    </div>
</x-store-layout>
