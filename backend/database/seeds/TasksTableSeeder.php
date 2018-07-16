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
        DB::table('tasks')->insert(['description' => "Study vuejs v2","details"=>"Study Vuejs which is frontend framework with cli"]);
        DB::table('tasks')->insert(['description' => "make todo task","details"=>"Make to do tasks or crud operations as you like"]);
        DB::table('tasks')->insert(['description' => "test your todo tasks app","details"=>"Test your app as you got"]);
        DB::table('tasks')->insert(['description' => "SWAGGER","details"=>"Study swagger which make doc for your API backend"]);
        DB::table('tasks')->insert(['description' => "UNIT TEST","details"=>"Study unit test for backend"]);
    }
}
