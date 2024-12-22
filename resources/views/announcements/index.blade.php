<link href="{{ asset('css/common.css') }}" rel="stylesheet">
<link href="{{ asset('css/announcement/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/student/index.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')
@section('content')

<p class="title title-color">Announcements</p>
<div class="box-30"></div>

@if ($message = Session::get('success'))
    <div class="alert alert-success mt-2">
        {{ $message }}
    </div>
@endif

<div class="box-30"></div>

<!-- Search Bar -->
<div class="search-bar">
    <input type="text" id="searchAnnouncement" placeholder="Search by Title or Description" onkeyup="searchAnnouncements()">
</div>

<!-- Announcements Table -->
<table class="table mt-3">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="announcementTable">
        @foreach ($announcements as $announcement)
            <tr>
                <td>{{ $announcement->title }}</td>
                <td>{{ $announcement->description }}</td>
                <td class="actions">
                    <a href="{{ route('announcements.edit', $announcement->id) }}" >Edit</a>
                    <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" style="display:inline;" onsubmit="return openConfirmModal(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete this student?</p>
        <button id="confirmYes" class="btn">Yes, Delete</button>
        <button id="confirmNo" class="btn">Cancel</button>
    </div>
</div>

<script>
    function openConfirmModal(event) {
        event.preventDefault(); // Prevent form submission
        const modal = document.getElementById('confirmModal');
        modal.style.display = 'block'; // Show the modal

        const confirmYes = document.getElementById('confirmYes');
        const confirmNo = document.getElementById('confirmNo');

        // When user clicks 'Yes, Delete'
        confirmYes.onclick = function() {
            modal.style.display = 'none';
            event.target.submit(); // Submit the form
        }

        // When user clicks 'Cancel'
        confirmNo.onclick = function() {
            modal.style.display = 'none'; // Close the modal
        }

        // Close the modal if user clicks outside of the modal content
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    }
</script>
@endsection

<script>
    function searchAnnouncements() {
        const searchValue = document.getElementById('searchAnnouncement').value.toLowerCase();
        const rows = document.querySelectorAll('#announcementTable tr');

        rows.forEach(row => {
            const title = row.querySelector('td:first-child').textContent.toLowerCase();
            const description = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

            if (title.includes(searchValue) || description.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
<style>
    .alert {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.alert-success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}
</style>