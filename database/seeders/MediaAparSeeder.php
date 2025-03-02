<?php

namespace Database\Seeders;

use App\Models\MediaApar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaAparSeeder extends Seeder
{
    public function run()
    {
        $mediaList = ['DCP', 'Clean Agent', 'Co²', 'Foam'];

        foreach ($mediaList as $media) {
            MediaApar::create(['nama_media' => $media]);
        }
    }
}
