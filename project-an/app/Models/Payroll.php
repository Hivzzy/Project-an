<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $table = "daftar_gaji";
    protected $primary_key = "id";
    protected $fillable = [
        'id',
        'nama_karyawan',
        'email',
        'jabatan',
        'hari_kerja',
        'gaji_perhari',
        'gaji_kotor',
        'tambahan',
        'kasbon',
        'gaji_bersih'
    ];
}
