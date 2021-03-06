<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detail Gagal Panen</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{url('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{url('favicon.ico')}}" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="{{url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                    <a href="{{url('home')}}" class="site_title"><img src="{{asset('images/logo.png')}}" height="55" > <span>SiBunglon</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{url('images/img.png')}}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{Auth::user()->name}}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              @if(Auth::user()->id_role == 1)
              <div class="menu_section">
                <h3>Akun</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-sitemap"></i> Kelola Akun <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('akun/pengawas')}}">Akun Pengawas</a>
                        <li><a href="{{url('akun/pemimpin')}}">Akun Pemimpin</a>
                        </li>
                    </ul>
                  </li>   
                  <li><a href="{{url('hasilpanen')}}"><i class="fa fa-pencil"></i> Hasil Panen </a></li>                       
                </ul>
                <h3>Data</h3>
                <ul class="nav side-menu">     
                  <li><a href="{{url('greenhouse')}}"><i class="fa fa-home"></i> Greenhouse </a></li>     
                  <li><a href="{{url('jenismelon')}}"><i class="fa fa-lemon-o"></i> Jenis Melon </a></li>                       
                </ul> 
              </div>
              @endif
              @if( Auth::user()->id_role == 2)
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="{{url('pencatatan')}}"><i class="fa fa-edit"></i> Pencatatan </a></li>  
                  <li><a href="{{url('perawatan')}}"><i class="fa fa-calendar-check-o"></i> Perawatan </a></li>  
                </ul>
              </div>
              @endif
              @if( Auth::user()->id_role == 3)
              <div class="menu_section">
                <h3>Akun</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-sitemap"></i> Akun Pegawai<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('akun/admin')}}">Akun Administrator</a>
                        <li><a href="{{url('akun/pengawas')}}">Akun Pengawas</a>
                        </li>
                    </ul>
                  </li>
                </ul>
                <h3>Laporan</h3>
                <ul class="nav side-menu">
                    <li><a href="{{url('pencatatan')}}"><i class="fa fa-edit"></i> Pencatatan </a></li>                                       
                    <li><a href="{{url('hasilpanen')}}"><i class="fa fa-pencil"></i> Hasil Panen </a></li>                       
                </ul>
                <h3>Data</h3>
                <ul class="nav side-menu">     
                  <li><a href="{{url('greenhouse')}}"><i class="fa fa-home"></i> Greenhouse </a></li>     
                  <li><a href="{{url('jenismelon')}}"><i class="fa fa-lemon-o"></i> Jenis Melon </a></li>                       
                </ul>
              </div>
              @endif

            </div>
            <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> -->
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
            <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('images/img.png')}}" alt="">{{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('profil/'.Auth::user()->id)}}"> Profile</a>
                                    <a class="dropdown-item"  href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Detail Gagal Panen</h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Detail Gagal Panen 
                                    </h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" novalidate>
                                        <div class="field item form-group">
                                            <label class="col-md-3 col-sm-3  label-align">Id Pencatatan<span > : </span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <p>{{$data->id_dataperawatan}}</p>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-md-3 col-sm-3  label-align">No. Greenhouse<span > : </span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <p> {{$data->no_greenhouse}} </p></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-md-3 col-sm-3  label-align">Pengawas<span > : </span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <p>{{$data->name}}</p>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-md-3 col-sm-3  label-align">Tanggal Tanam<span > : </span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <p>{{$data->tanggal_tanam}}</p>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-md-3 col-sm-3  label-align">Tanggal pemberian pupuk<span > : </span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <p>{{$data->tanggal_pemberianpupuk}}</p>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-md-3 col-sm-3  label-align">Tanggal prediksi panen<span > : </span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <p>{{$data->prediksi_tanggalpanen}}</p>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-md-3 col-sm-3  label-align">Rekomendasi<span > : </span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <p>{{$keterangan->keterangan}}</p>
                                            </div>
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <a class="btn btn-info" href = "{{url('pencatatan')}}">Kembali</a>                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{url('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{url('vendors/nprogress/nprogress.js')}}"></script>
    <!-- validator -->
    <!-- <script src="vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="{{url('js/custom.min.js')}}"></script>

</body>

</html>
