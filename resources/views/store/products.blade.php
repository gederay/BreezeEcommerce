<x-store-layout>
    <!-- product component -->
    <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto my-10 grid gap-6 sm:grid-cols-3 grid-cols-2">
        @foreach ($products as $product)
        <x-store.card-product productImage="{{ asset('storage/placeholder.png') }}" productName="{{ $product->title }}"
            productRating='5.0' productPrice="{{ $product->price }}" />
        @endforeach
    </div>
</x-store-layout>
