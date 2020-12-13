@extends('layouts.dashinput')

@section('judul1', 'Ubah Hasil Panen | ')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ubah Pencatatan Hasil Panen</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Pencatatan hasil panen
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="" action="{{url('hasilpanen/'.$data->id_hasilpanen )}}" method="post" novalidate>
                            @csrf
                            @method('patch')
                            <input type="hidden" name="pencatat" value="{{Auth::user()->id}}">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Melon<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="jenis_melon" id="jenis_melon" class="form-control">
                                    @foreach($data_perawatan as $item)
                                        <option class="form-control" value="{{ $item->id_jenismelon }}" 
                                        @if($item->id_dataperawatan == $data->id_data_perawatan)
                                            {{"selected"}}
                                        @endif
                                        >{{ $item->id_dataperawatan }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-md-3 col-sm-3  label-align">No. Greenhouse<span > : </span></label>
                                <div class="col-md-6 col-sm-6" id="greenhouse"><p>{{$data->no_greenhouse}}</p></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-md-3 col-sm-3  label-align">Jenis Melon<span > : </span></label>
                                <div class="col-md-6 col-sm-6" id="jenismelon"><p>{{$data->jenismelon}}</p></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Hasil Panen<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="tanggal_hasilpanen" required='required' value="{{$data->tanggal_hasilpanen}}"></div>                                            
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Persentase Hasil Panen (%)<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" name="persentase_panen"  required="required" value="{{$data->persentase_panen}}"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah Hasil Panen (Kg)<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="number" name="jumlah_hasilpanen"  required="required" value="{{$data->jumlah_hasilpanen}}"/>
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