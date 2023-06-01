<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyReport extends Model
{
    use HasFactory;

    protected $table = "monthly_reports";
    protected $primary_key = "id";
    protected $fillable = [
        'periode',
        'tot_gaji_perhari',
        'tot_gaji_kotor',
        'tot_tambahan',
        'tot_kasbon',
        'tot_gaji_bersih',
    ];
}
