@extends('template.app')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Data Kelas</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Kelas</li>
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
                        <h4 class="m-b-0 text-white">Tambah Kelas</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row ">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Kelas</label>
                                            <select name="kelas"
                                                class="form-control custom-select @error('kelas') is-invalid @enderror">
                                                <option>Pilih kelas</option>
                                                <option value="X">X(10)</option>
                                                <option value="XI">XI(11)</option>
                                                <option value="XII">XII(12)</option>

                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nama Rombel</label>
                                            <input type="text" name="nama_rombel"
                                                class="form-control @error('nama_rombel') is-invalid @enderror"
                                                placeholder="Nama rombel ex: A,B,C" value="{{ old('nama_rombel') }}">
                                            @error('nama_rombel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <select name="status"
                                                class="form-control custom-select @error('status') is-invalid @enderror">
                                                <option>Pilih Status</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Nonaktif">Nonaktif</option>

                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Tambah
                                        Data</button>
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
