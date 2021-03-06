<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{url('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{url('favicon.ico')}}" type="image/x-icon">

    <title>SiBunglon</title>
    <!-- Bootstrap -->
    <link href="{{url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{url('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('css/custom.min.css')}}" rel="stylesheet">
    
     @if(Route::current()->getName() == 'home')
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        
        <style>
        .highcharts-figure, .highcharts-data-table table {
          min-width: 310px; 
          max-width: 800px;
          margin: 1em auto;
        }
        
        .highcharts-data-table table {
        	font-family: Verdana, sans-serif;
        	border-collapse: collapse;
        	border: 1px solid #EBEBEB;
        	margin: 10px auto;
        	text-align: center;
        	width: 100%;
        	max-width: 500px;
        }
        .highcharts-data-table caption {
          padding: 1em 0;
          font-size: 1.2em;
          color: #555;
        }
        .highcharts-data-table th {
        	font-weight: 600;
          padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
          padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
          background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
          background: #f1f7ff;
        }
        </style>
     @endif
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
                <img src="{{asset('images/img.png')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
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
                      <a class="dropdown-item"  href="{{url('profil/'.Auth::user()->id)}}"> Profile</a>
                      <a class="dropdown-item"  href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->
        @yield('content')
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
   @if(Route::current()->getName() == 'perawatan')
   <script>
                $(document).ready(function () {
                $('.form-check-input').on('click', function () {
                    console.log('klik');
                let id = $(this).data('id');
                var form = $(this);
        
                $.ajax({
                type: 'GET',
                url: 'perawatan/' + id,
                success: function (response) {
                console.log(response);
                console.log(id);
                // $('#status'+id).empty();
                // $('#status'+id).text(response);
                $('#status'+id).fadeOut(800, function(){
                  $('#status'+id).text(response).fadeIn();
                        });
                }
            });
        });
    });
    </script>
   @endif

    <!-- FastClick -->
    <script src="{{url('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{url('vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{url('vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{url('vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- Flot -->
    <script src="{{url('vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{url('vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{url('vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{url('vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{url('vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{url('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{url('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{url('vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{url('vendors/DateJS/build/date.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{url('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{url('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{url('js/custom.min.js')}}"></script>

    <script>
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('menghapus Pencatatan No.Id ' + id)
        modal.find('#delete-form').attr('action', "{{url('pencatatan')}}/" +id)
      })
    </script>
  </body>
</html>