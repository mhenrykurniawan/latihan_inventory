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
                    <h4>Tambah Produk</h4>

                </div>
                <div class="card-body p-5">
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" required
                                value="{{ old('nama_produk') }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Kode Produk</label>
                            <input type="text" class="form-control" name="kode_produk" required
                                value="{{ old('kode_produk') }}">
                            @error('kode_produk')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class=" mb-3">
                            <label>Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="" selected disabled>-- Pilih
                                    --</option>
                                @foreach ($kategori as $k)
                                    <option {{ old('id_supplier') == $k->id ? 'selected' : '' }}
                                        value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="id_supplier">Supplier:</label>
                            <select name="id_supplier" id="id_supplier" class="form-control" required>
                                <option value="" selected disabled>-- Pilih
                                    --</option>
                                @foreach ($supplier as $s)
                                    <option {{ old('id_supplier') == $s->id ? 'selected' : '' }}
                                        value="{{ $s->id }}">
                                        {{ $s->nama_supplier }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" required value="{{ old('harga') }}">

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" value="{{ old('foto') }}">

                            @error('foto')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <button class="btn btn-primary" type="submit"> Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
