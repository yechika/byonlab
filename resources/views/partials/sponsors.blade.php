@php
    use App\Models\Sponsor;
    $sponsors = Sponsor::active()->ordered()->get();
@endphp

@if($sponsors->count())
    <section id="sponsors" class="py-12 md:py-16 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center mb-8">
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">Partner</h3>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8 items-center justify-items-center">
                @foreach($sponsors as $sponsor)
                    <div class="w-full flex items-center justify-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                        <img src="{{ Storage::url($sponsor->image_url) }}" alt="{{ $sponsor->alt ?? 'Partner' }}" class="max-h-24 md:max-h-32 w-auto object-contain opacity-90 hover:opacity-100 transition-all duration-300 hover:scale-105" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
