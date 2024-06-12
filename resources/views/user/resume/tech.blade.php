@extends('layouts.user.app')
@section('title')
    | {{' Technical Skill'}}
@endsection
@section('content')

<section class="container-fluid">
    <div class="container my-4 ">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#techModal" onclick="openTechModal()">
                    Add +
                </button>
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="card-header border-bottom bg-light p-2 my-2">
                            <p class="text-center h4 text-primary">Tech Skills</p>
                        </div>
                        
                        <table class="table table-bordered border-top" id='techSkills'>
                            <hr>
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Skill Name</th>
                                    <th scope="col">Proficiency Level</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($techSkills as $skill)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{skill(@$skill->skillName)}}</td>
                                    <td>{{@$skill->proficiencyLevel}}</td>
                                    <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#techModal" onclick="editTechModal({{ json_encode($skill) }})">Edit</button></td>
                                    <td>
                                        <form action="{{ route('resume.TechSkill.delete', $skill->id) }}" method="POST">
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

    <!-- The Modal -->
    <div class="modal fade" id="techModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="techModalTitle">Tech Skill Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="techForm" method="post" action="{{ route('resume.TechSkill.save') }}">
                        @csrf
                        <input type="hidden" id="techSkillId" name="techSkillId">
                        <div class="form-group mt-2">
                            <label for="skillName">Skill Name:</label>
                            <select class="form-control select-box" id="skillName" name="skillName" required>
                                <option value="" disabled selected>Select a Skill</option>
                                @foreach ($skills as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="proficiencyLevel">Proficiency Level:</label>
                            <input type="number" class="form-control" id="proficiencyLevel" name="proficiencyLevel" placeholder="Enter Proficiency Level" required max="10">
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
</section>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#techSkills').DataTable();

      
        $('#searchInput').on('input', function() {
                var searchText = $(this).val().toLowerCase();
                $('#skillName').find('option').each(function() {
                    var optionText = $(this).text().toLowerCase();
                    var match = optionText.includes(searchText);
                    $(this).toggle(match);
                });
            });

            // Function to clear selection and reset options
            $('#clearBtn').on('click', function() {
                $('#skillName').val('');
                $('#searchInput').val('');
                $('#skillName').find('option').show();
            });
    });

    function openTechModal() {
        resetTechForm();
        document.getElementById('techModalTitle').innerText = 'Add Tech Skill';
    }

    function editTechModal(skill) {
        document.getElementById('techModalTitle').innerText = 'Edit Tech Skill';
        document.getElementById('techSkillId').value = skill.id;
        document.getElementById('skillName').value = skill.skillName;
        document.getElementById('proficiencyLevel').value = skill.proficiencyLevel;
    }

    function resetTechForm() {
        document.getElementById('techForm').reset();
        document.getElementById('techSkillId').value = '';
    }
</script>
@endsection
