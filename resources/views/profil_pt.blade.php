@extends('layouts',  ['activeMenu' => 'PROFIL_PT', 'activeSubMenu' => 'settings', 'title' => 'Profil Perguruan Tinggi'])
@section('content')
@section('css')
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.3.1207/styles/kendo.common-bootstrap.min.css" />
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.3.1207/styles/kendo.bootstrap.min.css" />
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.3.1207/styles/kendo.bootstrap.mobile.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"></h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="mdi mdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Profil PT</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<!-- begin row -->
<div class="row" id="card-data">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="alig-center d-flex justify-content-between mb-3">
                    <h4><i class="mdi mdi-format-list-bulleted me-1"></i>Data Profil Perguruan Tinggi</h4>
                </div>
                <hr>
                <div class="row ">
                    @foreach ($dt_profil as $profil)
                    <table class="table table-rounded table-row-bordered border mb-5">
                        <tbody>
                            <tr>
                                <td style="width: 30px">ID PT</td>
                                <td style="width: 400px">{{ $profil->id_perguruan_tinggi }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">KODE PT</td>
                                <td style="width: 400px">{{ $profil->kode_perguruan_tinggi }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">NAMA PT</td>
                                <td style="width: 400px">{{ $profil->nama_perguruan_tinggi }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">TELEPON</td>
                                <td style="width: 400px">{{ $profil->telepon }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">FAXIMILE</td>
                                <td style="width: 400px">{{ $profil->faximile }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">EMAIL</td>
                                <td style="width: 400px">{{ $profil->email }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">KELURAHAN</td>
                                <td style="width: 400px">{{ $profil->kelurahan }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">ID WILAYAH</td>
                                <td style="width: 400px">{{ $profil->id_wilayah }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">NAMA WILAYAH</td>
                                <td style="width: 400px">{{ $profil->nama_wilayah }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">LINTANG BUJUR</td>
                                <td style="width: 400px">{{ $profil->lintang_bujur }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">MBS</td>
                                <td style="width: 400px">{{ $profil->mbs }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">LUAS TANAH MILIK</td>
                                <td style="width: 400px">{{ $profil->luas_tanah_milik }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">LUAS BUKAN TANAH MILIK</td>
                                <td style="width: 400px">{{ $profil->luas_tanah_bukan_milik }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">SK PENDIRIAN</td>
                                <td style="width: 400px">{{ $profil->sk_pendirian }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">TANGGAL SK PENDIRIAN</td>
                                <td style="width: 400px">{{ date('d-m-Y', strtotime($profil->tanggal_sk_pendirian)) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">ID STATUS MILIK</td>
                                <td style="width: 400px">{{ $profil->id_status_milik }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">NAMA STATUS MILIK</td>
                                <td style="width: 400px">{{ $profil->nama_status_milik }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">STATUS PERGURUAN TINGGI</td>
                                <td style="width: 400px">{{ $profil->status_perguruan_tinggi }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> 
<!-- end row -->

@section('js')
    <script src="https://kendo.cdn.telerik.com/2021.3.1207/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2021.3.1207/js/kendo.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('script/profil_pt.js') }}"></script>
@stop
@endsection