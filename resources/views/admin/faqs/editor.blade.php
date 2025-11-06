<!-- resources/views/admin/faqs/editor.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'FAQs Editor - Admin'])
</head>
<body class="bg-light">
    <div id="app">
        <div class="container py-5">
            <div class="mb-4">
                <h1 class="h2">
                    FAQs Editor
                </h1>
            </div>

            <!-- Loading Indicator -->
            <div id="loading-indicator" class="card shadow-sm mb-4" style="display: none;">
                <div class="card-body text-center py-5">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted mb-0">Loading FAQ data...</p>
                </div>
            </div>

            <!-- Form for FAQs Editor -->
            <form id="faq-form" class="card shadow-sm">
                <div class="card-body">
                    <!-- FAQ Category -->
                    <div class="mb-4">
                        <label for="category" class="form-label fw-semibold">Category</label>
                        <input
                            type="text"
                            id="category"
                            name="category"
                            class="form-control"
                            placeholder="Enter FAQ category"
                            value=""
                        >
                    </div>

                    <!-- FAQ Question -->
                    <div class="mb-4">
                        <label for="question" class="form-label fw-semibold">Question</label>
                        <input
                            type="text"
                            id="question"
                            name="question"
                            class="form-control"
                            placeholder="Enter FAQ question"
                            value=""
                        >
                    </div>

                    <!-- FAQ Answer -->
                    <div class="mb-4">
                        <label for="answer" class="form-label fw-semibold">Answer</label>
                        <textarea
                            id="answer"
                            name="answer"
                            class="form-control"
                            placeholder="Enter FAQ answer"
                            rows="5"
                        ></textarea>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Save FAQ
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise me-2"></i>Reset
                        </button>
                        <a href="{{ route('admin.faqs') }}" class="btn btn-outline-secondary ms-auto">
                            <i class="bi bi-x-circle me-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const faqId = "{{ $faqId ?? 'null' }}";
                    const loadingIndicator = document.getElementById('loading-indicator');

                    if (faqId !== 'null') {
                        loadingIndicator.style.display = 'block';

                        fetch(`/api/v1/admin/faqs/${faqId}`, {
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            $('#category').val(data.category);
                            $('#question').val(data.question);
                            $('#answer').val(data.answer);
                        })
                        .catch(error => console.error('Error fetching FAQ data:', error))
                        .finally(() => {
                            loadingIndicator.style.display = 'none';
                        });
                    }

                    $('#faq-form').on('submit', async function(e) {
                        e.preventDefault();

                        let submitBtn = this.querySelector('button[type="submit"]');
                        const originalText = submitBtn.innerHTML;
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>' + (faqId === 'null' ? 'Saving...' : 'Updating...');
                        loadingIndicator.style.display = 'block';

                        try {
                            const formData = {
                                category: $('#category').val(),
                                question: $('#question').val(),
                                answer: $('#answer').val()
                            };

                            const method = faqId === 'null' ? 'POST' : 'PUT';
                            const url = faqId === 'null' ? '/api/v1/admin/faqs' : `/api/v1/admin/faqs/${faqId}`;

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
                                throw new Error(data.message || 'Failed to save FAQ');
                            }

                            window.location.href = '{{ route("admin.faqs") }}';

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

