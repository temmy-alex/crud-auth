<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Mass Assignment
    // Digunakan untuk menangkap request dari form ke controller
    public $fillable = ['title', 'description', 'image', 'user_id'];

    // Fungsi untuk memanggil gambar
    public function getImage()
    {
        return asset($this->image);
    }
}
