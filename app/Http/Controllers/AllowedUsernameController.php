<?php

namespace App\Http\Controllers; // Mendefinisikan namespace untuk controller ini

use Illuminate\Http\Request; // Mengimpor kelas Request dari Laravel untuk menangani HTTP request
use Illuminate\Support\Facades\Cache; // Mengimpor kelas Cache dari Laravel untuk menangani caching

class AllowedUsernameController extends Controller // Mendefinisikan kelas controller yang bernama AllowedUsernameController
{
    // Fungsi untuk menampilkan halaman dengan daftar username yang diizinkan
    public function index()
    {
        // Mengambil daftar username yang diizinkan dari cache, defaultnya adalah ['bayuwisnu92']
        $allowedUsernames = Cache::get('allowed_usernames', ['bayuwisnu92']);
        // Mengembalikan view 'dashboard.allowed_usernames.index' dengan variabel allowedUsernames
        return view('dashboard.allowed_usernames.index', compact('allowedUsernames'));
    }

    // Fungsi untuk menyimpan username baru ke dalam daftar yang diizinkan
    public function store(Request $request)
    {
        // Memvalidasi request untuk memastikan username adalah string yang tidak kosong
        $request->validate(['username' => 'required|string']);
        
        // Mengambil daftar username yang diizinkan dari cache, defaultnya adalah ['bayuwisnu92']
        $allowedUsernames = Cache::get('allowed_usernames', ['bayuwisnu92']);
        // Menambahkan username baru ke dalam daftar
        $allowedUsernames[] = $request->username;
        // Menyimpan kembali daftar username yang diperbarui ke cache
        Cache::put('allowed_usernames', $allowedUsernames);
        
        // Mengarahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    // Fungsi untuk menghapus username dari daftar yang diizinkan
    public function destroy($username)
    {
        // Mengambil daftar username yang diizinkan dari cache, defaultnya adalah ['bayuwisnu92']
        $allowedUsernames = Cache::get('allowed_usernames', ['bayuwisnu92']);
        // Menghapus username yang sesuai dari daftar
        $allowedUsernames = array_filter($allowedUsernames, function($u) use ($username) {
            return $u !== $username;
        });
        // Menyimpan kembali daftar username yang diperbarui ke cache
        Cache::put('allowed_usernames', $allowedUsernames);
        
        // Mengarahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }
}
