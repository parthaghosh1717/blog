<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
  

class UserSeeder extends Seeder
{
    /**
     * Seed the user database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => bcrypt('admin'),
             
        ]);
    }
}

