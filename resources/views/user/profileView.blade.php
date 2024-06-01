@extends('layouts.user.app')

@section('title')
| {{ 'Profile'}}
    
@endsection


@section('content')
 <br>
 <section class="container-fluid">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="container emp-profile mt-5">
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <div class="profile-img mb-3">
                                            @if(Auth::check())
                                                <img src="{{ asset('front/img/' . Auth::user()->profile) }}" alt="Profile Picture" class="img-fluid rounded-circle"/>
                                                <h4 class="text-center text-primary m-1">{{ Auth::user()->name }}</h4>
                                            @else
                                                <img src="{{ asset('front/img/default-profile.png') }}" alt="Default Profile" class="img-fluid rounded-circle"/>
                                            @endif
                                        </div>
                                        <a href="{{ route('profile.index') }}" class="btn btn-primary mt-3">Edit Profile</a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="profile-head mb-4">
                                           
                                            <h6 class="text-muted">
                                                @if(Auth::check())
                                                    {{ Auth::user()->bio }}
                                                @else
                                                    Welcome to the profile page
                                                @endif
                                            </h6>
                                        </div>
                                        <div class="tab-content profile-tab border border-dotted p-5" id="myTabContent" style="border-radius: 25px;">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <strong>User Id</strong>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>@if(Auth::check()) {{ Auth::user()->username }} @else N/A @endif</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <strong>Name</strong>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>@if(Auth::check()) {{ Auth::user()->name }} @else N/A @endif</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <strong>Email</strong>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>@if(Auth::check()) {{ Auth::user()->email }} @else N/A @endif</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <strong>Phone</strong>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>@if(Auth::check()) {{ Auth::user()->m_no }} @else N/A @endif</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <strong>Gender</strong>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>@if(Auth::check()) {{ Auth::user()->gender }} @else N/A @endif</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
