@extends('layouts.dash')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="">
        <h3>Daftar Kegiatan Perawatan</h3>
        <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
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
                            <th class="column-title">ID. Perawatan</th>
                            <th class="column-title">ID. Pencatatan</th>
                            <th class="column-title">No. Greenhouse</th>
                            <th class="column-title">Jenis Melon</th>
                            <th class="column-title">Tanggal perawatan</th>
                            <th class="column-title">Perawatan</th>
                            <th class="column-title">Status</th>
                            <th class="column-title no-link last"><span class="nobr">Aksi</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($datapencatatan as $p)
                          @php
                            $count = DB::table('aksi_perawatan')
                            ->join('users', 'aksi_perawatan.id_perawat', '=', 'users.id')
                            ->join('detail_perawatan', 'aksi_perawatan.id_detail_perawatan', '=', 'detail_perawatan.id_detail_perawatan')
                            ->select('aksi_perawatan.*', 'users.name','detail_perawatan.*')
                            ->where('aksi_perawatan.id_detail_perawatan', $p->id_detail_perawatan)
                            ->count();
                          @endphp
                          
                          @if($loop->iteration % 2 == 1)
                          @if( Auth::user()->id_role == 2)
                          <tr class="even pointer">
                          @else
                          <tr class="even pointer" onclick="window.location='{{url('pencatatan/'.$p->id_dataperawatan)}}';" style="cursor: pointer;">
                          @endif
                            <td>{{ $p->id_detail_perawatan }}</td>
                            <td>{{ $p->id_dataperawatan }}</td>
                            <td class=" ">{{ $p->no_greenhouse }}</td>
                            <td class=" ">{{ $p->jenismelon }}</td>
                            <td class=" ">{{ $p->tanggal_perawatan }}</td>
                            <td class=" ">{{ $p->perawatan }}</td>
                            <td id="status{{ $p->id_detail_perawatan }}">{{ $p->status}}</td>
                            @if( Auth::user()->id_role == 2)
                            <td class=" last">
                              <!-- <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{$p->id_dataperawatan}}" class="text-decoration-none"><span class="badge badge-danger" style="font-size: 1em;">Hapus</span></a> -->
                              <div class="form-check">
                                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" data-id="{{$p->id_detail_perawatan}}" @if($count > 0) {{'checked'}} @endif>
                              </div>       
                            </td>       
                            @endif     
                          </tr>
                          @else
                          @if( Auth::user()->id_role == 2)
                          <tr class="odd pointer">
                          @else
                          <tr class="odd pointer" onclick="window.location='{{url('pencatatan/'.$p->id_dataperawatan)}}';" style="cursor: pointer;">
                          @endif
                            <td>{{ $p->id_detail_perawatan }}</td>                            
                            <td>{{ $p->id_dataperawatan }}</td>
                            <td class=" ">{{ $p->no_greenhouse }} </td>
                            <td class=" ">{{ $p->jenismelon }}</td>
                            <td class=" ">{{ $p->tanggal_perawatan }}</td>
                            <td class=" ">{{ $p->perawatan }}</td>
                            <td id="status{{ $p->id_detail_perawatan }}">{{ $p->status}}</td>
                            @if( Auth::user()->id_role == 2)
                            <td class=" last">
                              <!-- <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{$p->id_dataperawatan}}" class="text-decoration-none"><span class="badge badge-danger" style="font-size: 1em;">Hapus</span></a> -->
                              <div class="form-check">
                                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" data-id="{{$p->id_detail_perawatan}}" @if($count > 0) {{'checked'}} @endif >
                              </div>       
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="delete-form" action="" method="POST">
      @csrf
      @method('delete')
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin hapus?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
