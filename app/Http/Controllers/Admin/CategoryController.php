<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan semua kategori.
     */
    public function index()
    {
        $categories = Category::withCount('plots')
            ->orderBy('nama_kategori')
            ->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Form tambah kategori.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:categories,nama_kategori',
            'luas' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',

            'harga' => 'required|numeric|min:0',
            'booking_fee' => 'required|numeric|min:0',
            'harga_cash' => 'required|numeric|min:0',
            'cicilan_12' => 'required|numeric|min:0',
            'cicilan_24' => 'required|numeric|min:0',
            'cicilan_36' => 'required|numeric|min:0',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Kategori tersebut sudah tersedia.',

            'harga.required' => 'Harga petak wajib diisi.',
            'harga.numeric' => 'Harga petak harus berupa angka.',

            'booking_fee.required' => 'Booking fee wajib diisi.',
            'booking_fee.numeric' => 'Booking fee harus berupa angka.',

            'harga_cash.required' => 'Harga cash wajib diisi.',
            'harga_cash.numeric' => 'Harga cash harus berupa angka.',

            'cicilan_12.required' => 'Cicilan 12 bulan wajib diisi.',
            'cicilan_12.numeric' => 'Cicilan 12 bulan harus berupa angka.',

            'cicilan_24.required' => 'Cicilan 24 bulan wajib diisi.',
            'cicilan_24.numeric' => 'Cicilan 24 bulan harus berupa angka.',

            'cicilan_36.required' => 'Cicilan 36 bulan wajib diisi.',
            'cicilan_36.numeric' => 'Cicilan 36 bulan harus berupa angka.',
        ]);

        Category::create([
            'nama_kategori' => $validated['nama_kategori'],
            'luas' => $validated['luas'] ?? null,
            'deskripsi' => $validated['deskripsi'] ?? null,

            'harga' => $validated['harga'],
            'booking_fee' => $validated['booking_fee'],
            'harga_cash' => $validated['harga_cash'],
            'cicilan_12' => $validated['cicilan_12'],
            'cicilan_24' => $validated['cicilan_24'],
            'cicilan_36' => $validated['cicilan_36'],
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Form edit kategori.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Memperbarui kategori.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:categories,nama_kategori,' . $category->id,
            'luas' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',

            'harga' => 'required|numeric|min:0',
            'booking_fee' => 'required|numeric|min:0',
            'harga_cash' => 'required|numeric|min:0',
            'cicilan_12' => 'required|numeric|min:0',
            'cicilan_24' => 'required|numeric|min:0',
            'cicilan_36' => 'required|numeric|min:0',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Kategori tersebut sudah tersedia.',

            'harga.required' => 'Harga petak wajib diisi.',
            'harga.numeric' => 'Harga petak harus berupa angka.',

            'booking_fee.required' => 'Booking fee wajib diisi.',
            'booking_fee.numeric' => 'Booking fee harus berupa angka.',

            'harga_cash.required' => 'Harga cash wajib diisi.',
            'harga_cash.numeric' => 'Harga cash harus berupa angka.',

            'cicilan_12.required' => 'Cicilan 12 bulan wajib diisi.',
            'cicilan_12.numeric' => 'Cicilan 12 bulan harus berupa angka.',

            'cicilan_24.required' => 'Cicilan 24 bulan wajib diisi.',
            'cicilan_24.numeric' => 'Cicilan 24 bulan harus berupa angka.',

            'cicilan_36.required' => 'Cicilan 36 bulan wajib diisi.',
            'cicilan_36.numeric' => 'Cicilan 36 bulan harus berupa angka.',
        ]);

        $category->update([
            'nama_kategori' => $validated['nama_kategori'],
            'luas' => $validated['luas'] ?? null,
            'deskripsi' => $validated['deskripsi'] ?? null,

            'harga' => $validated['harga'],
            'booking_fee' => $validated['booking_fee'],
            'harga_cash' => $validated['harga_cash'],
            'cicilan_12' => $validated['cicilan_12'],
            'cicilan_24' => $validated['cicilan_24'],
            'cicilan_36' => $validated['cicilan_36'],
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori.
     */
    public function destroy(Category $category)
    {
        // Cek apakah kategori masih digunakan oleh petak.
        if ($category->plots()->exists()) {
            return back()->with(
                'error',
                'Kategori tidak dapat dihapus karena masih digunakan oleh petak makam.'
            );
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}