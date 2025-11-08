<!-- resources/views/admin/roles/editor.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Role Editor - Admin'])
</head>
<body class="bg-light">
    <div id="app">
        <div class="container py-5">
            <div class="mb-4">
                <h1 class="h2">
                    Urole Editor
                </h1>
            </div>

            <!-- Loading Indicator -->
            <div id="loading-indicator" class="card shadow-sm mb-4" style="display: none;">
                <div class="card-body text-center py-5">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted mb-0">Loading roles data...</p>
                </div>
            </div>

            <!-- Form for Urole Editor -->
            <form id="roles-form" class="card shadow-sm">
                <div class="card-body">
                    <!-- Headline URI -->
                    <div class="mb-4">
                        <label for="headline_uri" class="form-label fw-semibold">Headline URI</label>
                        <input
                            type="text"
                            id="headline_uri"
                            name="headline_uri"
                            class="form-control"
                            placeholder="Enter headline URI"
                            value=""
                        >
                    </div>

                    <!-- Post Title -->
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Post Title</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control"
                            placeholder="Enter post title"
                            value=""
                        >
                    </div>

`                   <!-- Post Subtitle -->
                    <div class="mb-4">
                        <label for="subtitle" class="form-label fw-semibold">Subtitle</label>
                        <input
                            type="text"
                            id="subtitle"
                            name="subtitle"
                            class="form-control"
                            placeholder="Enter post subtitle"
                            value=""
                        >
                    </div>

                    <!-- Post Slug -->
                    <div class="mb-4">
                        <label for="slug" class="form-label fw-semibold">Slug</label>
                        <input
                            type="text"
                            id="slug"
                            name="slug"
                            class="form-control"
                            placeholder="auto-generated-slug"
                            value=""
                            readonly
                        >
                    </div>

                    <!-- Summary of the post for frontpage -->
                    <div class="mb-4">
                        <label for="summary" class="form-label fw-semibold">Summary</label>
                        <textarea
                            id="summary"
                            name="summary"
                            class="form-control"
                            placeholder="Enter a brief summary of the post"
                            rows="3"
                        ></textarea>
                    </div>

                    <!-- Post HTML Page Content -->
                    <div class="mb-4">
                        <label for="content" class="form-label fw-semibold">Content</label>

                        <textarea
                            id="content"
                            name="content"
                            class="form-control"
                            placeholder="Enter the full HTML content of the post"
                            rows="3"
                        ></textarea>
                    </div>

                    <!-- Post Tags -->
                    <div class="mb-4">
                        <label for="tags" class="form-label fw-semibold">Tags</label>
                        <input
                            type="text"
                            id="tags"
                            name="tags"
                            class="form-control"
                            placeholder="Enter tags separated by commas"
                            value=""
                        >
                    </div>

                    <!-- Post SEO Title -->
                    <div class="mb-4">
                        <label for="seo_title" class="form-label fw-semibold">SEO Title</label>
                        <input
                            type="text"
                            id="seo_title"
                            name="seo_title"
                            class="form-control"
                            placeholder="Enter SEO title"
                            value=""
                        >
                    </div>

                    <!-- Post SEO Summary -->
                    <div class="mb-4">
                        <label for="seo_summary" class="form-label fw-semibold">SEO Summary</label>
                        <textarea
                            id="seo_summary"
                            name="seo_summary"
                            class="form-control"
                            placeholder="Enter SEO summary"
                            rows="3"
                        ></textarea>
                    </div>

                    <!-- Whether or not the post is featured -->
                    <div class="mb-4 form-check form-switch">
                        <input
                            type="checkbox"
                            id="is_headliner"
                            name="is_headliner"
                            class="form-check-input"
                        >
                        <label for="is_headliner" class="form-check-label fw-semibold">Featured Post</label>
                    </div>

                    <!-- Whether or not the post published at date will be null or not -->
                    <div class="mb-4 form-check form-switch">
                        <input
                            type="checkbox"
                            id="is_published"
                            name="is_published"
                            class="form-check-input"
                        >
                        <label for="is_published" class="form-check-label fw-semibold">Not Published</label>
                    </div>

                    <!-- Date of when the post is published -->
                    <div class="mb-4">
                        <label for="published_at" class="form-label fw-semibold">Published At</label>
                        <input
                            type="datetime-local"
                            id="published_at"
                            name="published_at"
                            class="form-control"
                        >
                    </div>

                    <!-- Author Info (Read-Only) -->
                    <!-- TODO: Pull from authenticated user -->
                    <div class="mb-4">
                        <label for="author_id" class="form-label fw-semibold">Author Id</label>
                        <input
                            type="text"
                            id="author_id"
                            name="author_id"
                            class="form-control"
                            value="123"
                            readonly
                        >
                    </div>

                    <div class="mb-4">
                        <label for="author_name" class="form-label fw-semibold">Author Name</label>
                        <input
                            type="text"
                            id="author_name"
                            name="author_name"
                            class="form-control"
                            value="Test User"
                            readonly
                        >
                    </div>

                    <div class="mb-4">
                        <label for="author_uri" class="form-label fw-semibold">Author Uri</label>
                        <input
                            type="text"
                            id="author_uri"
                            name="author_uri"
                            class="form-control"
                            value="test-user"
                            readonly
                        >
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Save Urole
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise me-2"></i>Reset
                        </button>
                        <a href="{{ route('admin.roles') }}" class="btn btn-outline-secondary ms-auto">
                            <i class="bi bi-x-circle me-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Get Post if editing an existing one
                    const roleId = "{{ $roleId ?? 'null' }}";
                    const loadingIndicator = document.getElementById('loading-indicator');

                    if (postId !== 'null') {
                        loadingIndicator.style.display = 'block';

                        fetch(`/api/v1/admin/roles/${postId}`, {
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Populate form fields with existing post data
                            $('#headline_uri').val(data.headline_uri);
                            $('#title').val(data.title);
                            $('#subtitle').val(data.subtitle);
                            $('#slug').val(data.slug);
                            $('#summary').val(data.summary);
                            $('#content').val(data.content);
                            $('#tags').val(data.tags);
                            $('#seo_title').val(data.seo_title);
                            $('#seo_summary').val(data.seo_summary);
                            $('#is_headliner').prop('checked', data.is_headliner);
                            if (data.published_at) {
                                const publishedAt = new Date(data.published_at);
                                const localDatetime = publishedAt.toISOString().slice(0,16);
                                $('#published_at').val(localDatetime);
                                $('#is_published').prop('checked', false);
                                $('#published_at').prop('disabled', false);
                            } else {
                                $('#is_published').prop('checked', true);
                                $('#published_at').prop('disabled', true);
                            }
                            $('#author_id').val(data.author_id);
                            $('#author_name').val(data.author_name);
                            $('#author_uri').val(data.author_uri);
                        })
                        .catch(error => console.error('Error fetching roles data:', error))
                        .finally(() => {
                            loadingIndicator.style.display = 'none';
                        });
                    }

                    // Auto-generate slug from title
                    $('#title').on('change', function() {
                        if (postId !== 'null') {
                            return; // Don't auto-generate slug if editing existing post
                        }

                        let slug;

                        slug = $(this).val()
                            .toLowerCase()
                            .replace(/\s+/g, '-')
                            .replace(/[^\w-]/g, '')
                            .replace(/-+/g, '-');

                        $('#slug').val(slug);
                    });

                    // List to the is_published checkbox to disable/enable published_at input
                    $('#is_published').on('change', function() {
                        if ($(this).is(':checked')) {
                            $('#published_at').prop('disabled', true);
                        } else {
                            $('#published_at').prop('disabled', false);
                        }
                    });

                    // Form submission with JSON
                    $('#roles-form').on('submit', async function(e) {
                        if (${module}Id === 'null') {
                            e.preventDefault();

                            // Show loading state
                            let submitBtn;
                            submitBtn = this.querySelector('button[type="submit"]');
                            const originalText = submitBtn.innerHTML;
                            submitBtn.disabled = true;
                            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Saving...';
                            loadingIndicator.style.display = 'block';

                            // Check if published_at should be null or not
                            if ($('#is_published').is(':checked')) {
                                $('#published_at').val('');
                            }

                            try {
                                // Collect form data
                                const formData = {
                                    headline_uri: $('#headline_uri').val(),
                                    title: $('#title').val(),
                                    subtitle: $('#subtitle').val(),
                                    slug: $('#slug').val(),
                                    summary: $('#summary').val(),
                                    content: $('#content').val(),
                                    tags: $('#tags').val(),
                                    seo_title: $('#seo_title').val(),
                                    seo_summary: $('#seo_summary').val(),
                                    is_headliner: $('#is_headliner').is(':checked'),
                                    published_at: $('#published_at').val(),
                                    author_id: $('#author_id').val(),
                                    author_name: $('#author_name').val(),
                                    author_uri: $('#author_uri').val()
                                };

                                // Send JSON request
                                const response = await fetch('/api/v1/admin/roles', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify(formData)
                                });

                                const data = await response.json();

                                if (!response.ok) {
                                    // Handle validation errors
                                    if (data.errors) {
                                        Object.keys(data.errors).forEach(field => {
                                            const input = document.getElementById(field);
                                            if (input) {
                                                input.classList.add('is-invalid');
                                                const feedback = input.parentElement.querySelector('.invalid-feedback');
                                                if (feedback) {
                                                    feedback.textContent = data.errors[field][0];
                                                    feedback.style.display = 'block';
                                                }
                                            }
                                        });
                                    }
                                    throw new Error(data.message || 'Failed to save role');
                                }

                                // Success - show message and redirect
                                window.location.href = '{{ route("admin.posts") }}';

                            } catch (error) {
                                console.error('Error:', error);
                            } finally {
                                // Restore button state
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = originalText;
                                loadingIndicator.style.display = 'none';
                            }
                        } else {
                            e.preventDefault();

                            // Show loading state
                            let submitBtn;
                            submitBtn = this.querySelector('button[type="submit"]');
                            const originalText = submitBtn.innerHTML;
                            submitBtn.disabled = true;
                            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Updating...';
                            loadingIndicator.style.display = 'block';

                            // Check if published_at should be null or not
                            if ($('#is_published').is(':checked')) {
                                $('#published_at').val('');
                            }

                            try {
                                // Collect form data
                                const formData = {
                                    headline_uri: $('#headline_uri').val(),
                                    title: $('#title').val(),
                                    subtitle: $('#subtitle').val(),
                                    slug: $('#slug').val(),
                                    summary: $('#summary').val(),
                                    content: $('#content').val(),
                                    tags: $('#tags').val(),
                                    seo_title: $('#seo_title').val(),
                                    seo_summary: $('#seo_summary').val(),
                                    is_headliner: $('#is_headliner').is(':checked'),
                                    published_at: $('#published_at').val(),
                                    author_id: $('#author_id').val(),
                                    author_name: $('#author_name').val(),
                                    author_uri: $('#author_uri').val()
                                };

                                // Send JSON request
                                const response = await fetch(`/api/v1/admin/roles/${postId}`, {
                                    method: 'PUT',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify(formData)
                                });

                                const data = await response.json();

                                if (!response.ok) {
                                    // Handle validation errors
                                    if (data.errors) {
                                        Object.keys(data.errors).forEach(field => {
                                            const input = document.getElementById(field);
                                            if (input) {
                                                input.classList.add('is-invalid');
                                                const feedback = input.parentElement.querySelector('.invalid-feedback');
                                                if (feedback) {
                                                    feedback.textContent = data.errors[field][0];
                                                    feedback.style.display = 'block';
                                                }
                                            }
                                        });
                                    }
                                    throw new Error(data.message || 'Failed to update post');
                                }

                                // Success - show message and redirect
                                window.location.href = '{{ route("admin.posts") }}';

                            } catch (error) {
                                console.error('Error:', error);
                            } finally {
                                // Restore button state
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = originalText;
                                loadingIndicator.style.display = 'none';
                            }
                        }
                    });
                });
            </script>
        </div>

        @include('partials.foot')
    </div>
</body>
</html>

