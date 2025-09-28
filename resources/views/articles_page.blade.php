<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @include('header')
    <title>{{ lang('Artikel', 'Articles') }} - Biondi</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    @include('navbar')

    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-r from-primary to-orange-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">
                {{ lang('Artikel & Berita', 'Articles & News') }}
            </h1>
            <p class="text-xl text-orange-100 max-w-3xl mx-auto">
                {{ lang('Baca artikel terbaru, tips, dan informasi menarik seputar produk dan industri', 'Read the latest articles, tips, and interesting information about products and industry') }}
            </p>
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($articles && $articles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @foreach($articles as $article)
                        <article class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                            <!-- Image Section -->
                            @if(!empty($article->image_url) && is_array($article->image_url) && count($article->image_url) > 0)
                                <div class="h-64 overflow-hidden">
                                    <img src="{{ asset('storage/' . $article->image_url[0]) }}" 
                                         alt="{{ $article->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                            @else
                                <div class="h-64 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <div class="p-6">
                                <!-- Date with Icon -->
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                                    <svg class="w-4 h-4 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <time datetime="{{ $article->published_at->format('Y-m-d') }}">
                                        {{ $article->published_at->format('d F Y') }}
                                    </time>
                                    
                                    <!-- Reading time -->
                                    <span class="ml-4 flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $article->reading_time }} {{ lang('menit', 'min') }}
                                    </span>
                                </div>
                                
                                <!-- Title -->
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-primary transition-colors">
                                    <a href="{{ route('articles.show', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </h2>
                                
                                <!-- Synopsis/Excerpt -->
                                <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-3">
                                    @if($article->excerpt)
                                        {{ Str::limit($article->excerpt, 150) }}...
                                    @else
                                        {{ Str::limit(strip_tags($article->content), 150) }}...
                                    @endif
                                </p>
                                
                                <!-- Read More Button -->
                                <a href="{{ route('articles.show', $article->slug) }}" 
                                   class="inline-flex items-center justify-center bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-orange-600 transition-colors group">
                                    {{ lang('Baca Selengkapnya', 'Read More') }}
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-center">
                    {{ $articles->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <svg class="mx-auto h-24 w-24 text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                        {{ lang('Belum Ada Artikel', 'No Articles Yet') }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-8">
                        {{ lang('Artikel akan segera tersedia. Silakan kunjungi lagi nanti.', 'Articles will be available soon. Please visit again later.') }}
                    </p>
                    <a href="{{ url('/') }}" 
                       class="inline-flex items-center justify-center bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                        {{ lang('Kembali ke Beranda', 'Back to Home') }}
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>

    @include('footer')
    @include('modals')
    @include('toast')
    @include('icon_wa')
</body>

</html>