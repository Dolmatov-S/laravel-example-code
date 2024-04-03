<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\Site;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Developer::factory(10)->create();

        $this->call([FrameworkSeeder::class]);

        Site::factory(10)->create();

        $this->call([
            DeveloperFrameworkSeeder::class,
            DeveloperSiteSeeder::class,
        ]);
    }
}
