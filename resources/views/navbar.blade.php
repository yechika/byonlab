<header class="sticky top-0 z-50 bg-white dark:bg-gray-800 shadow-md">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center">
                    <span class="text-primary dark:text-secondary text-2xl font-bold">BYONLAB</span>
                </a>
            </div>
            
            <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ url('/') }}"
                   class="px-3 py-2 font-medium {{ request()->is('/') ? 'text-primary dark:text-secondary' : 'text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary' }}">
                   Home
                </a>
                <a href="{{ url('/products') }}"
                   class="px-3 py-2 font-medium {{ request()->is('products') ? 'text-primary dark:text-secondary ' : 'text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary' }}">
                   Products
                </a>
                <a href="{{ url('/about_us') }}"
                   class="px-3 py-2 font-medium {{ request()->is('about_us') ? 'text-primary dark:text-secondary ' : 'text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary' }}">
                   About Us
                </a>
                <a href="{{ url('/contact_us') }}"
                   class="px-3 py-2 font-medium {{ request()->is('contact_us') ? 'text-primary dark:text-secondary ' : 'text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary' }}">
                   Contact
                </a>
                <a href="{{ url('/admin') }}"
                   class="ml-4 px-4 py-2 rounded bg-primary text-white font-semibold hover:bg-orange-600 transition">
                   Login
                </a>
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
                <a href="{{ url('/') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary px-3 py-2 font-medium">Home</a>
                <a href="{{ url('/products') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary px-3 py-2 font-medium">Products</a>
                <a href="{{ url('/about_us') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary px-3 py-2 font-medium">About Us</a>
                <a href="{{ url('/contact_us') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary px-3 py-2 font-medium">Contact</a>
                <a href="{{ url('/admin') }}" class="bg-primary text-white px-3 py-2 rounded font-medium hover:bg-orange-600 transition">Login</a>
            </div>
        </div>
    </nav>
</header>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.querySelector('.hs-collapse-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    if (toggleBtn && mobileMenu) {
        toggleBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
</script>