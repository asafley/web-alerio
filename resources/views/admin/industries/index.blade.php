<!-- resources/views/admin/industries/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Industries Management - Admin'])
</head>
<body class="bg-light">
<div id="app">
    <div class="container py-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0">
                Industries Management
            </h1>
            <a href="{{ route('admin.industries.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>New Industry
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Created</th>
                    <th>Name</th>
                    <th>Slug</th>
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
            async function loadIndustries() {
                try {
                    const response = await fetch('/api/v1/admin/industries');
                    if (!response.ok) throw new Error('Failed to fetch industries');

                    const industries = await response.json();
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '';

                    if (industries.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="4" class="text-center text-muted"><div class="py-4"><p>No industries found</p><a href="/admin/industries/create" class="btn btn-sm btn-primary">Add Industry</a></div></td></tr>';
                        return;
                    }

                    industries.forEach(function(industry, index, array) {
                        const row = document.createElement('tr');
                        const createdDate = new Date(industry.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });

                        row.innerHTML = `
                            <td>${createdDate}</td>
                            <td>${industry.name}</td>
                            <td>${industry.slug}</td>
                            <td>
                                <a href="/admin/industries/edit/${industry.id}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="deleteIndustry(${industry.id})">Delete</button>
                                <form id="delete-${industry.id}" action="/admin/industries/${industry.id}" method="POST" style="display: none;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });
                } catch (error) {
                    console.error('Error loading industries:', error);
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '<tr><td colspan="4" class="text-center text-danger">Error loading industries</td></tr>';
                }
            }

            function deleteIndustry(industryId) {
                if (confirm('Delete this industry?')) {
                    document.getElementById(`delete-${industryId}`).submit();
                }
            }

            // Load industries on page load
            document.addEventListener('DOMContentLoaded', loadIndustries);
        </script>
    </div>

    @include('partials.foot')
</div>
</body>
</html>

