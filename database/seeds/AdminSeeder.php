<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'Admin' , 'email' => 'admin@admin.com' , 'password' => 'admin' , 'role' => 'admin' , 'phone' => '081290404447']);
    }
}