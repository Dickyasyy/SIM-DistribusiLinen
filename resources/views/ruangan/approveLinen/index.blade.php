@extends('layout.master')
@section('title','Approve Linen')
@section('content')
<div class="container-fluid">
    <div class="title mb-3">
      <h3>Approve Linen Laundry</h3>
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
                    <th>No.</th>
                    <th>No Permintaan</th>
                    <th>Nama Petugas</th>
                    <th>Unit Peminta</th>
                    <th>Status</th>
                    <th>Tanggal Entry</th>
                    <th>Tanggal Approve</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($approveLinen as $approve)
                  <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $approve->no_pinta }}</td>
                    <td>{{ $approve->nama_petugas }}</td>
                    <td>{{ $approve->unit_peminta }}</td>
                    <td>
                      @if ($approve->status == 'Belum')
                        <button class="btn btn-danger btn-sm">Belum</button>
                      @elseif($approve->status == 'Dikerjakan')
                        <button class="btn btn-warning btn-sm">Dikerjakan</button>
                      @elseif($approve->status == 'Selesai')
                        <button class="btn btn-success btn-sm">Selesai</button>
                      @endif
                    </td>
                    <td>{{ $approve->tanggal_entry }}</td>
                    <td>{{ $approve->tanggal_approve }}</td>
                    {{-- <td><img src="{{ asset('storage/' . $linens->gambar) }}" alt="{{$linens->jenis}}" class="img-thumbnail" width="50"></td> --}}
                    <td>
                      <div class="d-flex flex-row bd-highlight">
                        <a href="{{route('approve.edit', $approve->no_pinta)}}" class="btn btn-warning btn-sm mr-1 ">
                          <i class="fa fa-pencil"></i>
                        </a>
                        {{-- <form action="{{route('approve.destroy', $approve->id)}}" method="POST">
                          @method("DELETE")
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm ">
                            <i class="fa fa-trash"></i>
                          </button>
                        </form> --}}
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="d-flex justify-content-end">
              {{ $approveLinen->links() }}
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div> 
    </section>
  </div><!-- /.container-fluid -->
@endsection