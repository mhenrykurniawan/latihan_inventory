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
                    <h4>Tambah Kategori</h4>

                </div>
                <div class="card-body p-5">
                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori">
                            @error('nama_kategori')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi">
                            @error('deskripsi')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit"> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
