@extends('layouts.dash')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="">
        <h3>Kelola Akun Pencatatan</h3>
        <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                  @if(Auth::user()->id_role == 2)
                  <a class="btn btn-primary" href="{{url('inputpencatatan')}}">Tambah Pencatatan</a>
                  @endif
                    @if (session('status'))
                      <div class="alert alert-success alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        {{ session('status') }}
                      </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">ID. Pencatatan</th>
                            <th class="column-title">No. Greenhouse</th>
                            <th class="column-title">Pencatat</th>
                            <th class="column-title">Tanggal tanam</th>
                            <th class="column-title">Tanggal Pemupukan</th>
                            <th class="column-title">Tanggal Panen</th>
                            @if( Auth::user()->id_role == 2)
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            @endif
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($datapencatatan as $p)
                          @if($loop->iteration % 2 == 1)
                          <tr class="even pointer">
                            <td>{{ $p->id_dataperawatan }}</td>
                            <td class=" ">{{ $p->no_greenhouse }}</td>
                            <td class=" ">{{ $p->name }}</td>
                            <td class=" ">{{ $p->tanggal_tanam }}</td>
                            <td class=" ">{{ $p->tanggal_pemberianpupuk }}</td>
                            <td class=" ">{{ $p->prediksi_tanggalpanen }}</td>
                            @if( Auth::user()->id_role == 2)
                            <td class=" last">
                              <a href="{{url('editpencatatan/'.$p->id_dataperawatan)}}"><span class="badge badge-warning" style="font-size: 1em;">Ubah</span></a>
                              <!-- <a href="{{url('profil/'.$p->id_dataperawatan)}}"><span class="badge badge-danger" style="font-size: 1em;">Hapus</span></a> -->
                            </td>
                            @endif
                          </tr>
                          @else
                          <tr class="odd pointer">
                            <td>{{ $p->id_dataperawatan }}</td>
                            <td class=" ">{{ $p->no_greenhouse }}</td>
                            <td class=" ">{{ $p->name }}</td>
                            <td class=" ">{{ $p->tanggal_tanam }}</td>
                            <td class=" ">{{ $p->tanggal_pemberianpupuk }}</td>
                            <td class=" ">{{ $p->prediksi_tanggalpanen }}</td>
                            @if( Auth::user()->id_role == 2)
                            <td class=" last">
                              <a href="{{url('editpencatatan/'.$p->id_dataperawatan)}}"><span class="badge badge-warning" style="font-size: 1em;">Ubah</span></a>
                              <!-- <a href="{{url('profil/'.$p->id_dataperawatan)}}"><span class="badge badge-danger" style="font-size: 1em;">Hapus</span></a> -->
                            </td>           
                            @endif                 
                          </tr>
                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection
