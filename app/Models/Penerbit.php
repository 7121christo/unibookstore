<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'kota', 'telepon'];

    public function bukus()
    {
        return $this->hasMany(Buku::class, );
    }
}