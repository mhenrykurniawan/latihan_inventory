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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header justify-content-between d-flex ">
                    <h4>Data Kategori</h4>
                    <div class="card-header-action ml-auto">
                        <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary">+ Tambah</a>
                    </div>
                </div>
                <div class="card-body p-5">
                    <div class="table-responsive">
                        <table id="mytable" class="table table-bordered table-striped" style="width: 100%">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $k)
                                    <tr>
                                        {{-- <th class="text-center">{{ $loop->iteration }}</th> --}}
                                        <th class="text-center">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td>{{ $k->nama_kategori }}</td>
                                        <td>{{ $k->deskripsi }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-warning mr-2 "
                                                    href="{{ route('kategori.edit', $k->id) }}">Edit</a>


                                                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="confirm('Anda yakin menghapus data ini?')"
                                                        type="submit">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>





@endsection
