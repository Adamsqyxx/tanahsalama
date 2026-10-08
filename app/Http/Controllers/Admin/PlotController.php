<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlotController extends Controller
{
    /**
     * Menampilkan daftar semua petak.
     */
    public function index()
    {
        $plots = Plot::with('category')
            ->latest()
            ->paginate(15);

        return view('admin.plots.index', compact('plots'));
    }

    /**
     * Form tambah petak.
     */
    public function create()
    {
        $categories = Category::orderBy('nama_kategori')->get();

        return view('admin.plots.create', compact('categories'));
    }

    /**
     * Menyimpan petak baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'kode_plot' => 'required|string|max:20|unique:plots,kode_plot',
            'jenis_lahan' => 'required|in:Rumput,Tanah',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'category_id.required' => 'Kategori petak wajib dipilih.',
            'category_id.exists' => 'Kategori tidak ditemukan.',
            'kode_plot.required' => 'Kode petak wajib diisi.',
            'kode_plot.unique' => 'Kode petak tersebut sudah digunakan.',
            'jenis_lahan.required' => 'Jenis lahan wajib dipilih.',
            'jenis_lahan.in' => 'Jenis lahan tidak valid.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 5 MB.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload gambar
        |--------------------------------------------------------------------------
        */

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')
                ->store('plot-images', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Simpan petak
        |--------------------------------------------------------------------------
        */

        Plot::create([
            'category_id' => $validated['category_id'],
            'kode_plot' => strtoupper($validated['kode_plot']),
            'jenis_lahan' => $validated['jenis_lahan'],
            'status' => 'AVAILABLE',
            'deskripsi' => $validated['deskripsi'] ?? null,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('admin.plots.index')
            ->with('success', 'Petak berhasil ditambahkan.');
    }

    /**
     * Form edit petak.
     */
    public function edit(Plot $plot)
    {
        $categories = Category::orderBy('nama_kategori')->get();

        return view('admin.plots.edit', compact(
            'plot',
            'categories'
        ));
    }

    /**
     * Memperbarui petak.
     */
    public function update(Request $request, Plot $plot)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'kode_plot' => 'required|string|max:20|unique:plots,kode_plot,' . $plot->id,
            'jenis_lahan' => 'required|in:Rumput,Tanah',
            'status' => 'required|in:AVAILABLE,BOOKED,OCCUPIED',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'category_id.required' => 'Kategori petak wajib dipilih.',
            'category_id.exists' => 'Kategori tidak ditemukan.',
            'kode_plot.required' => 'Kode petak wajib diisi.',
            'kode_plot.unique' => 'Kode petak tersebut sudah digunakan.',
            'jenis_lahan.required' => 'Jenis lahan wajib dipilih.',
            'jenis_lahan.in' => 'Jenis lahan tidak valid.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 5 MB.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Data petak
        |--------------------------------------------------------------------------
        */

        $data = [
            'category_id' => $validated['category_id'],
            'kode_plot' => strtoupper($validated['kode_plot']),
            'jenis_lahan' => $validated['jenis_lahan'],
            'status' => $validated['status'],
            'deskripsi' => $validated['deskripsi'] ?? null,
        ];

        /*
        |--------------------------------------------------------------------------
        | Upload gambar baru jika ada
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            // Simpan gambar baru
            $gambarBaru = $request->file('gambar')
                ->store('plot-images', 'public');

            // Hapus gambar lama jika ada
            if (
                $plot->gambar &&
                Storage::disk('public')->exists($plot->gambar)
            ) {
                Storage::disk('public')->delete($plot->gambar);
            }

            // Masukkan gambar baru ke data update
            $data['gambar'] = $gambarBaru;
        }

        /*
        |--------------------------------------------------------------------------
        | Update petak
        |--------------------------------------------------------------------------
        */

        $plot->update($data);

        return redirect()
            ->route('admin.plots.index')
            ->with('success', 'Petak berhasil diperbarui.');
    }

    /**
     * Menghapus petak.
     */
    public function destroy(Plot $plot)
    {
        /*
        |--------------------------------------------------------------------------
        | Petak BOOKED / OCCUPIED tidak boleh dihapus
        |--------------------------------------------------------------------------
        */

        if (in_array($plot->status, ['BOOKED', 'OCCUPIED'])) {
            return back()->with(
                'error',
                'Petak yang sedang BOOKED atau OCCUPIED tidak dapat dihapus.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Hapus gambar dari storage
        |--------------------------------------------------------------------------
        */

        if (
            $plot->gambar &&
            Storage::disk('public')->exists($plot->gambar)
        ) {
            Storage::disk('public')->delete($plot->gambar);
        }

        /*
        |--------------------------------------------------------------------------
        | Hapus data petak
        |--------------------------------------------------------------------------
        */

        $plot->delete();

        return redirect()
            ->route('admin.plots.index')
            ->with('success', 'Petak berhasil dihapus.');
    }
}