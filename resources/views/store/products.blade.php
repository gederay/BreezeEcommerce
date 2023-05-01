<x-store-layout>
    <!-- product component -->
    <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto my-10 grid gap-10 sm:grid-cols-3 grid-cols-2">
        @foreach ($products as $product)
        <div x-data="productItem({{ json_encode([
            'id' => $product->id,
            'slug' => $product->slug,
            'image' => $product->image,
            'title' => $product->title,
            'price' => $product->price,
            'addToCartUrl' => route('cart.add', $product)
        ])}})">
            {{--
            <x-store.card-product productImage="{{ asset('storage/products/' . $product->image) }}"
                productName="{{ $product->title }}" productRating='5.0' productPrice="{{ $product->price }}"
                productAddToCart="{{ route('cart.add', $product->slug) }}" /> --}}
            <div x-data="productItem({{ json_encode([
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image,
                        'title' => $product->title,
                        'price' => $product->price,
                        'addToCartUrl' => route('cart.add', $product)
                    ]) }})"
                class="border border-1 border-gray-200 rounded-md hover:border-purple-600 transition-colors bg-white">
                <a href="" class="aspect-w-3 aspect-h-2 block overflow-hidden">
                    <img src="{{ asset('storage/products/' . $product->image) }}" alt=""
                        class="object-cover h-96 w-full rounded-lg hover:scale-105 hover:rotate-1 transition-transform" />
                </a>
                <div class="p-4">
                    <h3 class="text-lg">
                        <a href="">
                            {{$product->title}}
                        </a>
                    </h3>
                    <h5 class="font-bold">${{$product->price}}</h5>
                </div>
                <div class="flex justify-between py-3 px-4">
                    <button class="btn-primary" @click="addToCart()">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{$products->links()}}
</x-store-layout>
