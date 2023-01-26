<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['HTML', 'Javascript', 'CSS', 'PHP', 'Vue', 'Laravel'];

        foreach($types as $type){

            $entry = new Type();

            $entry->name = $type;
            $entry->slug = Str::slug($entry->name);

            $entry->save();

        }

    }
}
