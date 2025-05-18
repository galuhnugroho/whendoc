@extends('layouts.main')

@section('title', 'Tambah Dokter')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">TAMBAH DOKTER</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dokter.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama dokter</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No. HP</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp">
                                </div>
                                <div class="mb-3">
                                    <label for="id_poli" class="form-label">Poli</label>
                                    <select name="id_poli" id="id_poli" class="form-control">
                                        <option value="">Pilih Poli</option>
                                        @foreach ($polis as $poli)
                                            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="mb-3">
                                    <label for="password_konfirmasi" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password_konfirmasi"
                                        id="password_konfirmasi">
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
