<?php

use Illuminate\Database\Seeder;

class StudiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studios')->insert([
          'id' => 1,
          'studio_name' => 'Shift Studios',
          'city' => 'Mount Lofty',
          'state' => 'Queensland',
          'country' => 'Australia',
          'street_address' => '2 Ross Street',
          'admin_email' => 'admin@shiftstudiosoz.com',
          'booking_email' => 'bookings@shiftstudiosoz.com',
          'created_at' => now(),
          'updated_at' => now()
        ]);

        DB::table('studio_users')->insert([
          'user_id' => 1,
          'studio_id' => 1,
          'roles' => 'Administrator',
          'created_at' => now(),
          'updated_at' => now()
        ]);

        DB::table('studio_bands')->insert([
          'band_id' => 1,
          'studio_id' => 1,
          'roles' => 'Author',
          'created_at' => now(),
          'updated_at' => now()
        ]);

        DB::table('studio_bands')->insert([
          'band_id' => 2,
          'studio_id' => 1,
          'roles' => 'Author',
          'created_at' => now(),
          'updated_at' => now()
        ]);

        DB::table('studio_bands')->insert([
          'band_id' => 3,
          'studio_id' => 1,
          'roles' => 'Editor',
          'created_at' => now(),
          'updated_at' => now()
        ]);

    }
}
