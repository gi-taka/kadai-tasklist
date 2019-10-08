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
        for ($index = 0; $index < 100; $index++) {
           DB::table('tasks')->insert([
               'status' => 'test title' . $index,
               'content' => 'test content' . $index
            ]); 
        }
    }
}
