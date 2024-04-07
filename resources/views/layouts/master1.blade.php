<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/jquerysteps/css/jquery.steps.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">

  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables/jquery.dataTables.css')}}">

  <link rel="stylesheet" href="{{asset('css/OverlayScrollbars.min.css') }} ">
 
  
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">


  @yield('css')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto"> 
    
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">  
        <a class="nav-link" data-toggle="dropdown" href="#">       
              <span>{{Auth::user()->name}}</span>
              <i class="fas fa-user"></i>
        </a>    
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">    
        <a href="{{ route('admin.profile') }}" class="dropdown-item">
          <i class="fa fa-user mr-2"></i> Mon Profil
        </a>
        <div class="dropdown-divider"></div>
        <a  href="{{ route('logout') }}" class="dropdown-item"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fa fa-envelope mr-2"></i> {{ __('Se deconnecter') }}
            
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </a>

      </div>
    </li>  
  </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{ asset('/images/logo.png') }}" alt="The Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <a href="/profile">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="{{ auth()->user()->photoperso ?? asset('/images/profile.png')  }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">

                  {{ Auth::user()->name }}
                  <span class="d-block text-muted">
                    {{ Ucfirst(Auth::user()->type) }}
                  </span>
              </div>
          </div>
        </a>

      <!-- Sidebar Menu -->
      @include('layouts.sidebar-menu')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  {{-- Content Wrapper. Contains page content --}}
  <div class="content-wrapper">
    {{-- Main content --}}

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">  
        
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('heading')</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
           @include('partials.breadcrumb')
          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
 
    <div class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-sm-12">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  {{ session()->get('success') }}  
                </div>
            @endif
            
          </div>
        </div>

        @yield('content')

      </div>
    </div>

    {{-- /.content --}}
  </div>
  {{-- /.content-wrapper --}}

  {{-- Main Footer --}}
  <footer class="main-footer">
    {{-- To the right --}}
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
    </div>
    {{-- Default to the left --}}
    <strong>Copyright &copy; 2019-2023 <a href="https://impulsiondigitale.net">Impulsion Digitale.net</a>.</strong> All rights reserved.
  </footer>
</div>
{{-- ./wrapper --}}

@auth
<script>
    window.user = @json(auth()->user())
</script>
@endauth
<script src="{{ mix('/js/app.js') }}"></script>

<script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/localization/messages_fr.min.js') }}"></script>
<script src="{{ asset('plugins/jquerysteps/js/jquery.steps.js') }}"></script>
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('js/select2/i18n/fr.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/locales/bootstrap-datepicker.fr.min.js') }}"></script>

<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

<script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('js/jquery.numeric.min.js') }}"></script>
<script src="{{ asset('plugins/Chart.min.js') }}"></script>

<script>
    window.App = {!! json_encode([
          'settings' => \setting()->all(),
          'anyOtherThings' => []
  ]); !!}
  //console.log(App.settings);
  $(".numeric").numeric();
  $(".integer").numeric(false, function () { console.log("Integers only"); this.value = ""; this.focus(); });
  $(".positive").numeric({ negative: false }, function () { console.log("No negative values"); this.value = ""; this.focus(); });
  $(".positiveinteger").numeric({ decimal: false, negative: false }, function () { console.log("Positive integers only"); this.value = ""; this.focus(); });
  $(".decimal").numeric({ decimal: "," });
  $(".decimal2places").numeric({ decimalPlaces: 2 });
  $(".altdecsepa").numeric({ altDecimal: "," });
  $(".altdecseparev").numeric({ altDecimal: ".", decimal: "," });
  
  @if(Session::has('message'))

    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }

  @endif

  ///*** ajaxError */
  $(document).ajaxError(function (event, jqxhr, settings, exception) {
      if (jqxhr.status === 401 || exception === 'Unauthorized') {    
          Swal({
              title: "Expiration de session !",
              text: "Désolé, votre session a expiré. Veuillez vous connecter pour continuer !",
              type: "error"
          }).then(function() {
              window.location.href = "{!! route('login') !!}";
          });
      } else {
        console.log(jqxhr, exception);
      }
  });

 ///*** DataTable */
 $.fn.dataTable.ext.errMode = function (settings, helpPage, message) {
      console.log(message);
  };
 
</script>

@stack('scripts')

</body>
</html>
