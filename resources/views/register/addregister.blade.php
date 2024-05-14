@extends('layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="">Akun</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Akun</h4>
                </div>
                <div class="card-body">
                    <form action="/insertregister" id="yourFormId" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama</label>
                            <input class="form-control" type="text" name="name" id="judul">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" id="judul">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Password</label>
                            <input class="form-control" type="text" name="password" id="judul">
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="formFile" class="form-label">Role</label>
                            <select name="role" class="form-control form-control-lg default-select ">
                                <option></option>
                                <option>Petugas</option>
                                <option>Siswa</option>
                            </select>
                        </div>
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
 