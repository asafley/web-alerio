<!-- resources/views/admin/media/editor.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Media Editor - Admin'])
</head>
<body class="bg-light">
    <div id="app">
        <div class="container py-5">
            <div class="mb-4">
                <h1 class="h2">
                    Media Editor
                </h1>
            </div>

            <!-- Loading Indicator -->
            <div id="loading-indicator" class="card shadow-sm mb-4" style="display: none;">
                <div class="card-body text-center py-5">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted mb-0">Loading media data...</p>
                </div>
            </div>

            <!-- Form for Media Editor -->
            <form id="media-form" class="card shadow-sm">
                <div class="card-body">
                    <!-- Media Title -->
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Title</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control"
                            placeholder="Enter media title"
                            value=""
                        >
                    </div>

                    <!-- Media File -->
                    <div class="mb-4">
                        <label for="file" class="form-label fw-semibold">File</label>
                        <input
                            type="file"
                            id="file"
                            name="file"
                            class="form-control"
                        >
                    </div>

                    <!-- Media Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            class="form-control"
                            placeholder="Enter media description"
                            rows="3"
                        ></textarea>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Save Media
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise me-2"></i>Reset
                        </button>
                        <a href="{{ route('admin.media') }}" class="btn btn-outline-secondary ms-auto">
                            <i class="bi bi-x-circle me-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const mediaId = "{{ $mediaId ?? 'null' }}";
                    const loadingIndicator = document.getElementById('loading-indicator');

                    if (mediaId !== 'null') {
                        loadingIndicator.style.display = 'block';

                        fetch(`/api/v1/admin/media/${mediaId}`, {
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            $('#title').val(data.title);
                            $('#description').val(data.description);
                        })
                        .catch(error => console.error('Error fetching media data:', error))
                        .finally(() => {
                            loadingIndicator.style.display = 'none';
                        });
                    }

                    $('#media-form').on('submit', async function(e) {
                        e.preventDefault();

                        let submitBtn = this.querySelector('button[type="submit"]');
                        const originalText = submitBtn.innerHTML;
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>' + (mediaId === 'null' ? 'Uploading...' : 'Updating...');
                        loadingIndicator.style.display = 'block';

                        try {
                            const formDataObj = new FormData();
                            formDataObj.append('title', $('#title').val());
                            formDataObj.append('description', $('#description').val());
                            
                            const fileInput = document.getElementById('file');
                            if (fileInput.files.length > 0) {
                                formDataObj.append('file', fileInput.files[0]);
                            }

                            const method = mediaId === 'null' ? 'POST' : 'PUT';
                            const url = mediaId === 'null' ? '/api/v1/admin/media' : `/api/v1/admin/media/${mediaId}`;

                            const response = await fetch(url, {
                                method: method,
                                headers: {
                                    'Accept': 'application/json',
                                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: formDataObj
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
                                throw new Error(data.message || 'Failed to save media');
                            }

                            window.location.href = '{{ route("admin.media") }}';

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

