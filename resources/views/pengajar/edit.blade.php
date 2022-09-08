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
                <li class="breadcrumb-item active">Tambah Data Pengajar dan Staff TU</li>
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
                    <h4 class="m-b-0 text-white">Tambah Pengajar dan Staff TU</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/akun/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-body">
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input type="text" value="{{$data->nama}}" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Role</label>
                                        <select name="role" class="form-control custom-select @error('role') is-invalid @enderror">
                                            <option>Pilih Role</option>
                                            <option {{$data->role == 'Admin'? 'selected' :''}} value="Admin">Admin</option>
                                            <option {{$data->role == 'Pengajar'? 'selected' :''}} value="Pengajar">Pengajar</option>

                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">NUPTK</label>
                                        <input type="text" value="{{$data->nuptk}}" name="nuptk" class="form-control @error('nuptk') is-invalid @enderror" placeholder="NUPTK" value="{{ old('nuptk') }}">
                                        @error('nuptk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">NIP</label>
                                        <input type="text" value="{{$data->nip}}" name="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="NIP" value="{{ old('nip') }}">
                                        @error('nip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Username</label>
                                        <input type="text" value="{{$data->username}}" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" value="{{ old('password') }}">
                                        @error('password')
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
                            <a href="{{ route('akun.index') }}" class="btn btn-inverse">Back</a>
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

