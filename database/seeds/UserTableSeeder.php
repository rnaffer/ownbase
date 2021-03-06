<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = factory(App\User::class, 30)->create();
        $user = factory(App\User::class, 1)->create([
            'name' => 'Big',
            'second' => 'Boss',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123qazzxc'),
            'status' => 1,
            'role_id' => 1
        ]);
    }
}
