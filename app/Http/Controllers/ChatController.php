<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    /**
     * Halaman utama Chat Admin.
     */
    public function index(Request $request)
    {
        $chat = null;

        /*
        |--------------------------------------------------------------------------
        | Coba ambil chat dari session
        |--------------------------------------------------------------------------
        */
        if ($request->session()->has('kode_chat')) {

            $chat = Chat::where(
                'kode_chat',
                $request->session()->get('kode_chat')
            )
                ->with('messages')
                ->first();

            if ($chat) {
                $chat->messages()
                    ->where('pengirim', 'ADMIN')
                    ->where('dibaca', false)
                    ->update([
                        'dibaca' => true
                    ]);
            }
        }

        return view('chat.index', compact('chat'));
    }


    /**
     * Customer membuat percakapan baru.
     */
    public function start(Request $request)
    {
        $validated = $request->validate([
            'nama_customer' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'pesan' => 'required|string|max:2000',
        ], [
            'nama_customer.required' => 'Nama wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'pesan.required' => 'Pesan wajib diisi.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Buat kode chat unik
        |--------------------------------------------------------------------------
        */
        do {

            $kodeChat =
                'CHAT-' .
                strtoupper(Str::random(9));

        } while (
            Chat::where('kode_chat', $kodeChat)->exists()
        );


        /*
        |--------------------------------------------------------------------------
        | Buat chat
        |--------------------------------------------------------------------------
        */
        $chat = Chat::create([
            'kode_chat' => $kodeChat,
            'nama_customer' => $validated['nama_customer'],
            'no_hp' => $validated['no_hp'],
            'status' => 'WAITING',
            'last_message_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | Simpan pesan pertama
        |--------------------------------------------------------------------------
        */
        $chat->messages()->create([
            'pengirim' => 'CUSTOMER',
            'pesan' => $validated['pesan'],
            'dibaca' => false,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Simpan kode chat ke session
        |--------------------------------------------------------------------------
        */
        $request->session()->put(
            'kode_chat',
            $chat->kode_chat
        );


        return redirect()
            ->route('chat.index')
            ->with(
                'success',
                'Pesan berhasil dikirim ke pengelola.'
            );
    }


    /**
     * Customer melanjutkan percakapan.
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'pesan' => 'required|string|max:2000',
        ], [
            'pesan.required' => 'Pesan tidak boleh kosong.',
        ]);


        $kodeChat = $request->session()->get(
            'kode_chat'
        );


        if (!$kodeChat) {

            return redirect()
                ->route('chat.index')
                ->with(
                    'error',
                    'Silakan masukkan kode chat Anda terlebih dahulu.'
                );
        }


        $chat = Chat::where(
            'kode_chat',
            $kodeChat
        )->first();


        if (!$chat) {

            $request->session()->forget(
                'kode_chat'
            );

            return redirect()
                ->route('chat.index')
                ->with(
                    'error',
                    'Percakapan tidak ditemukan.'
                );
        }


        if ($chat->status === 'CLOSED') {

            return redirect()
                ->route('chat.index')
                ->with(
                    'error',
                    'Percakapan ini sudah ditutup oleh pengelola.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan pesan customer
        |--------------------------------------------------------------------------
        */
        $chat->messages()->create([
            'pengirim' => 'CUSTOMER',
            'pesan' => $validated['pesan'],
            'dibaca' => false,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Update status
        |--------------------------------------------------------------------------
        */
        $chat->update([
            'status' => 'WAITING',
            'last_message_at' => now(),
        ]);


        return redirect()->route(
            'chat.index'
        );
    }


    /**
     * Customer memasukkan kode chat + nomor HP
     * untuk membuka kembali percakapan.
     */
    public function continueChat(Request $request)
    {
        $validated = $request->validate([
            'kode_chat' => 'required|string|max:30',
            'no_hp' => 'required|string|max:20',
        ], [
            'kode_chat.required' => 'Kode chat wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Cari chat berdasarkan kode + nomor HP
        |--------------------------------------------------------------------------
        */
        $chat = Chat::where(
            'kode_chat',
            strtoupper(trim($validated['kode_chat']))
        )
            ->where(
                'no_hp',
                trim($validated['no_hp'])
            )
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Chat tidak ditemukan
        |--------------------------------------------------------------------------
        */
        if (!$chat) {

            return back()
                ->withErrors([
                    'kode_chat' =>
                        'Kode chat atau nomor HP tidak sesuai.'
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan kembali kode chat ke session
        |--------------------------------------------------------------------------
        */
        $request->session()->put(
            'kode_chat',
            $chat->kode_chat
        );


        return redirect()->route(
            'chat.index'
        );
    }
}