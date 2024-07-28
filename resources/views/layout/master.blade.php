<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }
    .container {
        width: 100%;
        margin: 0 auto;
        padding: 20px;
    }
    .row {
        display: flex;
        flex-direction: row;
        margin-bottom: 10px;
    }
    .col-md-6, .col-md-12 {
        width: 50%;
        padding: 10px;
    }
    .col-md-12 {
        width: 100%;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .table, .table th, .table td {
        border: 1px solid #000;
    }
    .table th, .table td {
        padding: 8px;
        text-align: left;
    }
  </style>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('LTE/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
        <li>
          <a id="navbar-name" class="nav-link" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->nama_petugas }}
          </a>
        </li>
      <li class="nav-item d-flex align-items-center">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i>
            {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
      </li>
    </ul>
  </nav>

</div>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <a href="index3.html" class="brand-link d-flex align-items-center">
        <img src="{{url('/images/rspetro.jpeg')}}" class="img-fluid" width="100" height="100" alt="Image"/>
      </a>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                {{-- Menandakan apabila ada permintaan menekan dashboard maka akan active --}}
                <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}">
                    <i class="nav-icon fa fa-tachometer"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview {{ request()->is('ruangan') || request()->is('input-linen-masuk/create') || request()->is('approve-linen') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ request()->is('ruangan') || request()->is('input-linen-masuk/create') || request()->is('approve-linen') ? 'active' : ''}}">
                  <i class="nav-icon fa fa-university"></i>
                  <p>
                      Ruangan
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  @if (auth()->user()->jabatan === 'petugas linen' || auth()->user()->jabatan === 'kepala instalasi')
                      <!-- Menu Input Linen -->
                      <li class="nav-item">
                          <a href="{{ route('input.linenMasuk.create') }}" class="nav-link {{ request()->is('input-linen-masuk/create') ? 'active' : ''}}">
                              <i class="fa fa-arrow-circle-right nav-icon"></i>
                              <p>Input Linen</p>
                          </a>
                      </li>
                  @endif
                  @if (auth()->user()->jabatan === 'petugas laundry')
                      <!-- Menu Input Linen -->
                      <li class="nav-item">
                          <a href="{{ route('input.linenMasuk.create') }}" class="nav-link {{ request()->is('input-linen-masuk/create') ? 'active' : ''}}">
                              <i class="fa fa-arrow-circle-right nav-icon"></i>
                              <p>Input Linen</p>
                          </a>
                      </li>
                      <!-- Menu Approve Linen -->
                      <li class="nav-item">
                          <a href="{{ route('approve.index') }}" class="nav-link {{ request()->is('approve-linen') ? 'active' : ''}}">
                              <i class="fa-solid fa-check nav-icon"></i>
                              <p>Approve Linen</p>
                          </a>
                      </li>
                  @endif
              </ul>
          </li>
          
            <li class="nav-item">
                <a href="/listlinen" class="nav-link {{ request()->is('listlinen') ? 'active' : ''}}">
                    <i class="nav-icon fa-solid fa fa-list-alt"></i>
                    <p>
                        List Linen
                    </p>
                </a>
            </li>
        </ul>
      </nav>
       
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        {{-- Pesan Sukses --}}
        {{-- @if (session()->has('success'))
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success">{{session('success')}}</div>
          </div>
        </div>
        @endif --}}
        {{-- /Pesan Sukses --}}
        @include('sweetalert::alert')
        @yield('content')
      </div>
    </div>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container d-flex justify-content-center">
        <!-- Whatsapp -->
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #3b5998;"
          href="#!"
          role="button"
          ><i class="fab fa-whatsapp"></i
        ></a>
        <!-- Instagram -->
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #ac2bac;"
          href="https://www.instagram.com/"
          role="button"
          ><i class="fab fa-instagram"></i
        ></a>
        <!-- Github -->
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #333333;"
          href="https://github.com/"
          role="button"
          ><i class="fab fa-github"></i
        ></a>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('LTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('LTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('LTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('LTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('LTE/plugins/sparklines/sparkline.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('LTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('LTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('LTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('LTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('LTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('LTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script
<!-- AdminLTE App -->
<script src="{{ asset('LTE/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('LTE/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('LTE/dist/js/demo.js') }}"></script>

<script>
  $('#btn-hapus').on('click',function(e){
      e.preventDefault();
      var form = $(this).parents('form');
      Swal.fire({
          title: 'Apakah anda yakin ingin menghapus data?',
          text: "",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#32CD32',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus Data!'
      }).then((result) => {
          if (result.value) {
              form.submit();
          }
      });
  });
</script>

{{-- Tambah Jenis dan Jumlah Linen --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
      document.getElementById('addLinenEntry').addEventListener('click', function () {
          const jenisLinen = document.getElementById('modal_jenis_linen').value;
          const jumlah = document.getElementById('modal_jumlah').value;
  
          if (jenisLinen && jumlah) {
              const tableBody = document.querySelector('#linen-table tbody');
              const newRow = document.createElement('tr');
  
              newRow.innerHTML = `
                  <td><input type="text" name="jenis_linen[]" class="form-control" value="${jenisLinen}" readonly></td>
                  <td><input type="number" name="jumlah[]" class="form-control" value="${jumlah}" readonly></td>
                  <td><button type="button" class="btn btn-danger remove-linen">Hapus</button></td>
              `;
  
              tableBody.appendChild(newRow);
              $('#linenModal').modal('hide');
              document.getElementById('modal_jenis_linen').value = '';
              document.getElementById('modal_jumlah').value = '';
          }
      });
  
      document.querySelector('#linen-table tbody').addEventListener('click', function (e) {
          if (e.target.classList.contains('remove-linen')) {
              e.target.closest('tr').remove();
          }
      });
  });
</script>

{{-- Detail Jenis Linen dan Jumlah --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
@endsection

</body>
</html>
