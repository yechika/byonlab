<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @include('header')
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    @include('navbar')

    <section class="py-8 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8">

            <aside class="w-full md:w-1/4">
                <h3 class="text-lg font-semibold mb-4 uppercase">
                    {{ lang('Kategori Produk', 'Product Categories') }}
                </h3>
                <div class="space-y-2">
                    <a href="{{ route('products.page') }}"
                       class="block px-4 py-2 rounded transition {{ !request('category') ? 'bg-primary text-white font-bold' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">
                        {{ lang('Semua Kategori', 'All Categories') }}
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('products.page', ['category' => $cat->id, 'search' => request('search')]) }}"
                           class="block px-4 py-2 rounded transition {{ request('category') == $cat->id ? 'bg-primary text-white font-bold' : 'hover:bg-gray-200 dark:hover:bg-gray-700' }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </aside>

            <main class="w-full md:w-3/4">
                <form method="GET" action="{{ route('products.page') }}" class="flex flex-col md:flex-row gap-4 mb-6">
                    <input type="hidden" name="category" value="{{ request('category') }}">

                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="{{ lang('Cari produk...', 'Search for products...') }}"
                           class="px-4 py-2 rounded border w-full md:w-2/5 dark:bg-gray-800 dark:border-gray-700">

                    <select name="subcategory" id="subcategory-select"
                            class="px-4 py-2 rounded border w-full md:w-2/5 dark:bg-gray-800 dark:border-gray-700"
                            {{ request('category') ? '' : 'disabled' }}>
                        <option value="">{{ lang('Semua Subkategori', 'All Subcategories') }}</option>
                        @foreach($subcategories as $sub)
                            <option value="{{ $sub->id }}"
                                    data-category="{{ $sub->category_id }}"
                                    {{ request('subcategory') == $sub->id ? 'selected' : '' }}>
                                {{ $sub->name }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit"
                            class="bg-primary text-white px-6 py-2 rounded font-semibold hover:bg-orange-600 transition">
                        {{ lang('Cari', 'Search') }}
                    </button>
                </form>

                @include('products')

            </main>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const subcategorySelect = document.getElementById('subcategory-select');
        const allOptions = Array.from(subcategorySelect.querySelectorAll('option[data-category]'));
        const defaultOption = subcategorySelect.querySelector('option[value=""]');
        const categoryInput = document.querySelector('input[name="category"]');

        function updateSubcategories() {
            const activeCategoryId = categoryInput.value;

            // Simpan subkategori yang dipilih sebelumnya
            const currentSelected = subcategorySelect.value;

            // Hapus semua option kecuali default
            subcategorySelect.innerHTML = '';
            subcategorySelect.appendChild(defaultOption.cloneNode(true));

            if (!activeCategoryId) {
                subcategorySelect.disabled = true;
                return;
            }

            // Tambahkan subkategori yang sesuai kategori
            allOptions.forEach(option => {
                if (option.getAttribute('data-category') === activeCategoryId) {
                    subcategorySelect.appendChild(option.cloneNode(true));
                }
            });

            subcategorySelect.disabled = false;

            // Kembalikan pilihan jika masih ada
            subcategorySelect.value = currentSelected;
        }

        // Update saat halaman dimuat
        updateSubcategories();

        // Jika ada elemen kategori (misal dropdown kategori), update subkategori saat berubah
        document.querySelectorAll('a[href*="category="]').forEach(link => {
            link.addEventListener('click', function(e) {
                // Tunggu halaman reload, tidak perlu update di sini
            });
        });
    });
</script>

    @include('footer')
    @include('modals')
    @include('toast')
    @include('icon_wa')
</body>

</html>
