<!-- Project Highlight Section -->
<!-- Count Projects and if none exist, do not render the section -->
@if (App\Models\Project::count() > 0)
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="display-5 fw-bold text-center mb-5">
                Our Latest Projects
            </h2>

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
@endif
<!-- End of Project Highlight Section -->
