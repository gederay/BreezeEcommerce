<div class="bg-white shadow-md rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg p-4 object-cover h-80 w-96" src="{{ $productImage }}" alt="">
    </a>
    <div class="px-5 pb-5">
        <a href="#">
            <h4 class="truncate text-gray-900 font-semibold text-xl tracking-tight dark:text-white">
                {{ $productName }}
            </h4>
        </a>
        <div class="flex justify-between items-center mt-2.5 mb-5">
            <div class="inline-flex">
                <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                <span
                    class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">
                    {{ $productRating }}
                </span>
            </div>

            <span class="text-xl font-bold text-gray-900 dark:text-white">
                Rp {{ number_format($productPrice) }}
            </span>

        </div>

        <div class="flex justify-between">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
            </a>
            <a href="#"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                to cart</a>
        </div>
    </div>
</div>
