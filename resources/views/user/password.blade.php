@extends('layouts.user.app')
@section('title')
| {{ 'Profile Update'}}
    
@endsection


@section('content')<section class="container-fluid">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="card-header border-bottom bg-light p-2">
                            <p class="text-center h4 text-primary">Password Reset    </p>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <div class="col-sm-4">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 text-center">
                                        <label for="currentPassword" class="form-label">Current Password</label>
                                        <div class="input-group">
                                            <input type="password" id="currentPassword" class="form-control" name="currentPassword" placeholder="Current Password" value="">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('currentPassword', this)">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <label for="newPassword" class="form-label">New Password</label>
                                        <div class="input-group">
                                            <input type="password" id="newPassword" class="form-control" name="newPassword" placeholder="New Password" value="">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('newPassword', this)">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" placeholder="Confirm Password" value="">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('confirmPassword', this)">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>  
                        </div>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<hr>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script>
    function togglePassword(id, button) {
        var passwordField = document.getElementById(id);
        var icon = button.querySelector('i');
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection