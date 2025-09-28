<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @include('header')
    <title>{{ $article->meta_title ?? $article->title }} - Biondi</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $article->meta_description ?? $article->excerpt ?? Str::limit(strip_tags($article->content), 160) }}">
    <meta name="keywords" content="{{ $article->title }}">
    <meta name="author" content="Biondi">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 160) }}">
    @if(!empty($article->image_url) && is_array($article->image_url) && count($article->image_url) > 0)
        <meta property="og:image" content="{{ asset('storage/' . $article->image_url[0]) }}">
    @endif
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->url() }}">
    <meta property="twitter:title" content="{{ $article->title }}">
    <meta property="twitter:description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 160) }}">
    @if(!empty($article->image_url) && is_array($article->image_url) && count($article->image_url) > 0)
        <meta property="twitter:image" content="{{ asset('storage/' . $article->image_url[0]) }}">
    @endif
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    @include('navbar')

    <main class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <article class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <!-- Back Button -->
                <div class="p-6 pb-0">
                    <a href="{{ route('articles.index') }}"
                        class="inline-flex items-center justify-center bg-primary text-white px-6 py-2 rounded font-semibold hover:bg-orange-600 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        {{ lang('Kembali ke Artikel', 'Back to Articles') }}
                    </a>
                </div>

                <!-- Article Header -->
                <header class="p-6">
                    <!-- Date and Reading Time -->
                    <div class="flex flex-wrap items-center text-sm text-gray-500 dark:text-gray-400 mb-4 gap-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <time datetime="{{ $article->published_at->format('Y-m-d') }}">
                                {{ $article->published_at->format('d F Y') }}
                            </time>
                        </div>
                        
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $article->reading_time }} {{ lang('menit baca', 'min read') }}
                        </div>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                        {{ $article->title }}
                    </h1>
                    
                    <!-- Excerpt -->
                    @if($article->excerpt)
                        <div class="text-xl text-gray-600 dark:text-gray-300 mb-6 font-medium leading-relaxed">
                            {{ $article->excerpt }}
                        </div>
                    @endif
                </header>

                <!-- Featured Image -->
                @if(!empty($article->image_url) && is_array($article->image_url) && count($article->image_url) > 0)
                    <div class="px-6 mb-6">
                        <div x-data="{ 
                            images: {{ json_encode($article->image_url) }}, 
                            activeIndex: 0,
                            isHovering: false
                        }" @mouseenter="isHovering = true" @mouseleave="isHovering = false" class="relative">
                            
                            <div class="w-full h-96 bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden">
                                <template x-for="(image, index) in images">
                                    <img x-show="activeIndex === index" :src="'{{ asset('storage') }}/' + image"
                                         alt="{{ $article->title }}"
                                         class="w-full h-full object-cover transition-opacity duration-300">
                                </template>
                            </div>

                            <!-- Navigation (only show if multiple images) -->
                            <div x-show="isHovering && images.length > 1"
                                 x-transition:enter="transition ease-out duration-200" 
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100" 
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100" 
                                 x-transition:leave-end="opacity-0">

                                <button @click="activeIndex = (activeIndex > 0) ? activeIndex - 1 : images.length - 1"
                                        class="absolute top-1/2 left-2 -translate-y-1/2 bg-black bg-opacity-50 text-white rounded-full p-2 hover:bg-opacity-75 focus:outline-none">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>

                                <button @click="activeIndex = (activeIndex < images.length - 1) ? activeIndex + 1 : 0"
                                        class="absolute top-1/2 right-2 -translate-y-1/2 bg-black bg-opacity-50 text-white rounded-full p-2 hover:bg-opacity-75 focus:outline-none">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>

                                <div class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-black bg-opacity-50 text-white text-sm px-2 py-1 rounded-full">
                                    <span x-text="activeIndex + 1"></span> / <span x-text="images.length"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Article Content -->
                <div class="px-6 pb-8">
                    <div class="prose prose-lg dark:prose-invert max-w-none">
                        {!! $article->content !!}
                    </div>
                </div>

                <!-- Share Section -->
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ lang('Bagikan:', 'Share:') }}
                            </span>
                            
                            <!-- WhatsApp Share -->
                            <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . request()->url()) }}" 
                               target="_blank"
                               class="inline-flex items-center px-3 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                                </svg>
                                WhatsApp
                            </a>

                            <!-- Copy URL -->
                            <button onclick="copyToClipboard()" 
                                    class="inline-flex items-center px-3 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                {{ lang('Salin Link', 'Copy Link') }}
                            </button>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Related Articles -->
            @if($relatedArticles && $relatedArticles->count() > 0)
                <section class="mt-12">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                        {{ lang('Artikel Terkait', 'Related Articles') }}
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedArticles as $related)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                                @if(!empty($related->image_url) && is_array($related->image_url) && count($related->image_url) > 0)
                                    <div class="h-40 overflow-hidden">
                                        <img src="{{ asset('storage/' . $related->image_url[0]) }}" 
                                             alt="{{ $related->title }}"
                                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                    </div>
                                @endif
                                <div class="p-4">
                                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                        {{ $related->formatted_published_at }}
                                    </div>
                                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                                        <a href="{{ route('articles.show', $related->slug) }}" class="hover:text-primary transition-colors">
                                            {{ $related->title }}
                                        </a>
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-2">
                                        {{ Str::limit($related->excerpt ?? strip_tags($related->content), 80) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </main>

    @include('footer')
    @include('modals')
    @include('toast')
    @include('icon_wa')

    <script>
        function copyToClipboard() {
            navigator.clipboard.writeText(window.location.href).then(function() {
                // Show toast notification
                const toast = document.createElement('div');
                toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50';
                toast.textContent = '{{ lang("Link berhasil disalin!", "Link copied successfully!") }}';
                document.body.appendChild(toast);
                
                setTimeout(() => {
                    toast.remove();
                }, 3000);
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
</body>

</html>