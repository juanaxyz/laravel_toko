<x-layout>

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
                    <input type="number" name="stock"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan jumlah stok" required>
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
