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
                <a href="{{url('home')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>KYC</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="button.html" class="dropdown-item">Buttons</a>
                        <a href="typography.html" class="dropdown-item">Typography</a>
                        <a href="element.html" class="dropdown-item">Other Elements</a>
                    </div>
                </div> --}}
                <a href="{{url('/user/kyc')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>KYC</a>
                {{-- <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="signin.html" class="dropdown-item">Sign In</a>
                        <a href="signup.html" class="dropdown-item">Sign Up</a>
                        <a href="404.html" class="dropdown-item">404 Error</a>
                        <a href="blank.html" class="dropdown-item">Blank Page</a>
                    </div>
                </div> --}}
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->