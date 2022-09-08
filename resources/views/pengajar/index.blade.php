@extends('template.app')

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Pengajar dan Staff TU</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Data Pengajar dan Staff TU</li>
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
                <h4 class="card-title">Daftar Pengajar dan Staff TU</h4>
                <a href="{{ url('/akun/create')}}"><button class="btn btn-primary pull-right">Tambah Data</button></a>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px">No.</th>
                                <th>Nama</th>
                                <th>NUPTK</th>
                                <th>NIP</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $no => $dt)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->nuptk }}</td>
                                <td>{{ $dt->nip }}</td>
                                <td>{{ $dt->username }}</td>
                                <td>{{ $dt->role }}</td>
                                <td>
                                    <a href="{{ url('/akun/'.$dt->id.'/edit') }}" class="btn btn-info"><i class="mdi mdi-pencil"></i>Edit</a>
                                    <a href="#" data-id="{{ $dt->id }}" class="btn btn-danger sa-params"><i class="fa fa-trash-o">
                                        <form action="{{ route('akun.destroy', $dt->id) }}" id="delete{{ $dt->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                        </i>
                                        Hapus
                                    </a>
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

</div>
@endsection
