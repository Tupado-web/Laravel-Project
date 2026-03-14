@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center card-header">
                <h4 class="card-title">Data Pegawai</h4>

                <a href="{{ route('pegawai.create') }}" class="btn btn-primary"> + Tambah </a>
            </div>
            <div class="card-body">
                <form action="{{ route('pegawai.index') }}" method="get" class="mb-3">
                    <div style="display:flex; gap:10px;">
                        <input type="text" name="search" value="{{ $search }}"
                        placeholder="Cari nama / jabatan..."
                        class="form-control">

                        <button type="submit" class="btn btn-primary">
                            Search
                        </button>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead class="text-center align-middle">
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Alamat</th>
                            <th>Umur</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $index => $item)
                            <tr>
                                <td>{{ $pegawai->firstItem() + $index }}</td>
                                <td>{{ $item->nama_pegawai }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->umur }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td><a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('pegawai.destroy', $item->id) }}" method="post" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Hapus data?')">Delete</button>
                                    </form>
                                    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $pegawai->appends(['search' => $search])->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
