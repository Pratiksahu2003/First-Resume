@extends('layouts.user.app')
@section('title')
{{'Education Details'}}

@endsection
@section('content')
<section class="container-fluid">
    <div class="container my-4 vh-100">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal">
                    Add +
                </button>
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="card-header border-bottom bg-light p-2 my-2">
                            <p class="text-center h4 text-primary">Education Details</p>
                        </div>
                        
                        <table class="table table-bordered border-top" id='educationDetails'>
                            <hr>
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">College | School Name</th>
                                    <th scope="col">Passing Year</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Percentage | CGPA | SGPA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i =1;
                                @endphp
                                @foreach ($edu as $item)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{@$item->courseName}}</td>
                                    <td>{{@$item->collegeName}}</td>
                                    <td>{{@$item->passingYear}}</td>
                                    <td>{{@$item->startDate}}</td>
                                    <td>{{@$item->percentage}}</td>
                                </tr>
                                @php
                                $i +=1;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
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
                    <h4 class="modal-title">Education Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="courseForm" method="post" action="{{route('resume.Education.save')}}">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="courseName">Course Name:</label>
                            <input type="text" class="form-control" id="courseName" name='courseName' placeholder="Enter Course Name" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="collegeName">College | School Name:</label>
                            <input type="text" class="form-control" id="collegeName" name='collegeName' placeholder="Enter College or School Name" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="passingYear">Passing Year:</label>
                            <input type="Date" class="form-control" id="passingYear" name='passingYear' placeholder="Enter Passing Year" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="startDate">Start Date:</label>
                            <input type="date" class="form-control" id="startDate" name='startDate' required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="percentage">Percentage | CGPA | SGPA:</label>
                            <input type="number" class="form-control" id="percentage" name='percentage' placeholder="Enter Percentage, CGPA, or SGPA" required max='100'>
                        </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('courseForm').reset();">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

            
@if ($errors->any())
<div class="alert alert-danger ">
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
</script>
@endsection