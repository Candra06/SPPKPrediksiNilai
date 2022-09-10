@extends('template.app')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Data Nilai Siswa</h3>
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
                    <h4 class="card-title">Data Nilai Kelas</h4>
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#yourModal">Tambah
                        Data</button>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:20px">No.</th>
                                    <th>Kelas</th>
                                    <th>Nama Mapel</th>
                                    <th>Periode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $no => $dt)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $dt->kelas.$dt->nama_rombel }}</td>
                                <td>{{ $dt->nama_mapel }}</td>
                                <td>Periode-{{ $dt->periode }}</td>
                                <td>

                                    <a href="{{ url('/detailNilai/'.$dt->id_mengajar.'/'.$dt->periode) }}" class="btn btn-success"><i class="mdi mdi-eye"></i> Detail</a>
                                    {{-- <a href="#" data-id="{{ $dt->id }}" class="btn btn-danger sa-params"><i class="fa fa-trash-o">
                                        <form action="{{ route('mengajar.destroy', $dt->id) }}" id="delete{{ $dt->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                        </i>
                                        Hapus
                                    </a> --}}
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


        <div class="modal fade" id="yourModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form action="{{ url('nilai/inputBy') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Kelas</label>
                                        <select name="kelas" required
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Mata Pelajaran</label>
                                        <select name="mapel" required
                                            class="form-control custom-select @error('mapel') is-invalid @enderror">
                                            <option>Pilih Mapel</option>
                                            @foreach ($mapel as $item)
                                                <option value="{{ $item->id }}">
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Periode</label>
                                        <select name="periode" required
                                            class="form-control custom-select @error('periode') is-invalid @enderror">
                                            <option>Pilih periode</option>
                                            <option value="1">Periode 1</option>
                                            <option value="2">Periode 2</option>
                                            <option value="3">Periode 3</option>
                                            <option value="4">Periode 4</option>


                                        </select>
                                        @error('periode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tampilkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
