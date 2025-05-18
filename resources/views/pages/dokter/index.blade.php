@extends('layouts.main')

@section('title', 'Dokter')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">DAFTAR DOKTER</h5>
                <a href="{{ route('dokter.create') }}" class="btn btn-primary m-1">Tambah</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. Hp</th>
                                <th>Poli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokters as $dokter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dokter->nama }}</td>
                                    <td>{{ $dokter->alamat }}</td>
                                    <td>{{ $dokter->no_hp }}</td>
                                    <td>{{ $dokter->poli?->nama_poli ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('dokter.edit', $dokter->id) }}"
                                            class="btn btn-warning btn-sm m-1">Edit</a>
                                        <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm m-1"
                                                onclick="return confirm('are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
