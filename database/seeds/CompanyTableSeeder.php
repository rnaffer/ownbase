<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'company',
            'identification' => '1645644564',
            'address' => 'address',
            'phone' => '15215165',
            'cellphone' => '4564561516',
            'website' => 'website.com',
            'email' => 'mail@gmail.com',
            'logo_url' => 'domain.com/url',
            'state' => 1,
        ]);
    }
}
