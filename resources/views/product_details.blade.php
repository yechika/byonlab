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
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ url()->previous() }}"
                        class="inline-flex items-center justify-center bg-primary text-white px-6 py-2 rounded font-semibold hover:bg-orange-600 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        {{ lang('Kembali', 'Back') }}
                    </a>
                </div>
                
                <!-- Product Content -->
                <div class="flex flex-col md:flex-row gap-8">
                @if(!empty($product->image_url))
                            <div class="flex-shrink-0 w-full md:w-1/2">
                                <div x-data="{ 
                        images: {{ json_encode($product->image_url) }}, 
                        activeIndex: 0,
                        isHovering: false  // <-- 1. State baru untuk melacak hover
                     }" @mouseenter="isHovering = true" @mouseleave="isHovering = false" class="relative">

                                    <div
                                        class="w-full h-80 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center overflow-hidden">
                                        <template x-for="(image, index) in images">
                                            <img x-show="activeIndex === index" :src="'{{ asset('storage') }}/' + image"
                                                alt="{{ $product->name }}"
                                                class="w-full h-full object-contain transition-opacity duration-300">
                                        </template>
                                    </div>

                                    <div x-show="isHovering && images.length > 1"
                                        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                                        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                                        <button @click="activeIndex = (activeIndex > 0) ? activeIndex - 1 : images.length - 1"
                                            class="absolute top-1/2 left-2 -translate-y-1/2 bg-black bg-opacity-50 text-white rounded-full p-2 hover:bg-opacity-75 focus:outline-none">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>

                                        <button @click="activeIndex = (activeIndex < images.length - 1) ? activeIndex + 1 : 0"
                                            class="absolute top-1/2 right-2 -translate-y-1/2 bg-black bg-opacity-50 text-white rounded-full p-2 hover:bg-opacity-75 focus:outline-none">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>

                                        <div
                                            class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-black bg-opacity-50 text-white text-sm px-2 py-1 rounded-full">
                                            <span x-text="activeIndex + 1"></span> / <span x-text="images.length"></span>
                                        </div>
                                    </div>
                                </div>
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
                                            <td class="py-2 px-4 font-semibold text-gray-700 dark:text-gray-200">
                                                {{ $attr['key'] ?? '' }}</td>
                                            <td class="py-2 px-4 text-gray-600 dark:text-gray-300">{{ $attr['value'] ?? '' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div class="flex flex-col gap-4">

                        <div class="flex gap-4">
                            <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan produk {{ urlencode($product->name) }}"
                                target="_blank"
                                class="flex-1 text-center inline-flex items-center justify-center bg-green-500 text-white px-6 py-2 rounded font-semibold hover:bg-green-600 transition">
                                <img src="https://images.icon-icons.com/3005/PNG/512/whatsapp_icon_188135.png" alt="WhatsApp" class="w-5 h-5 mr-2 filter brightness-0 invert">
                                {{ lang('Hubungi via WhatsApp', 'Contact via WhatsApp') }}
                            </a>
                        </div>

                        @if(!empty($product->target_link))
                            <a href="{{ $product->target_link }}" target="_blank"
                                class="w-full text-center inline-block bg-blue-600 text-white px-6 py-2 rounded font-semibold hover:bg-blue-700 transition">
                                {{ lang('Lanjut ke Inaproc V6', 'Go to Inaproc V6') }}
                            </a>
                        @endif

                    </div>
                </div>
                <!-- End Product Content -->
            </div>
        </div>
    </section>

    @include('footer')
    @include('modals')
    @include('toast')
    @include('icon_wa')
</body>

</html>