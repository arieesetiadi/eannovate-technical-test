<?php

use App\Models\StudentModel;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentModel::truncate();

        for ($i = 1; $i <= 50; $i++) {
            StudentModel::create([
                'id' => 'STD' . $i,
                'username' => 'student' . $i,
                'email' => 'student' . $i . '@gmail.com',
                'age' => 17,
                'phone_number' => '082' . $i . 'xxxxxxxx',
                'picture' => '',
                'created_by' => 'ariesetiadi',
                'created_date' => now()->subDay(1)->addMinute($i),
                'modified_by' => 'ariesetiadi',
                'modified_date' => now()->subDay(1)->addMinute($i)
            ]);
        }
    }
}
