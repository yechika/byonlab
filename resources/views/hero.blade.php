@php use Illuminate\Support\Facades\Storage; @endphp
@if(isset($heroes) && $heroes->count() > 0)
<section id="home" class="hero-bg text-white py-1 md:py-1 relative overflow-hidden">
    <div>
        <div class="carousel">
            <ul class="slides">
                @foreach($heroes as $index => $hero)
                <input type="radio" name="radio-buttons" id="img-{{ $index + 1 }}" {{ $index == 0 ? 'checked' : '' }} />
                <li class="slide-container">
                    <div class="slide-image">
                        <img src="{{ Storage::url($hero->image_url) }}" alt="{{ $hero->title ?? 'Hero Image ' . ($index + 1) }}">
                        <!-- Hero Overlay Image -->
                        <div class="hero-overlay-image">
                            <img src="{{ asset('storage/1000067783-removebg-preview.png') }}" alt="Hero Overlay" class="overlay-img">
                        </div>
                    </div>
                    <div class="carousel-controls">
                        @php
                            $prevIndex = $index == 0 ? $heroes->count() : $index;
                            $nextIndex = $index == $heroes->count() - 1 ? 1 : $index + 2;
                        @endphp
                        <label for="img-{{ $prevIndex }}" class="prev-slide">
                            <span>&lsaquo;</span>
                        </label>
                        <label for="img-{{ $nextIndex }}" class="next-slide">
                            <span>&rsaquo;</span>
                        </label>
                    </div>
                </li>
                @endforeach
                
                <div class="carousel-dots">
                    @foreach($heroes as $index => $hero)
                    <label for="img-{{ $index + 1 }}" class="carousel-dot" id="img-dot-{{ $index + 1 }}"></label>
                    @endforeach
                </div>
            </ul>
        </div>
    </div>
</section>
@else
<section id="home" class="hero-bg text-white py-1 md:py-1 relative overflow-hidden">
    <div class="h-96 md:h-[600px] relative flex items-center justify-center">
        <!-- Hero Overlay Image untuk fallback -->
        <div class="hero-overlay-image">
            <img src="{{ asset('storage/1000067783-removebg-preview.png') }}" alt="Hero Overlay" class="overlay-img">
        </div>
        <div class="text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Hero Slider</h2>
            <p class="text-lg opacity-75">Tambahkan gambar hero melalui panel admin</p>
        </div>
    </div>
</section>
@endif
    <style>
        .carousel {
            margin-left: 0;
            margin-right: 0;
            position: relative;
            background: #f8f9fa;
        }
        ul.slides {
            display: block;
            position: relative;
            height: 70vh;
            min-height: 500px;
            max-height: 700px;
            margin: 0;
            padding: 0;
            overflow: hidden;
            list-style: none;
            border-radius: 0;
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
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            transform: scale(1.05);
        }
        .slide-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.8s ease-out;
        }
        .carousel-controls {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
            right: 0;
            z-index: 999;
            color: #fff;
            pointer-events: none;
        }
        .carousel-controls label {
            position: absolute;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            opacity: 0;
            transition: all 0.3s ease;
            cursor: pointer;
            pointer-events: all;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
        }
        .carousel-controls label:hover {
            opacity: 1 !important;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }
        .carousel-controls .prev-slide {
            left: 30px;
        }
        .carousel-controls .next-slide {
            right: 30px;
        }
        .carousel-dots {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 30px;
            z-index: 999;
            text-align: center;
        }
        .carousel-dots .carousel-dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.4);
            opacity: 0.6;
            margin: 0 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .carousel-dots .carousel-dot:hover {
            opacity: 0.8;
            transform: scale(1.2);
        }
        input:checked + .slide-container .slide-image {
            opacity: 1;
            transform: scale(1);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        input:checked + .slide-container .slide-image img {
            transform: scale(1.02);
        }
        input:checked + .slide-container .carousel-controls label {
            display: flex !important;
            opacity: 0.7;
        }
        /* Responsive design */
        @media (max-width: 768px) {
            ul.slides {
                height: 50vh;
                min-height: 400px;
            }
            .carousel-controls label {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
            .carousel-controls .prev-slide {
                left: 15px;
            }
            .carousel-controls .next-slide {
                right: 15px;
            }
            .carousel-dots .carousel-dot {
                width: 10px;
                height: 10px;
                margin: 0 6px;
            }
        }
        /* Auto-play animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(1.05); }
            to { opacity: 1; transform: scale(1); }
        }
        .slide-image.active {
            animation: fadeIn 0.8s ease-out;
        }
        
        /* Hero Overlay Image Styles */
        .hero-overlay-image {
            position: absolute;
            top: 50%;
            left: 12%;
            transform: translateY(-50%);
            z-index: 997;
            pointer-events: none;
        }
        
        .overlay-img {
            width: 350px;
            height: auto;
            max-width: 400px;
            filter: drop-shadow(2px 0 0 white) 
                    drop-shadow(-2px 0 0 white) 
                    drop-shadow(0 2px 0 white) 
                    drop-shadow(0 -2px 0 white)
                    drop-shadow(1px 1px 0 white) 
                    drop-shadow(-1px -1px 0 white) 
                    drop-shadow(1px -1px 0 white) 
                    drop-shadow(-1px 1px 0 white);
            transition: all 0.5s ease;
            opacity: 0.95;
        }
        
        /* Hover effect for overlay image */
        .hero-overlay-image:hover .overlay-img {
            transform: scale(1.03);
            opacity: 1;
        }
        
        /* Responsive adjustments for overlay image */
        @media (max-width: 1024px) {
            .hero-overlay-image {
                left: 10%;
            }
            
            .overlay-img {
                width: 280px;
                max-width: 320px;
            }
        }
        
        @media (max-width: 768px) {
            .hero-overlay-image {
                left: 8%;
            }
            
            .overlay-img {
                width: 200px;
                max-width: 240px;
            }
        }
        
        @media (max-width: 480px) {
            .hero-overlay-image {
                left: 5%;
            }
            
            .overlay-img {
                width: 140px;
                max-width: 160px;
            }
        }
    </style>
    
    @if(isset($heroes) && $heroes->count() > 0)
        <style>
            @php
                foreach($heroes as $index => $hero) {
                    $num = $index + 1;
                    echo "input#img-{$num}:checked ~ .carousel-dots label#img-dot-{$num} { opacity: 1 !important; background: rgba(255, 255, 255, 0.9) !important; transform: scale(1.2) !important; }";
                }
            @endphp
        </style>
        
        <!-- Auto-play and interaction script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const heroesCount = {{ $heroes->count() }};
                let currentSlide = 1;
                let autoPlayInterval;
                const autoPlayDelay = 5000; // 5 seconds
                
                function nextSlide() {
                    currentSlide = currentSlide >= heroesCount ? 1 : currentSlide + 1;
                    document.getElementById('img-' + currentSlide).checked = true;
                }
                
                function startAutoPlay() {
                    autoPlayInterval = setInterval(nextSlide, autoPlayDelay);
                }
                
                function stopAutoPlay() {
                    clearInterval(autoPlayInterval);
                }
                
                // Start auto-play
                startAutoPlay();
                
                // Stop auto-play on user interaction
                const radioButtons = document.querySelectorAll('input[name="radio-buttons"]');
                const controlLabels = document.querySelectorAll('.carousel-controls label, .carousel-dots label');
                
                radioButtons.forEach(function(radio) {
                    radio.addEventListener('change', function() {
                        if (this.checked) {
                            currentSlide = parseInt(this.id.replace('img-', ''));
                            stopAutoPlay();
                            // Restart auto-play after 10 seconds of inactivity
                            setTimeout(startAutoPlay, 10000);
                        }
                    });
                });
                
                controlLabels.forEach(function(label) {
                    label.addEventListener('click', function() {
                        stopAutoPlay();
                        setTimeout(startAutoPlay, 10000);
                    });
                });
                
                // Pause on hover
                const carousel = document.querySelector('.carousel');
                if (carousel) {
                    carousel.addEventListener('mouseenter', stopAutoPlay);
                    carousel.addEventListener('mouseleave', startAutoPlay);
                }
            });
        </script>
    @endif