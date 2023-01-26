<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Front End', 'Back End', 'Full Stack'];

        foreach($technologies as $technology){
            $new_tech = new Technology();

            $new_tech->name = $technology;
            $new_tech->slug = Str::slug($technology);

            $new_tech->save();
        }
    }
}
