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
                    <h4>Edit User</h4>

                </div>
                <div class="card-body p-5">
                    @foreach ($user as $u)
                        <form action="{{ route('user.update', $u->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="role">Role:</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option {{ $u->role == '1' ? 'selected' : '' }} value="1">Admin</option>
                                    <option {{ $u->role == '2' ? 'selected' : '' }} value="2">Operator</option>

                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama User</label>
                                <input type="text" class="form-control" name="name" value="{{ $u->name }}">
                                @error('name')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $u->email }}">
                                @error('email')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="******">
                                @error('password')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
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

                </div>
            </div>
        </div>
    </section>
@endsection
