@extends('layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="">Pelanggan</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Pelanggan</h4>
                </div>
                <div class="card-body">
                    <form action="/insertpelanggan" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama Pelanggan</label>
                            <input class="form-control" type="text" name="name" id="judul">
                        </div>
                        @error('judul')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="formFile" class="form-label">alamat</label>
                            <input class="form-control" type="text" name="alamat" id="judul">
                        </div>
                        @error('genre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="formFile" class="form-label">NO Telp</label>
                            <input class="form-control" type="text" name="notelp" id="judul">
                        </div>
                        @error('genre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
