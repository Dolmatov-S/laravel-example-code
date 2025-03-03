<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\DeveloperSite;
use App\Models\Site;
use Illuminate\Database\Seeder;

class DeveloperSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Site::all() as $site) {
            DeveloperSite::firstOrCreate([
                'site_id' => $site->id,
                'developer_id' => Developer::whereHas('framework', fn($query) => $query->where('framework_id', $site->framework_id))->select('id')->orderByRaw('RAND()')->first()->id
            ]);
        }
    }
}
