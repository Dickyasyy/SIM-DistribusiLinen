@extends('layout.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row mb-2 align-items-center">
        <div class="col-md-6">
            <div class="d-flex justify-content-start">
                <h2>Detail Linen Order</h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end">
                <div class="kembali mr-2">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>
                <div class="cariOrder">
                    <form action="{{ route('detail.order.show') }}" method="GET">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="cari" class="form-control float-right" placeholder="Search">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a class="btn btn-outline-success" href="{{ route('export.linen.kotor') }}">Download Excel (Linen Kotor)</a>
                </div> 
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No Pinta</th>
                                    <th>Nama Petugas</th>
                                    <th>Unit Peminta</th>
                                    <th>Unit Pemberi</th>
                                    <th>Status</th>
                                    <th>Tanggal Entry</th>
                                    <th>Detail Jenis Linen & Jumlah</th> <!-- Kolom untuk dropdown -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailOrder as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->no_pinta }}</td>
                                        <td>{{ $order->nama_petugas }}</td>
                                        <td>{{ $order->unit_peminta }}</td>
                                        <td>{{ $order->unit_pemberi }}</td>
                                        <td>
                                            @if ($order->status == 'Belum')
                                                <button class="btn btn-danger btn-sm">Belum</button>
                                            @elseif($order->status == 'Dikerjakan')
                                                <button class="btn btn-warning btn-sm">Dikerjakan</button>
                                            @elseif($order->status == 'Selesai')
                                                <button class="btn btn-success btn-sm">Selesai</button>
                                            @endif
                                        </td>
                                        <td>{{ $order->tanggal_entry }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton_{{ $loop->index }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Detail
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_{{ $loop->index }}">
                                                    @foreach ($order->users as $user)
                                                        <a class="dropdown-item" href="#">
                                                            {{ $user->pivot->jenis_linen }}: {{ $user->pivot->jumlah }}
                                                        </a>
                                                    @endforeach
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
@endsection
