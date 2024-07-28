@extends('layout.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
  <div class="title mb-3">
    <h3>Master Linen</h3>
  </div>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Linen</h3>
            <div class="d-flex justify-content-end">
              <div class="card-search pr-2">
                <form action="{{route('list.show')}}" method="GET">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="cari" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="append">
                <a href="{{ route('list.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
              </div> 
            </div>   
          </div>
          <!-- /.card-header -->
          <div class="container">
            <table class="table table-head-fixed table-striped table-hover">
              <thead>
                <tr>
                  <th>Kode Linen</th>
                  <th>Nama Linen</th>
                  <th>Harga</th>
                  <th>Diskon</th>
                  <th>Jumlah Stok</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($linen as $linens)
                <tr>
                  <td>{{ $linens->kode_linen }}</td>
                  <td>{{ $linens->nama_linen }}</td>
                  <td>{{ $linens->harga }}</td>
                  <td>{{ $linens->diskon }}</td>
                  <td>{{ $linens->jumlah_stok }}</td>
                  {{-- <td><img src="{{ asset('storage/' . $linens->gambar) }}" alt="{{$linens->jenis}}" class="img-thumbnail" width="50"></td> --}}
                  <td>
                    <div class="d-flex flex-row bd-highlight">
                      <a href="{{route('list.edit', $linens->kode_linen)}}" class="btn btn-warning btn-sm mr-1 ">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <form action="{{route('list.destroy', $linens->kode_linen)}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" id="#btn-hapus">
                          <i class="fa fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="d-flex justify-content-end">
            {{ $linen->links() }}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div> 
  </section>
</div><!-- /.container-fluid -->
@endsection