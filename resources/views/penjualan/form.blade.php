
<div>
    <div style="margin-bottom: 15px;">
        <label>Kode Transaksi</label>
        <input type="text" name="kode_transaksi"
            value="{{ old('kode_transaksi', $penjualan->kode_transaksi ?? '') }}"
            required>
        @error('kode_transaksi')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Tanggal</label>
        <input type="date" name="tanggal"
            value="{{ old('tanggal', isset($penjualan) ? $penjualan->tanggal->format('Y-m-d') : '') }}"
            required>
        @error('tanggal')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan"
            value="{{ old('nama_pelanggan', $penjualan->nama_pelanggan ?? '') }}"
            >
        @error('nama_pelanggan')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk"
            value="{{ old('nama_produk', $penjualan->nama_produk ?? '') }}"
            required>
        @error('nama_produk')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Jumlah</label>
        <input type="number" name="jumlah" min="1"
            value="{{ old('jumlah', $penjualan->jumlah ?? 1) }}"
            required>
        @error('jumlah')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Harga Satuan</label>
        <input type="number" name="harga_satuan" min="0" step="0.01"
            value="{{ old('harga_satuan', $penjualan->harga_satuan ?? '') }}"
            required>
        @error('harga_satuan')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Status</label>
        <select name="status" required>
            <option value="Selesai"
                {{ old('status', $penjualan->status ?? '') == 'Selesai' ? 'selected' : '' }}>
                Selesai
            </option>
            <option value="Pending"
                {{ old('status', $penjualan->status ?? '') == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>
        </select>
        @error('status')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 15px;">
        <label>Catatan</label>
        <textarea name="catatan">{{ old('catatan', $penjualan->catatan ?? '') }}</textarea>
        @error('catatan')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Simpan</button>
    <a href="{{ route('penjualan.index') }}">Kembali</a>
</div>
