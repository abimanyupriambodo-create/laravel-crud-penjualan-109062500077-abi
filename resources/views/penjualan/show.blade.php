
@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')
    <h1>Detail Penjualan</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Kode Transaksi</th>
            <td>{{ $penjualan->kode_transaksi }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $penjualan->tanggal->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Nama Pelanggan</th>
            <td>{{ $penjualan->nama_pelanggan }}</td>
        </tr>
        <tr>
            <th>Nama Produk</th>
            <td>{{ $penjualan->nama_produk }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $penjualan->jumlah }}</td>
        </tr>
        <tr>
            <th>Harga Satuan</th>
            <td>Rp {{ number_format($penjualan->harga_satuan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>Rp {{ number_format($penjualan->total, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $penjualan->status }}</td>
        </tr>
        <tr>
            <th>Catatan</th>
            <td>{{ $penjualan->catatan ?? '-' }}</td>
        </tr>
    </table>

    <br>

    <a href="{{ route('penjualan.index') }}">Kembali</a>
    |
    <a href="{{ route('penjualan.edit', $penjualan->id) }}">Edit</a>
@endsection
