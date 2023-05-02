<x-store-layout>

    <div class="container lg:w-2/3 xl:w-2/3 mx-auto pt-12">
        <h1 class="text-3xl font-bold mb-6 dark:text-white">Your Cart Items</h1>
        <div x-data="{
            cartItems: {{
                json_encode(
                    $products->map(fn($product) => [
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => ('storage/products/' . $product->image),
                        'title' => $product->title,
                        'price' => $product->price,
                        'quantity' => $cartItems[$product->id]['quantity'],
                        'removeUrl' => route('cart.remove', $product),
                        'updateQuantityUrl' => route('cart.update-quantity', $product)
                    ])
                )
            }},
            get cartTotal() {
                return this.cartItems.reduce((accum, next) => accum + next.price * next.quantity, 0).toFixed(0)
            },
        }" class="bg-white dark:bg-gray-600 p-4 rounded-lg shadow">
            <!-- Product Items -->
            <template x-if="cartItems.length">
                <div class="">
                    <!-- Product Item -->
                    <template x-for="product in cartItems" :key="product.id">
                        <div x-data="productItem(product)">
                            <div class="w-full flex flex-col sm:flex-row items-center gap-4 flex-1">
                                <img :src="product.image" class="object-cover h-32 w-40 rounded-lg"
                                    :alt="product.title" />
                                <div class="flex flex-col justify-between flex-1">
                                    <div class="flex justify-between mb-3">
                                        <h3 class="dark:text-white" x-text="product.title"></h3>
                                        <span class="text-lg font-semibold dark:text-white ">
                                            <span x-money.id-ID.IDR.decimal="product.price"></span>
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center dark:text-white">
                                            Qty:
                                            <input type="number" min="1" x-model="product.quantity"
                                                @change="changeQuantity()"
                                                class="ml-3 py-1 border-gray-200 dark:bg-slate-400 focus:border-purple-600 focus:ring-purple-600 w-16" />
                                        </div>
                                        <a href="#" @click.prevent="removeItemFromCart()"
                                            class="text-purple-600 hover:text-purple-500">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <!--/ Product Item -->
                            <hr class="my-5" />
                        </div>
                    </template>
                    <!-- Product Item -->

                    <div class="border-t border-gray-300 pt-4">
                        <div class="flex justify-between">
                            <span class="font-semibold dark:text-white">Subtotal</span>
                            <span id="cartTotal" class="text-xl dark:text-white"
                                x-money.id-ID.IDR.decimal="cartTotal"></span>
                        </div>
                        <p class="text-gray-500 mb-6">
                            Shipping and taxes calculated at checkout.
                        </p>

                        <form action="" method="post">
                            @csrf
                            <button type="submit"
                                class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                Proceed to Checkout
                            </button>
                        </form>
                    </div>
                </div>
                <!--/ Product Items -->
            </template>

            <template x-if="!cartItems.length">
                <div class="text-center py-8 text-gray-500">
                    You don't have any items in cart
                </div>
            </template>

        </div>
    </div>
</x-store-layout>