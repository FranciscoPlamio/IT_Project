<x-layout>
    <!-- Body -->
    <section class="banner">
        <div class="carousel-container">
            <div class="carousel-wrapper">
                <div class="carousel-slides">
                    <div class="carousel-slide active">
                        <img src="{{ asset('images/ntc-home.png') }}" alt="Campaign Banner 1" />
                    </div>
                    <div class="carousel-slide">
                        <img src="{{ asset('images/banner-image.png') }}" alt="Campaign Banner 2" />
                    </div>
                    <div class="carousel-slide">
                        <img src="{{ asset('images/banner_final-new.png') }}" alt="Campaign Banner 3" />
                    </div>
                    <div class="carousel-slide">
                        <img src="{{ asset('images/NTC_BANNER-new.png') }}" alt="Campaign Banner 4" />
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button class="carousel-arrow carousel-prev" onclick="changeSlide(-1)">
                    <span>&#8249;</span>
                </button>
                <button class="carousel-arrow carousel-next" onclick="changeSlide(1)">
                    <span>&#8250;</span>
                </button>

                <!-- Dots Indicator -->
                <div class="carousel-dots">
                    <span class="dot active" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                </div>
            </div>
        </div>
    </section>

    <section class="quick-links">
        <a href="https://ntc.gov.ph/examination-schedule-2025/" target="_blank" rel="noopener"
            style="text-decoration:none;color:inherit;">
            <div class="card">
                <img src="{{ asset('images/icon-schedule.png') }}" alt="Schedule Icon" />
                <p>Schedules</p>
            </div>
        </a>
        <a id="applyLink" href="{{ route('display.forms') }}" class="card"
            style="text-decoration:none;color:inherit;">
            <img src="{{ asset('images/icon-forms.png') }}" alt="Forms Icon" />
            <p>Apply</p>
        </a>
        <a href="{{ route('requirements') }}" style="text-decoration:none;color:inherit;">
            <div class="card">
                <img src="{{ asset('images/icon-requirements.png') }}" alt="Requirements Icon" />
                <p>Requirements</p>
            </div>
        </a>
    </section>

    <script>
        let currentSlideIndex = 1;
        const totalSlides = 4;

        // Initialize carousel
        document.addEventListener('DOMContentLoaded', function() {
            showSlide(currentSlideIndex);
        });

        function showSlide(n) {
            const slides = document.querySelector('.carousel-slides');
            const dots = document.querySelectorAll('.dot');

            if (n > totalSlides) currentSlideIndex = 1;
            if (n < 1) currentSlideIndex = totalSlides;

            // Update slide position
            slides.className = `carousel-slides slide-${currentSlideIndex}`;

            // Update dots
            dots.forEach(dot => dot.classList.remove('active'));
            dots[currentSlideIndex - 1].classList.add('active');
        }

        function changeSlide(direction) {
            currentSlideIndex += direction;
            showSlide(currentSlideIndex);
        }

        function currentSlide(n) {
            currentSlideIndex = n;
            showSlide(currentSlideIndex);
        }
    </script>

</x-layout>
