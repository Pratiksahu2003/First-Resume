@extends('layouts.user.app')
@section('title')
| {{ 'Profile Update'}}
    
@endsection


@section('content')
<br><br>
<div class="container bootdey">
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Upload a different photo...</h6>
                <form class="form-horizontal" role="form">
                    <input type="file" class="form-control">
                </form>
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissible">
                <i class="fa fa-coffee"></i>
                <strong>Edit Profile</strong>.
            </div>
            <h3>Personal info</h3>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">First name:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="dey-dey">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Last name:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="bootdey">
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Gender:</label>
                <div class="col-lg-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Email:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="janesemail@gmail.com">
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Bio:</label>
                <div class="col-lg-8">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-lg-8 offset-lg-3">
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
@endsection