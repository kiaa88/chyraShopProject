<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KritikSaranController extends Controller
{
    // Method untuk menyimpan data dari form
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'email' => 'required|email',
            'pesan' => 'required|string|max:500',
        ]);

        // Simpan ke database
        DB::table('kritik_saran')->insert([
            'email' => $validatedData['email'],
            'pesan' => $validatedData['pesan'],
            'created_at' => now(),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Terima kasih atas kritik dan saran Anda!');
    }
}
