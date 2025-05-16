@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">TAMBAH OBAT</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('obat.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_obat" class="form-label">Nama Obat</label>
                                    <input type="text" class="form-control" name="nama_obat" id="nama_obat">
                                </div>
                                <div class="mb-3">
                                    <label for="kemasan" class="form-label">Kemasan</label>
                                    <input type="text" class="form-control" name="kemasan" id="kemasan">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" name="harga" id="harga">
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
