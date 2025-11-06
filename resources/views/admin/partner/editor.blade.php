<!-- resources/views/admin/partner/editor.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Partners Editor - Admin'])
</head>
<body class="bg-light">
    <div id="app">
        <div class="container py-5">
            <div class="mb-4">
                <h1 class="h2">
                    Partners Editor
                </h1>
            </div>

            <!-- Loading Indicator -->
            <div id="loading-indicator" class="card shadow-sm mb-4" style="display: none;">
                <div class="card-body text-center py-5">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted mb-0">Loading partner data...</p>
                </div>
            </div>

            <!-- Form for Partners Editor -->
            <form id="partner-form" class="card shadow-sm">
                <div class="card-body">
                    <!-- Partner Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            placeholder="Enter partner name"
                            value=""
                        >
                    </div>

                    <!-- Partner Slug -->
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

                    <!-- Partner Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            class="form-control"
                            placeholder="Enter partner description"
                            rows="5"
                        ></textarea>
                    </div>

                    <!-- Partner Website -->
                    <div class="mb-4">
                        <label for="website" class="form-label fw-semibold">Website</label>
                        <input
                            type="url"
                            id="website"
                            name="website"
                            class="form-control"
                            placeholder="Enter partner website URL"
                            value=""
                        >
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Save Partner
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise me-2"></i>Reset
                        </button>
                        <a href="{{ route('admin.partner') }}" class="btn btn-outline-secondary ms-auto">
                            <i class="bi bi-x-circle me-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const partnerId = "{{ $partnerId ?? 'null' }}";
                    const loadingIndicator = document.getElementById('loading-indicator');

                    if (partnerId !== 'null') {
                        loadingIndicator.style.display = 'block';

                        fetch(`/api/v1/admin/partner/${partnerId}`, {
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            $('#name').val(data.name);
                            $('#slug').val(data.slug);
                            $('#description').val(data.description);
                            $('#website').val(data.website);
                        })
                        .catch(error => console.error('Error fetching partner data:', error))
                        .finally(() => {
                            loadingIndicator.style.display = 'none';
                        });
                    }

                    $('#name').on('change', function() {
                        if (partnerId !== 'null') {
                            return;
                        }

                        let slug = $(this).val()
                            .toLowerCase()
                            .replace(/\s+/g, '-')
                            .replace(/[^\w-]/g, '')
                            .replace(/-+/g, '-');

                        $('#slug').val(slug);
                    });

                    $('#partner-form').on('submit', async function(e) {
                        e.preventDefault();

                        let submitBtn = this.querySelector('button[type="submit"]');
                        const originalText = submitBtn.innerHTML;
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>' + (partnerId === 'null' ? 'Saving...' : 'Updating...');
                        loadingIndicator.style.display = 'block';

                        try {
                            const formData = {
                                name: $('#name').val(),
                                slug: $('#slug').val(),
                                description: $('#description').val(),
                                website: $('#website').val()
                            };

                            const method = partnerId === 'null' ? 'POST' : 'PUT';
                            const url = partnerId === 'null' ? '/api/v1/admin/partner' : `/api/v1/admin/partner/${partnerId}`;

                            const response = await fetch(url, {
                                method: method,
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify(formData)
                            });

                            const data = await response.json();

                            if (!response.ok) {
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
                                throw new Error(data.message || 'Failed to save partner');
                            }

                            window.location.href = '{{ route("admin.partner") }}';

                        } catch (error) {
                            console.error('Error:', error);
                        } finally {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalText;
                            loadingIndicator.style.display = 'none';
                        }
                    });
                });
            </script>
        </div>

        @include('partials.foot')
    </div>
</body>
</html>

