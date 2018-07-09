<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert(['description' => "study vuejs v2"]);
        DB::table('tasks')->insert(['description' => "make todo task"]);
        DB::table('tasks')->insert(['description' => "test your todo tasks app"]);

    }
}
