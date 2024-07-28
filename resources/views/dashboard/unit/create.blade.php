@extends('layout.master')
@section('content')
<div class="content">
    <!-- Content Header (Page header) -->
      <div class="container-fluid">
        <div class="d-flex justify-content-between mb-3">
          <div>
            <h1>Unit Layanan</h1>
          </div>
          <div>
            <a href="{{ route('dashboard.index') }}" class="btn btn-primary btn-sm">Kembali</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Form Unit</h3>
                </div>
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('dashboard.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-row mb-3">
                            <div class="col-md-4">
                                <label for="kode_unit" class="form-label">Kode Unit</label>
                                <input type="text" name="kode_unit" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-4">
                                <label for="nama_unit" class="form-label">Nama Unit</label>
                                <input type="text" name="nama_unit" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-4">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success btn-sm">Simpan Data</button>
                        </div>
                    </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
    </section>
</div>
@endsection