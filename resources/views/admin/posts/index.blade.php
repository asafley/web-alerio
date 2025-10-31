<!-- resources/views/admin/posts/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Posts Management - Admin'])
</head>
<body class="bg-light">
<div id="app">
    <div class="container py-5">
        <div class="mb-4">
            <h1 class="h2">
                Posts Management
            </h1>
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
            async function loadPosts() {
                try {
                    const response = await fetch('/api/v1/admin/posts');
                    if (!response.ok) throw new Error('Failed to fetch posts');

                    const posts = await response.json();
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '';

                    if (posts.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted"><div class="py-4"><p>No posts found</p><a href="/admin/posts/create" class="btn btn-sm btn-primary">Add Post</a></div></td></tr>';
                        return;
                    }

                    posts.forEach(post => {
                        const row = document.createElement('tr');
                        const statusBadge = post.status === 'published' ? 'success' : 'warning';
                        const createdDate = new Date(post.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });

                        row.innerHTML = `
                    <td>${createdDate}</td>
                    <td>${post.title}</td>
                    <td>${post.author?.name || 'N/A'}</td>
                    <td>
                        <span class="badge bg-${statusBadge}">
                            ${post.status.charAt(0).toUpperCase() + post.status.slice(1)}
                        </span>
                    </td>
                    <td>
                        <a href="/admin/posts/${post.id}/edit" class="btn btn-sm btn-primary">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="deletePost(${post.id})">Delete</button>
                        <form id="delete-${post.id}" action="/admin/posts/${post.id}" method="POST" style="display: none;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </td>
                `;
                        tbody.appendChild(row);
                    });
                } catch (error) {
                    console.error('Error loading posts:', error);
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Error loading posts</td></tr>';
                }
            }

            function deletePost(postId) {
                if (confirm('Delete this post?')) {
                    document.getElementById(`delete-${postId}`).submit();
                }
            }

            // Load posts on page load
            document.addEventListener('DOMContentLoaded', loadPosts);
        </script>
    </div>

    @include('partials.foot')
</div>
</body>
</html>

