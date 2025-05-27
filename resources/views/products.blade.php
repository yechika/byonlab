<section id="products" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Produk Unggulan Kami</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">Distributor resmi Thermo Fisher Scientific untuk peralatan laboratorium berkualitas tinggi</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($products as $product)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col">
                        @if($product->image_url)
                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="h-40 object-cover mb-4 rounded">
                        @endif
                        <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-500 mb-1">{{ $product->category->name ?? '-' }}</p>
                        <p class="text-orange-600 font-bold mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                        <a href="#" class="mt-auto inline-block bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 text-center">Lihat Detail</a>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500">
                        Tidak ada produk tersedia.
                    </div>
                @endforelse
            </div>
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </section>