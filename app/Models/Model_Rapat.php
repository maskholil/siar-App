<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Rapat extends Model
{
    use HasFactory;
    protected $table = "table_rapat";
    protected $fillable = ['tanggal', 'tempat', 'judul', 'agenda', 'dipimpin', 'sekertaris', 'jabatan_sekertaris', 'jabatan_pimpinan', 'rapat_dibuka', 'rapat_ditutup', 'hasil', 'file', 'created_at', 'updated_at'];
}
