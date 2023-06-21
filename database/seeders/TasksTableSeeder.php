<?php

namespace Database\Seeders;

use App\Models\TaskModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaskModel::truncate();

        $faker = \Faker\Factory::create();

        $statusList = ['To Do', 'Doing', 'Done', 'Closed'];

        for ($i = 0; $i < 50; $i++) {
            $randomStatus = $statusList[array_rand($statusList)];

            TaskModel::create([
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'status' => $randomStatus,
                'date_created' => $faker->dateTime(new \DateTime('-1 days')),
                'date_updated' => $faker->dateTime(),
                'due_date' => $faker->dateTime(new \DateTime('+1 days')),
                'date_closed' => ($randomStatus === 'Closed') ? $faker->dateTime() : null,
                'date_done' => ($randomStatus === 'Done') ? $faker->dateTime() : null,
                'archived' => $faker->boolean(),
                'time_spent' => $faker->randomNumber(8)
            ]);
        }
    }
}
