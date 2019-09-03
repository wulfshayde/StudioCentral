<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('projects')->insert([
        'id' => 1,
        'project' => 'NonBerk Project 1',
        'tags' => 'Mixing,Mastering',
        'image' => '',
        'active' => true,
        'project_start_date' => Carbon::createFromDate('2019','08','01'),
        'created_at' => now(),
        'updated_at' => now()
      ]);

        DB::table('project_bands')->insert([
            'project_id' => 1,
            'band_id' => 3,
            'roles' => 'Author',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('project_studios')->insert([
            'project_id' => 1,
            'studio_id' => 1,
            'roles' => 'Editor',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
