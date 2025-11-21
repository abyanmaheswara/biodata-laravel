<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalData; // <--- Pastikan baris ini ada!
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class PersonalDataController extends Controller
{
    // Menampilkan halaman utama (CV)
    public function index()
    {
        // Ambil data pertama dari database, biarkan Eloquent casts menangani konversi tipe data.
        $personalData = PersonalData::first(); 
        return view('personal-data.index', compact('personalData'));
    }

    // Menampilkan halaman form edit
    public function edit()
    {
        // Ambil data pertama untuk diedit, biarkan Eloquent casts menangani konversi tipe data.
        $personalData = PersonalData::first();
        return view('personal-data.edit', compact('personalData'));
    }

    // Memproses penyimpanan data (INI YANG TADI HILANG)
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'summary' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'skills_and_expertise' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'education' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dataToUpdate = $request->except('profile_photo');

        if ($request->hasFile('profile_photo')) {
            $data = PersonalData::first();
            // Delete old photo if it exists
            if ($data && $data->profile_photo && Storage::disk('public')->exists($data->profile_photo)) {
                Storage::disk('public')->delete($data->profile_photo);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $dataToUpdate['profile_photo'] = $path;
        }

        // Convert arrays to JSON strings
        if (isset($dataToUpdate['skills_and_expertise'])) {
            $dataToUpdate['skills_and_expertise'] = json_encode(array_map('trim', explode(',', $dataToUpdate['skills_and_expertise'])));
        }
        if (isset($dataToUpdate['work_experience'])) {
            $dataToUpdate['work_experience'] = json_encode(array_map('trim', preg_split('/\\r\\n|\\r|\\n/', $dataToUpdate['work_experience'])));
        }
        if (isset($dataToUpdate['education'])) {
            $dataToUpdate['education'] = json_encode(array_map('trim', preg_split('/\\r\\n|\\r|\\n/', $dataToUpdate['education'])));
        }

        PersonalData::updateOrCreate(
            ['id' => 1], // Assuming there's only one record to manage
            $dataToUpdate
        );

        return redirect()->route('personal-data.index')->with('success', 'Data pribadi berhasil diperbarui!');
    }
}