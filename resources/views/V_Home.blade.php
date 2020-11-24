@extends('layouts.dash')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="">
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
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection
