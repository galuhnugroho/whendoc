@extends('layouts.main')

@section('title', 'Edit Dokter')

@section('content')
    @extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">EDIT DOKTER</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Dokter</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ old('nama', $dokter->nama) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                        value="{{ old('alamat', $dokter->alamat) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No. HP</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp"
                                        value="{{ old('no_hp', $dokter->no_hp) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="id_poli" class="form-label">Poli</label>
                                    <select name="id_poli" id="id_poli" class="form-control">
                                        <option value="">Pilih Poli</option>
                                        @foreach ($polis as $poli)
                                            <option value="{{ $poli->id }}"
                                                {{ $poli->id == $dokter->id_poli ? 'selected' : '' }}>
                                                {{ $poli->nama_poli }}</option>
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
                                <div class="mb-3">
                                    <p>Kosongkan password jika tidak ingin mengganti</p>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@endsection
