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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form class="" action="{{url('simpanhasilpanen')}}" method="post" novalidate>
                            @csrf
                            <input type="hidden" name="pencatat" value="{{Auth::user()->id}}">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">ID Data Perawatan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                <select name="id_data_perawatan" id="id_data_perawatan" class="form-control" required='required'>
                                <option value="" disabled selected> Pilih Id Perawatan</option>
                                    @foreach($data_perawatan as $item)
                                        <option class="form-control" value="{{ $item->id_dataperawatan }}" >{{ $item->id_dataperawatan." | ".$item->tanggal_tanam." | ".$item->no_greenhouse." | ".$item->jenismelon }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-md-3 col-sm-3  label-align">No. Greenhouse<span > : </span></label>
                                <div class="col-md-6 col-sm-6" id="greenhouse"><p>pilih id data perawatan</p></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-md-3 col-sm-3  label-align">Jenis Melon<span > : </span></label>
                                <div class="col-md-6 col-sm-6" id="jenismelon"><p>pilih id data perawatan</p></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Penen<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="tanggal_hasilpanen" required='required'></div>                                            
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah Hasil Panen (Kg)<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" name="jumlah_hasilpanen"  required="required" value="{{old('jumlah')}}"  data-validate-minmax="1,999999999999999"/>
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