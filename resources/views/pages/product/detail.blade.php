<x-layout>
    <div class="max-w-6xl mx-auto px-4 py-12">

        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8">
            <a href="{{ route('products.index') }}" class="hover:text-indigo-600 transition">Products</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-gray-900 font-medium">{{ $product->product_name }}</span>
        </nav>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">

                <!-- LEFT SIDE : IMAGE -->
                <div class="relative bg-gradient-to-br from-gray-100 to-gray-200 p-8 flex items-center justify-center">
                    <div class="absolute top-4 left-4">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                            {{ $product->category->category_name }}
                        </span>
                    </div>
                    <img src="{{ asset('storage/image_products/' . $product->image_path) }}"
                        alt="{{ $product->product_name }}"
                        class="w-full max-w-md h-80 lg:h-96 object-cover rounded-2xl shadow-2xl transform hover:scale-105 transition duration-500">
                </div>

                <!-- RIGHT SIDE : DETAIL -->
                <div class="p-8 lg:p-12 flex flex-col justify-center">

                    <!-- Product Name -->
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        {{ $product->product_name }}
                    </h1>

                    <!-- Category Badge -->
                    <div class="flex items-center gap-2 mb-6">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        <span class="text-gray-600">{{ $product->category->category_name }}</span>
                    </div>

                    <!-- Price -->
                    <div class="mb-8">
                        <span class="text-4xl font-extrabold text-indigo-600">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Description</h3>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 mt-auto">
                        <button
                            class="flex-1 inline-flex items-center justify-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to Cart
                        </button>
                        <button
                            class="flex-1 inline-flex items-center justify-center gap-2 bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            Wishlist
                        </button>
                    </div>

                </div>

            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-8 text-center">
            <a href="{{ route('products.index') }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-indigo-600 transition font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Products
            </a>
        </div>

    </div>
</x-layout>
