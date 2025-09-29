<footer class="bg-gray-800 dark:bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">BYONLAB</h3>
                <p class="text-gray-400">
                    {{ lang(
                        'Byonlab menyediakan beragam peralatan laboratorium dalam satu platform, didukung oleh e-commerce.',
                        'Byonlab provide a wide range of laboratory equipment in one platform, powered by e-commerce.'
                    ) }}
                </p>
            </div>
            <div>
                <h4 class="font-semibold mb-4">{{ lang('Navigasi', 'Navigation') }}</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/products') }}" class="text-gray-400 hover:text-white">{{ lang('Produk', 'Products') }}</a></li>
                    <li><a href="{{ url('/about_us') }}" class="text-gray-400 hover:text-white">{{ lang('Tentang Kami', 'About Us') }}</a></li>
                    <li><a href="{{ route('articles.index') }}" class="text-gray-400 hover:text-white">{{ lang('Artikel', 'Articles') }}</a></li>
                    <li><a href="{{ url('/contact_us') }}" class="text-gray-400 hover:text-white">{{ lang('Kontak', 'Contact') }}</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">{{ lang('Informasi', 'Information') }}</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white" onclick="event.preventDefault(); showPrivacyModal()">{{ lang('Kebijakan Privasi', 'Privacy Policy') }}</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white" onclick="event.preventDefault(); showTermsModal()">{{ lang('Syarat & Ketentuan', 'Terms & Conditions') }}</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">{{ lang('Ikuti Kami', 'Follow Us') }}</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white text-xl" onclick="event.preventDefault()"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white text-xl" onclick="event.preventDefault()"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white text-xl" onclick="event.preventDefault()"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white text-xl" onclick="event.preventDefault()"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="mt-6">
                    <h4 class="font-semibold mb-2">Newsletter</h4>
                    <div class="flex">
                        <input type="email" placeholder="{{ lang('Email Anda', 'Your Email') }}" class="px-4 py-2 rounded-l-lg bg-gray-700 text-white focus:outline-none w-full">
                        <button class="bg-primary dark:bg-secondary hover:bg-blue-700 dark:hover:bg-blue-600 px-4 py-2 rounded-r-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
            <p>&copy; 2025 Byonlab. {{ lang('Seluruh hak cipta dilindungi.', 'All rights reserved.') }}</p>
        </div>
    </div>
</footer>
