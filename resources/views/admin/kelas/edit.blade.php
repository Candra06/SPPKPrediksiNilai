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
                    <li class="breadcrumb-item active">Data Kelas</li>
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
                        <h4 class="m-b-0 text-white">Edit Kelas</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('kelas/'. $kelas->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Kelas</label>
                                            <select name="kelas"
                                                class="form-control custom-select @error('kelas') is-invalid @enderror">
                                                <option>Pilih kelas</option>
                                                <option {{$kelas->kelas == 'X'? 'selected' : ''}} value="X">X(10)</option>
                                                <option {{$kelas->kelas == 'XI'? 'selected' : ''}} value="XI">XI(11)</option>
                                                <option {{$kelas->kelas == 'XII'? 'selected' : ''}} value="XII">XII(12)</option>

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
                                            <input type="text" name="nama_rombel" value="{{$kelas->nama_rombel}}"
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
                                                <option {{$kelas->status == 'Aktif'? 'selected':''}} value="Aktif">Aktif</option>
                                                <option {{$kelas->status == 'Nonaktif'? 'selected':''}} value="Nonaktif">Nonaktif</option>

                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Ubah
                                        Data</button>
                                    <a href="{{ route('kelas.index') }}" class="btn btn-inverse">Back</a>
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
