<?php

namespace Database\Seeders;

use App\Models\Moderator;
use Illuminate\Database\Seeder;

class ModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Moderator::factory(10)->create();
    }
}
