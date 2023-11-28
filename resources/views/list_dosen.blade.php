@extends('layouts',  ['activeMenu' => 'LIST_DOSEN', 'activeSubMenu' => 'settings', 'title' => 'List Dosen Perguruan Tinggi'])
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
                    <li class="breadcrumb-item active">Dosen Pt</li>
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
                    <h4><i class="mdi mdi-format-list-bulleted me-1"></i>Data List Dosen Perguruan Tinggi</h4>
                </div>
                <div id="spreadsheet" style="width: 100%"></div>
            </div>
        </div>
    </div>
</div> 
<!-- end row -->

@section('js')
    <script src="https://kendo.cdn.telerik.com/2021.3.1207/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2021.3.1207/js/kendo.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('script/list_dosen.js') }}"></script>
@stop
@endsection