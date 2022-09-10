@extends('template.app')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Data Mengajar</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Data Mengajar</li>
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
                        <h4 class="m-b-0 text-white">Tambah Data Mengajar</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('mengajar/' . $mengajar->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Mata Pelajaran</label>
                                            <select name="mapel"
                                                class="form-control custom-select @error('mapel') is-invalid @enderror">
                                                <option>Pilih Mapel</option>
                                                @foreach ($mapel as $item)
                                                    <option {{ $mengajar->id_mapel == $item->id ? 'selected' : '' }}
                                                        value="{{ $item->id }}">
                                                        {{ $item->nama_mapel }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('mapel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nama Pengajar</label>
                                            <select name="pengajar"
                                                class="form-control custom-select @error('pengajar') is-invalid @enderror">
                                                <option>Pilih pengajar</option>
                                                @foreach ($pengajar as $item)
                                                    <option {{ $mengajar->id_pengajar == $item->id ? 'selected' : '' }}
                                                        value="{{ $item->id }}">
                                                        {{ $item->nama }}</option>
                                                @endforeach

                                            </select>
                                            @error('pengajar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Kelas</label>
                                            <select name="kelas"
                                                class="form-control custom-select @error('kelas') is-invalid @enderror">
                                                <option>Pilih kelas</option>
                                                @foreach ($kelas as $item)
                                                    <option {{ $mengajar->id_kelas == $item->id ? 'selected' : '' }}
                                                        value="{{ $item->id }}">
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
                                                <option {{ $mengajar->status == 'Aktif' ? 'selected' : '' }} value="Aktif">
                                                    Aktif</option>
                                                <option {{ $mengajar->status == 'Nonaktif' ? 'selected' : '' }}
                                                    value="Nonaktif">Nonaktif</option>

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
                                    <button type="submit" class="btn btn-info waves-effect waves-light pull-right">Ubah
                                        Data</button>
                                    <a href="{{ route('mengajar.index') }}" class="btn btn-inverse">Back</a>
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
