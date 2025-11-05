<!-- resources/views/admin/contacts/editor.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Contacts Editor - Admin'])
</head>
<body class="bg-light">
    <div id="app">
        <div class="container py-5">
            <div class="mb-4">
                <h1 class="h2">
                    Contacts Editor
                </h1>
            </div>

            <!-- Loading Indicator -->
            <div id="loading-indicator" class="card shadow-sm mb-4" style="display: none;">
                <div class="card-body text-center py-5">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted mb-0">Loading contact data...</p>
                </div>
            </div>

            <!-- Form for Contacts Editor -->
            <form id="contact-form" class="card shadow-sm">
                <div class="card-body">
                    <!-- Contact Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            placeholder="Enter contact name"
                            value=""
                        >
                    </div>

                    <!-- Contact Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter contact email"
                            value=""
                        >
                    </div>

                    <!-- Contact Phone -->
                    <div class="mb-4">
                        <label for="phone" class="form-label fw-semibold">Phone</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            class="form-control"
                            placeholder="Enter contact phone"
                            value=""
                        >
                    </div>

                    <!-- Contact Subject -->
                    <div class="mb-4">
                        <label for="subject" class="form-label fw-semibold">Subject</label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            class="form-control"
                            placeholder="Enter contact subject"
                            value=""
                        >
                    </div>

                    <!-- Contact Message -->
                    <div class="mb-4">
                        <label for="message" class="form-label fw-semibold">Message</label>
                        <textarea
                            id="message"
                            name="message"
                            class="form-control"
                            placeholder="Enter contact message"
                            rows="5"
                        ></textarea>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Save Contact
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise me-2"></i>Reset
                        </button>
                        <a href="{{ route('admin.contacts') }}" class="btn btn-outline-secondary ms-auto">
                            <i class="bi bi-x-circle me-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const contactId = "{{ $contactId ?? 'null' }}";
                    const loadingIndicator = document.getElementById('loading-indicator');

                    if (contactId !== 'null') {
                        loadingIndicator.style.display = 'block';

                        fetch(`/api/v1/admin/contacts/${contactId}`, {
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            $('#name').val(data.name);
                            $('#email').val(data.email);
                            $('#phone').val(data.phone);
                            $('#subject').val(data.subject);
                            $('#message').val(data.message);
                        })
                        .catch(error => console.error('Error fetching contact data:', error))
                        .finally(() => {
                            loadingIndicator.style.display = 'none';
                        });
                    }

                    $('#contact-form').on('submit', async function(e) {
                        e.preventDefault();

                        let submitBtn = this.querySelector('button[type="submit"]');
                        const originalText = submitBtn.innerHTML;
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>' + (contactId === 'null' ? 'Saving...' : 'Updating...');
                        loadingIndicator.style.display = 'block';

                        try {
                            const formData = {
                                name: $('#name').val(),
                                email: $('#email').val(),
                                phone: $('#phone').val(),
                                subject: $('#subject').val(),
                                message: $('#message').val()
                            };

                            const method = contactId === 'null' ? 'POST' : 'PUT';
                            const url = contactId === 'null' ? '/api/v1/admin/contacts' : `/api/v1/admin/contacts/${contactId}`;

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
                                throw new Error(data.message || 'Failed to save contact');
                            }

                            window.location.href = '{{ route("admin.contacts") }}';

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

