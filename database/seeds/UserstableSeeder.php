<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=>'admin',
            'password'=>bcrypt('admin'),
            'email'=> 'admin@admin.com',
            'admin'=> 1,
            'avatar'=> 'avatars/avatar.png'
        ]);

        App\User::create([
            'name'=>'mosaab',
            'password'=>bcrypt('admin'),
            'email'=>'mosaab@mosaab.com',
            'avatar'=>'avatars/avatar.png'
        ]);
    }
}
