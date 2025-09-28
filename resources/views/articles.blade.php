<!-- Articles Section -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                {{ lang('Artikel Terbaru', 'Latest Articles') }}
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-300">
                {{ lang('Baca artikel terbaru dan informasi menarik dari kami', 'Read our latest articles and interesting information') }}
            </p>
        </div>

        @if($articles && $articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        @if(!empty($article->image_url) && is_array($article->image_url) && count($article->image_url) > 0)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $article->image_url[0]) }}" 
                                     alt="{{ $article->title }}"
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                        @else
                            <div class="h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <!-- Date -->
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $article->formatted_published_at }}
                            </div>
                            
                            <!-- Title -->
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3 line-clamp-2">
                                {{ $article->title }}
                            </h3>
                            
                            <!-- Excerpt -->
                            <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($article->excerpt), 120) }}...
                            </p>
                            
                            <!-- Read More Button -->
                            <a href="{{ route('articles.show', $article->slug) }}" 
                               class="inline-flex items-center justify-center bg-primary text-white px-4 py-2 rounded font-semibold hover:bg-orange-600 transition">
                                {{ lang('Baca Selengkapnya', 'Read More') }}
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Articles Button -->
            <div class="text-center mt-12">
                <a href="{{ route('articles.index') }}" 
                   class="inline-flex items-center justify-center bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    {{ lang('Lihat Semua Artikel', 'View All Articles') }}
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ lang('Belum ada artikel', 'No articles yet') }}</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ lang('Artikel akan segera tersedia', 'Articles will be available soon') }}</p>
            </div>
        @endif
    </div>
</section>