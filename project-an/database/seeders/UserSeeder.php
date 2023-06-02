<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::create([
            'role_id' => 1,
            'name' => 'Top Management',
            'username' => 'top_management',
            'password' => bcrypt('cihampelashotelgroup'),
        ]);
        UserModel::create([
            'role_id' => 2,
            'name' => 'Dedi Kurnia',
            'username' => 'accounting',
            'password' => bcrypt('cihampelashotelgroup'),
        ]);
    }
}
