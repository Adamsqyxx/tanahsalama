<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Halaman pengaturan akun admin
     */
    public function edit()
    {
        $adminId = session('admin_id');

        if (!$adminId) {
            return redirect()
                ->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $admin = User::where('id', $adminId)
            ->where('role', 'admin')
            ->first();

        if (!$admin) {
            session()->forget([
                'admin_id',
                'admin_name',
            ]);

            return redirect()
                ->route('admin.login')
                ->with('error', 'Data admin tidak ditemukan. Silakan login kembali.');
        }

        return view('admin.account.edit', compact('admin'));
    }

    /**
     * Ubah password admin
     */
    public function updatePassword(Request $request)
    {
        $adminId = session('admin_id');

        if (!$adminId) {
            return redirect()
                ->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $admin = User::where('id', $adminId)
            ->where('role', 'admin')
            ->first();

        if (!$admin) {
            session()->forget([
                'admin_id',
                'admin_name',
            ]);

            return redirect()
                ->route('admin.login')
                ->with('error', 'Data admin tidak ditemukan. Silakan login kembali.');
        }

        $request->validate([
            'current_password' => [
                'required',
                'string',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        // Cek password lama
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()
                ->withInput()
                ->withErrors([
                    'current_password' => 'Kata sandi saat ini tidak sesuai.',
                ]);
        }

        // Password baru tidak boleh sama dengan password lama
        if (Hash::check($request->password, $admin->password)) {
            return back()
                ->withInput()
                ->withErrors([
                    'password' => 'Kata sandi baru harus berbeda dari kata sandi saat ini.',
                ]);
        }

        // Simpan password baru
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()
            ->route('admin.account.edit')
            ->with('success', 'Kata sandi berhasil diubah.');
    }
}
