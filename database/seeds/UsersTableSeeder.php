<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin Admin',
            'email' => 'admin@studiocentral.com',
            'email_verified_at' => now(),
            'password' => Hash::make('C12h22o11!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('profiles')->insert([
            'user_id' => 1,
            'avatar' => '',
            'dob' => '1979-09-10',
            'address_physical' => '2 Ross Street, Mount Lofty, QLD, Australia 4350',
            'address_postal' => '2 Ross Street, Mount Lofty, QLD, Australia 4350',
            'roles' => 'Administrator',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
