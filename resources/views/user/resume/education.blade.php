@extends('layouts.user.app')
@section('title')
{{'Education Details'}}

@endsection
@section('content')
<section class="container-fluid">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal" onclick="openModal()">
                    Add +
                </button>
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="card-header border-bottom bg-light p-2 my-2">
                            <p class="text-center h4 text-primary">Education Details</p>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered border-top" id="educationDetails">
                                <hr>
                                <thead>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Course Name</th>
                                        <th scope="col">College | School Name</th>
                                        <th scope="col">Passing Year</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Percentage | CGPA | SGPA</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($edu as $item)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ @$item->courseName }}</td>
                                        <td>{{ @$item->collegeName }}</td>
                                        <td>{{ @$item->passingYear }}</td>
                                        <td>{{ @$item->startDate }}</td>
                                        <td>{{ @$item->percentage }}</td>
                                        <td>
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal" onclick="editModal({{ json_encode($item) }})">Edit</button>
                                        </td>
                                        <td>
                                            <form action="{{ route('resume.Education.delete', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                    $i += 1;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle">Education Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="courseForm" method="post" action="{{ route('resume.Education.save') }}">
                        @csrf
                        <input type="hidden" id="educationId" name="educationId">
                        <div class="form-group mt-2">
                            <label for="courseName">Course Name:</label>
                            <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Enter Course Name" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="collegeName">College | School Name:</label>
                            <input type="text" class="form-control" id="collegeName" name="collegeName" placeholder="Enter College or School Name" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="passingYear">Passing Year:</label>
                            <input type="date" class="form-control" id="passingYear" name="passingYear" placeholder="Enter Passing Year" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="startDate">Start Date:</label>
                            <input type="date" class="form-control" id="startDate" name="startDate" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="percentage">Percentage | CGPA | SGPA:</label>
                            <input type="number" class="form-control" id="percentage" name="percentage" placeholder="Enter Percentage, CGPA, or SGPA" required max="100">
                        </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    </div>
</section>




@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#educationDetails').DataTable();
    });

    $('#percentage').on('blur', function() {
        // Get the value of the percentage input
        var percentage = $(this).val();

        // Check if the percentage is more than 100
        if (percentage > 100) {
            // Show an alert
            alert('Percentage cannot be more than 100');
            
            // Clear the input field or reset it to a valid value
            $(this).val(null);
        }
    });


    
function openModal() {
    resetForm();
    document.getElementById('modalTitle').innerText = 'Add Education Details';
    document.getElementById('courseForm').action = "{{route('resume.Education.save')}}";
}

function editModal(item) {
    document.getElementById('modalTitle').innerText = 'Edit Education Details';
    document.getElementById('courseForm').action = "{{route('resume.Education.update')}}";
    document.getElementById('educationId').value = item.id;
    document.getElementById('courseName').value = item.courseName;
    document.getElementById('collegeName').value = item.collegeName;
    document.getElementById('passingYear').value = item.passingYear;
    document.getElementById('startDate').value = item.startDate;
    document.getElementById('percentage').value = item.percentage;
}

function resetForm() {
    document.getElementById('courseForm').reset();
    document.getElementById('educationId').value = '';
}
</script>


</script>
@endsection