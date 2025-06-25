<footer class="bg-gray-800 dark:bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Biondi</h3>
                <p class="text-gray-400">
                    {{ lang(
                        'PT. Biondi adalah distributor resmi instrumen Kromatografi dan Spektrometri Massa dari Thermo Fisher Scientific.',
                        'PT. Biondi is the official distributor of Chromatography and Mass Spectrometry instruments from Thermo Fisher Scientific.'
                    ) }}
                </p>
            </div>
            <div>
                <h4 class="font-semibold mb-4">{{ lang('Produk', 'Products') }}</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white" onclick="event.preventDefault(); scrollToSection('products')">{{ lang('Kromatografi', 'Chromatography') }}</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white" onclick="event.preventDefault(); scrollToSection('products')">{{ lang('Spektrometri Massa', 'Mass Spectrometry') }}</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white" onclick="event.preventDefault(); scrollToSection('products')">{{ lang('Reagen Kimia', 'Chemical Reagents') }}</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white" onclick="event.preventDefault(); scrollToSection('products')">{{ lang('Aksesoris', 'Accessories') }}</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">{{ lang('Perusahaan', 'Company') }}</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white" onclick="event.preventDefault(); scrollToSection('about')">{{ lang('Tentang Kami', 'About Us') }}</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white" onclick="event.preventDefault(); scrollToSection('contact')">{{ lang('Kontak', 'Contact') }}</a></li>
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
            <p>&copy; 2025 Biondi. {{ lang('Seluruh hak cipta dilindungi.', 'All rights reserved.') }}</p>
        </div>
    </div>
</footer>
