<!-- resources/views/admin/media/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Media Management - Admin'])
</head>
<body class="bg-light">
<div id="app">
    <div class="container py-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0">
                Media Management
            </h1>
            <a href="{{ route('admin.media.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Upload Media
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Created</th>
                    <th>Title</th>
                    <th>File Size</th>
                    <th>Type</th>
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
            async function loadMedia() {
                try {
                    const response = await fetch('/api/v1/admin/media');
                    if (!response.ok) throw new Error('Failed to fetch media');

                    const media = await response.json();
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '';

                    if (media.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted"><div class="py-4"><p>No media files found</p><a href="/admin/media/create" class="btn btn-sm btn-primary">Upload Media</a></div></td></tr>';
                        return;
                    }

                    media.forEach(function(file, index, array) {
                        const row = document.createElement('tr');
                        const createdDate = new Date(file.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
                        const fileSize = file.size ? (file.size / 1024).toFixed(2) + ' KB' : 'N/A';
                        const fileType = file.mime_type ? file.mime_type.split('/')[0].toUpperCase() : 'Unknown';

                        row.innerHTML = `
                            <td>${createdDate}</td>
                            <td class="text-truncate" title="${file.title}">${file.title}</td>
                            <td>${fileSize}</td>
                            <td><span class="badge bg-info">${fileType}</span></td>
                            <td>
                                <a href="/admin/media/edit/${file.id}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="deleteMedia(${file.id})">Delete</button>
                                <form id="delete-${file.id}" action="/admin/media/${file.id}" method="POST" style="display: none;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });
                } catch (error) {
                    console.error('Error loading media:', error);
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '<tr><td colspan="5" class="text-center text-danger">Error loading media</td></tr>';
                }
            }

            function deleteMedia(mediaId) {
                if (confirm('Delete this media file?')) {
                    document.getElementById(`delete-${mediaId}`).submit();
                }
            }

            // Load media on page load
            document.addEventListener('DOMContentLoaded', loadMedia);
        </script>
    </div>

    @include('partials.foot')
</div>
</body>
</html>

