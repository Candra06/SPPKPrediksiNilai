@extends('template.app')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Import Data</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Import Data</li>
                </ol>
            </div>

        </div>
        <div class="row">
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
        </div>

        {{-- import akun --}}
        <div class="row">

            <div class="col-md-6">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Import Data Akun</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('importUsers') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row ">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Import Akun</label>
                                            <input type="file" name="fileUsers"
                                                class="form-control  @error('status') is-invalid @enderror">
                                            @error('fileUsers')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <div class="form-actions">
                                    <button type="submit"
                                        class="btn btn-info waves-effect waves-light pull-right">Import</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Import Mapel</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('importMapel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row ">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Import Mapel</label>
                                        <input type="file" name="fileMapel"
                                            class="form-control  @error('status') is-invalid @enderror">
                                        @error('fileMapel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <div class="form-actions">
                                <button type="submit"
                                    class="btn btn-info waves-effect waves-light pull-right">Import</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Import Kelas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('importKelas') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row ">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Import Kelas</label>
                                        <input type="file" name="fileKelas"
                                            class="form-control @error('status') is-invalid @enderror">
                                        @error('fileKelas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <div class="form-actions">
                                <button type="submit"
                                    class="btn btn-info waves-effect waves-light pull-right">Import</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Import Mengajar</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('importMengajar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row ">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Import Mengajar</label>
                                    <input type="file" name="fileMengajar"
                                        class="form-control @error('status') is-invalid @enderror">
                                    @error('fileMengajar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Import</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Import Siswa</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('importSiswa') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row ">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Import Siswa</label>
                                        <input type="file" name="fileSiswa"
                                            class="form-control @error('status') is-invalid @enderror">
                                        @error('fileSiswa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <div class="form-actions">
                                <button type="submit"
                                    class="btn btn-info waves-effect waves-light pull-right">Import</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-6">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Import Nilai</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('importNilai') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row ">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Import Nilai</label>
                                    <input type="file" name="fileNilai"
                                        class="form-control @error('status') is-invalid @enderror">
                                    @error('fileNilai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="form-actions">
                            <button type="submit"
                                class="btn btn-info waves-effect waves-light pull-right">Import</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
