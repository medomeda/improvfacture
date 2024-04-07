<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ config('app.name', 'AdminLTE 3') }} | @yield('title', 'Application title')
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css?v=3.2.0') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    @yield('css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div> --}}

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="{{ asset('adminlte/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="{{ asset('adminlte/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="{{ asset('adminlte/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true"
                        href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('admin.index')}}" class="nav-link {{ setActiveMenu(['admin.index'])}}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Tableau de bord</p>
                            </a>
                          </li>   
                                  

                        <li class="nav-item has-treeview {{ setOpenMenu(['admin.roles*', 'admin.permissions*', 'admin.users*']) }}">
                            <a href="#"
                                class="nav-link {{ setActiveMenu(['admin.roles*', 'admin.permissions*', 'admin.users*']) }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Comptes
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ setActiveMenu(['admin.roles*']) }}">
                                        <i class="fas fa-user-secret nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="nav-link {{ setActiveMenu(['admin.permissions*']) }}">
                                        <i class="fas fa-users-cog nav-icon"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ setActiveMenu(['admin.users*']) }}">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                
                            </ul>
                        </li>
                
                        <li class="nav-item has-treeview {{ setOpenMenu(['admin.articles*']) }}">
                            <a href="#"
                                class="nav-link {{ setActiveMenu(['admin.articles*']) }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Articles
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ setActiveMenu(['admin.categories*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.articles.index') }}" class="nav-link {{ setActiveMenu(['admin.articles*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Articles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ setOpenMenu(['admin.tiers*']) }}">
                            <a href="#"
                                class="nav-link {{ setActiveMenu(['admin.tiers*']) }}">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Tiers
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.tiers.index') }}" class="nav-link {{ setActiveMenu(['admin.tiers*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Clients</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.articles.index') }}" class="nav-link {{ setActiveMenu(['admin.articles*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fournisseurs</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview {{ setOpenMenu(['admin.reports*']) }}">
                            <a href="#"
                                class="nav-link {{ setActiveMenu(['admin.reports*']) }}">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>
                                    Etats/Statistiques
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                    <a class="nav-link {{ setActiveMenu(['admin.reports*']) }}"
                                        href="{{ route('admin.reports.index') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rapports</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ setActiveMenu(['admin.attachments*']) }}"
                                        href="{{ route('admin.attachments.index') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tableaux croisés</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                      
                        <li class="nav-item has-treeview {{ setOpenMenu(['admin.attachments*', 'admin.settings*', 'admin.audits*']) }}">
                            <a href="#"
                                class="nav-link {{ setActiveMenu(['admin.settings.tables','admin.attachments*', 'admin.settings*', 'admin.audits*']) }}">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>
                                    Administration
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link {{ setActiveMenu(['admin.settings.index']) }}"
                                        href="{{ route('admin.settings.index') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Paramètres</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ setActiveMenu(['admin.settings.tables']) }}"
                                        href="{{ route('admin.settings.tables') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tables</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ setActiveMenu(['admin.attachments*']) }}"
                                        href="{{ route('admin.attachments.index') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fichiers</p>
                                    </a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link {{ setActiveMenu(['admin.audits*']) }}"
                                        href="{{ route('admin.audits.index') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Audits</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

        </aside>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
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
            </section>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark"></aside>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.numeric.min.js') }}"></script>
    <script>
        //$.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/select2/js/i18n/fr.js') }}"></script>

    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>

    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.js?v=3.2.0') }}"></script>

    <script src="{{ asset('js/tools.js') }}"></script>

    <script>
        
        window.App = {!! json_encode(['settings' => \setting()->all(),'anyOtherThings' => [],]) !!}

        //console.log(App.settings);
        
        $(".numeric").numeric();
        $(".integer").numeric(false, function () { console.log("Integers only"); this.value = ""; this.focus(); });
        $(".positive").numeric({ negative: false }, function () { console.log("No negative values"); this.value = ""; this.focus(); });
        $(".positiveinteger").numeric({ decimal: false, negative: false }, function () { console.log("Positive integers only"); this.value = ""; this.focus(); });
        $(".decimal").numeric({ decimal: "," });
        $(".decimal2places").numeric({ decimalPlaces: 2 });
        $(".altdecsepa").numeric({ altDecimal: "," });
        $(".altdecseparev").numeric({ altDecimal: ".", decimal: "," });

        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
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
        $(document).ajaxError(function(event, jqxhr, settings, exception) {
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
        $.fn.dataTable.ext.errMode = function(settings, helpPage, message) {
            console.log(message);
        };

        

    </script>

    @stack('scripts')

</body>

</html>
