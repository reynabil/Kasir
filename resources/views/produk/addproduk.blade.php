@extends('layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="">Produk</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Produk</h4>
                </div>
                <div class="card-body">
                    <form action="/insertproduk" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="Cover">Cover</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input name="picture" type="file" class="custom-file-input">
                                <label class="custom-file-label">Pilih file</label>
                            </div>
                        </div>
                        @error('cover')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama Produk</label>
                            <input class="form-control" type="text" name="name" id="judul">
                        </div>
                        @error('judul')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Harga</label>
                            <input class="form-control" type="text" name="price" id="judul">
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
