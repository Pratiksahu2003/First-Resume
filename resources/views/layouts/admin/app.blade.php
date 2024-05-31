<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> 
@yield('title')
 </title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.min.css')}}" />
</head>
@yield('css')

<body>
  @include('layouts.admin.sidebar')

    @include('layouts.admin.header')

    


  @yield('content')



  @include('layouts.admin.footer')


  <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('admin/assets/js/sidebarmenu.js')}}"></script>
  <script src="{{ asset('admin/assets/js/app.min.js')}}"></script>
  <script src="{{ asset('admin/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{ asset('admin/assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{ asset('admin/assets/js/dashboard.js')}}"></script>
</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('mes'))
<script>
  Swal.fire({
      icon: 'success',
      title: '{{ session('mes') }}',
      showConfirmButton: false,
      timer: 2000
  });
</script>

@endif

  @if(session('del'))
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '{{ session('del') }}'
      });
  </script>
@endif


@yield('scripts')
