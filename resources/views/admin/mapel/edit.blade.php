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
                    <li class="breadcrumb-item active">Data Mapel</li>
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
                        <h4 class="m-b-0 text-white">Edit Mapel</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mapel.update', $mapel->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nama Mapel</label>
                                            <input type="text" name="nama_mapel" id="firstName"
                                                class="form-control @error('nama_mapel') is-invalid @enderror"
                                                value="{{ $mapel->nama_mapel }}">
                                            @error('nama_mapel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <select name="status"
                                                class="form-control custom-select @error('status') is-invalid @enderror">
                                                <option>Pilih Status</option>
                                                <option {{ $mapel->status == 'Aktif' ? 'selected' : '' }} value="Aktif">
                                                    Aktif</option>
                                                <option {{ $mapel->status == 'Nonaktif' ? 'selected' : '' }}
                                                    value="Nonaktif">Nonaktif</option>

                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <!-- <small class="form-control-feedback"> Select your penerbit </small>  -->
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Ubah
                                        Data</button>
                                    <a href="{{ route('mapel.index') }}" class="btn btn-inverse">Back</a>
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
