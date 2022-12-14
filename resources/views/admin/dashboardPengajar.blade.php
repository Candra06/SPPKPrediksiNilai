@extends('template.app')

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/backend')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->


    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-info"><i class="fa fa-book"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-light">{{$kelas}}</h3>
                            <h5 class="text-muted m-b-0">Jumlah Kelas</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        

    </div>
    <!-- Row -->

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>
@endsection
