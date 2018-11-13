<?php

use Illuminate\Database\Seeder;

class CreateTestRelationsBetweenGroupElement extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Group::all()
            ->each(function (\App\Models\Group $group) {
               $group->elements()->sync(\App\Models\Element::inRandomOrder()->limit(4)->pluck('id'));
            });
    }
}
