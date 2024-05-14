@extends('layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Pelanggan</a></li>
                </ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pelanggan</h4>
                            <a href="/addpelanggan"><button class="btn btn-success"> Tambah Pelanggan</button></a>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th class="width80">Kode</th>
                                            <th>Nama </th>
                                            <th>Alamat</th>
                                            <th>No Telpon</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td><strong>{{ $row->id }}</strong></td>
                                                {{-- <td> <img style="width: 100px" src="{{ asset('covermakanan/' . $row->picture) }}"
                                                        alt=""></td> --}}
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->alamat }}</td>
                                                <td>0{{ $row->notelp }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-success light sharp"
                                                            data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12"
                                                                        r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12"
                                                                        r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="/showpelanggan/{{ $row->id }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                href="/deletepelanggan/{{ $row->id }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
