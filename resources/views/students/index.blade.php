<link href="{{ asset('css/student/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/common.css') }}" rel="stylesheet">

@extends('layouts.dashlayout')
@section('content')
    <p class="title title-color ">Students List</p>
<!-- Success Message -->
@if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
    <!-- Search bar -->
    <input type="text" id="searchStudent" placeholder="Search by Student Name" onkeyup="filterStudents()">

    <!-- Filter options -->
    <div class="filters">
        <label>GS Division:
            <select id="filterGsDivision" onchange="filterStudents()">
                <option value="">All</option>
        @foreach ($gsdivisions as $gsdivision)
            <option value="{{ $gsdivision }}">{{ $gsdivision }}</option>
        @endforeach
            </select>
        </label>

        <label>Religion:
            <select id="filterReligion" onchange="filterStudents()">
                <option value="">All</option>
        @foreach ($religions as $religion)
            <option value="{{ $religion }}">{{ $religion }}</option>
        @endforeach
                
                <option value="Buddhism">Buddhism</option>
                <option value="Christianity">Christianity</option>
            </select>
        </label>

        <label>Passout Year:
            <select id="filterPassoutYear" onchange="filterStudents()">
                <option value="">All Year</option>
        @foreach ($passout_year as $passout)
            <option value="{{ $passout }}">{{ $passout }}</option>
        @endforeach
            </select>
        </label>

        <label>Grade:
            <select id="filterGrade" onchange="filterStudents()">
                <option value="">All Grade</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade }}">{{ $grade }}</option>
        @endforeach
            </select>
        </label>
    </div>
    <div class="box-30"></div>
    <!-- Column selection -->
     <p class="describe title-color">Select Your field for display</p>
     <div class="box-10"></div>
    <div class="ch-box-cont">
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="index_no" checked> Index No</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="student_fullname" checked> Full Name</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="email_address" checked> Email</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="permanent_address"> Permanent Address</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="residential_address"> Residential Address</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="date_of_birth"> Date of Birth</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="gs_no"> GS No</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="gs_division"> GS Division</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="religion"> Religion</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="grade"> Grade</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="height"> Height</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="weight"> Weight</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="BMI"> BMI</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="birth_certificate_no"> Birth Certificate No</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="father_fullname"> Father Full Name</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="mother_fullname"> Mother Full Name</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="passout_year"> Passout Year</label></div>
    <div class="ch-box-row"><label><input type="checkbox" class="column-toggle" value="actions" checked> Actions</label></div>
</div>

    <div class="box-30"></div>
    <!-- Student table -->
    <table>
    <p class="describe bg-color-red">Note: If you want to make a copy, make sure you uncheck the Actions field.</p>
        <thead>
            <tr>
                <th class="index_no">Index No</th>
                <th class="student_fullname">Full Name</th>
                <th class="email_address">Email</th>
                <th class="permanent_address hidden-toggle">Permanent Address</th>
                <th class="residential_address hidden-toggle">Residential Address</th>
                <th class="date_of_birth hidden-toggle">Date of Birth</th>
                <th class="gs_no hidden-toggle">GS No</th>
                <th class="gs_division hidden-toggle">GS Division</th>
                <th class="religion hidden-toggle">Religion</th>
                <th class="grade hidden-toggle">Grade</th>
                <th class="height hidden-toggle">Height</th>
                <th class="weight hidden-toggle">Weight</th>
                <th class="BMI hidden-toggle">BMI</th>
                <th class="birth_certificate_no hidden-toggle">Birth Certificate No</th>
                <th class="father_fullname hidden-toggle">Father Full Name</th>
                <th class="mother_fullname hidden-toggle">Mother Full Name</th>
                <th class="passout_year hidden-toggle">Passout Year</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody id="studentTable">
            @foreach ($students as $student)
                <tr>
                    <td class="index_no">{{ $student->index_no }}</td>
                    <td class="student_fullname">{{ $student->student_fullname }}</td>
                    <td class="email_address">{{ $student->user->email }}</td>
                    <td class="permanent_address hidden-toggle">{{ $student->permanent_address }}</td>
                    <td class="residential_address hidden-toggle">{{ $student->residential_address }}</td>
                    <td class="date_of_birth hidden-toggle">{{ $student->date_of_birth }}</td>
                    <td class="gs_no hidden-toggle">{{ $student->gs_no }}</td>
                    <td class="gs_division hidden-toggle">{{ $student->gs_division }}</td>
                    <td class="religion hidden-toggle">{{ $student->religion }}</td>
                    <td class="grade hidden-toggle">{{ $student->grade }}</td>
                    <td class="height hidden-toggle">{{ $student->height }}</td>
                    <td class="weight hidden-toggle">{{ $student->weight }}</td>
                    <td class="BMI hidden-toggle">{{ $student->BMI }}</td>
                    <td class="birth_certificate_no hidden-toggle">{{ $student->birth_certificate_no }}</td>
                    <td class="father_fullname hidden-toggle">{{ $student->father_fullname }}</td>
                    <td class="mother_fullname hidden-toggle">{{ $student->mother_fullname }}</td>
                    <td class="passout_year hidden-toggle">{{ $student->passout_year }}</td>
                    <td class="actions">
                        <a href="{{ route('students.show', $student->id) }}">View</a>
                        <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return openConfirmModal(event)">
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
        <p>Are you sure you want to delete this student?</p>
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
<!-- Pagination -->
<div class="pagination">
    @if ($currentPage > 1)
        <a href="{{ url()->current() }}?page={{ $currentPage - 1 }}" class="btn">Previous</a>
    @endif

    @for ($i = 1; $i <= $totalPages; $i++)
        <a href="{{ url()->current() }}?page={{ $i }}" class="btn {{ $currentPage == $i ? 'active' : '' }}">{{ $i }}</a>
    @endfor

    @if ($currentPage < $totalPages)
        <a href="{{ url()->current() }}?page={{ $currentPage + 1 }}" class="btn">Next</a>
    @endif
</div>
<script>
    // Column toggle functionality
    document.querySelectorAll('.column-toggle').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const columnClass = this.value;
            const columns = document.querySelectorAll('.' + columnClass);
            columns.forEach(function (col) {
                col.classList.toggle('hidden-toggle');
            });
        });
    });

    // Search functionality
    function filterStudents() {
        const search = document.getElementById('searchStudent').value.toLowerCase();
        const filterGsDivision = document.getElementById('filterGsDivision').value;
        const filterReligion = document.getElementById('filterReligion').value;
        const filterPassoutYear = document.getElementById('filterPassoutYear').value;
        const filterGrade = document.getElementById('filterGrade').value;

        const rows = document.querySelectorAll('#studentTable tr');
        rows.forEach(function (row) {
            const fullname = row.querySelector('.student_fullname').textContent.toLowerCase();
            const gsDivision = row.querySelector('.gs_division').textContent;
            const religion = row.querySelector('.religion').textContent;
            const passoutYear = row.querySelector('.passout_year').textContent;
            const grade = row.querySelector('.grade').textContent;

            let isVisible = fullname.includes(search);
            if (filterGsDivision && gsDivision !== filterGsDivision) isVisible = false;
            if (filterReligion && religion !== filterReligion) isVisible = false;
            if (filterPassoutYear && passoutYear !== filterPassoutYear) isVisible = false;
            if (filterGrade && grade !== filterGrade) isVisible = false;

            row.style.display = isVisible ? '' : 'none';
        });
    }
</script>

<style>
    .hidden-toggle {
        display: none;
    }
</style>
@endsection
