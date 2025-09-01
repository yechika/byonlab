<section id="products" class="py-1 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-1">
        <div class="text-center mb-12">
            {{-- <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                {{ lang('Distributor resmi Thermo Fisher Scientific untuk peralatan laboratorium berkualitas tinggi', 
                         'Official distributor of Thermo Fisher Scientific for high-quality laboratory equipment') }}
            </p> --}}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products as $product)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col">
                {{-- Cek apakah image_url tidak kosong, lalu ambil gambar pertama [0] --}}
                @if(!empty($product->image_url))
                <img src="{{ asset('storage/' . $product->image_url[0]) }}" alt="{{ $product->name }}" class="h-40 object-cover mb-4 rounded">
                @else
                {{-- Opsional: Tampilkan gambar placeholder jika tidak ada gambar --}}
                <img src="{{ asset('images/placeholder.png') }}" alt="{{ $product->name }}" class="h-40 object-cover mb-4 rounded">
                @endif
                <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                <p class="text-gray-500 mb-1">{{ $product->category->name ?? '-' }}</p>
                <p class="text-orange-600 font-bold mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                <a href="{{ route('product.details', $product->id) }}" class="mt-auto inline-block bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 text-center">
                    {{ lang('Lihat Detail', 'View Details') }}
                </a>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500">
                {{ lang('Tidak ada produk tersedia.', 'No products available.') }}
            </div>
            @endforelse
        </div>
        @if(Route::currentRouteName() === 'landing')
        <div class="mt-8 mb-8 text-center">
            <a href="{{ route('products.page') }}" class="inline-block bg-primary text-white px-6 py-3 rounded font-semibold hover:bg-orange-600 transition">
                {{ lang('Lihat Semua Produk', 'View All Products') }}
            </a>
        </div>
        @endif
    </div>
</section>