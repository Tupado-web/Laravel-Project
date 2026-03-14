@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col md-4">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header">
                        Tambah data pegawai
                    </div>
                    <div class="card-body p-5">
                            <form action="{{ route('pegawai.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama_pegawai" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Umur</label>
                                    <input type="text" name="umur" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="">-- PILIH --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Laki-laki">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Gaji</label>
                                    <input type="number" name="gaji" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('pegawai.index') }}" class="btn btn-warning">Balik</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
