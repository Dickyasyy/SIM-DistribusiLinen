@extends('layout.master')
@section('content')
<div class="container">
    <form id="inputLinen" action="{{ route('input.linenMasuk.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md mb-3">
                <label for="nama_petugas" class="form-label">Nama Petugas:</label>
                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" value="{{ Auth::user()->nama_petugas }}" readonly>
            </div>
            <div class="col-md mb-3">
                <label for="no_pinta" class="form-label">No Pinta:</label>
                <input type="text" name="no_pinta" id="no_pinta" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <label for="unit_peminta" class="form-label">Unit Peminta:</label>
                <input type="text" name="unit_peminta" id="unit_peminta" class="form-control" value="{{ Auth::user()->unit }}" readonly>
            </div>
            <div class="col-md mb-3">
                <label for="unit_pemberi" class="form-label">Unit Pemberi:</label>
                <select name="unit_pemberi" id="unit_pemberi" class="form-control">
                    <option selected disabled>Pilih Unit</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->nama_unit }}">{{ $unit->nama_unit }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <label for="tanggal_entry" class="form-label">Tanggal Entry:</label>
                <input type="date" name="tanggal_entry" id="tanggal_entry" class="form-control" required>
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
        </div>
        
        <button type="button" class="btn btn-secondary btn-sm mb-3" data-toggle="modal" data-target="#linenModal">Tambah Linen</button>
        
        <table class="table table-bordered" id="linen-table">
            <thead>
                <tr>
                    <th>Jenis Linen</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Entries will be added here by JavaScript -->
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <div class="input-group-append2">
                <button type="submit" class="btn btn-success btn-sm">Simpan dan Cetak</button>
                <button type="reset" class="btn btn-primary btn-sm">Refresh</button>
            </div>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="linenModal" tabindex="-1" role="dialog" aria-labelledby="linenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linenModalLabel">Tambah Jenis Linen dan Jumlah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="modal_jenis_linen" class="form-label">Jenis Linen:</label>
                        <select name="modal_jenis_linen" id="modal_jenis_linen" class="form-control">
                            @foreach($master_linens as $linen)
                                <option value="{{ $linen->nama_linen }}">{{ $linen->nama_linen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="modal_jumlah" class="form-label">Jumlah:</label>
                        <input type="number" name="modal_jumlah" id="modal_jumlah" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addLinenEntry">Tambah</button>
            </div>
        </div>
    </div>
</div>
@endsection
