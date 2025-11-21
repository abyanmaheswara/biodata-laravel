<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Tambahkan 'id' di bagian paling depan
    protected $fillable = [
        'id', 
        'name', 
        'role', 
        'about', 
        'photo', 
        'instagram', 
        'linkedin', 
        'github', 
        'skills'
    ];
}