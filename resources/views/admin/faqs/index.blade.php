<!-- resources/views/admin/faqs/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'FAQs Management - Admin'])
</head>
<body class="bg-light">
<div id="app">
    <div class="container py-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0">
                FAQs Management
            </h1>
            <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>New FAQ
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Created</th>
                    <th>Category</th>
                    <th>Question</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="4" class="text-center text-muted">Loading...</td>
                </tr>
                </tbody>
            </table>
        </div>

        <script>
            async function loadFAQs() {
                try {
                    const response = await fetch('/api/v1/admin/faqs');
                    if (!response.ok) throw new Error('Failed to fetch FAQs');

                    const faqs = await response.json();
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '';

                    if (faqs.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="4" class="text-center text-muted"><div class="py-4"><p>No FAQs found</p><a href="/admin/faqs/create" class="btn btn-sm btn-primary">Add FAQ</a></div></td></tr>';
                        return;
                    }

                    faqs.forEach(function(faq, index, array) {
                        const row = document.createElement('tr');
                        const createdDate = new Date(faq.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });

                        row.innerHTML = `
                            <td>${createdDate}</td>
                            <td>${faq.category}</td>
                            <td class="text-truncate" title="${faq.question}">${faq.question}</td>
                            <td>
                                <a href="/admin/faqs/edit/${faq.id}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="deleteFAQ(${faq.id})">Delete</button>
                                <form id="delete-${faq.id}" action="/admin/faqs/${faq.id}" method="POST" style="display: none;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });
                } catch (error) {
                    console.error('Error loading FAQs:', error);
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '<tr><td colspan="4" class="text-center text-danger">Error loading FAQs</td></tr>';
                }
            }

            function deleteFAQ(faqId) {
                if (confirm('Delete this FAQ?')) {
                    document.getElementById(`delete-${faqId}`).submit();
                }
            }

            // Load FAQs on page load
            document.addEventListener('DOMContentLoaded', loadFAQs);
        </script>
    </div>

    @include('partials.foot')
</div>
</body>
</html>

