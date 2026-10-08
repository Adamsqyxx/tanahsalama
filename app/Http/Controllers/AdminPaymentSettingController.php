<?php

namespace App\Http\Controllers;

use App\Models\PaymentSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPaymentSettingController extends Controller
{
    /**
     * Menampilkan halaman pengaturan pembayaran.
     */
    public function edit()
    {
        $setting = PaymentSetting::first();

        return view('admin.payment-settings.edit', compact('setting'));
    }

    /**
     * Menyimpan perubahan pengaturan pembayaran.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_bank' => ['required', 'string', 'max:100'],
            'nomor_rekening' => ['required', 'string', 'max:50'],
            'nama_rekening' => ['required', 'string', 'max:100'],

            'qris' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ], [
            'nama_bank.required' => 'Nama bank wajib diisi.',
            'nomor_rekening.required' => 'Nomor rekening wajib diisi.',
            'nama_rekening.required' => 'Nama pemilik rekening wajib diisi.',
            'qris.image' => 'File QRIS harus berupa gambar.',
            'qris.mimes' => 'QRIS hanya boleh berupa JPG, JPEG, atau PNG.',
            'qris.max' => 'Ukuran QRIS maksimal 2 MB.',
        ]);

        $setting = PaymentSetting::first();

        if (!$setting) {
            $setting = new PaymentSetting();
        }

        $setting->nama_bank = $request->nama_bank;
        $setting->nomor_rekening = $request->nomor_rekening;
        $setting->nama_rekening = $request->nama_rekening;

        /*
         * Jika admin mengupload QRIS baru,
         * hapus QRIS lama terlebih dahulu.
         */
        if ($request->hasFile('qris')) {

            if ($setting->qris) {
                Storage::disk('public')->delete($setting->qris);
            }

            $setting->qris = $request->file('qris')
                ->store('qris', 'public');
        }

        $setting->save();

        return redirect()
            ->route('admin.payment-settings.edit')
            ->with('success', 'Pengaturan pembayaran berhasil diperbarui.');
    }
}