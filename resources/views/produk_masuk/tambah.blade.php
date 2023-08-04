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
                    <h4>Tambah Produk Masuk</h4>

                </div>
                <div class="card-body p-5">
                    <form action="{{ route('produk_masuk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-3">
                            <label for="id_produk">Produk:</label>
                            <select name="id_produk" id="id_produk" class="form-control" required>
                                <option value="" selected disabled>-- Pilih
                                    --</option>
                                @foreach ($produk as $p)
                                    <option {{ old('id_produk') == $p->id ? 'selected' : '' }} value="{{ $p->id }}">
                                        {{ $p->kode_produk }} - {{ $p->nama_produk }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah">
                            @error('jumlah')
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
