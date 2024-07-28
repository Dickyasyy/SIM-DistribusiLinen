@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama" class="col-md-2 col-form-label text-md-start">{{ __('Nama') }}</label>

                            <div class="col-md-10">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama_petugas" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-2 col-form-label text-md-start">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Unit</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="unit" value="{{ old('unit') }}">
                                        <option selected disabled>Pilih Unit</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->nama_unit }}">{{ $unit->nama_unit }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jabatan</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jabatan" value="{{ old('jabatan') }}">
                                      <option selected disabled>Pilih Jabatan</option>
                                      <option>petugas linen</option>
                                      <option>petugas laundry</option>
                                      <option>kepala instalasi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-10">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
