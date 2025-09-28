<section id="about" class="py-16 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:flex items-center gap-12">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <img src="{{ asset('storage/high-angle-blue-chemical-substances-arrangement.jpg') }}"
                    alt="About PT Biondi Loka Niaga" class="rounded-lg shadow-xl w-full">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ lang('Tentang Byonlab', 'About Byonlab') }}
                </h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    {{ lang(
    'Byonlab adalah pilihan cerdas untuk komunitas ilmiah. Kami adalah penyedia terpercaya peralatan laboratorium untuk sekolah, universitas, rumah sakit, organisasi, dan masyarakat umum. Dengan kualitas terbaik, inovasi tanpa henti, dan komitmen terhadap kepuasan pelanggan, Byonlab adalah mitra Anda dalam mengeksplorasi pengetahuan dan mendorong batas-batas sains lebih jauh!',
    'Byonlab is the smart choice for the scientific community. We\'re a trusted provider of laboratory equipment for schools, universities, hospitals, organizations, and the general public. With top-notch quality, nonstop innovation, and a commitment to customer satisfaction, Byonlab is your partner in exploring knowledge and pushing the boundaries of science even further!'
) }}
                </p>
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mt-6 mb-2">
                    {{ lang('Visi', 'Vision') }}
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    {{ lang(
    'Memimpin industri pasokan laboratorium nasional dengan komitmen terhadap kualitas, inovasi, dan kepuasan pelanggan, merangkul komunitas ilmiah untuk mendorong batas-batas pengetahuan.',
    'To lead the nation\'s laboratory supply industry with a commitment to quality, innovation, and customer satisfaction, embracing scientific communities to push the boundaries of knowledge.'
) }}
                </p>
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mt-6 mb-2">
                    {{ lang('Misi', 'Mission') }}
                </h3>
                <ul class="list-disc pl-5 text-gray-600 dark:text-gray-300 mb-6">
                    <li>
                        {{ lang(
    'Menghadirkan produk berkualitas tinggi yang dirancang dengan presisi dan solusi yang memungkinkan kemajuan ilmiah.',
    'Delivering high-quality, precision-engineered products and solutions that enable scientific advancement.'
) }}
                    </li>
                    <li>
                        {{ lang(
    'Memberikan dukungan yang dipersonalisasi untuk membantu pelanggan kami mencapai tujuan penelitian mereka.',
    'Providing personalized support to help our customers achieve their research objectives.'
) }}
                    </li>
                </ul>

                <!-- Contact Details Section -->
                <div class="mt-8 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                        {{ lang('Informasi Kontak', 'Contact Information') }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Address -->
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-primary dark:text-secondary mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-900 dark:text-white">{{ lang('Alamat', 'Address') }}</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    Jalan Meruya Utara Raya No. 36A Lt.3<br>
                                    Kembangan, Jakarta Barat, DKI Jakarta<br>
                                    Indonesia, 11620
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-envelope text-primary dark:text-secondary mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-900 dark:text-white">{{ lang('Email', 'E-Mail') }}</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    <a href="mailto:business@byonlab.id" class="hover:text-primary dark:hover:text-secondary transition">
                                        business@byonlab.id
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- Website -->
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-globe text-primary dark:text-secondary mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-900 dark:text-white">{{ lang('Website', 'Website') }}</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    <a href="https://www.byonlab.id" target="_blank" class="hover:text-primary dark:hover:text-secondary transition">
                                        www.byonlab.id
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- Sales & After Sales -->
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-phone text-primary dark:text-secondary mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-900 dark:text-white">{{ lang('Sales & After Sales', 'Sales & After Sales') }}</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">
                                    <a href="tel:+628123488305" class="hover:text-primary dark:hover:text-secondary transition block">
                                        +62 812 - 3488 - 305
                                    </a>
                                    <a href="tel:+622138776605" class="hover:text-primary dark:hover:text-secondary transition block">
                                        +62 21 - 3877 - 6605
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>