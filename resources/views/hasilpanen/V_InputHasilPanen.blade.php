@extends('layouts.dashinput')

@section('judul1', 'Input Hasil Panen | ')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Pencatatan Hasil Panen</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Form Pencatatan
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="{{url('simpanhasilpanen')}}" method="post" novalidate>
                            @csrf
                            <input type="hidden" name="pencatat" value="{{Auth::user()->id}}">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Melon<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="jenis_melon" id="jenis_melon" class="form-control" required='required'>
                                        <option value="" disabled selected></option>
                                    @foreach($jenismelon as $item)
                                        <option class="form-control" value="{{ $item->id_jenismelon }}" >{{ $item->jenismelon }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">No Greenhouse<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                <select name="no_greenhouse" id="no_greenhouse" class="form-control" required='required'>
                                    <option value="" disabled selected></option>
                                    @foreach($nogrenhouse as $item)
                                        <option class="form-control" value="{{ $item->id_greenhouse }}" >{{ $item->no_greenhouse }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Hasil Panen<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="tanggal_hasilpanen" required='required'></div>                                            
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah Hasil Panen<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" name="jumlah_hasilpanen"  required="required" value="{{old('jumlah')}}"/>
                                </div>
                            </div>

                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3 mt-2">
                                        <a class="btn btn-danger" href = "{{url('hasilpanen')}}">Batal</a>
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