<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $user = User::factory()->create();

        Task::factory(10)->create();

        // Task::create([
        //     'user_id' => $user->id,
        //     'name' => "Task 1",
        //     'slug' => "task-1",
        //     'description' => "task 1 description",
        //     'published_at' => date('Y-m-d H:i:s'),
        //     'status' => true
        // ]);

        // Task::create([
        //     'user_id' => $user->id,
        //     'name' => "Task 2",
        //     'description' => "task 2 description",
        //     'slug' => "task-2",
        //     'published_at' => date('Y-m-d H:i:s'),
        //     'status' => true
        // ]);

        // Task::create([
        //     'user_id' => $user->id,
        //     'name' => "Task 3",
        //     'description' => "task 3 description",
        //     'slug' => "task-3",
        //     'published_at' => date('Y-m-d H:i:s'),
        //     'status' => true
        // ]);
    }
}
