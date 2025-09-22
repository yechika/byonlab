<section id="home" class="hero-bg text-white py-1 md:py-1 relative overflow-hidden">
    <div>
        <div class="carousel">
            <ul class="slides">
                <input type="radio" name="radio-buttons" id="img-1" checked />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="{{ asset('storage/high-angle-blue-chemical-substances-arrangement.jpg') }}" alt="Hero 1">
                        <div class="absolute left-0 top-0 h-full flex flex-col justify-center z-10 ml-8 mr-8 md:ml-80">
                            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-stroke">
                                {{ lang('Distributor Resmi Thermo Fisher Scientific', 'Official Distributor of Thermo Fisher Scientific') }}
                            </h1>
                            <p class="text-xl mb-8 text-stroke">
                                {{ lang('Dapatkan keyakinan dalam pengukuran Anda dengan solusi instrumen analitik yang paling andal', 'Gain confidence in your measurements with the most reliable analytical instrument solutions') }}
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 ml-0 md:ml-2">
                                <a href="{{ url('/products') }}" class="bg-accent hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                                    {{ lang('Lihat Produk', 'View Products') }} <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                                <a href="{{ url('/contact_us') }}" class="bg-transparent hover:bg-white/10 text-white font-bold py-3 px-6 border-2 border-white rounded-lg transition duration-300 flex items-center justify-center">
                                    {{ lang('Hubungi Kami', 'Contact Us') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-controls">
                        <label for="img-3" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-2" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>
                <input type="radio" name="radio-buttons" id="img-2" />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="{{ asset('storage/researcher-working-laboratory.jpg') }}" alt="Hero 2">
                        <div class="absolute left-0 top-0 h-full flex flex-col justify-center z-10 ml-8 mr-8 md:ml-80">
                            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-stroke">
                                {{ lang('Solusi Laboratorium Modern', 'Modern Laboratory Solutions') }}
                            </h1>
                            <p class="text-xl mb-8 text-stroke">
                                {{ lang('Menyediakan instrumen dan reagen terbaik untuk kebutuhan riset dan industri Anda.', 'Providing the best instruments and reagents for your research and industry needs.') }}
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 ml-0 md:ml-2">
                                <a href="{{ url('/products') }}" class="bg-accent hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                                    {{ lang('Jelajahi Produk', 'Explore Products') }} <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                                <a href="{{ url('/contact_us') }}" class="bg-transparent hover:bg-white/10 text-white font-bold py-3 px-6 border-2 border-white rounded-lg transition duration-300 flex items-center justify-center">
                                    {{ lang('Konsultasi Gratis', 'Free Consultation') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-controls">
                        <label for="img-1" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-3" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>
                <input type="radio" name="radio-buttons" id="img-3" />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="{{ asset('storage/scientist-working-lab-side-view.jpg') }}" alt="Hero 3">
                        <div class="absolute left-0 top-0 h-full flex flex-col justify-center z-10 ml-8 mr-8 md:ml-80">
                            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-stroke">
                                {{ lang('Slide Ketiga', 'Third Slide') }}
                            </h1>
                            <p class="text-xl mb-8 text-stroke">
                                {{ lang('Deskripsi slide ketiga.', 'Third slide description.') }}
                            </p>
                        </div>
                    </div>
                    <div class="carousel-controls">
                        <label for="img-2" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-1" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>
                <div class="carousel-dots">
                    <label for="img-1" class="carousel-dot" id="img-dot-1"></label>
                    <label for="img-2" class="carousel-dot" id="img-dot-2"></label>
                    <label for="img-3" class="carousel-dot" id="img-dot-3"></label>
                </div>
            </ul>
        </div>
    </div>
    <style>
        .carousel {
            margin-left: 0;
            margin-right: 0;
            position: relative;
        }
        ul.slides {
            display: block;
            position: relative;
            height: 600px;
            margin: 0;
            padding: 0;
            overflow: hidden;
            list-style: none;
        }
        .slides * {
            user-select: none;
            -ms-user-select: none;
            -moz-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }
        ul.slides input {
            display: none;
        }
        .slide-container {
            display: block;
        }
        .slide-image {
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            opacity: 0;
            transition: all .7s ease-in-out;
        }
        .slide-image img {
            width: auto;
            min-width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .carousel-controls {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            font-size: 100px;
            line-height: 600px;
            color: #fff;
        }
        .carousel-controls label {
            display: none;
            position: absolute;
            padding: 0 20px;
            opacity: 0;
            transition: opacity .2s;
            cursor: pointer;
        }
        .slide-image:hover + .carousel-controls label {
            opacity: 0.5;
        }
        .carousel-controls label:hover {
            opacity: 1;
        }
        .carousel-controls .prev-slide {
            width: 49%;
            text-align: left;
            left: 0;
        }
        .carousel-controls .next-slide {
            width: 49%;
            text-align: right;
            right: 0;
        }
        .carousel-dots {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 20px;
            z-index: 999;
            text-align: center;
        }
        .carousel-dots .carousel-dot {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background-color: #fff;
            opacity: 0.5;
            margin: 10px;
        }
        input:checked + .slide-container .slide-image {
            opacity: 1;
            transform: scale(1);
            transition: opacity 1s ease-in-out;
        }
        input:checked + .slide-container .carousel-controls label {
            display: block;
        }
        input#img-1:checked ~ .carousel-dots label#img-dot-1,
        input#img-2:checked ~ .carousel-dots label#img-dot-2,
        input#img-3:checked ~ .carousel-dots label#img-dot-3 {
            opacity: 1;
        }
        input:checked + .slide-container .nav label {
            display: block;
        }
        .text-stroke {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }
    </style>
</section>