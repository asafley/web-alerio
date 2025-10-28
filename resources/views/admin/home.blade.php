<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="bg-light">
<div id="app">
    <!-- Tiles to access various management pages -->
    <div class="container my-5">
        <div class="row g-4">
            <!-- Tile for Dashboard -->
            <div class="col-md-4">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                Dashboard
                            </h5>
                            <p class="card-text text-muted">
                                View application statistics
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for User management -->
            <div class="col-md-4">
                <a href="{{ route('admin.users') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                User Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage application users
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for Roles and Permissions management -->
            <div class="col-md-4">
                <a href="{{ route('admin.rp') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                RP Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage user roles and permissions
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for Settings management -->
            <div class="col-md-4">
                <a href="{{ route('admin.settings') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                Settings
                            </h5>
                            <p class="card-text text-muted">
                                Configure application settings
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for Contact Form Inquiries management -->
            <div class="col-md-4">
                <a href="{{ route('admin.contacts') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                Inquiry Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage inquiries via contact form
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for Industry management -->
            <div class="col-md-4">
                <a href="{{ route('admin.industries') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                Industry Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage industries and verticals
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for Media management -->
            <div class="col-md-4">
                <a href="{{ route('admin.media') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                Media Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage Server Media
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for Partner management -->
            <div class="col-md-4">
                <a href="{{ route('admin.partners') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                Partner Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage Partners and Affiliates
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for Blog management -->
            <div class="col-md-4">
                <a href="{{ route('admin.posts') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                Blog Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage Blog Posts and Articles
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for Project Highlight management -->
            <div class="col-md-4">
                <a href="{{ route('admin.projects') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                Project Highlight Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage Project Highlights and Case Studies
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for FAQ management -->
            <div class="col-md-4">
                <a href="{{ route('admin.faqs') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                FAQ Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage Frequently Asked Questions
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for Service Offerings management -->
            <div class="col-md-4">
                <a href="{{ route('admin.services') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                Service Offerings Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage Service Offerings and Packages
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tile for Testimonials management -->
            <div class="col-md-4">
                <a href="{{ route('admin.testimonials') }}" class="text-decoration-none">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">
                                Testimonial Management
                            </h5>
                            <p class="card-text text-muted">
                                Manage Client Testimonials and Reviews
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    @include('partials.foot')
</div>
</body>
</html>
