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
                    <h4>Edit produk</h4>

                </div>
                <div class="card-body p-5">
                    @foreach ($produk as $p)
                        <form action="{{ route('produk.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk"
                                    value="{{ $p->nama_produk }}"required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Kode Produk</label>
                                <input type="text" class="form-control" name="kode_produk" value="{{ $p->kode_produk }}"
                                    required>
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
                                        <option {{ $k->id == $p->id_kategori ? 'selected' : '' }}
                                            value="{{ $k->id }}">
                                            {{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="id_supplier">Supplier:</label>
                                <select name="id_supplier" id="id_supplier" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih
                                        --</option>
                                    @foreach ($supplier as $s)
                                        <option {{ $s->id == $p->id_supplier ? 'selected' : '' }}
                                            value="{{ $s->id }}">
                                            {{ $s->nama_supplier }}</option>
                                    @endforeach
                                </select>
                                @error('id_supplier')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" value="{{ $p->harga }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Foto</label> <span
                                    class="text-danger"> *kosongi jika
                                    tidak mengubah gambar</span>
                                <input type="file" class="form-control" name="foto">
                            </div>
                            <button class="btn btn-primary" type="submit"> Simpan</button>
                        </form>
                    @endforeach
                    {{-- <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
