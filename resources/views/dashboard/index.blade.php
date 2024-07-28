@extends('layout.master')
@section('title','Dashboard')
@section('content')
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <!-- ./col -->
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>Linen Order Hari Ini</h3>
                  <h5>Jumlah Linen Yang Di Order : {{ $linenOrderCount }}</h5>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('detail.linen.masuk')}}" class="small-box-footer">Detail<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>Linen Aprrove Hari Ini</h3>
                  <h5>Jumlah Linen Yang Di Approve : {{ $linenApproveCount }}</h5>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/dashboard/input-keluar-detail" class="small-box-footer">Detail<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        <hr>
      <!-- Tabel Data Unit -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Unit</h3>
                <div class="d-flex justify-content-end">
                  <div class="card-search pr-2">
                    <form action="{{route('unit.show')}}" method="GET">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="cari" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="append">
                    <a href="{{ route('unit.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                  </div> 
                </div>   
              </div>
              <!-- /.card-header -->
              <div class="container">
                <table class="table table-head-fixed table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kode Unit</th>
                      <th>Nama Unit</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody id="unitTableBody">
                    @foreach ($units as $unit)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $unit->kode_unit }}</td>
                      <td>{{ $unit->nama_unit }}</td>
                      <td>{{ $unit->keterangan }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="d-flex justify-content-end">
                {{ $units->links() }}
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div> 
      </section>
@endsection