<header class="sticky top-0 z-50 bg-white dark:bg-gray-800 shadow-md">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('storage/logo_byonlab.png') }}" alt="BYONLAB Logo" class="h-10 w-auto" style="max-height:40px;">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ url('/') }}"
                    class="px-3 py-2 font-medium {{ request()->is('/') ? 'text-primary dark:text-secondary' : 'text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary' }}">
                    {{ lang('Beranda', 'Home') }}
                </a>
                <a href="{{ url('/products') }}"
                    class="px-3 py-2 font-medium {{ request()->is('products') ? 'text-primary dark:text-secondary ' : 'text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary' }}">
                    {{ lang('Produk', 'Products') }}
                </a>
                <a href="{{ route('articles.index') }}"
                    class="px-3 py-2 font-medium {{ request()->is('articles*') || request()->is('article*') ? 'text-primary dark:text-secondary' : 'text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary' }}">
                    {{ lang('Artikel', 'Articles') }}
                </a>
                <a href="{{ url('/about_us') }}"
                    class="px-3 py-2 font-medium {{ request()->is('about_us') ? 'text-primary dark:text-secondary ' : 'text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary' }}">
                    {{ lang('Tentang Kami', 'About Us') }}
                </a>
                <a href="{{ url('/contact_us') }}"
                    class="px-3 py-2 font-medium {{ request()->is('contact_us') ? 'text-primary dark:text-secondary ' : 'text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary' }}">
                    {{ lang('Kontak', 'Contact') }}
                </a>
                <a href="{{ url('/admin') }}"
                    class="ml-4 px-4 py-2 rounded bg-primary text-white font-semibold hover:bg-orange-600 transition">
                    {{ lang('Masuk', 'Login') }}
                </a>
                <div class="flex items-center space-x-4">
                    <!-- Language Switcher -->
                    <label class="switch">
                        <input type="checkbox" class="input" id="lang-switch">
                        <span class="slider"></span>
                        <img src="https://static.vecteezy.com/system/resources/previews/015/272/227/original/indonesia-3d-rounded-flag-with-transparent-background-free-png.png"
                            alt="ID" class="flag-id" style="position:absolute;top:4px;left:4px;z-index:2;width:26px;height:26px;border-radius:50%;">
                        <img src="https://static.vecteezy.com/system/resources/previews/024/901/729/non_2x/united-kingdom-flag-circle-flag-of-uk-in-round-circle-vector.jpg"
                            alt="UK" class="flag-uk" style="position:absolute;top:4px;right:4px;z-index:2;width:26px;height:26px;border-radius:50%;">
                    </label>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="hs-collapse-toggle inline-flex items-center justify-center p-2 rounded-md text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary focus:outline-none"
                    data-hs-collapse="#mobile-menu"
                    aria-controls="mobile-menu"
                    aria-label="Toggle menu">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hs-collapse hidden md:hidden pb-4">
            <div class="flex flex-col space-y-2">
                <a href="{{ url('/') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary px-3 py-2 font-medium">{{ lang('Beranda', 'Home') }}</a>
                <a href="{{ url('/products') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary px-3 py-2 font-medium">{{ lang('Produk', 'Products') }}</a>
                <a href="{{ route('articles.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary px-3 py-2 font-medium">{{ lang('Artikel', 'Articles') }}</a>
                <a href="{{ url('/about_us') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary px-3 py-2 font-medium">{{ lang('Tentang Kami', 'About Us') }}</a>
                <a href="{{ url('/contact_us') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary px-3 py-2 font-medium">{{ lang('Kontak', 'Contact') }}</a>
                <a href="{{ url('/admin') }}" class="bg-primary text-white px-3 py-2 rounded font-medium hover:bg-blue-700 transition">{{ lang('Masuk', 'Login') }}</a>
                <!-- Language Switcher for Mobile -->
                <div class="flex items-center justify-center mt-4">
                    <label class="switch">
                        <input type="checkbox" class="input" id="lang-switch-mobile">
                        <span class="slider"></span>
                        <img src="https://static.vecteezy.com/system/resources/previews/015/272/227/original/indonesia-3d-rounded-flag-with-transparent-background-free-png.png"
                            alt="ID" class="flag-id" style="position:absolute;top:4px;left:4px;z-index:2;width:26px;height:26px;border-radius:50%;">
                        <img src="https://static.vecteezy.com/system/resources/previews/024/901/729/non_2x/united-kingdom-flag-circle-flag-of-uk-in-round-circle-vector.jpg"
                            alt="UK" class="flag-uk" style="position:absolute;top:4px;right:4px;z-index:2;width:26px;height:26px;border-radius:50%;">
                    </label>
                </div>
            </div>
        </div>
    </nav>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.querySelector('.hs-collapse-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        if (toggleBtn && mobileMenu) {
            toggleBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Desktop language switcher
        const langSwitch = document.getElementById('lang-switch');
        if (langSwitch) {
            langSwitch.checked = "{{ session('lang', 'id') }}" === "en";
            langSwitch.addEventListener('change', function() {
                window.location.href = this.checked ?
                    "{{ route('lang.switch', 'en') }}" :
                    "{{ route('lang.switch', 'id') }}";
            });
        }

        // Mobile language switcher
        const langSwitchMobile = document.getElementById('lang-switch-mobile');
        if (langSwitchMobile) {
            langSwitchMobile.checked = "{{ session('lang', 'id') }}" === "en";
            langSwitchMobile.addEventListener('change', function() {
                window.location.href = this.checked ?
                    "{{ route('lang.switch', 'en') }}" :
                    "{{ route('lang.switch', 'id') }}";
            });
        }
    });
</script>

<style>
    .switch {
        font-size: 17px;
        position: relative;
        display: inline-block;
        width: 64px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #e5e7eb;
        transition: .4s;
        border-radius: 30px;
        border: 1px solid #d1d5db;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 30px;
        width: 30px;
        border-radius: 20px;
        left: 2px;
        bottom: 2px;
        z-index: 3;
        background-color: #fff;
        transition: .4s;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    .input:checked+.slider {
        background-color: #e5e7eb;
    }

    .input:checked+.slider:before {
        transform: translateX(30px);
    }

    .flag-id,
    .flag-uk {
        pointer-events: none;
        user-select: none;
        transition: opacity .2s;
    }

    /* Custom primary color overrides */
    .bg-primary {
        background-color: #005288 !important;
    }

    .text-primary {
        color: #005288 !important;
    }

    .hover\:bg-primary:hover {
        background-color: #003a5f !important;
    }

    .hover\:text-primary:hover {
        color: #005288 !important;
    }

    .dark\:bg-secondary {
        background-color: #1f2937 !important;
    }

    .dark\:text-secondary {
        color: #00A0DF !important;
    }

    .dark\:hover\:text-secondary:hover {
        color: #00A0DF !important;
    }
</style>