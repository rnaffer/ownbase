<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = DB::table('modules')->get();

        foreach ($modules as $key => $module) {
            DB::table('permissions')->insert([
                'role_id' => 1,
                'module_id' => $module->id,
                'addon' => 1,
                'edit' => 1,
                'see' => 1,
                'disable' => 1
            ]);
        }
    }
}
