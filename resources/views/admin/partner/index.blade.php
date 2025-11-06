<!-- resources/views/admin/partner/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Partners Management - Admin'])
</head>
<body class="bg-light">
<div id="app">
    <div class="container py-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0">
                Partners Management
            </h1>
            <a href="{{ route('admin.partner.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>New Partner
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Created</th>
                    <th>Name</th>
                    <th>Website</th>
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
            async function loadPartners() {
                try {
                    const response = await fetch('/api/v1/admin/partner');
                    if (!response.ok) throw new Error('Failed to fetch partners');

                    const partners = await response.json();
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '';

                    if (partners.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="4" class="text-center text-muted"><div class="py-4"><p>No partners found</p><a href="/admin/partner/create" class="btn btn-sm btn-primary">Add Partner</a></div></td></tr>';
                        return;
                    }

                    partners.forEach(function(partner, index, array) {
                        const row = document.createElement('tr');
                        const createdDate = new Date(partner.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });

                        row.innerHTML = `
                            <td>${createdDate}</td>
                            <td>${partner.name}</td>
                            <td><a href="${partner.website}" target="_blank" class="text-truncate">${partner.website || 'N/A'}</a></td>
                            <td>
                                <a href="/admin/partner/edit/${partner.id}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="deletePartner(${partner.id})">Delete</button>
                                <form id="delete-${partner.id}" action="/admin/partner/${partner.id}" method="POST" style="display: none;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });
                } catch (error) {
                    console.error('Error loading partners:', error);
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '<tr><td colspan="4" class="text-center text-danger">Error loading partners</td></tr>';
                }
            }

            function deletePartner(partnerId) {
                if (confirm('Delete this partner?')) {
                    document.getElementById(`delete-${partnerId}`).submit();
                }
            }

            // Load partners on page load
            document.addEventListener('DOMContentLoaded', loadPartners);
        </script>
    </div>

    @include('partials.foot')
</div>
</body>
</html>

