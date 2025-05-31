<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @include('header')
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    @include('navbar')

    <section class="py-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('products.page') }}" class="flex flex-col md:flex-row gap-4 mb-2">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="{{ lang('Cari produk...', 'Search for products...') }}"
                    class="px-4 py-2 rounded border w-full md:w-1/3 dark:bg-gray-800 dark:border-gray-700">

                <select name="category" id="category-select"
                    class="px-4 py-2 rounded border w-full md:w-1/4 dark:bg-gray-800 dark:border-gray-700">
                    <option value="">{{ lang('Semua Kategori', 'All Categories') }}</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                    @endforeach
                </select>

                <select name="subcategory" id="subcategory-select"
                    class="px-4 py-2 rounded border w-full md:w-1/4 dark:bg-gray-800 dark:border-gray-700"
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
        </div>
    </section>

    @include('products')

    @include('footer')
    @include('modals')
    @include('toast')
    @include('icon_wa')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.getElementById('category-select');
            const subcategorySelect = document.getElementById('subcategory-select');
            const originalSubcategories = Array.from(subcategorySelect.querySelectorAll('option[data-category]'));

            function updateSubcategories() {
                const selectedCategoryId = categorySelect.value;

                // Reset subcategories
                subcategorySelect.innerHTML = '<option value="">{{ lang("Semua Subkategori", "All Subcategories") }}</option>';
                subcategorySelect.disabled = !selectedCategoryId;

                if (selectedCategoryId) {
                    originalSubcategories.forEach(option => {
                        if (option.getAttribute('data-category') === selectedCategoryId) {
                            const newOption = option.cloneNode(true);
                            subcategorySelect.appendChild(newOption);
                        }
                    });
                }

                // Set selected value if exists
                const preservedSubcategory = "{{ request('subcategory') }}";
                if (preservedSubcategory && selectedCategoryId === "{{ request('category') }}") {
                    subcategorySelect.value = preservedSubcategory;
                }
            }

            categorySelect.addEventListener('change', updateSubcategories);
            updateSubcategories(); // Initial call
        });
    </script>
</body>

</html>
