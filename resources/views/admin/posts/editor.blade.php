<!-- resources/views/admin/posts/editor.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Posts Editor - Admin'])
</head>
<body class="bg-light">
    <div id="app">
        <div class="container py-5">
            <div class="mb-4">
                <h1 class="h2">
                    Posts Editor
                </h1>
            </div>

            <!-- Form for Posts Editor -->
            <form id="post-form" class="card shadow-sm">
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
                            value="{{ old('headline_uri') }}"
                        >
                        @error('title')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Post Title -->
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Post Title</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            placeholder="Enter post title"
                            value="{{ old('title') }}"
                        >
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

`                   <!-- Post Subtitle -->
                    <div class="mb-4">
                        <label for="subtitle" class="form-label fw-semibold">Subtitle</label>
                        <input
                            type="text"
                            id="subtitle"
                            name="subtitle"
                            class="form-control @error('subtitle') is-invalid @enderror"
                            placeholder="Enter post subtitle"
                            value="{{ old('subtitle') }}"
                        >
                        @error('subtitle')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Post Slug -->
                    <div class="mb-4">
                        <label for="slug" class="form-label fw-semibold">Slug</label>
                        <input
                            type="text"
                            id="slug"
                            name="slug"
                            class="form-control @error('slug') is-invalid @enderror"
                            placeholder="auto-generated-slug"
                            value="{{ old('slug') }}"
                        >
                        @error('slug')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Summary of the post for frontpage -->
                    <div class="mb-4">
                        <label for="summary" class="form-label fw-semibold">Summary</label>
                        <textarea
                            id="summary"
                            name="summary"
                            class="form-control @error('summary') is-invalid @enderror"
                            placeholder="Enter a brief summary of the post"
                            rows="3"
                        >{{ old('summary') }}</textarea>
                        @error('summary')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Post HTML Page Content -->
                    <div class="mb-4">
                        <label for="content" class="form-label fw-semibold">Content</label>

                        <textarea
                            id="content"
                            name="content"
                            class="form-control @error('content') is-invalid @enderror"
                            placeholder="Enter the full HTML content of the post"
                            rows="3"
                        >{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Post Tags -->
                    <div class="mb-4">
                        <label for="tags" class="form-label fw-semibold">Tags</label>
                        <input
                            type="text"
                            id="tags"
                            name="tags"
                            class="form-control @error('tags') is-invalid @enderror"
                            placeholder="Enter tags separated by commas"
                            value="{{ old('tags') }}"
                        >
                        @error('tags')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Post SEO Title -->
                    <div class="mb-4">
                        <label for="seo_title" class="form-label fw-semibold">SEO Title</label>
                        <input
                            type="text"
                            id="seo_title"
                            name="seo_title"
                            class="form-control @error('seo_title') is-invalid @enderror"
                            placeholder="Enter SEO title"
                            value="{{ old('seo_title') }}"
                        >
                        @error('seo_title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Post SEO Summary -->
                    <div class="mb-4">
                        <label for="seo_summary" class="form-label fw-semibold">SEO Summary</label>
                        <textarea
                            id="seo_summary"
                            name="seo_summary"
                            class="form-control @error('seo_summary') is-invalid @enderror"
                            placeholder="Enter SEO summary"
                            rows="3"
                        >{{ old('seo_summary') }}</textarea>
                        @error('seo_summary')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Whether or not the post is featured -->
                    <div class="mb-4 form-check form-switch">
                        <input
                            type="checkbox"
                            id="is_headliner"
                            name="is_headliner"
                            class="form-check-input @error('is_headliner') is-invalid @enderror"
                            {{ old('is_headliner') ? 'checked' : '' }}
                        >
                        <label for="is_headliner" class="form-check-label fw-semibold">Featured Post</label>
                        @error('is_headliner')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Whether or not the post published at date will be null or not -->
                    <div class="mb-4 form-check form-switch">
                        <input
                            type="checkbox"
                            id="is_published"
                            name="is_published"
                            class="form-check-input @error('is_published') is-invalid @enderror"
                            {{ old('is_headliner') ? 'checked' : '' }}
                        >
                        <label for="is_published" class="form-check-label fw-semibold">Not Published</label>
                        @error('is_published')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Date of when the post is published -->
                    <div class="mb-4">
                        <label for="published_at" class="form-label fw-semibold">Published At</label>
                        <input
                            type="datetime-local"
                            id="published_at"
                            name="published_at"
                            class="form-control @error('published_at') is-invalid @enderror"
                            value="{{ old('published_at') }}"
                        >
                        @error('published_at')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Author Info (Read-Only) -->
                    <!-- TODO: Pull from authenticated user -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Author Id</label>
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
                        <label class="form-label fw-semibold">Author Name</label>
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
                        <label class="form-label fw-semibold">Author Uri</label>
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
                            <i class="bi bi-check-circle me-2"></i>Save Post
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise me-2"></i>Reset
                        </button>
                        <a href="{{ route('admin.posts') }}" class="btn btn-outline-secondary ms-auto">
                            <i class="bi bi-x-circle me-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Auto-generate slug from title
                    $('#title').on('change', function() {
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
                    $('#post-form').on('submit', async function(e) {
                        e.preventDefault();

                        // Show loading state
                        let submitBtn;
                        submitBtn = this.querySelector('button[type="submit"]');
                        const originalText = submitBtn.innerHTML;
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Saving...';

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
                            const response = await fetch('/api/v1/admin/posts', {
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
                                throw new Error(data.message || 'Failed to save post');
                            }

                            // Success - show message and redirect
                            alert('Post saved successfully!');
                            window.location.href = '{{ route("admin.posts") }}';

                        } catch (error) {
                            console.error('Error:', error);
                            alert('Error saving post: ' + error.message);
                        } finally {
                            // Restore button state
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalText;
                        }
                    });
                });
            </script>
        </div>

        @include('partials.foot')
    </div>
</body>
</html>

