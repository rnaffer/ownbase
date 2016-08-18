<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            ['title' => 'home', 'father_id' => 1],
            ['title' => 'users', 'father_id' => 1],
            ['title' => 'roles', 'father_id' => 1],
            ['title' => 'company', 'father_id' => 1],
        ];

        foreach ($modules as $key => $module) {
            DB::table('modules')->insert($module);
        }
    }
}
