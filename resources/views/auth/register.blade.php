@extends('layouts.app')

@section('content')
<div class="container-xxl position-relative bg-white d-flex p-0">
  

    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="{{url('')}}" class="">
                            <h6 class="text-primary"><i class="fa fa-hashtag me-2"></i>FIRST RESUME</h6>
                        </a>
                        <h6>Sign Up</h6>
                    </div>
                    <form action="{{url('submit')}}" method="post" id="form">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" placeholder="Full Name" name="name" required>
                            <label for="floatingText">Full Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floatingInput" placeholder="Mobile No" name="m_no" required>
                            <label for="floatingInput">Mobile Number</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password" name="password_confirmation" required>
                            <label for="floatingPasswordConfirm">Confirm Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="{{url('login')}}">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
</div>
@endsection
@section('scripts')

<script>
    $(document).ready(function () {
        $("#form").submit(function (event) {
            event.preventDefault();

            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{ url('submit') }}",
                data: formData,
                dataType: "json", // Expect JSON response
                success: function (response) {
                    try {
                        if (response.status === 'success') {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 4500
                            });
                            $("#form")[0].reset(); // Reset the form
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: response.message,
                            });
                        }
                    } catch (error) {
                        console.error('Error handling success response', error);
                    }
                },
                error: function (error) {
                    try {
                        if (error.responseJSON && error.responseJSON.errors) {
                            // Display validation errors using SweetAlert
                            var errors = error.responseJSON.errors;
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops...",
                                        text: errors[key][0],
                                    });
                                }
                            }
                        } else {
                            alert('Error submitting form');
                        }
                    } catch (error) {
                        console.error('Error handling error response', error);
                    }
                }
            });
        });
    });
</script>
@endsection
