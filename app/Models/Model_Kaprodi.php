<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Kaprodi extends Model
{
    use HasFactory;
    protected $table = "table_kaprodi";
    protected $fillable = ['fakultas', 'nama_kaprodi'];

    public function suratMasuk()
    {
        return $this->hasMany(Surat_Masuk::class);
    }

   
}
