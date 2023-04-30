<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <div class="mx-auto w-full max-w-[550px] bg-white">
                <form class="py-6 px-9" action="{{ route('admin.products.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-5">
                        <x-input-label for="title" :value="__('Name')" />
                        <x-text-input id="title" class="block mt-2 w-full" type="text" name="title"
                            :value="old('title')" autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="slug" :value="__('Slug')" />
                        <x-text-input id="slug" class="block mt-2 w-full" type="text" name="slug" :value="old('slug')"
                            autocomplete="slug" />
                        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-2 w-full" type="number" name="price"
                            :value="old('price')" autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description"
                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="description" rows="5">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-2 w-full" type="file" name="image"
                            :value="old('image')" autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Add Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('scripts')
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        // Get a reference to the file input element
        const input = document.querySelector('input[id="image"]');
        // Create a FilePond instance
        const pond = FilePond.create(input);

        FilePond.setOptions({
            server: {
                process: '{{ route('admin.upload') }}',
                revert: '{{ route('admin.delete') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

    </script>
    @endsection
</x-app-layout>
