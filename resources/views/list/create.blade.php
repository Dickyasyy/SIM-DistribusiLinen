@extends('layout.master')
@section('content')
<div class="content">
    <!-- Content Header (Page header) -->
      <div class="container-fluid">
        <div class="d-flex justify-content-between mb-3">
          <div>
            <h1>Master Linen</h1>
          </div>
          <div>
            <a href="{{ route('list.linen') }}" class="btn btn-primary btn-sm">Kembali</a>
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
                  <h3 class="card-title">Form Linen</h3>
                </div>
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('list.linen') }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-row mb-3">
                      <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Kode Linen</label>
                        <input type="text" name="kode_linen" class="form-control" placeholder="">
                      </div> 
                      <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Nama Linen</label>
                        <input type="text" name="nama_linen" class="form-control" placeholder="">
                      </div>   
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" name="harga">
                      </div>  
                      <div class="form-group col-md-4">
                        <label for="diskon">Diskon</label>
                        <input type="text" class="form-control" name="diskon">
                      </div>  
                      <div class="form-group col-md-4">
                        <label for="jumlah_stok">Jumlah Stok</label>
                        <input type="number" class="form-control" name="jumlah_stok">
                      </div>  
                    </div>                   
                    <div class="card-footer d-flex justify-content-end">
                      <button type="submit" class="btn btn-success btn-sm">Simpan Data</button>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
    </section>
</div>
@endsection