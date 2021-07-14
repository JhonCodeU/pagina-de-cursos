<?php

namespace Database\Seeders;

use App\Models\Plaform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plaform::create([
            'name' => 'YouTobe'
        ]);

        Plaform::create([
            'name' => 'Vimeo'
        ]);
    }
}
