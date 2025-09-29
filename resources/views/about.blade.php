<section id="about" class="py-16 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex items-center gap-12">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <img src="{{ asset('storage/high-angle-blue-chemical-substances-arrangement.jpg') }}"
                    alt="About PT Biondi Loka Niaga" class="rounded-lg shadow-xl w-full">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ lang('Tentang PT Biondi Loka Niaga', 'About PT Biondi Loka Niaga') }}
                </h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    {{ lang(
    'Kami adalah PT. Biondi Loka Niaga ,perusahaan
yang bergerak di bidang Industrial E-Commers,
yang menyediakan Peralatan Pelatihan,
Perkakas, Peralatan Rumah Tangga, Peralatan
Olahraga, Peralatan Elektronik, serta Alat dan
Mesin Industri',
    'We are PT. Biondi Loka Niaga, a company engaged
in the Industrial E-Commerce sector, which
provides Training Equipment, Tools, Household
Equipment, Sports Equipment, Electronic
Equipment, and Industrial Tools and Machines.
'
) }}
                </p>
                <!-- Visi -->
                <div class="mb-8">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-eye text-[#FF4F00] mr-3"></i>
                        {{ lang('VISI', 'VISION') }}
                    </h3>
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg border-l-4 border-[#FF4F00]">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ lang(
                                'Menjadi perusahaan industri terkemuka di Indonesia yang menyediakan solusi inovatif dan berkualitas tinggi untuk memenuhi kebutuhan pelanggan, serta memberikan kontribusi pada pertumbuhan ekonomi dan pembangunan berkelanjutan.',
                                'To become a leading industrial company in Indonesia that provides innovative and high-quality solutions to meet customer needs, as well as contributing to economic growth and sustainable development.'
                            ) }}
                        </p>
                    </div>
                </div>

                <!-- Misi -->
                <div class="mb-6">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-bullseye text-[#FF4F00] mr-3"></i>
                        {{ lang('MISI', 'MISSION') }}
                    </h3>
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg border-l-4 border-[#FF4F00]">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            {{ lang(
                                'Menghasilkan produk berkualitas tinggi, meningkatkan efisiensi dan inovasi produk, memberikan kemudahan dan kenyamanan bagi pelanggan.',
                                'Produce high quality products, Increase product efficiency and innovation, Provide convenience and comfort for customers.'
                            ) }}
                        </p>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">
                {{ lang('Informasi Kontak', 'Contact Information') }}
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Address -->
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg text-center">
                    <div class="w-16 h-16 bg-[#FF4F00] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                        {{ lang('Alamat', 'Address') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Jl. Meruya Utara Raya No. 36A<br>
                        Kembangan - Jakarta Barat<br>
                        11620
                    </p>
                </div>

                <!-- Email -->
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg text-center">
                    <div class="w-16 h-16 bg-[#FF4F00] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                        {{ lang('Email', 'Email') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        <a href="mailto:business@biondi.id" class="hover:text-[#FF4F00] transition-colors">
                            business@biondi.id
                        </a>
                    </p>
                </div>

                <!-- Phone -->
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg text-center">
                    <div class="w-16 h-16 bg-[#FF4F00] rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                        {{ lang('Telepon', 'Phone') }}
                    </h3>
                    <div class="text-gray-600 dark:text-gray-300 space-y-2">
                        <p>
                            <a href="tel:+622138776589" class="hover:text-[#FF4F00] transition-colors">
                                +62-21-38776589
                            </a>
                            <br>
                            <span class="text-sm text-gray-500">(Head Office)</span>
                        </p>
                        <p>
                            <a href="tel:+6281266866862" class="hover:text-[#FF4F00] transition-colors">
                                +62 812 6686 6862
                            </a>
                            <br>
                            <span class="text-sm text-gray-500">(Sales & After Sales)</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>