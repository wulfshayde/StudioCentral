<?php

use Illuminate\Database\Seeder;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('bands')->insert([
        'id' => 1,
        'band_name' => 'Thy Martyr',
        'genres' => 'Metal,Thrash Metal',
        'created_at' => now(),
        'updated_at' => now()
      ]);

      DB::table('bands')->insert([
        'id' => 2,
        'band_name' => 'Vicious Apathy',
        'genres' => 'Metal,Thrash Metal',
        'created_at' => now(),
        'updated_at' => now()
      ]);

      DB::table('bands')->insert([
        'id' => 3,
        'band_name' => 'NonBerk',
        'genres' => 'Progressive',
        'created_at' => now(),
        'updated_at' => now()
      ]);

      DB::table('band_users')->insert([
        'user_id' => 1,
        'band_id' => 1,
        'roles' => 'Administrator,Drummer',
        'created_at' => now(),
        'updated_at' => now()
      ]);

      DB::table('band_users')->insert([
        'user_id' => 1,
        'band_id' => 2,
        'roles' => 'Administrator,Drummer',
        'created_at' => now(),
        'updated_at' => now()
      ]);

    }
}
