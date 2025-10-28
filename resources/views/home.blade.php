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
        <section id="about" class="py-5">
            <div class="container">
                <h2 class="display-5 fw-bold text-center mb-5">
                    About Us
                </h2>

                <p class="fs-5 text-secondary text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                    Based in Englewood, Colorado, {{ config('company.name') }} helps schools and small to medium-sized businesses build reliable, secure, and future-ready technology environments. From the classroom to the conference room, we deliver managed IT, cybersecurity, and infrastructure solutions that keep your organization connected and protected.
                    <br />
                    We believe technology should empower people, not complicate their day. Our focus is on clear communication, proactive support through 24/7 monitoring, and partnerships built on trust and long-term value.
                    <br />
                    Our services include Zero Trust security frameworks, AI-driven threat detection, and infrastructure built for edge computing and cyber resilience. With local expertise and enterprise-grade tools, {{ config('company.short') }} delivers dependable technology that supports your goals today and adapts to tomorrow’s digital demands.
                </p>
            </div>
        </section>

        <!-- Industry Section -->
        <section id="services" class="py-5 bg-light">
            <div class="container">
                <h2 class="display-5 fw-bold text-center mb-5">
                    Our Industries
                </h2>
                <p class="fs-5 text-secondary text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                    {{ config('company.name') }} supports organizations that depend on reliable, secure, and connected technology every day. From classrooms to offices, we deliver solutions tailored to how your teams work, learn, and grow.
                </p>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Education
                            </h3>
                            <p class="text-muted">
                                Empowering schools with safer, smarter technology.
                                We specialize in IT, cybersecurity, and safety solutions for K-12 schools, charter academies, and private institutions. Our services include secure Wi-Fi, classroom technology, AI video analytics, digital access control, and compliance support for FERPA and CIPA.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Small & Medium-Sized Business
                            </h3>
                            <p class="text-muted">
                                Reliable IT for growing businesses.
                                We provide complete managed IT and cybersecurity services for professional offices, retail, and service-based companies. From daily support to cloud management and data protection, Alerio helps you stay productive and secure.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Nonprofit & Community Organizations
                            </h3>
                            <p class="text-muted">
                                Technology that powers your mission.
                                We deliver cost-effective solutions that help nonprofits modernize IT, improve data protection, and support hybrid teams with cloud-based collaboration tools.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Healthcare & Wellness
                            </h3>
                            <p class="text-muted">
                                Dependable technology for patient-focused care.
                                We provide HIPAA-aligned IT, endpoint protection, and secure communication systems for small clinics and wellness facilities that require both compliance and reliability.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Nonprofit & Community Organizations
                            </h3>
                            <p class="text-muted">
                                Technology for connected worksites.
                                Alerio delivers rugged network infrastructure, site security cameras, and remote monitoring systems that keep projects safe and teams connected from the field to the office.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="py-5 bg-light">
            <div class="container">
                <h2 class="display-5 fw-bold text-center mb-5">
                    Our Services
                </h2>
                <p class="fs-5 text-secondary text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                    {{ config('company.name') }} provides end-to-end IT and security solutions designed for learning environments and growing organizations across Colorado. From network reliability to campus safety, we help you create technology systems that protect, connect, and empower.
                </p>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Managed IT Services
                            </h3>
                            <p class="text-muted">
                                Proactive IT management designed for the modern classroom and office. We monitor your environment 24/7, handle updates, backups, and device performance, and provide responsive support to keep your staff and students connected without disruption.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Cybersecurity & Compliance
                            </h3>
                            <p class="text-muted">
                                Defend your network and data with enterprise-grade protection. Our cybersecurity stack includes endpoint detection and response, Zero Trust frameworks, AI-driven threat analytics, and compliance readiness for FERPA, CIPA, HIPAA, and SOC standards.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                AI-Powered Video Security & Campus Safety
                            </h3>
                            <p class="text-muted">
                                Enhance visibility and response with intelligent camera systems and analytics built for schools.
                                Our AI-based video platforms detect unusual activity, monitor entry points, and provide automated alerts for real-time awareness and faster incident response. Integrations include door access control, motion detection, and campus mapping dashboards.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Smart Access & Identity Control
                            </h3>
                            <p class="text-muted">
                                Secure your facilities with badge, PIN, or mobile access systems that integrate with student and staff directories. We design solutions that provide real-time audit trails, door-state alerts, and centralized control for multi-building campuses.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Network & Infrastructure
                            </h3>
                            <p class="text-muted">
                                From structured cabling to wireless coverage across classrooms, we build resilient, high-performance networks. Our designs support voice, video, and security systems with low latency and high reliability, built for the connected school and modern business.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Cloud & Data Protection
                            </h3>
                            <p class="text-muted">
                                Safeguard your data with hybrid cloud hosting, automated off-site backups, and immutable storage for disaster recovery. Whether you’re running Google Workspace for Education or Microsoft 365, Alerio keeps your information secure and recoverable.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Voice & Communication Systems
                            </h3>
                            <p class="text-muted">
                                Empower clear communication between offices and campuses with VoIP and unified communications solutions. We integrate paging, intercom, and emergency notification systems to improve coordination and response readiness.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <h3 class="fs-4 fw-bold mb-3">
                                Technology Integration & Consulting
                            </h3>
                            <p class="text-muted">
                                Bridge the gap between traditional IT and modern innovation. Alerio helps schools and businesses plan upgrades, modernize legacy systems, and adopt future-ready technologies such as AI analytics, IoT, and cloud-first management.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners Section -->
        <section id="services" class="py-5 bg-light">
            <div class="container">
                <h2 class="display-5 fw-bold text-center mb-5">Our Partners</h2>
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

        <!-- Testimonials Section -->
        <section id="services" class="py-5 bg-light">
            <div class="container">
                <h2 class="display-5 fw-bold text-center mb-5">Our Testimonials</h2>
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

        <!-- Project Highlight Section -->
        <section id="services" class="py-5 bg-light">
            <div class="container">
                <h2 class="display-5 fw-bold text-center mb-5">Our Latest Projects</h2>
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

        <!-- Blog Section -->
        <section id="services" class="py-5 bg-light">
            <div class="container">
                <h2 class="display-5 fw-bold text-center mb-5">Our Blog</h2>
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

        <!-- FAQ Section -->
        <section id="services" class="py-5 bg-light">
            <div class="container">
                <h2 class="display-5 fw-bold text-center mb-5">FAQ</h2>
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
