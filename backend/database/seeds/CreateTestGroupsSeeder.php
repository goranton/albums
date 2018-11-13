<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class CreateTestGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Group::class, 20)->create();
    }
}
