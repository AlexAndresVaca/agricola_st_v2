<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('name-page') | Santa Teresita</title>

    <!-- Bootstrap -->
    <!-- <link href="{{asset('/resources/bootstrapV4.5/css/bootstrap.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset('/resources/bootstrapV4.5/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('/resources/fontawesome/css/all.css')}}" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <!-- SB ADMIN 2  -->
    <link href="{{asset('/resources/sb-admin-2/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- CSS PROPIO -->
    <link href="{{asset('/resources/sb-admin-2/css/_plantilla.css')}}" rel="stylesheet">
    <link href="{{asset('/resources/css/custom.css')}}" rel="stylesheet">
    <!-- CSS TABLAS -->
    <link href="{{asset('resources/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- SLOT CSS -->
    @yield('css')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-panel-izq sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
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
            <li class="nav-item @yield('reports-item')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-chart-line"></i>
                    <span>Documentos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Seleccione:</h6> -->
                        <a class="collapse-item" href="{{route('reporte_kardex')}}">Método Kardex</a>
                        <!-- <a class="collapse-item" href="cards.html">Mensual</a> -->
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Negociantes
            </div>
            <li class="nav-item @yield('dealer-item')">
                <a class="nav-link" href="{{route('negociantes')}}">
                    <i class="fas fa-people-arrows"></i>
                    <span>Proveedores / Clientes</span></a>
            </li>
            <hr class="sidebar-divider">
            <!-- Titulo - Transaccion -->
            <div class="sidebar-heading">
                Transacciones
            </div>
            <li class="nav-item @yield('production-item')">
                <a class="nav-link" href="{{route('produccion')}}">
                    <i class="fas fa-people-carry"></i>
                    <span>Producciones</span></a>
            </li>
            <li class="nav-item @yield('purchase-item')">
                <a class="nav-link" href="{{route('compra')}}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Compras</span></a>
            </li>
            <li class="nav-item @yield('sail-item')">
                <a class="nav-link" href="{{route('venta')}}">
                    <i class="fas fa-cash-register"></i>
                    <span>Ventas</span></a>
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
                    <button id="sidebarToggleTop" class="btn btn-circle d-md-none mr-3 bg-gradient-danger">
                        <i class="fa fa-bars text-white"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-100 small font-weight-bold text-capitalize">{{session('nombre_usuario_activo')}}
                                    {{session('apellido_usuario_activo')}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('resources/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('perfil_usuario')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mi perfil
                                </a>
                                <!-- En caso de ser administrador -->
                                @if(session('cargo_usuario_activo')=='Administrador')
                                <a class="dropdown-item" href="{{route('usuarios')}}">
                                    <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Gestión de usuarios
                                </a>
                                @endif
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
                    <form action="{{route('logout')}}" method="POST">@CSRF
                        <button class="btn btn-danger" type="submit">Cerrar Sesión</button>
                    </form>
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
    <!-- DATATABLES -->
    <!-- Page level plugins -->
    <script src="{{asset('resources/sb-admin-2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('resources/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('resources/sb-admin-2/js/demo/datatables-demo.js')}}"></script>

    <!-- Page level custom scripts -->

    <!-- Comprueba si es movil o pc para mostrar u ocultar el menu -->
    <script>
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        // estamos desde un movil o tablet
        $("#accordionSidebar").addClass("toggled");
    }
    </script>
    <!-- SLOT MODALES -->
    @yield('modal')
    <!-- SLOT JS -->
    @yield('js')
</body>

</html>