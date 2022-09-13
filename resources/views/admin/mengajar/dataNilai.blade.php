@extends('template.app')

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Nilai</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Daftar Data Mengajar</li>
            </ol>
        </div>

    </div>

    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="card col-md-12">
            @if (session('success'))
            <div class="card-body">
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>
            </div>
            @endif
            <div class="card-body">
                <h4 class="card-title">Daftar Nilai Mata Pelajaran {{$data[0]->nama_mapel}} Kelas {{ $data[0]->kelas.$data[0]->nama_rombel }}</h4>
                <a href="{{ url('/prediksi')}}"><button class="btn btn-primary pull-right">Tampilkan Prediksi Nilai</button></a>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px">No.</th>
                                <th>Nama Siswa</th>
                                <th>Nilai</th>
                                <th>Periode</th>
                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $no => $dt)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $dt->nama_siswa }}</td>
                                <td>{{$dt->nilai}}</td>
                                <td>Periode-{{ $dt->periode }}</td>
                                
                                <td>
                                    <a href="{{ url('/dataNilai/'.$dt->id) }}" class="btn btn-info"><i class="mdi mdi-eye"></i> Detail</a>
                                    
                                </td>
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
