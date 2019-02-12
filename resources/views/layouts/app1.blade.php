<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/bootstrap.min.js') }}" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
  <link href="{{ asset('css/table.css') }}" rel="stylesheet">
  <link href="{{ asset('css/form.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome-free-5.7.1-web/css/all.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome-free-5.7.1-web/js/all.js') }}" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    {{--  --}}
    @yield('sidebar')
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
{{--
 --}}
        @yield('toggle')
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile') }}">Mi perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/logout') }}">Cerrar Sesión</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('jquery/jquery.min.js') }}" ></script>
  <script src="{{ asset('js/app.js') }}" ></script>



  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
