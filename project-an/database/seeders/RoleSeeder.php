<?php

namespace Database\Seeders;

use App\Models\RoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleModel::create([
            'role_name' => 'Top Management',
        ]);
        RoleModel::create([
            'role_name' => 'Accounting',
        ]);
    }
}
