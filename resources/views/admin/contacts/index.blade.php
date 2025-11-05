<!-- resources/views/admin/contacts/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Contacts Management - Admin'])
</head>
<body class="bg-light">
<div id="app">
    <div class="container py-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0">
                Contacts Management
            </h1>
            <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>New Contact
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Created</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
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
            async function loadContacts() {
                try {
                    const response = await fetch('/api/v1/admin/contacts');
                    if (!response.ok) throw new Error('Failed to fetch contacts');

                    const contacts = await response.json();
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '';

                    if (contacts.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted"><div class="py-4"><p>No contacts found</p><a href="/admin/contacts/create" class="btn btn-sm btn-primary">Add Contact</a></div></td></tr>';
                        return;
                    }

                    // Populate table with contacts
                    contacts.forEach(function(contact, index, array) {
                        const row = document.createElement('tr');
                        const createdDate = new Date(contact.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });

                        row.innerHTML = `
                            <td>${createdDate}</td>
                            <td>${contact.name}</td>
                            <td>${contact.email}</td>
                            <td>${contact.subject}</td>
                            <td>
                                <a href="/admin/contacts/edit/${contact.id}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="deleteContact(${contact.id})">Delete</button>
                                <form id="delete-${contact.id}" action="/admin/contacts/${contact.id}" method="POST" style="display: none;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });
                } catch (error) {
                    console.error('Error loading contacts:', error);
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = '<tr><td colspan="5" class="text-center text-danger">Error loading contacts</td></tr>';
                }
            }

            function deleteContact(contactId) {
                if (confirm('Delete this contact?')) {
                    document.getElementById(`delete-${contactId}`).submit();
                }
            }

            // Load contacts on page load
            document.addEventListener('DOMContentLoaded', loadContacts);
        </script>
    </div>

    @include('partials.foot')
</div>
</body>
</html>

