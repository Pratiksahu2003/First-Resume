@extends('layouts.user.app')

@section('title', '| Experience')

@section('content')

<section class="container-fluid">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#techModal" onclick="openTechModal()">
                    Add +
                </button>
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="card-header border-bottom bg-light p-2 my-2">
                            <p class="text-center h4 text-primary">Experience</p>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered border-top" id="techSkills">
                                <thead>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Joining Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($experiences as $skill)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $skill->companyName }}</td>
                                        <td>{{ $skill->joiningDate }}</td>
                                        <td>{{ $skill->endDate }}</td>
                                        <td>{{ $skill->position }}</td>
                                        <td>{{ $skill->description }}</td>
                                        <td>
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#techModal" onclick="editTechModal({{ json_encode($skill) }})">Edit</button>
                                        </td>
                                        <td>
                                            <form action="{{ route('resume.Experiance.delete', $skill->id) }}" method="POST">
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
</section>


<!-- The Modal -->
<div class="modal fade" id="techModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="techModalTitle">Experiences</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="techForm" method="post" action="{{ route('resume.Experiance.save') }}">
                    @csrf
                    <input type="hidden" id="techSkillId" name="techSkillId">
                    <div class="form-group mt-2">
                        <label for="companyName">Company Name:</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Enter Company Name" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="joiningDate">Joining Date:</label>
                        <input type="date" class="form-control" id="joiningDate" name="joiningDate" required>
                    </div>
                    <div class="form-group mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="workHere" id="workHereYes" value="yes">
                            <label class="form-check-label" for="workHereYes">
                                I currently work here
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-2" id="endDateField">
                        <label for="endDate">End Date:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate">
                    </div>
                    <div class="form-group mt-2">
                        <label for="position">Position:</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary" onclick="resetTechForm()">Reset</button>
            </div>
        </div>
    </div>
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

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#techSkills').DataTable();

        $('#techForm').submit(function() {
            var isWorkingHere = ($('#workHereYes').prop('checked'));
            if (isWorkingHere) {
                $('#endDate').removeAttr('name'); // Remove name attribute if working here
            }
        });

        $('#workHereYes').on('click', function() {
            var isCheckedNow = $(this).prop('checked');
            if (isCheckedNow) {
                $('#endDateField').hide();
            } else {
                $('#endDateField').show();
            }
        });
    });

        function openTechModal() {
            resetTechForm();
            $('#techModalTitle').text('Add Experience');
        }

        function editTechModal(skill) {
            $('#techModalTitle').text('Edit Experience');
            $('#techSkillId').val(skill.id);
            $('#companyName').val(skill.companyName);
            $('#joiningDate').val(skill.joiningDate);
            $('#endDate').val(skill.endDate);
            $('#position').val(skill.position);
            $('#description').val(skill.description);
            
            if (skill.endDate === null || skill.endDate === '') {
                $('#workHereYes').prop('checked', true);
                $('#endDateField').hide();
            } else {
                $('#workHereYes').prop('checked', false);
                $('#endDateField').show();
            }
        }

        function resetTechForm() {
            $('#techForm')[0].reset();
            $('#techSkillId').val('');
            $('#endDate').attr('name', 'endDate'); // Restore name attribute
            $('#workHereYes').prop('checked', false);
            $('#endDateField').show();
        }
</script>
@endsection
