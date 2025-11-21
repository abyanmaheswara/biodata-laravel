<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalData; // <--- Pastikan baris ini ada!

class PersonalDataController extends Controller
{
    // Menampilkan halaman utama (CV)
    public function index()
    {
        // Ambil data pertama dari database
        $personalData = PersonalData::first(); 
        return view('personal-data.index', compact('personalData'));
    }

    // Menampilkan halaman form edit
    public function edit()
    {
        // Ambil data pertama untuk diedit
        $personalData = PersonalData::first();
        return view('personal-data.edit', compact('personalData'));
    }

    // Memproses penyimpanan data (INI YANG TADI HILANG)
    public function update(Request $request)
    {
        // Ambil data yang mau diedit
        $data = PersonalData::first();

        // Update datanya sesuai inputan form
        $data->update([
            'name'    => $request->name,
            'title'   => $request->title,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'summary' => $request->summary,
        ]);

        // Kembali ke halaman utama setelah simpan
        return redirect()->route('personal-data.index');
    }
}