<?php

use App\Models\AdminModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminModel::truncate();

        $admin = [
            'username' => 'ariesetiadi',
            'email' => 'ariesetiadi.sm@gmail.com',
            'password' => Hash::make('admin'),
            'created_date' => now()
        ];

        AdminModel::create($admin);
    }
}
