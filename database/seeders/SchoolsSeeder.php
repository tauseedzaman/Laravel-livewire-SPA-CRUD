<?php

namespace Database\Seeders;

use App\Models\schools;
use Illuminate\Database\Seeder;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = ['abs','xyz','QWR','ZCD','HLH'];
        foreach($schools as $school){
            schools::create([
                'name' => $school
            ]);
        }
    }
}
