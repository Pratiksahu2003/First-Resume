<div class="content">


<!-- Navbar Start -->
 <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    
    <div class="navbar-nav align-items-center ms-auto">
       
        <div class="nav-item dropdown">
            <a href="#" class="nav-link " data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
        @if(!notify(Auth::user()->id) ==0)

    <span class="position-absolute left start-100 translate-middle badge rounded-pill bg-danger">

        {{@notify(Auth::user()->id)}}
        <span class="visually-hidden">unread Notifications</span>
    </span>
    @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0" style="max-height: 200px; overflow-y: auto;">
                @foreach (getnotify(Auth::user()->id) as $item)
                <a href="" class="dropdown-item notify" data-id="{{$item->id}}">
                    <h6 class="fw-normal mb-0">{{$item->title}}</h6>
                    <small>{{@gettime($item->created_at)}} (
                        <b>
                            @if($item->read == 1)
                            Read
                            @else
                            unread
                            @endif
                        </b>
                        )
                    </small>
                </a>
                <hr class="dropdown-divider">
                @endforeach
            </div>
            
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{asset('front/img/')}}/{{Auth::user()->profile}}" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex text-capitalize ">{{@Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                 <a href="{{route('profile.index')}}" class="dropdown-item">My Profile</a>
                <a href="{{route('profile.index')}}" class="dropdown-item">Settings</a>
                <a href="{{url('logout')}}" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>


