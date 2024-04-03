<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\DeveloperFramework;
use App\Models\Framework;
use Illuminate\Database\Seeder;

class DeveloperFrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Developer::all() as $developer) {
            DeveloperFramework::firstOrCreate([
                'developer_id' => $developer->id,
                'framework_id' => Framework::select('id')->orderByRaw('RAND()')->first()->id
            ]);
        }
    }
}
