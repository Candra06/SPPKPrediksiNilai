@extends('template.app')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Detail Nilai Kelas {{ $data[0]->kelas . $data[0]->nama_rombel }}</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item">Daftar Nilai</li>
                    <li class="breadcrumb-item active">Detail Nilai</li>
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
                    <h4 class="card-title">Detail Nilai Ulangan Harian {{ $data[0]->nama_mapel }} Periode
                        {{ $data[0]->periode }}</h4>
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#yourModal">Tambah
                        Data</button>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $no => $dt)
                                    <tr>

                                        <td>{{ $dt->nama_siswa }}</td>
                                        <td>{{ $dt->nilai }}</td>
                                        <td>

                                            <a href="" data-toggle="modal"
                                                data-target="#modalEdit{{ $dt->id }}" class="btn btn-info"><i
                                                    class="mdi mdi-pencil"></i> Edit</a>
                                            <a href="#" data-id="{{ $dt->id }}"
                                                class="btn btn-danger sa-params"><i class="fa fa-trash-o">
                                                    <form action="{{ route('nilai.destroy', $dt->id) }}"
                                                        id="delete{{ $dt->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </i>
                                                Hapus
                                            </a>
                                        </td>
                                        <div class="modal fade" id="modalEdit{{ $dt->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ url('nilai/' . $dt->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit Nilai
                                                                {{ $dt->nama_siswa }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <input type="hidden" name="id" value="{{$dt->id}}">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Nilai</label>
                                                                        <input type="number" required
                                                                            value="{{ $dt->nilai }}"
                                                                            class="form-control @error('nilai') is-invalid @enderror"
                                                                            name="nilai" id="">

                                                                        @error('mapel')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
                <form action="{{ url('nilai/input') }}" method="POST">
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
                                        <label class="control-label">Nama Siswa</label><br>
                                        <input type="hidden" name="periode" value="{{ $data[0]->periode }}">
                                        <input type="hidden" name="mengajar" value="{{ $data[0]->id_mengajar }}">
                                        <select name="siswa" class="form-control custom-select">
                                            <option>Pilih Siswa</option>
                                            @foreach ($siswa as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nama_siswa }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('siswa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Nilai</label>
                                        <input type="number" required
                                            class="form-control @error('nilai') is-invalid @enderror" name="nilai"
                                            id="">

                                        @error('mapel')
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
