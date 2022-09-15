@extends('template.app')

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Prediksi</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Data Prediksi</li>
            </ol>
        </div>

    </div>

    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="card col-md-12">

            <div class="card-body">
                <h4 class="card-title">Prediksi Nilai UAS Mata Pelajaran {{$data->nama_mapel}} Kelas {{ $data->kelas.$data->nama_rombel }}</h4>

                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px">No.</th>
                                <th>Nama Siswa</th>
                                <th>Prediksi Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pred as $no => $dt)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $dt['nama_siswa'] }}</td>
                                <td>{{$dt['prediksi']}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>
@endsection