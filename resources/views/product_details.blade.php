<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    @include('header')
    <title>{{ $product->name ?? 'Product Detail' }}</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    @include('navbar')

    <section class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 flex flex-col md:flex-row gap-8">
                @if($product->image_url)
                    <div class="flex-shrink-0 w-full md:w-1/2 flex items-center justify-center">
                        <img src="{{ asset('storage/' . $product->image_url) }}" 
                             alt="{{ $product->name }}" 
                             class="rounded-lg w-full h-auto object-contain shadow-lg">
                    </div>
                @endif
                <div class="flex-1">
                    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                    <div class="mb-4 text-lg text-gray-600 dark:text-gray-300">
                        <span class="font-semibold">{{ lang('Kategori', 'Category') }}:</span>
                        {{ $product->category->name ?? '-' }}
                        @if($product->subcategory)
                            &raquo; {{ $product->subcategory->name }}
                        @endif
                    </div>
                    <p class="text-2xl text-orange-600 font-bold mb-4">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-2">{{ lang('Deskripsi', 'Description') }}</h2>
                        <div class="prose dark:prose-invert max-w-none">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>

                    @if(!empty($product->attributes) && is_array($product->attributes))
                        <div class="mb-6">
                            <h2 class="text-xl font-semibold mb-2">{{ lang('Atribut Produk', 'Product Attributes') }}</h2>
                            <table class="min-w-full text-sm border border-gray-200 dark:border-gray-700 rounded">
                                <tbody>
                                    @foreach($product->attributes as $attr)
                                        <tr class="border-b border-gray-100 dark:border-gray-700">
                                            <td class="py-2 px-4 font-semibold text-gray-700 dark:text-gray-200">{{ $attr['key'] ?? '' }}</td>
                                            <td class="py-2 px-4 text-gray-600 dark:text-gray-300">{{ $attr['value'] ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div class="flex gap-4">
                        <a href="{{ url()->previous() }}" 
                           class="inline-block bg-primary text-white px-6 py-2 rounded font-semibold hover:bg-orange-600 transition">
                            {{ lang('Kembali', 'Back') }}
                        </a>
                        <a href="https://wa.me/6281266866862?text=Halo, saya tertarik dengan produk {{ urlencode($product->name) }}" 
                           target="_blank"
                           class="inline-block bg-green-500 text-white px-6 py-2 rounded font-semibold hover:bg-green-600 transition">
                            {{ lang('Hubungi via WhatsApp', 'Contact via WhatsApp') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('footer')
    @include('modals')
    @include('toast')
    @include('icon_wa')
</body>
</html>