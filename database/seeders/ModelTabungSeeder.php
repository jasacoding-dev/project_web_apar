<?php

namespace Database\Seeders;

use App\Models\ModelTabung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelTabungSeeder extends Seeder
{
    public function run()
    {
        $modeltabungList = ['Portable', 'Thermatik', 'Trolley'];

        foreach ($modeltabungList as $model) {
            ModelTabung::create(['model_tabung' => $model]);
        }
    }
}
