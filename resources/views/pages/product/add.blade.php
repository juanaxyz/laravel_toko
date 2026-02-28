<x-layout>
    {{-- Alert Error dengan Alpine.js --}}
    @if ($errors->any())
        <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2" role="alert">
            <div role="alert"
                class="absolute right-0  rounded-md border border-red-500 bg-red-50 p-4 shadow-sm dark:border-red-400 dark:bg-red-800">
                <div class="flex items-start gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="-mt-0.5 size-6 text-red-700 dark:text-red-200">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"></path>
                    </svg>

                    <div class="flex-1">
                        <strong class="block leading-tight font-medium text-red-800 dark:text-red-100">
                            Error
                        </strong>

                        <p class="mt-0.5 text-sm text-red-700 dark:text-red-200">
                            failed adding product
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="max-w-3xl mx-auto py-10">

        <div class="bg-white shadow-lg rounded-2xl p-8">

            <h2 class="text-2xl font-bold mb-6">Tambah Produk</h2>

            <form action="/products" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Nama Produk -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Produk
                    </label>
                    <input type="text" name="product_name"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan nama produk" value="{{ old('product_name') }}" required>
                    @error('product_name')
                        <span class="text-sm text-red-500 mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Kategori
                    </label>
                    <select name="category_id"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value=" ">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-sm text-red-500 mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Harga -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Harga
                    </label>
                    <input type="number" name="price"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan harga" value="{{ old('price') }}" required>
                    @error('price')
                        <span class="text-sm text-red-500 mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Stok -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Stok
                    </label>
                    <input type="number" name="stock" value="{{ old('stock') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan jumlah stok" required>
                    @error('stock')
                        <span class="text-sm text-red-500 mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Deskripsi
                    </label>
                    <textarea name="description" rows="4"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Deskripsi produk"
                        required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-sm text-red-500 mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Gambar Produk
                    </label>

                    <input type="file" name="image"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100">
                    @error('image')
                        <span class="text-sm text-red-500 mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Simpan Produk
                    </button>
                </div>

            </form>
        </div>

    </div>


</x-layout>
