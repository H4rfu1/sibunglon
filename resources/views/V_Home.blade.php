@extends('layouts.dash')

@section('content')
<!-- page content -->
        <div class="right_col" role="main">
            <h3>Selamat Datang <small> <br>
        @if(Auth::user()->id_role == 1)
        {{'Administrator'}}
        {{ Auth::user()->name }}
        @endif
        @if(Auth::user()->id_role == 2)
        {{'Pengawas'}}
        {{ Auth::user()->name }}
        @endif
        @if(Auth::user()->id_role == 3)
        {{'Pemimpin'}}
        {{ Auth::user()->name }}
        @endif
        </small></h3>
          
          <!-- top tiles -->
          <div class="row">
          <div class="tile_count ">
            <div class=" col-lg-4  tile_stats_count">
              <p class="count_top"><i class="fa fa-user"></i> Total Users</p>
              <div class="count">{{$count}}</div>
            </div>
            <div class="col-lg-4  tile_stats_count">
              <p class="count_top"><i class="fa fa-clock-o"></i> Pencatatan</p>
              <div class="count">{{$catat}}</div>
            </div>
            <div class="col-lg-4  tile_stats_count">
              <p class="count_top"><i class="fa fa-pencil"></i> Hasil Panen</p>
              <div class="count green" style="white-space: normal;"><p style="overflow: visible;">{{$hasil}} Kg</p></div>
            </div>
          </div>
          <div class=" col-lg-12">
             <figure class="highcharts-figure">
                <div id="container"></div>
             </figure>
          </div>
        </div>
          <!-- /top tiles -->
          <br />
            </div>
          </div>
        </div>
        <!-- /page content -->

<script>
    
    Highcharts.chart('container', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'Hasil Panen'
      },
      subtitle: {
        text: 'Source: SiBunglon'
      },
      xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
          'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      },
      yAxis: {
        title: {
          text: 'Berat(Kg)'
        },
        labels: {
          formatter: function () {
            return this.value;
          }
        }
      },
      tooltip: {
        crosshairs: true,
        shared: true
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: [
      {
        name: 'Melon',
        marker: {
          symbol: null
        },
        data: [{
          y: {{$jan}},
          marker: {
            symbol: 'url()'
          }
        }, {{$feb}}, {{$mar}}, {{$apr}}, {{$may}}, {{$jun}}, {{$jul}}, {{$aug}}, {{$sep}}, {{$nov}}, {{$okt}}, {{$des}}]
      },
      
      ]
    });
    </script>

<!-- /page content -->
@endsection
