@extends('layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="">Kasir</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kasir</h4>
                </div>
                <div class="card-body">
                    <form action="/insertpenjualan" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label for="">Pelanggan</label>
                        <div class="form-group">
                            <select class="form-control form-control-lg default-select" name="pelanggan_id">
                                <option value=""></option>
                                @foreach ($pelanggan as $pel)
                                    <option value="{{ $pel->id }}">{{ $pel->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="">Produk</label>
                        <div class="form-group">
                            <select class="form-control form-control-lg default-select" name="produk_id" id="produkSelect">
                                <option value=""></option>
                                @foreach ($produk as $pro)
                                    <option value="{{ $pro->id }}" data-price="{{ $pro->price }}">{{ $pro->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('produk_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="kuantitas" class="form-label">Kuantitas</label>
                            <input class="form-control" type="number" name="kuantitas" id="kuantitas">
                        </div>
                        @error('kuantitas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input class="form-control" type="text" name="total" id="total" readonly>
                        </div>
                        @error('total')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const produkSelect = document.getElementById('produkSelect');
            const kuantitasInput = document.getElementById('kuantitas');
            const totalInput = document.getElementById('total');

            function calculateTotal() {
                const selectedProduct = produkSelect.options[produkSelect.selectedIndex];
                const price = parseFloat(selectedProduct.getAttribute('data-price')) || 0;
                const quantity = parseInt(kuantitasInput.value) || 0;
                const total = price * quantity;
                totalInput.value = total.toFixed(2);
            }

            produkSelect.addEventListener('change', calculateTotal);
            kuantitasInput.addEventListener('input', calculateTotal);
        });
    </script>
@endsection
