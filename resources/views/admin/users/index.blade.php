<!-- resources/views/admin/users/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Uusers Management - Admin'])
</head>
<body class="bg-light">
<div id="app">
    <div class="container py-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0">
                Posts Management
            </h1>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>New Uuser
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Created</th>>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="5" class="text-center text-muted">Loading...</td>
                </tr>
                </tbody>
            </table>
        </div>

        <script>
            async function loadUusers() {
                try {
                    // Fetch posts from API which will return JSON data in "data"
                    const response = await fetch('/api/v1/admin/users');
                    if (!response.ok) throw new Error('Failed to fetch users');

                    const posts = await response.json();
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '';

                    //Check if response is 200 and has "data" field
                    if (posts.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted"><div class="py-4"><p>No users found</p><a href="/admin/users/create" class="btn btn-sm btn-primary">Add Post</a></div></td></tr>';
                        return;
                    }

                    // Populate table with posts
                    posts.forEach(function(post, index, array) {
                        const row = document.createElement('tr');

                        const statusBadge = post.status === 'published' ? 'success' : 'warning';
                        const createdDate = new Date(post.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });

                        // Check if post is draft, published, or future set.
                        if (post.published_at && new Date(post.published_at) > new Date()) {
                            post.status = 'future';
                        } else if (post.published_at) {
                            post.status = 'published';
                        } else {
                            post.status = 'draft';
                        }

                        row.innerHTML = `
                            <td>${createdDate}</td>
                            <td>${post.title}</td>
                            <td>${post.author?.name || 'N/A'}</td>
                            <td><span class="badge text-capitalize">${post.status}</span></td>
                            <td>
                                <a href="/admin/users/edit/${post.id}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="deleteUuser(${post.id})">Delete</button>
                                <form id="delete-${post.id}" action="/admin/users/${post.id}" method="POST" style="display: none;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });
                } catch (error) {
                    console.error('Error loading users:', error);
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Error loading users</td></tr>';
                }
            }

            function deleteUuser(postId) {
                if (confirm('Delete this user?')) {
                    document.getElementById(`delete-${postId}`).submit();
                }
            }

            // Load posts on page load
            document.addEventListener('DOMContentLoaded', loadUusers);
        </script>
    </div>

    @include('partials.foot')
</div>
</body>
</html>

