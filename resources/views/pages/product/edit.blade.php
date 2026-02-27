<x-layout>
    <div class="max-w-4xl mx-auto py-12 px-6">

        <div class="bg-white shadow-xl rounded-3xl p-10">

            <h1 class="text-2xl font-bold text-gray-900 mb-8">
                Edit Product
            </h1>

            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">

                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Product Name
                    </label>
                    <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">

                    @error('product_name')
                        <span class="text-sm text-red-500 mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Category
                    </label>
                    <select name="category_id"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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

                <!-- Price -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Price
                    </label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">

                    @error('price')
                        <span class="text-sm text-red-500 mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea name="description" rows="4"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $product->description) }}</textarea>

                    @error('description')
                        <span class="text-sm text-red-500 mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Current Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Image
                    </label>

                    <img src="{{ $product->image ?? '' }}" class="w-48 h-48 object-cover rounded-xl shadow-md mb-4">
                </div>

                <!-- Upload New Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Change Image
                    </label>
                    <input type="file" name="image" class="w-full text-sm text-gray-500">

                    @error('image')
                        <span class="text-sm text-red-500 mt-1 block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4 pt-6">

                    <a href="{{ route('products.index') }}"
                        class="px-5 py-2 rounded-xl bg-gray-200 text-gray-700 hover:bg-gray-300">
                        Cancel
                    </a>

                    <button type="submit"
                        class="px-6 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700 shadow-md">
                        Update Product
                    </button>

                </div>

            </form>

        </div>

    </div>
</x-layout>
