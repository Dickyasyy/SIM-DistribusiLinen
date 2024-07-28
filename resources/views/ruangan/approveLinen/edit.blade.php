@extends('layout.master')
@section('title', 'Edit Approve Linen')
@section('content')
<div class="container-fluid">
    <div class="title mb-3">
        <h3>Edit Approve Linen Laundry</h3>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('approve.update', $linenKotor->no_pinta) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="no_pinta">No Permintaan</label>
                                    <input type="text" class="form-control" id="no_pinta" name="no_pinta" value="{{ $linenKotor->no_pinta }}" readonly>
                                </div>
                                <div class="col-md mb-3">
                                    <label for="nama_petugas">Nama Petugas</label>
                                    <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ $linenKotor->nama_petugas }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="unit_peminta">Unit Peminta</label>
                                    <input type="text" class="form-control" id="unit_peminta" name="unit_peminta" value="{{ $linenKotor->unit_peminta }}" readonly>
                                </div>
                                <div class="col-md mb-3">
                                    <label for="unit_pemberi">Unit Pemberi</label>
                                    <input type="text" class="form-control" id="unit_pemberi" name="unit_pemberi" value="{{ $linenKotor->unit_pemberi }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="tanggal_entry">Tanggal Entry</label>
                                    <input type="date" class="form-control" id="tanggal_entry" name="tanggal_entry" value="{{ $linenKotor->tanggal_entry }}" readonly>
                                </div>
                                <div class="col-md mb-3">
                                    <label for="status" class="form-label">Status:</label>
                                    <select class="form-control" name="status">
                                        <option selected disabled>Pilih Status</option> 
                                        <option value="Belum">Belum</option>
                                        <option value="Dikerjakan">Dikerjakan</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="col-md mb-3">
                                    <label for="tanggal_approve">Tanggal Approve</label>
                                    <input type="date" class="form-control" id="tanggal_approve" name="tanggal_approve" required>
                                </div>
                            </div>
                            <div class="approve-linen d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
