<link href="{{ asset('css/staff/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
@extends('layouts.dashlayout')

@section('content')
<p class="title title-color">Staff List</p>

<!-- Success Message -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Search and Filter Section -->
<div class="filters">
    <input type="text" id="searchInput" placeholder="Search by name..." onkeyup="filterTable()">
    
    <select id="filterGrade" onchange="filterTable()">
        <option value="">All Grades</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade }}">{{ $grade }}</option>
        @endforeach
    </select>

    <select id="filterPosition" onchange="filterTable()">
        <option value="">All Positions</option>
        @foreach ($positions as $position)
            <option value="{{ $position }}">{{ $position }}</option>
        @endforeach
    </select>
</div>

<div class="box-30"></div>

<!-- Column selection -->
<p class="describe title-color">Select Your field for display</p>
<div class="box-10"></div>

<!-- Column Selection Section -->
<div class="column-selection">
    <div class="ch-box-row"><label><input type="checkbox" onclick="toggleColumn(0)"> Name Title</label></div>
    <div class="ch-box-row"><label><input type="checkbox" checked onclick="toggleColumn(1)"> Full Name</label></div>
    <div class="ch-box-row"><label><input type="checkbox" onclick="toggleColumn(2)"> Permanent Address</label></div>
    <div class="ch-box-row"><label><input type="checkbox" onclick="toggleColumn(3)"> NIC No</label></div>
    <div class="ch-box-row"><label><input type="checkbox" checked onclick="toggleColumn(4)"> Email Address</label></div>
    <div class="ch-box-row"><label><input type="checkbox" checked onclick="toggleColumn(5)"> Phone Number</label></div>
    <div class="ch-box-row"><label><input type="checkbox" checked onclick="toggleColumn(6)"> Work Type</label></div>
    <div class="ch-box-row"><label><input type="checkbox" checked onclick="toggleColumn(7)"> Position</label></div>
    <div class="ch-box-row"><label><input type="checkbox" onclick="toggleColumn(8)"> Grade</label></div>
    <div class="ch-box-row"><label><input type="checkbox" onclick="toggleColumn(9)"> Usertype</label></div>
    <div class="ch-box-row"><label><input type="checkbox" checked onclick="toggleColumn(10)"> Actions</label></div>
</div>

<div class="box-30"></div>

<!-- Staff Table -->
<table id="staffTable">
    <thead>
        <p class="describe bg-color-red">Note: If you want to make a copy, make sure you uncheck the Actions field.</p>
        <tr>
            <th style="display:none;">Name Title</th>
            <th>Full Name</th>
            <th style="display:none;">Permanent Address</th>
            <th style="display:none;">NIC No</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Work Type</th>
            <th>Position</th>
            <th style="display:none;">Grade</th>
            <th style="display:none;">Usertype</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($staffMembers as $staff)
            <tr>
                <td style="display:none;">{{ $staff->name_title }}</td>
                <td>{{ $staff->full_name }}</td>
                <td style="display:none;">{{ $staff->permanent_address }}</td>
                <td style="display:none;">{{ $staff->nic_no }}</td>
                <td>{{ $staff->user->email }}</td>
                <td>{{ $staff->phone_number }}</td>
                <td>{{ $staff->work_type }}</td>
                <td>{{ $staff->position }}</td>
                <td style="display:none;">{{ $staff->grade }}</td>
                <td style="display:none;">{{ $staff->user->usertype }}</td>
                <td class="actions">
                    <a href="{{ route('staff.show', $staff->id) }}">View</a>
                    <a href="{{ route('staff.edit', $staff->id) }}">Edit</a>
                    <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display:inline;" onsubmit="return openConfirmModal(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="confirmModal" class="modal">
    <div class="modal-content">
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete this Staff?</p>
        <button id="confirmYes" class="btn">Yes, Delete</button>
        <button id="confirmNo" class="btn">Cancel</button>
    </div>
</div>

<script type="text/javascript">
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

<script>
// Search functionality
function filterTable() {
    let searchInput = document.getElementById('searchInput').value.toLowerCase();
    let gradeFilter = document.getElementById('filterGrade').value.toLowerCase();
    let positionFilter = document.getElementById('filterPosition').value.toLowerCase();
    let table = document.getElementById('staffTable');
    let tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        let tdName = tr[i].getElementsByTagName('td')[1];
        let tdGrade = tr[i].getElementsByTagName('td')[8];
        let tdPosition = tr[i].getElementsByTagName('td')[7];

        let nameValue = tdName ? tdName.textContent.toLowerCase() : '';
        let gradeValue = tdGrade ? tdGrade.textContent.toLowerCase() : '';
        let positionValue = tdPosition ? tdPosition.textContent.toLowerCase() : '';

        if (nameValue.includes(searchInput) &&
            (gradeFilter === '' || gradeValue.includes(gradeFilter)) &&
            (positionFilter === '' || positionValue.includes(positionFilter))) {
            tr[i].style.display = '';
        } else {
            tr[i].style.display = 'none';
        }
    }
}

// Toggle columns visibility
function toggleColumn(columnIndex) {
    let table = document.getElementById('staffTable');
    let th = table.getElementsByTagName('th')[columnIndex]; // Get the header
    let rows = table.getElementsByTagName('tr');

    // Toggle header visibility
    th.style.display = th.style.display === 'none' ? '' : 'none';

    // Toggle visibility of each corresponding cell (td) in the rows
    for (let i = 1; i < rows.length; i++) {
        let cells = rows[i].getElementsByTagName('td');
        if (cells.length > columnIndex) {
            cells[columnIndex].style.display = cells[columnIndex].style.display === 'none' ? '' : 'none';
        }
    }
}
</script>

@endsection
