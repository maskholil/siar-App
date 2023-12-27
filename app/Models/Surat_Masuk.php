<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model_Kaprodi;

class Surat_Masuk extends Model
{
    use HasFactory;
    protected $table = "table_surat_masuk";

    public function kaprodi()
    {
        return $this->belongsTo(Model_Kaprodi::class);
    }

}

