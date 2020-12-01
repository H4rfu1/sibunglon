@extends('layouts.dash')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="">
        <h3>Kelola Gagal Panen</h3>
        <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                  @if(Auth::user()->id_role == 2)
                  <a class="btn btn-primary" href="{{url('inputpencatatan')}}">Tambah Gagal Panen</a>
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
                            <th class="column-title">Pengawas</th>
                            <th class="column-title">Tanggal tanam</th>
                            @if( Auth::user()->id_role == 2)
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            @endif
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($datapencatatan as $p)
                          @if($loop->iteration % 2 == 1)
                          @if( Auth::user()->id_role == 2)
                          <tr class="even pointer">
                          @else
                          <tr class="even pointer" onclick="window.location='{{url('pencatatan/'.$p->id_dataperawatan)}}';" style="cursor: pointer;">
                          @endif
                            <td>{{ $p->id_dataperawatan }}</td>
                            <td class=" ">{{ $p->no_greenhouse }}</td>
                            <td class=" ">{{ $p->name }}</td>
                            <td class=" ">{{ $p->tanggal_tanam }}</td>
                            @if( Auth::user()->id_role == 2)
                            <td class=" last">
                              <!-- <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{$p->id_dataperawatan}}" class="text-decoration-none"><span class="badge badge-danger" style="font-size: 1em;">Hapus</span></a> -->
                              <a href="{{url('editpencatatan/'.$p->id_dataperawatan)}}"><span class="badge badge-warning" style="font-size: 1em;">Ubah</span></a>
                              <a href="{{url('pencatatan/'.$p->id_dataperawatan)}}"><span class="badge badge-info" style="font-size: 1em;">Detail</span></a>
                            </td>
                            @endif
                          </tr>
                          @else
                          @if( Auth::user()->id_role == 2)
                          <tr class="odd pointer">
                          @else
                          <tr class="odd pointer" onclick="window.location='{{url('pencatatan/'.$p->id_dataperawatan)}}';" style="cursor: pointer;">
                          @endif                            
                          <td>{{ $p->id_dataperawatan }}</td>
                            <td class=" ">{{ $p->no_greenhouse }}</td>
                            <td class=" ">{{ $p->name }}</td>
                            <td class=" ">{{ $p->tanggal_tanam }}</td>
                            @if( Auth::user()->id_role == 2)
                            <td class=" last">
                              <!-- <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{$p->id_dataperawatan}}" class="text-decoration-none"><span class="badge badge-danger" style="font-size: 1em;">Hapus</span></a> -->
                              <a href="{{url('editpencatatan/'.$p->id_dataperawatan)}}"><span class="badge badge-warning" style="font-size: 1em;">Ubah</span></a>
                              <a href="{{url('pencatatan/'.$p->id_dataperawatan)}}"><span class="badge badge-info" style="font-size: 1em;">Detail</span></a>           
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
