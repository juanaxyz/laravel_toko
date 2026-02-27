<x-layout>
    <div class="">
        <div class="bg-white shadow-md rounded-xl overflow-hidden">

            <div class="p-4 border-b flex justify-between items-center">

                <!-- LEFT SIDE -->
                <div class="flex items-center gap-4">
                    <h2 class="text-xl font-semibold text-gray-800">
                        Daftar Produk
                    </h2>

                    @if (request()->search)
                        <a href="{{ route('products.index') }}"
                            class="inline-flex items-center gap-2 px-3 py-1.5
                      text-sm font-medium text-gray-600
                      bg-gray-100 rounded-lg
                      hover:bg-red-50 hover:text-red-600
                      transition">

                            <!-- Icon Reset -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v6h6M20 20v-6h-6" />
                            </svg>

                            Reset
                        </a>
                    @endif
                </div>

                <!-- RIGHT SIDE -->
                <a href="{{ route('products.create') }}"
                    class="group relative inline-block text-sm font-medium text-indigo-600">

                    <span
                        class="absolute inset-0 translate-x-0 translate-y-0 bg-indigo-600 transition-transform group-hover:translate-x-0.5 group-hover:translate-y-0.5 rounded-lg"></span>

                    <span class="relative block border border-current bg-white px-6 py-2 rounded-lg">
                        Add Product
                    </span>

                </a>

            </div>
            <form method="GET" action="{{ route('products.index') }}" class="relative">

                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="{{ $placeholder ?? 'Search...' }}"
                    class="w-full pl-4 pr-24 py-2 rounded-xl border border-gray-300
                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                       shadow-sm text-sm">

                <button type="submit"
                    class="absolute right-1 top-1 bottom-1 px-4
                       bg-blue-600 text-white text-sm font-medium
                       rounded-lg hover:bg-blue-700 transition">
                    Search
                </button>

            </form>
            <div class="overflow-x-auto">

                @if (session('message'))
                    <div role="alert" class="border-2 bg-blue-100 p-4 text-blue-900 shadow-[4px_4px_0_0]">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="mt-0.5 size-4">
                                <path fill-rule="evenodd"
                                    d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM9 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.75 8a.75.75 0 0 0 0 1.5h.75v1.75a.75.75 0 0 0 1.5 0v-2.5A.75.75 0 0 0 8.25 8h-1.5Z"
                                    clip-rule="evenodd"></path>
                            </svg>

                            <strong class="block flex-1 leading-tight font-semibold">
                                {{ session('message') }}
                            </strong>
                        </div>
                    </div>
                @endif
                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                        <tr>

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kategori
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Harga
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stok
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($products as $product)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    {{ $product->product_name }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $product->category->category_name }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span
                                        class="px-2 py-1 text-xs rounded-full
                                {{ $product->stock > 10 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $product->stock ?? 1 }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                        Edit
                                    </a>
                                    <button command="show-modal" commandfor="dialog-{{ $product->product_name }}"
                                        class="rounded-md bg-white/10 px-2.5 py-1.5 text-sm font-semibold text-red-500 inset-ring inset-ring-white/5 hover:text-red-800">Delete</button>


                                    <a href="{{ route('products.show', $product) }}"
                                        class="text-green-600 hover:text-green-800 font-medium ml-3">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">
                                    No products found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach ($products as $item)
        <el-dialog>
            <dialog id="dialog-{{ $item->product_name }}" aria-labelledby="dialog-title"
                class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                <el-dialog-backdrop
                    class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                <div tabindex="0"
                    class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                    <el-dialog-panel
                        class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-500/10 sm:mx-0 sm:size-10">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        data-slot="icon" aria-hidden="true" class="size-6 text-red-400">
                                        <path
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 id="dialog-title" class="text-base font-semibold text-white">Delete Product</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-400">Yakin Ingin Menghapus
                                            {{ $item->product_name }}
                                            ini ?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('products.destroy', $item) }}"
                            class="bg-gray-700/25 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            @csrf
                            @method('DELETE')
                            <button type="submit" command="close" commandfor="dialog-{{ $item->product_name }}"
                                class="inline-flex w-full justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Delete</button>
                            <button type="button" command="close" commandfor="dialog-{{ $item->product_name }}"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20 sm:mt-0 sm:w-auto">Cancel</button>
                        </form>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
    @endforeach
</x-layout>
