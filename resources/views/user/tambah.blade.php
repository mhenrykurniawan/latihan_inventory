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

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header justify-content-between d-flex ">
                    <h4>Tambah User</h4>

                </div>
                <div class="card-body p-5">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-3">
                            <label for="role">Role:</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option {{ old('role') == '1' ? 'selected' : '' }} value="1">Admin</option>
                                <option {{ old('role') == '2' ? 'selected' : '' }} value="2">Operator</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama User</label>
                            <input type="text" class="form-control" name="name" {{ old('name') }}>
                            @error('name')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" {{ old('email') }}>
                            @error('email')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto">
                            @error('foto')
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
