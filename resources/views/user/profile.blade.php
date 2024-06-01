@extends('layouts.user.app')
@section('title')
| {{ 'Profile Update'}}
    
@endsection


@section('content')
<br><br>
<section class="container-fluid">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="container bootdey">
                            <hr>
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <img src="{{ asset('front/img/' . Auth::user()->profile) }}" class="avatar img-circle img-thumbnail" alt="avatar">
                                        <h6>Upload photo...</h6>
                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('profile.edit') }}">
                                            @csrf
                                            <input type="file" class="form-control" name="profile_photo" value="{{ asset('front/img/' . Auth::user()->profile) }}">
                                    </div>
                                </div>
                                <!-- edit form column -->
                                <div class="col-md-9 personal-info">
                                    <div class="alert alert-info alert-dismissible">
                                        <i class="fa fa-coffee"></i>
                                        <strong>Edit Profile</strong>
                                    </div>
                                    <h3>Personal info</h3>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Name:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Mobile no:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="number" name="m_no" value="{{Auth::user()->m_no}}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Gender:</label>
                                        <div class="col-lg-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" 
                                                    {{ Auth::user()->gender == 'Male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" 
                                                    {{ Auth::user()->gender == 'Female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Bio:</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" name="bio" rows="3">{{Auth::user()->bio }}</textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-lg-8 offset-lg-3">
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if ($errors->any())
                        <div>
                            <ul>
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