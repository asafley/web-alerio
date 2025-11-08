<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }

        .animate-fade-in {
            animation: fadeIn 1.5s ease-out forwards;
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }
    </style>
</head>
<body class="bg-light">
    <div id="app">
        <!-- Hero Section -->
        <section class="hero-section min-vh-100 d-flex align-items-center justify-content-center position-relative overflow-hidden" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
            <!-- Three.js Background Container -->
            <div id="three-container" class="position-absolute top-0 start-0 w-100 h-100" style="z-index: 0;"></div>

            <!-- Content -->
            <div class="container position-relative" style="z-index: 1;">
                <div class="text-center">
                    <!-- Company Name -->
                    <h1 class="display-1 fw-bold mb-4 animate-fade-in-up" style="letter-spacing: -0.02em;">
                        <span class="gradient-text">
                            {{ config('company.name') }}
                        </span>
                    </h1>

                    <!-- Headline -->
                    <p class="lead fs-3 text-secondary mb-4 animate-fade-in-up" style="animation-delay: 0.3s; max-width: 800px; margin-left: auto; margin-right: auto;">
                        Smarter Technology. Safer Schools. Stronger Businesses.
                    </p>

                    <!-- Subheadline -->
                    <p class="fs-5 text-muted mb-5 animate-fade-in" style="animation-delay: 0.6s; max-width: 600px; margin-left: auto; margin-right: auto;">
                        {{ config('company.name') }} delivers reliable IT, cybersecurity, and infrastructure solutions built to protect classrooms and empower small to medium-sized businesses across Colorado.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="d-flex gap-3 justify-content-center flex-wrap animate-fade-in" style="animation-delay: 0.9s;">
                        <button class="btn btn-lg btn-outline-dark rounded-pill px-5 py-3 fw-semibold">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        @include('partials.about')

        <!-- Industry Section -->
        @include('partials.industries')

        <!-- Services Section -->
        @include('partials.services')

        <!-- Partners Section -->
        @include('partials.partners')

        <!-- Testimonials Section -->
        @include('partials.testimonials')

        <!-- Project Highlight Section -->
        @include('partials.projects')

        <!-- Blog Section -->
        @include('partials.blog')

        <!-- FAQ Section -->
        @include('partials.faq')

        <!-- Contact Section -->
        @include('partials.cta')

        @include('partials.foot')
    </div>

    <script>
        // Initialize Three.js background when DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            const threeBackground = new window.ThreeBackground('three-container');
        });

        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
