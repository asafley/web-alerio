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
                            {{ config('app.company') }}
                        </span>
                    </h1>

                    <!-- Headline -->
                    <p class="lead fs-3 text-secondary mb-4 animate-fade-in-up" style="animation-delay: 0.3s; max-width: 800px; margin-left: auto; margin-right: auto;">
                        Smarter Technology. Safer Schools. Stronger Businesses.
                    </p>

                    <!-- Subheadline -->
                    <p class="fs-5 text-muted mb-5 animate-fade-in" style="animation-delay: 0.6s; max-width: 600px; margin-left: auto; margin-right: auto;">
                        {{ config('app.company') }} delivers reliable IT, cybersecurity, and infrastructure solutions built to protect classrooms and empower small to medium-sized businesses across Colorado.
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
        <section id="about" class="py-5">
            <div class="container">
                <h2 class="display-5 fw-bold text-center mb-5">
                    About Us
                </h2>

                <p class="fs-5 text-secondary text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                    Innovation meets expertise at {{ config('app.company') }}. We're dedicated to delivering cutting-edge solutions that empower businesses to thrive in the digital age.
                </p>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="py-5 bg-light">
            <div class="container">
                <h2 class="display-5 fw-bold text-center mb-5">Our Services</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">Web Development</h3>
                            <p class="text-muted">Building responsive, scalable web applications with modern technologies.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">Digital Strategy</h3>
                            <p class="text-muted">Creating data-driven strategies to accelerate your digital transformation.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">Consulting</h3>
                            <p class="text-muted">Expert guidance to navigate complex technical challenges and opportunities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-5">
            <div class="container">
                <div class="text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                    <h2 class="display-5 fw-bold mb-4">Let's Build Something Amazing</h2>
                    <p class="fs-5 text-muted mb-5">Ready to transform your vision into reality?</p>
                    <button class="btn btn-lg btn-primary rounded-pill px-5 py-3 fw-semibold" style="background: linear-gradient(135deg, #4f46e5 0%, #a855f7 100%); border: none; box-shadow: 0 10px 30px rgba(79, 70, 229, 0.3);">
                        Contact Us Today
                    </button>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-4 bg-light border-top">
            <div class="container text-center text-muted">
                <p>&copy; 2025 {{ config('app.company') }}. All rights reserved.</p>
            </div>
        </footer>
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
