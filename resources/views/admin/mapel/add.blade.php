@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Mata Pelajaran</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Tambah Mapel</li>
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
                    <h4 class="m-b-0 text-white">Tambah Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('mapel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nama Mapel</label>
                                        <input type="text" name="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="Nama Mata Pelajaran" value="{{ old('nama_mapel') }}">
                                        @error('nama_mapel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Status</label>
                                        <select name="status" class="form-control custom-select @error('status') is-invalid @enderror">
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
                            <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Tambah Data</button>
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

