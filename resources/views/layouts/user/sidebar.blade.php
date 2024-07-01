<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>First Resume</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                
                <div class="ms-3">
                    <h6 class="mb-0 text-capitalize ">{{@Auth::user()->name}}</h6>
                    
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="{{url('home')}}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
               
                <a href="{{url('/user/kyc')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>KYC</a>

          
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i> Resume </a>
                    <div class="dropdown-menu bg-transparent border-0">
                <a href="{{ route('resume.personal')}}" class="nav-item nav-link">Personal details</a>
                <a href="{{ route('resume.Education')}}" class="nav-item nav-link">Education details</a>
                <a href="{{ route('resume.tech')}}" class="nav-item nav-link">Technical Skills</a>
                <a href="{{ route('resume.experience')}}" class="nav-item nav-link">Experience</a>
                <a href="{{ route('resume.personal.show')}}" class="nav-item nav-link">Objective</a>

                     
            </div>
         
            
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Setting</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('/user/View-profile')  }}" class="dropdown-item">My Profile</a>
                    <a href="{{route('profile.setting')}}" class="dropdown-item">Password Reset</a>
                    <a href="{{url('logout')}}" class="dropdown-item">Log Out</a>
                </div>
            </div>
            <a href="{{ route('resume.user', ['id' => auth()->user()->username ]) }}" class="nav-item nav-link">
                <i class="fa fa-th me-2"></i>View User Resume
            </a>
                </div> 
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->