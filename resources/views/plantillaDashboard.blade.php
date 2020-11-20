<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('name-page') | Santa Teresita</title>

    <!-- Bootstrap -->
    <!-- <link href="{{asset('/resources/bootstrapV4.5/css/bootstrap.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset('/resources/bootstrapV4.5/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <!-- Styles -->
    <!-- <link href="" rel="stylesheet"> -->
    <!-- SB ADMIN 2  -->
    <link href="{{asset('/resources/sb-admin-2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet"
        type="text/css">
    <link href="{{asset('/resources/sb-admin-2/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- CSS PROPIO -->
    <link href="{{asset('/resources/sb-admin-2/css/_plantilla.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-panel-izq sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-mountain"></i>
                </div>
                <div class="sidebar-brand-text mx-1">Santa Teresita</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @yield('home-item')">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Titulo - Inventario -->
            <div class="sidebar-heading">
                Inventario
            </div>
            <li class="nav-item @yield('products-item')">
                <a class="nav-link" href="{{route('productos')}}">
                    <i class="fas fa-box-open rotate-n-15"></i>
                    <span>Productos</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Estadístico
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item @yield('reports-item')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-chart-line"></i>
                    <span>Reportes</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tipo de reportes:</h6>
                        <a class="collapse-item" href="buttons.html">Diario</a>
                        <a class="collapse-item" href="cards.html">Mensual</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Titulo - Transaccion -->
            <div class="sidebar-heading">
                Transacción
            </div>
            <li class="nav-item @yield('production-item')">
                <a class="nav-link" href="">
                    <i class="fas fa-people-carry"></i>
                    <span>Producción</span></a>
            </li>
            <li class="nav-item @yield('purchase-item')">
                <a class="nav-link" href="">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Compra</span></a>
            </li>
            <li class="nav-item @yield('sail-item')">
                <a class="nav-link" href="">
                    <i class="fas fa-cash-register"></i>
                    <span>Venta</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Personas
            </div>
            <li class="nav-item @yield('dealer-item')">
                <a class="nav-link" href="{{route('negociantes')}}">
                    <i class="fas fa-people-arrows"></i>
                    <span>Negociantes</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-black-a topbar static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars text-danger"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-100 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="{{asset('resources/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <!-- En caso de ser administrador -->
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Usuarios
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                @yield('breadcrumb')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('body')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Santa Teresita 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseas salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Cerrar Sesión" si deseas salir al menu principal.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{route('index')}}">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('resources/sb-admin-2/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('resources/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('resources/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('resources/sb-admin-2/js/sb-admin-2.min.js')}}"></script>

</body>

</html>