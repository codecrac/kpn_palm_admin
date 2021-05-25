 <!DOCTYPE html>
    <html dir="ltr" lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords"
              content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
        <meta name="description"
              content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
        <meta name="robots" content="noindex,nofollow">
        <title>KPN PALM</title>
        <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/icone_palmier.png')}}">
        <!-- Custom CSS -->
        <link href="{{asset('template/plugins/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('template/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}">
        <!-- Custom CSS -->
        <link href="{{asset('template/css/style.min.css')}}" rel="stylesheet">


        <link href="{{asset('css/mon_style.css')}}" rel="stylesheet">
        <link href="{{asset('css/datatable.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/selectize.min.css')}}"/>

        @yield('style')
    </head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    @if(\Illuminate\Support\Facades\Auth::check())
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}"aria-expanded="false">
                                <i class="far fa-home" aria-hidden="true"></i>
                                <span class="hide-menu">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('nouveau_producteur')}}" aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Nouveau producteurs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('liste_producteurs')}}"
                               aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Liste des producteurs</span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('nouvelle_operation')}}"
                               aria-expanded="false">
                                <i class="fa fa-font" aria-hidden="true"></i>
                                <span class="hide-menu">Nouvelle operation</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('liste_operations')}}"
                               aria-expanded="false">
                                <i class="fa fa-font" aria-hidden="true"></i>
                                <span class="hide-menu">Liste des operations</span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('nouvelle_information')}}"
                               aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Nouvelle Information</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('liste_informations')}}"
                               aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Liste Informations</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('choisir_configuration_bilan')}}"
                               aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Bilan periodique</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
    @else
        @isset($no_menu)
        @else
            <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item pt-2">
                            <a style="border:1px solid gray " class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard',[$id_producteur])}}"aria-expanded="false">
                                <i class="far fa-home" aria-hidden="true"></i>
                                <span class="hide-menu">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a style="border:1px solid gray " class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('nouvelle_operation',[$id_producteur])}}"aria-expanded="false">
                                <i class="far fa-home" aria-hidden="true"></i>
                                <span class="hide-menu">Commencer une livraison</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a style="border:1px solid gray " class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{route('liste_informations',[$id_producteur])}}" aria-expanded="false">
                                <i class="far fa-home" aria-hidden="true"></i>
                                <span class="hide-menu">informations
                                    @isset($nb_info_non_lu) <i style="padding: 5px; background-color: #0c4128;color: #fff">  {{$nb_info_non_lu}} </i> @endisset
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-item pt-2">
                            <a style="border:1px solid gray " class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('welcome')}}"aria-expanded="false">
                                <i class="far fa-home" aria-hidden="true"></i>
                                <span class="hide-menu">Deconnexion</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        @endisset
    @endif

    <div class="page-wrapper">
        <x-app-layout>
            <x-slot name="header">
                @isset($id_producteur)
                <a href="{{route('dashboard',[$id_producteur])}}">
                @else
                    <a href="{{route('dashboard')}}">
                @endisset
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ "Tableau de bord" }}
                    </h2>
                </a>
            </x-slot>
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid p-4">
            @yield("content")
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        </x-app-layout>

        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center"> KPN VISA - TOUT DROITS RESERVES</footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
</div>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('template/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('template/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/js/app-style-switcher.js')}}"></script>
<script src="{{asset('template/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('template/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('template/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('template/js/custom.js')}}"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="{{asset('template/plugins/bower_components/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('template/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('template/js/pages/dashboards/dashboard1.js')}}"></script>


{{--<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>--}}
<script src="{{asset('js/datatable.min.js')}}"></script>
<script type="application/javascript">
    $( document ).ready(function() {
        fermer_tous_les_garde_fou();
        $('.datatable').DataTable();

        $('.searchable-select').selectize({
            sortField: 'text'
        });
    });
</script>
<script src="{{asset('js/selectize.min.js')}}"></script>
<script src="{{asset('js/mes_fonctions.js')}}"></script>

@yield('script')

</body>

</html>
