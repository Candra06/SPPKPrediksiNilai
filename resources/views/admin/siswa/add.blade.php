@extends('template.app')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Data Siswa</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Siswa</li>
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
                        <h4 class="m-b-0 text-white">Tambah Siswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Kelas</label>
                                            <select name="kelas"
                                                class="form-control custom-select @error('kelas') is-invalid @enderror">
                                                <option>Pilih kelas</option>
                                                @foreach ($kelas as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->kelas }}-{{ $item->nama_rombel }}</option>
                                                @endforeach

                                            </select>
                                            @error('kelas')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">NIS</label>
                                            <input type="text" name="nis"
                                                class="form-control @error('nis') is-invalid @enderror"
                                                placeholder="Nomor Induk Siswa" value="{{ old('nis') }}">
                                            @error('nis')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nama Lengkap</label>
                                            <input type="text" name="nama_siswa"
                                                class="form-control @error('nama_siswa') is-invalid @enderror"
                                                placeholder="Nama Lengkap Siswa" value="{{ old('nama_siswa') }}">
                                            @error('nama_siswa')
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
