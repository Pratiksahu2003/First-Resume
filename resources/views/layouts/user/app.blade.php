
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.')}}" rel="stylesheet">
    <link href="{{ asset('front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{ asset('front/css/style.css')}}" rel="stylesheet">
</head>
@yield('css')
<body>
  @include('layouts.user.sidebar')

    @include('layouts.user.header')

    


  @yield('content')



  @include('layouts.user.footer')

    <!-- JavaScript Libraries -->
    <script src="{{asset('front/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('front/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('front/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('front/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Template Javascript -->
    <script src="{{asset('front/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</body>

</html>


@if(session('mes'))
<script>
  Swal.fire({
      icon: 'success',
      title: '{{ session('mes') }}',
      showConfirmButton: false,
      timer: 3500
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

<script>
  $(document).ready(function(){
  
    $('.pass_show').append('<span class="ptxt">Show</span>');  

    $('.notify').click(function (e) { 
      e.preventDefault();
      var dataId = $(this).data('id'); 
  
      $.ajax({
        url: "{{ route('notification.show', ['id' => '__id__']) }}".replace('__id__', dataId),
        type: "GET",
        success: function(response) {
          Swal.fire({
            title: response.title,
            text: response.body,
          });
        },
        error: function(xhr) {
          // Handle errors here
          console.log(xhr.responseText);
        }
      });

    });
  
  });


  $(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  
  </script>
@yield('scripts')
