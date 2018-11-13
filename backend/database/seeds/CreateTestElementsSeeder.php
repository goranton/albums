<?php

use Illuminate\Database\Seeder;

class CreateTestElementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Element::class, 20)->create();
    }
}
