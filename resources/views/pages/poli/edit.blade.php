@extends('layouts.main')

@section('content')
    @extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">EDIT POLI</h5>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('poli.update', $poli->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_poli" class="form-label">Nama Poli</label>
                                    <input type="text" class="form-control" name="nama_poli" id="nama_poli"
                                        value="{{ old('nama_poli', $poli->nama_poli) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" id="keterangan"
                                        value="{{ old('nama_poli', $poli->keterangan) }}">
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
