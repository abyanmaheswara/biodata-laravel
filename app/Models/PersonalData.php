<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    // Supaya semua kolom bisa diisi (kecuali ID)
    protected $guarded = ['id'];

    // [PENTING] Ini obat error "Array to string conversion"
    // Ini nyuruh Laravel: "Eh, kalau ada array di kolom ini, ubah jadi JSON pas disimpen!"
    protected $casts = [
        'skills' => 'array',
        'experience' => 'array',
        'education' => 'array',
    ];
}