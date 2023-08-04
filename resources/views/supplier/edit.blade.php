@extends('template/main')
@section('title', $title)
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header justify-content-between d-flex ">
                    <h4>Edit Supplier</h4>

                </div>
                <div class="card-body p-5">
                    @foreach ($supplier as $k)
                        <form action="{{ route('supplier.update', $k->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" name="nama_supplier"
                                    value="{{ $k->nama_supplier }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Nomor Telp.</label>
                                <input type="text" class="form-control" name="no_telp" value="{{ $k->no_telp }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $k->alamat }}">
                            </div>
                            <button class="btn btn-primary" type="submit"> Simpan</button>
                        </form>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
