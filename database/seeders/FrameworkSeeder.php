<?php

namespace Database\Seeders;

use App\Models\Framework;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = ['Laravel', 'Symfony', 'Yii'];

        foreach ($arr as $name) {
            Framework::firstOrCreate(['name' => $name]);
        }
    }
}
