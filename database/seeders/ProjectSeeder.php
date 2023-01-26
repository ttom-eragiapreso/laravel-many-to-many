<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // for($i = 0; $i < 10; $i++){

        //     $new_project = new Project();

        //     $new_project->name = $faker->sentence();
        //     $new_project->slug = Project::generateSlug($new_project->name);
        //     $new_project->client_name = $faker->name();
        //     $new_project->summary = $faker->paragraph();

        //     $new_project->save();
        // }

        $projects = Project::all();

        foreach($projects as $project){

            $type_id = Type::inRandomOrder()->first()->id;
            $project->type_id = $type_id;
            $project->update();

        }

    }
}
