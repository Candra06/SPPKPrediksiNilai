@extends('template.app')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Tambah Nilai</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Data Nilai</li>
                </ol>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Tambah Nilai Kelas </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('nilai.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <Label>Kelas</Label>
                                        <h4>{{$data->kelas.$data->nama_rombel}}</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <Label>Mata Pelajaran</Label>
                                        <h4>{{$data->nama_mapel}}</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <Label>Periode</Label>
                                        <h4>Periode-{{$data->periode}}</h4>
                                        <input type="hidden" name="periode" value="{{$data->periode}}">
                                        <input type="hidden" name="id_mengajar" value="{{$data->id}}">
                                    </div>
                                </div>

                                @foreach ($siswa as $item)
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="">Nama Siswa</label>
                                            <input type="text" value="{{ $item->nama_siswa }}" name="nama[]"
                                                class="form-control " placeholder="Nama Siswa" disabled>
                                            <input type="hidden" value="{{ $item->id }}" name="id[]"
                                                class="form-control " readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Nilai</label>
                                            <input type="number" name="nilai[]" required class="form-control "
                                                placeholder="Nilai siswa">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Tambah
                                    Data</button>
                            </div>
                    </div>
                    </form>
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
