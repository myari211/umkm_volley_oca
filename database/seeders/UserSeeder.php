<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "id" => Uuid::uuid4()->toString(),
            "first_name" => 'Super',
            'last_name' => 'Admin',
            "email" => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            "id" => Uuid::uuid4()->toString(),
            "first_name" => "Ari",
            "last_name" => "Pratama",
            "email" => 'apputra16@gmail.com',
            "password" => bcrypt('dimas2011'),
        ]);
        $user->assignRole('user');
    }
}
