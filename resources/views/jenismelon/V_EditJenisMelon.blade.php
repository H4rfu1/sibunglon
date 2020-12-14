@extends('layouts.dashinput')

@section('judul1', 'Ubah Jenis Melon | ')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ubah Jenis Melon</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pencatatan Jenis Melon
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="{{url('jenismelon/'.$data->id_jenismelon  )}}" method="post" novalidate>
                            @csrf
                            @method('patch')
                            <!-- <input type="hidden" name="pencatat" value="{{Auth::user()->id}}"> -->
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Melon<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="jenismelon"  required="required" value="{{$data->jenismelon}}"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Lama Panen<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" name="masa_panen"  required="required" value="{{$data->masa_panen}}"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Masa Pemupukan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" name="masa_pupuk"  required="required" value="{{$data->masa_pupuk}}"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Keterangan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea class="boxsizingBorder" required="required" name='keterangan'>{{$data->keterangan}}</textarea></div>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3 mt-2">
                                        <a class="btn btn-danger" href = "{{url('jenismelon')}}">Batal</a>
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