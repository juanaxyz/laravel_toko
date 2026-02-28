<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-carousel />

    <div x-data="{ activeTab: 'featured' }" class="py-6">
        <!-- Tab Buttons -->
        <div role="tablist" class="flex gap-2">
            <button role="tab" @click="activeTab = 'featured'" :aria-selected="activeTab === 'featured'"
                :class="activeTab === 'featured'
                    ?
                    'bg-blue-600 text-white hover:bg-blue-700' :
                    'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                class="rounded-full px-4 py-2 text-sm font-medium transition-colors">
                Featured
            </button>

            <button role="tab" @click="activeTab = 'popular'" :aria-selected="activeTab === 'popular'"
                :class="activeTab === 'popular'
                    ?
                    'bg-blue-600 text-white hover:bg-blue-700' :
                    'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                class="rounded-full px-4 py-2 text-sm font-medium transition-colors">
                Popular
            </button>

            <button role="tab" @click="activeTab = 'trending'" :aria-selected="activeTab === 'trending'"
                :class="activeTab === 'trending'
                    ?
                    'bg-blue-600 text-white hover:bg-blue-700' :
                    'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                class="rounded-full px-4 py-2 text-sm font-medium transition-colors">
                Trending
            </button>
        </div>

        <!-- Tab Panels -->
        <div class="mt-4">
            <div x-show="activeTab === 'featured'" x-transition role="tabpanel">
                <p class="text-gray-700">
                    🌟 <strong>Featured Products</strong> - Produk pilihan terbaik yang kami rekomendasikan untuk Anda.
                </p>
            </div>

            <div x-show="activeTab === 'popular'" x-transition role="tabpanel">
                <p class="text-gray-700">
                    🔥 <strong>Popular Products</strong> - Produk paling banyak diminati oleh pelanggan kami.
                </p>
            </div>

            <div x-show="activeTab === 'trending'" x-transition role="tabpanel">
                <p class="text-gray-700">
                    📈 <strong>Trending Products</strong> - Produk yang sedang naik daun dan banyak dicari.
                </p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-6">
        @forelse ($products as $product)
            <a href="{{ route('products.show', $product) }}" class="group relative block overflow-hidden">
                <button
                    class="absolute end-4 top-4 z-10 rounded-full bg-white p-1.5 text-gray-900 transition hover:text-gray-900/75">
                    <span class="sr-only">Wishlist</span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z">
                        </path>
                    </svg>
                </button>

                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->product_name }}"
                    class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72">

                <div class="relative border border-gray-100 bg-white p-6">
                    <p class="text-gray-700">
                        {{ $product->price }}
                        {{-- <span class="text-gray-400 line-through">$80</span> --}}
                    </p>

                    <h3 class="mt-1.5 text-lg font-medium text-gray-900">{{ $product->name }}</h3>

                    <p class="mt-1.5 line-clamp-3 text-gray-700">
                        {{ $product->description }}
                    </p>

                    <form class="mt-4 flex gap-4">
                        <button
                            class="block w-full rounded-sm bg-gray-100 px-4 py-3 text-sm font-medium text-gray-900 transition hover:scale-105">
                            Add to Cart
                        </button>

                        <button type="button"
                            class="block w-full rounded-sm bg-gray-900 px-4 py-3 text-sm font-medium text-white transition hover:scale-105">
                            Buy Now
                        </button>
                    </form>
                </div>
            </a>
        @empty
        @endforelse
    </div>
</x-layout>
