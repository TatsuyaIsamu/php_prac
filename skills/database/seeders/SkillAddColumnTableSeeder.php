<?php

namespace Database\Seeders;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillAddColumnTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Skill::factory()->count(10)->create();
    }
}