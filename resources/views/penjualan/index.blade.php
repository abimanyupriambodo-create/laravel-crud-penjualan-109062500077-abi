
@extends('layouts.app')

@section('title', 'Daftar Penjualan')

@section('content')
    <h1>Daftar Penjualan</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('penjualan.create') }}">+ Tambah Penjualan</a>
   <form action="{{ route('penjualan.index') }}" method="GET" style="margin-top: 15px;">
    <input type="text" name="search"
        placeholder="Cari kode transaksi atau nama pelanggan..."
        value="{{ $keyword ?? '' }}">

    <select name="status">
        <option value="">Semua Status</option>
        <option value="Selesai" {{ ($status ?? '') == 'Selesai' ? 'selected' : '' }}>
            Selesai
        </option>
        <option value="Pending" {{ ($status ?? '') == 'Pending' ? 'selected' : '' }}>
            Pending
        </option>
    </select>

    <button type="submit">Cari / Filter</button>
    <a href="{{ route('penjualan.index') }}">Reset</a>
</form>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($penjualan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_transaksi }}</td>
                    <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('penjualan.show', $item->id) }}">Detail</a> |
                        <a href="{{ route('penjualan.edit', $item->id) }}">Edit</a> |

                        <form action="{{ route('penjualan.destroy', $item->id) }}"
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" align="center">Belum ada data penjualan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
