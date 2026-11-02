<?php
namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(Request $request)
{
    $keyword = $request->input('search');

    $penjualan = Penjualan::when($keyword, function ($query) use ($keyword) {
        $query->where('kode_transaksi', 'like', "%{$keyword}%")
              ->orWhere('nama_pelanggan', 'like', "%{$keyword}%");
    })
    ->latest()
    ->get();

    return view('penjualan.index', compact('penjualan', 'keyword'));
}

    public function create()
    {
        return view('penjualan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_transaksi' => 'required|unique:penjualan,kode_transaksi',
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
            'status' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $validated['total'] = $validated['jumlah'] * $validated['harga_satuan'];

        Penjualan::create($validated);

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $penjualan = Penjualan::findOrFail($id);

        return view('penjualan.show', compact('penjualan'));
    }

    public function edit(string $id)
    {
        $penjualan = Penjualan::findOrFail($id);

        return view('penjualan.edit', compact('penjualan'));
    }

    public function update(Request $request, string $id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $validated = $request->validate([
            'kode_transaksi' => 'required|unique:penjualan,kode_transaksi,' . $id,
            'tanggal' => 'required|date',
            'nama_pelanggan' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
            'status' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $validated['total'] = $validated['jumlah'] * $validated['harga_satuan'];

        $penjualan->update($validated);

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $penjualan->delete();

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil dihapus.');
    }
}
