<?php

namespace Database\Seeders;

use App\Models\Payroll;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payroll::create([
            'id' => Uuid::uuid4()->toString(),
            'nama_karyawan' => 'Irfan',
            'email' => 'habbanma@gmail.com',
            'jabatan' => 'Accounting',
            'hari_kerja' => 23,
            'gaji_perhari' => 120000,
            'gaji_kotor' => 2760000,
            'tambahan' => 500000,
            'kasbon' => 200000,
            'gaji_bersih' => 3060000,
        ]);
        Payroll::create([
            'id' => Uuid::uuid4()->toString(),
            'nama_karyawan' => 'Irfan Petrio Nugroho',
            'email' => 'habbanma@gmail.com',
            'jabatan' => 'Accounting',
            'hari_kerja' => 23,
            'gaji_perhari' => 120000,
            'gaji_kotor' => 2760000,
            'tambahan' => 500000,
            'kasbon' => 200000,
            'gaji_bersih' => 3060000,
        ]);
    }
}
