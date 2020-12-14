@extends('layouts.dashinput')

@section('judul1', 'Ubah Gagal Panen | ')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ubah Gagal Panen</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pencatatan Gagal Panen
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="{{url('gagalpanen/'.$data->id_gagalpanen )}}" method="post" novalidate>
                            @csrf
                            @method('patch')
                            <input type="hidden" name="pencatat" value="{{Auth::user()->id}}">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Melon<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="jenis_melon" id="jenis_melon" class="form-control">
                                    @foreach($jenismelon as $item)
                                        <option class="form-control" value="{{ $item->id_jenismelon }}" 
                                        @if($item->id_jenismelon == $data->id_jenismelon)
                                            {{"selected"}}
                                        @endif
                                        >{{ $item->jenismelon }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">No Greenhouse<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="no_greenhouse" id="no_greenhouse" class="form-control">
                                        @foreach($nogrenhouse as $item)
                                            <option class="form-control" value="{{ $item->id_greenhouse }}"
                                            @if($item->id_greenhouse == $data->id_greenhouse)
                                                {{"selected"}}
                                            @endif
                                                >{{ $item->no_greenhouse }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Gagal Panen<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="tanggal_gagalpanen" required='required' value="{{$data->tanggal_gagalpanen}}"></div>                                            
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah Gagal Panen<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" name="jumlah_gagalpanen"  required="required" value="{{$data->jumlah_gagalpanen}}"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Penyebab Gagal Panen<span class="required" >*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea class="boxsizingBorder" required="required" name='penyebab_gagalpanen'>{{$data->penyebab_gagalpanen}}</textarea></div>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3 mt-2">
                                        <a class="btn btn-danger" href = "{{url('gagalpanen')}}">Batal</a>
                                        <button type='submit' class="btn btn-success">Simpan</button>
                                    </div>
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

@endsection