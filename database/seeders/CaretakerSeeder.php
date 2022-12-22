<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaretakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caretaker::factory()
        ->times(3)
        -create();

        foreach(Caretaker::all() as $caretaker)
        {
            $pets = Pet::inRandomOrder()->take(rand(1,3))->pluck('id');
            $caretaker->pets()->attach($pets);
        }
    }
}
